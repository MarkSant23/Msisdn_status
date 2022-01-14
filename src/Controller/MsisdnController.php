<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\I18n\Time;
/**
 * Msisdn Controller
 *
 * @method \App\Model\Entity\Msisdn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MsisdnController extends AppController
{
    
    public function index()
    {
        try
        {
             //filter
            $key = $this->request->getQuery('key');
            if($key){
                $query = $this->Msisdn->find('all')->where(['msisdn like'=>'%'.$key.'%']);
            }else{
                $query = $this->Msisdn;
            }
            $msisdn = $this->paginate($query, ['limit' => '4']);        

            $this->set(compact('msisdn'));
        }
        catch(\Exception $ex)
        {
            echo 'Error:'.$ex->getMessage();
            return;
        }
    }



    public function view($id = null)
    {
        try
        {
            $msisdn = $this->Msisdn->get($id, []);
        
            $this->set(compact('msisdn'));
        }
        
        catch(\Exception $ex)
        {
            echo 'Error:'.$ex->getMessage();
            return;
        }
    }


    public function GetFormatedPhoneNumber ($msisdn)
    {
        if($msisdn->empty($_POST['msisdn']))
            return $msisdn = 0;

        if(strpos($msisdn,"+385"))
            return $msisdn->substr(4);

        if(strpos($msisdn,"00"))
            return $msisdn->substr(6);

        if(strpos($msisdn,"09"))
            return $msisdn->substr(1);

        if(strpos($msisdn,"385"))
            return $msisdn->substr(3);

        return $msisdn;
    }  

    public function add()
    {
        try
        {
            $msisdn = $this->Msisdn->newEmptyEntity();
            if ($this->request->is('post')) {
                $msisdn = $this->Msisdn->patchEntity($msisdn, $this->request->getData());
                $msisdn['modified'] = NULL;
                print_r($msisdn);
                if ($this->Msisdn->save($msisdn)) {
                    $msisdn['created'] = Time::now();
                    $this->Flash->success(__('The msisdn has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The msisdn could not be saved. Please, try again.'));
            }
            $this->set(compact('msisdn'));
        }
        catch(\Exception $ex){
            echo 'Error:'.$ex->getMessage();
            return;
        }
    }


    public function edit($id = null)
    {
        try
        {
            $msisdn = $this->Msisdn->get($id, []);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $msisdn = $this->Msisdn->patchEntity($msisdn, $this->request->getData());
                print_r($msisdn);
                if ($this->Msisdn->save($msisdn)) {
                    $msisdn['modified'] = Time::now();
                    $this->Flash->success(__('The msisdn has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The msisdn could not be saved. Please, try again.'));
            }
            $this->set(compact('msisdn'));
        }
        catch(\Exception $ex){
            echo 'Error:'.$ex->getMessage();
            return;
        }

    }



    public function delete($id = null)
    {
        try
        {
            $this->request->allowMethod(['post', 'delete']);
            $msisdn = $this->Msisdn->get($id, []);
            if ($this->Msisdn->delete($msisdn)) {
                $this->Flash->success(__('The msisdn has been deleted.'));
            } else {
                $this->Flash->error(__('The msisdn could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }
        catch(\Exception $ex)
        {
            echo 'Error:'.$ex->getMessage();
            return;
        }
    }



    public function blockstatus($msisdn_id,$status)
    {
        try
        {
            $this->request->allowMethod(['post']);
            $msisdn = $this->Msisdn->get($msisdn_id);

            if($status == 1){
                $msisdn->status = 0;
            }else{
                $msisdn->status = 1;
            }
            if($this->Msisdn->save($msisdn))
            {
                $this->Flash->success(__('Msisdn status changed.'), array('timeout' => 3000));
                
            }else{
            $this->Flash->error(__('Something went wrong.'), array('timeout' => 3000)); 
            }

            return $this->redirect(['action' => 'index']);
        }
        catch(\Exception $ex)
        {
            echo 'Error:'.$ex->getMessage();
            return;
        }
        
        
    }
}
