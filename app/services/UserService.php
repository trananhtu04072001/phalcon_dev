<?php

namespace App\Services;

use Phalcon\Di\Injectable;
use App\Models\Users;
use App\Validations\CreateUserValidation;
use App\Validations\UpdateUserValidation;
use App\Validations\UpdateProfileValidation;

class UserService extends Injectable {
    public function create($data, $reqFile) {
        $validator = new CreateUserValidation();
        $messages  = $validator->validate($data);
        if (count($messages)) {
            $errors = [];
            foreach ($messages  as $msg) {
                $field = $msg->getField();
                $errors[$field] = $msg->getMessage();
            }
            return [
                'success' => false,
                'errors' => $errors
            ];
        }
        if (!empty($data) && !empty($reqFile)) {
            $user = new Users();
            $user->name = $data['name'] ?? '';
            $user->full_name = $data['full_name'] ?? '';
            $user->email = $data['email'] ?? '';    
            $user->phone = $data['phone'] ?? '';
            $user->avatar = $this->helpers->upload($reqFile['0'], 'avatar') ?? 'default/default-avatar.png';
            $passwordPlain = bin2hex(random_bytes(4));
            $user->password = $this->security->hash($passwordPlain) ?? '';
            $user->role = $data['role'] ?? UserRole::USER;
            if ($user->save()) {
                // Push job vào queue
                $this->helpers->queueJobs('create_new_user', ['email' => $user->email, 'password' => $passwordPlain]);
                return [
                    'success' => true,
                    'message' => 'Tạo user thành công!'
                ];
            }
        }
    }

    public function update($id, $data, $reqFile) {
        // if (!empty($reqFile) && $reqFile[0]->getSize() > 0) {
        //     $data['avatar'] = $reqFile[0];
        // }
        $validator = new UpdateUserValidation($id);
        $messages  = $validator->validate($data);
        if (count($messages)) {
            $errors = [];
            foreach ($messages  as $msg) {
                $field = $msg->getField();
                $errors[$field] = $msg->getMessage();
            }
            return [
                'success' => false,
                'errors' => $errors
            ];
        }
        $user = Users::findFirstById($id ?? null);
        if (!empty($data)) {
            $user->name = $data['name'] ?? '';
            $user->full_name = $data['full_name'] ?? '';
            $user->email = $data['email'] ?? '';
            $user->role = $data['role'] ?? UserRole::USER;
        }
        if ($data['auto_reset_password']) {
            $passwordPlain = bin2hex(random_bytes(4));
            $user->password = $this->security->hash($passwordPlain);
            // Push job vào queue
            $this->helpers->queueJobs('auto_reset_password', ['email' => $user->email, 'password' => $passwordPlain]);
        }
        if (!empty($reqFile) && isset($reqFile[0]) && $reqFile[0]->getError() === UPLOAD_ERR_OK) {
            $user->avatar = $this->helpers->upload($reqFile[0], 'avatar') ?? 'default/default-avatar.png';
        }
        if ($user->save()) {
            return [
                'success' => true,
                'message' => 'Cập nhật thành công!'
            ];
        }
    }

    public function updateProfile($id, $data, $reqFile) {
        $validator = new UpdateProfileValidation($id);
        $messages  = $validator->validate($data);
        if (count($messages)) {
            $errors = [];
            foreach ($messages  as $msg) {
                $field = $msg->getField();
                $errors[$field] = $msg->getMessage();
            }
            return [
                'success' => false,
                'errors' => $errors
            ];
        }
        $user = Users::findFirstById($id ?? null);
        if (!empty($data)) {
            $user->name = $data['name'] ?? '';
            $user->full_name = $data['full_name'] ?? '';
            $user->email = $data['email'] ?? '';
        }
        if (!empty($reqFile) && isset($reqFile[0]) && $reqFile[0]->getError() === UPLOAD_ERR_OK) {
            $user->avatar = $this->helpers->upload($reqFile['0'], 'avatar');
        } 
        if ($data['password']) {
            $user->password = $this->security->hash($data['password']) ?? '';
        }
        if ($user->save()) {
            $this->session->set('user', $user->toArray());
            return [
                'success' => true,
                'message' => 'Cập nhật thành công!'
            ];
            return $this->response->redirect('dashboard/updateProfile');
        }
    }

    public function filterSearch($keyword) {
        $conditions = "role = 'user'";
        $params = [];
        if (!empty($keyword)) {
            $conditions .= " AND (name LIKE :keyword: OR full_name LIKE :keyword: OR email LIKE :keyword:)";
            $params['keyword'] = '%' . $keyword . '%';
        }
        return $users = Users::find([
            'conditions' => $conditions,
            'bind'       => $params,
        ]);
    }

    public function softDelete($id) {
        $user = Users::findFirstById($id);
        if ($user) {
            $user->deleted_at = date('Y-m-d H:i:s');
            return $user->save();
        }
        return false;
    }

    public function restore($id) {
        $user = Users::findFirstById($id);
        if ($user && $user->deleted_at !== null) {
            $user->deleted_at = null;
            return $user->save();
        }
        return false;
    }
}