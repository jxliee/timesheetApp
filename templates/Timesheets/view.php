<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timesheet $timesheet
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
            <?= $this->Html->link(__('Edit Timesheet'), ['action' => 'edit', $timesheet->timesheet_id], ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->postLink(__('Delete Timesheet'), ['action' => 'delete', $timesheet->timesheet_id], ['confirm' => __('Are you sure you want to delete # {0}?', $timesheet->timesheet_id), 'class' => 'btn btn-danger']) ?>
            <?= $this->Html->link(__('List Timesheets'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Html->link(__('New Timesheet'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
        </div>
    </aside>
    <div class="col-md-9">
        <div class="timesheets view content">
            <h3><?= h($timesheet->timesheet_id) ?></h3>
            <table class="table">
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $timesheet->has('user') ? $this->Html->link($timesheet->user->username, ['controller' => 'Users', 'action' => 'view', $timesheet->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Task Description') ?></th>
                    <td><?= h($timesheet->task_description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Timesheet Id') ?></th>
                    <td><?= $this->Number->format($timesheet->timesheet_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Regular Hours') ?></th>
                    <td><?= $timesheet->regular_hours === null ? '' : $this->Number->format($timesheet->regular_hours) ?></td>
                </tr>
                <tr>
                    <th><?= __('Overtime Hours') ?></th>
                    <td><?= $timesheet->overtime_hours === null ? '' : $this->Number->format($timesheet->overtime_hours) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sick Hours') ?></th>
                    <td><?= $timesheet->sick_hours === null ? '' : $this->Number->format($timesheet->sick_hours) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $timesheet->status === null ? '' : $this->Number->format($timesheet->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($timesheet->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

