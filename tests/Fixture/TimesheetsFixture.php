<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TimesheetsFixture
 */
class TimesheetsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'timesheet_id' => 1,
                'user_id' => 1,
                'date' => '2024-02-04 18:02:06',
                'task_description' => 'Lorem ipsum dolor sit amet',
                'regular_hours' => 1,
                'overtime_hours' => 1,
                'sick_hours' => 1,
                'status' => 1,
            ],
        ];
        parent::init();
    }
}
