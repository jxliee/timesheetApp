<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Timesheet> $timesheets
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <?= $this->Html->link(__('New Timesheet'), ['action' => 'add'], ['class' => 'btn btn-primary float-right']) ?>
                    <h3><?= __('Timesheets') ?></h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('timesheet_id') ?></th>
                                    <th><?= $this->Paginator->sort('user_id') ?></th>
                                    <th><?= $this->Paginator->sort('date') ?></th>
                                    <th><?= $this->Paginator->sort('task_description') ?></th>
                                    <th><?= $this->Paginator->sort('regular_hours') ?></th>
                                    <th><?= $this->Paginator->sort('overtime_hours') ?></th>
                                    <th><?= $this->Paginator->sort('sick_hours') ?></th>
                                    <th><?= $this->Paginator->sort('status') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($timesheets as $timesheet): ?>
                                <tr>
                                    <td><?= $this->Number->format($timesheet->timesheet_id) ?></td>
                                    <td><?= $timesheet->has('user') ? $this->Html->link($timesheet->user->username, ['controller' => 'Users', 'action' => 'view', $timesheet->user->user_id]) : '' ?></td>
                                    <td><?= h($timesheet->date) ?></td>
                                    <td><?= h($timesheet->task_description) ?></td>
                                    <td><?= $timesheet->regular_hours === null ? '' : $this->Number->format($timesheet->regular_hours) ?></td>
                                    <td><?= $timesheet->overtime_hours === null ? '' : $this->Number->format($timesheet->overtime_hours) ?></td>
                                    <td><?= $timesheet->sick_hours === null ? '' : $this->Number->format($timesheet->sick_hours) ?></td>
                                    <td><?= $timesheet->status === null ? '' : $this->Number->format($timesheet->status) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $timesheet->timesheet_id], ['class' => 'btn btn-info btn-sm']) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timesheet->timesheet_id], ['class' => 'btn btn-warning btn-sm']) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timesheet->timesheet_id], ['confirm' => __('Are you sure you want to delete # {0}?', $timesheet->timesheet_id), 'class' => 'btn btn-danger btn-sm']) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
