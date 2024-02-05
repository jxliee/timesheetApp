<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Timesheet $timesheet
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Timesheets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="timesheets form content">
            <?= $this->Form->create($timesheet) ?>
            <fieldset>
                <legend><?= __('Add Timesheet') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('date', ['empty' => true]);
                    echo $this->Form->control('task_description');
                    echo $this->Form->control('regular_hours');
                    echo $this->Form->control('overtime_hours');
                    echo $this->Form->control('sick_hours');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
