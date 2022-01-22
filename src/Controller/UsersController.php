<?php
declare(strict_types=1);

namespace App\Controller;

class UsersController extends AppController
{

    public function login()
    {
        try
        {
            if($this->request->is('post')){
                $user = $this->Auth->identify();
                if($user){
                    $this->Auth->setUser($user);
                    
                    if($user['status'] == 0)
                    {
                        $this->Flash->error("You have not access permission!");
                        return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                    }
    
                    return $this->redirect(['controller'=>'Msisdn','action'=>'index']);
                }else {
                    $this->Flash->error("Incorrect username or password!");
                }
            }
        }
        catch(\Exception $ex)
        {
            echo 'Error:'.$ex->getMessage();
            return;
        }
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }

 

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }


    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
