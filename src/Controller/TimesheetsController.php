<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Timesheets Controller
 *
 * @property \App\Model\Table\TimesheetsTable $Timesheets
 * @method \App\Model\Entity\Timesheet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TimesheetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $timesheets = $this->paginate($this->Timesheets);

        $this->set(compact('timesheets'));
    }

    /**
     * View method
     *
     * @param string|null $id Timesheet id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $timesheet = $this->Timesheets->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('timesheet'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $timesheet = $this->Timesheets->newEmptyEntity();
        if ($this->request->is('post')) {
            $timesheet = $this->Timesheets->patchEntity($timesheet, $this->request->getData());
            if ($this->Timesheets->save($timesheet)) {
                $this->Flash->success(__('The timesheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timesheet could not be saved. Please, try again.'));
        }
        $users = $this->Timesheets->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('timesheet', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Timesheet id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $timesheet = $this->Timesheets->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $timesheet = $this->Timesheets->patchEntity($timesheet, $this->request->getData());
            if ($this->Timesheets->save($timesheet)) {
                $this->Flash->success(__('The timesheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The timesheet could not be saved. Please, try again.'));
        }
        $users = $this->Timesheets->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('timesheet', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Timesheet id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $timesheet = $this->Timesheets->get($id);
        if ($this->Timesheets->delete($timesheet)) {
            $this->Flash->success(__('The timesheet has been deleted.'));
        } else {
            $this->Flash->error(__('The timesheet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
