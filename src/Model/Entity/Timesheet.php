<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Timesheet Entity
 *
 * @property int $timesheet_id
 * @property int|null $user_id
 * @property \Cake\I18n\FrozenTime|null $date
 * @property string|null $task_description
 * @property int|null $regular_hours
 * @property int|null $overtime_hours
 * @property int|null $sick_hours
 * @property int|null $status
 *
 * @property \App\Model\Entity\User $user
 */
class Timesheet extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'user_id' => true,
        'date' => true,
        'task_description' => true,
        'regular_hours' => true,
        'overtime_hours' => true,
        'sick_hours' => true,
        'status' => true,
        'user' => true,
    ];
}
