<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timesheet $timesheet
 * @var \Cake\Collection\CollectionInterface|string[] $users
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
<div class="row">
    <aside class="col-md-3">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Timesheets'), ['action' => 'index'], ['class' => 'btn btn-primary']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="timesheets form content">
            <?= $this->Form->create($timesheet, ['class' => 'form-horizontal']) ?>
            <fieldset>
                <legend><?= __('Add Timesheet') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true, 'class' => 'form-control']);
                    echo $this->Form->control('date', ['empty' => true, 'class' => 'form-control']);
                    echo $this->Form->control('task_description', ['class' => 'form-control']);
                    echo $this->Form->control('regular_hours', ['class' => 'form-control']);
                    echo $this->Form->control('overtime_hours', ['class' => 'form-control']);
                    echo $this->Form->control('sick_hours', ['class' => 'form-control']);
                    echo $this->Form->control('status', ['class' => 'form-control']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</html>