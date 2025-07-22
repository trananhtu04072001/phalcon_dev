<style>
    .alert-success-custom,
    .alert-danger-custom {
        position: absolute !important;
        right: 20px;
        z-index: 1000;
        transition: opacity 0.5s ease;
    }
    .alert ul {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }
</style>
<?php $errors = $this->flashSession->getMessages('error'); ?>
<?php if (!empty($errors)) { ?>
    <div class="alert alert-danger alert-danger-custom">
        <ul>
        <?php foreach ($errors as $message) { ?>
            <li><?= $message ?></li>
        <?php } ?>
        </ul>
    </div>
<?php } ?>
<?php $success = $this->flashSession->getMessages('success'); ?>
<?php if (!empty($success)) { ?>
    <div class="alert alert-success alert-success-custom">
        <?php foreach ($success as $message) { ?>
            <p><?= $message ?></p>
        <?php } ?>
    </div>
<?php } ?>