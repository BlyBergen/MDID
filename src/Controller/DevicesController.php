<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Devices Controller
 *
 * @property \App\Model\Table\DevicesTable $Devices
 *
 * @method \App\Model\Entity\Device[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DevicesController extends AppController
{



    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $Logs = TableRegistry::get('LogsTable');

        $devices = $this->paginate($this->Devices);
        $device_id = "temp";
        $username = $this->Auth->user('username');
        $this->set(compact('devices', 'username', 'device_id'));

        if ($this->request->is('post')) {
          $device_id = $this->request->getData('device_id');
          if(is_numeric($device_id)){
            $Logs->register($device_id);
          }
        }

        // if ($this->request->is('post')) {
        //   $user = $this->Auth->identify();
        //   $redir_ir = $this->request->getData('redir_id');
        //   echo $redir_id;
        //   if($user){
        //     $this->Auth->setUser($user);
        //     return $this->redirect($this->Auth->redirectUrl("/" + $redir_id));
        //   }
        //   $this->Flash->error('Your username or password is incorrect');
        // }
    }

    /**
     * View method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => []
        ]);

        $this->set('device', $device);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($mac = null)
    {
        $device = $this->Devices->newEntity();
        $mac = $this->request->getQuery('mac');
        $device['mac'] = $mac;
        $this->loadModel('Vendors');
        $vendors = $this->Vendors
          ->find()
          ->select(['vendorLong'])
          ->where(['mac' => $mac])
          ->first();
        $this->loadModel('WifiClientSsids');
        $ssids = array();
        $ssids = $this->WifiClientSsids
          ->find()
          ->select(['ssid'])
          ->where(['mac' => $mac])
          ->toArray();
          $details = "Vendors: " . $vendors['vendorLong'] . "\r\n" . "SSIDs: ";
          if (!empty($ssids)){
            foreach ($ssids as $ssid){
            $details = $details . $ssid['ssid'] . ", ";
            }
            $details = rtrim($details, ', ');
          }
          else{
            $details = $details . "None Found";
          }
        // $device['details'] = $vendors['vendorLong'];
            // $device['details'] = $ssids;
            $device['details'] = $details;
        if ($this->request->is('post')) {
            $device = $this->Devices->patchEntity($device, $this->request->getData());
            $device['date_added'] = time();
            $device['date_modified'] = time();
            $device['user_id'] = $this->Auth->user('id');
            $device['city'] = $this->Auth->user('city');
            $device['state'] = $this->Auth->user('state');
            if ($this->Devices->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device could not be saved. Please, try again.'));
        }
        $this->set(compact('device'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $device = $this->Devices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $device = $this->Devices->patchEntity($device, $this->request->getData());
            $device['date_modified'] = time();
            if ($this->Devices->save($device)) {
                $this->Flash->success(__('The device has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The device could not be saved. Please, try again.'));
        }
        $this->set(compact('device'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Device id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $device = $this->Devices->get($id);
        if ($this->Devices->delete($device)) {
            $this->Flash->success(__('The device has been deleted.'));
        } else {
            $this->Flash->error(__('The device could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
