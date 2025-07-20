<?php $errors = $this->flashSession->getMessages('error'); ?>
<?php if (!empty($errors)) { ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach ($errors as $message) { ?>
            <li><?= $message ?></li>
        <?php } ?>
        </ul>
    </div>
<?php } ?>
<?php $success = $this->flashSession->getMessages('success'); ?>
<?php if (!empty($success)) { ?>
    <div class="alert alert-success">
        <?php foreach ($success as $message) { ?>
            <p><?= $message ?></p>
        <?php } ?>
    </div>
<?php } ?>