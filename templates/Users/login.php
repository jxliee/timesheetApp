<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min') ?> <!-- Include Bootstrap CSS -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title" style="margin-bottom: 20px;"><?= __('Login') ?></h1>
                        <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login'], 'class' => 'form-horizontal']) ?>
                        <div class="form-group">
                                <div class="col-sm-10" style="margin-bottom: 20px;">
                                    <?= $this->Form->control('email', ['type' => 'email', 'class' => 'form-control-plaintext', 'id' => 'email', 'placeholder' => __('Email')]) ?>
                                </div>
                                <div class="col-sm-10">
                                    <?= $this->Form->control('password', ['type' => 'password', 'class' => 'form-control', 'id' => 'password', 'placeholder' => __('Password')]) ?>
                                </div>
                                <div class="col-sm-offset-2 col-sm-10">
                                    <?= $this->Form->button(__('Login'), ['class' => 'btn btn-primary mt-3']) ?>
                                </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
