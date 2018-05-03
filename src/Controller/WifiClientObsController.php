<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * WifiClientObs Controller
 *
 * @property \App\Model\Table\WifiClientObsTable $WifiClientObs
 *
 * @method \App\Model\Entity\WifiClientOb[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WifiClientObsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sessions']
        ];
        $wifiClientObs = $this->paginate($this->WifiClientObs);
        $this->loadModel('Vendors');
        $vendors = $this->Vendors->find('all');
        $this->set(compact('wifiClientObs', 'vendors'));
    }

    public function scan()
    {
      $this->paginate = [
          'contain' => ['Sessions']
      ];
      $now = new \DateTime(time());
      $devices = array();
      // $wifiClientObs = array();
      $wifiClientObs = $this->WifiClientObs;
      foreach($wifiClientObs as $wifiClientOb){
        $date = new \DateTime($wifiClientOb['date_added']);
        $diff = $now->diff($date);
        $minutes = $diff->i;
        if ($minutes < 1){
          array_push($devices, $wifiClientOb);
        }
      }
      // $devices = $this->WifiClientObs
      //   ->find()
      //   ->where(($now->diff(new \DateTime(['date_added'])) / 60) < 1)
      //   ->toArray();
      $wifiClientObs = $this->paginate($this->WifiClientObs);
      $this->set(compact('wifiClientObs', 'devices'));
    }

    /**
     * View method
     *
     * @param string|null $id Wifi Client Ob id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $wifiClientOb = $this->WifiClientObs->get($id, [
            'contain' => ['Sessions']
        ]);

        $this->set('wifiClientOb', $wifiClientOb);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $wifiClientOb = $this->WifiClientObs->newEntity();
        if ($this->request->is('post')) {
            $wifiClientOb = $this->WifiClientObs->patchEntity($wifiClientOb, $this->request->getData());
            if ($this->WifiClientObs->save($wifiClientOb)) {
                $this->Flash->success(__('The wifi client ob has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wifi client ob could not be saved. Please, try again.'));
        }
        $sessions = $this->WifiClientObs->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('wifiClientOb', 'sessions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Wifi Client Ob id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $wifiClientOb = $this->WifiClientObs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $wifiClientOb = $this->WifiClientObs->patchEntity($wifiClientOb, $this->request->getData());
            if ($this->WifiClientObs->save($wifiClientOb)) {
                $this->Flash->success(__('The wifi client ob has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The wifi client ob could not be saved. Please, try again.'));
        }
        $sessions = $this->WifiClientObs->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('wifiClientOb', 'sessions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Wifi Client Ob id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $wifiClientOb = $this->WifiClientObs->get($id);
        if ($this->WifiClientObs->delete($wifiClientOb)) {
            $this->Flash->success(__('The wifi client ob has been deleted.'));
        } else {
            $this->Flash->error(__('The wifi client ob could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
