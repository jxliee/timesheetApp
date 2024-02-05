<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Timesheets Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Timesheet newEmptyEntity()
 * @method \App\Model\Entity\Timesheet newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Timesheet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Timesheet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Timesheet findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Timesheet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Timesheet[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Timesheet|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Timesheet saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Timesheet[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Timesheet[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Timesheet[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Timesheet[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TimesheetsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('timesheets');
        $this->setDisplayField('timesheet_id');
        $this->setPrimaryKey('timesheet_id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->dateTime('date')
            ->allowEmptyDateTime('date');

        $validator
            ->scalar('task_description')
            ->maxLength('task_description', 255)
            ->allowEmptyString('task_description');

        $validator
            ->integer('regular_hours')
            ->allowEmptyString('regular_hours');

        $validator
            ->integer('overtime_hours')
            ->allowEmptyString('overtime_hours');

        $validator
            ->integer('sick_hours')
            ->allowEmptyString('sick_hours');

        $validator
            ->allowEmptyString('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
