<?php
class UsersController extends AppController{


        public function beforeFilter()
        {
            parent::beforeFilter();
            $this->Auth->allow('auto', 'login','mail');

        }

        public function auto(){

            /*$user = $this->User->find('first', array(
                'conditions' => array('User.role' => 'user')
            ));

            if(!empty($user)){
                $this->Auth->login($user['User']);
                debug($this->Session->read()); die();
            }*/

            $this->Auth->login(array(
                'id' => 1,
                'username' => 'chien',
                'role' => 'admin'
            ));
        }

        public function login(){

            /*$this->User->save(array(
                'username' => 'admin',
                'password' => Security::hash('admin')               //$this->Auth->password('admin')
            ));*/

            //debug($this->Session->read());
            //debug($this->request->data);
            //debug($this->Auth->user('role'));

            //echo $this->Auth->password('admin');

            /*$this->User->save(array(
                'username' => 'user',
                'password' => $this->Auth->password('user'),
                'active' => 1,
                'role' => 'user1'
            ));*/

            if(!empty($this->request->data)){
                if($this->Auth->login()){
                    return $this->redirect('/rounds');
                }else{
                    //die("Denied!");
                }

            }
        }

        public function logout(){
            $this->Auth->logout();
            return $this->redirect('/');

        }

        public function mail(){
            App::uses('CakeEmail', 'Network/Email');
            $email = new CakeEmail('smtp');
            //$email->config('gmail');
            $email->to('majb@test.com'); //to, cc, replyto, ...
            $email->subject('Test d\envoie d\'email');
            //$email->attachments(array("C:\Users\Manuel Jaimes\Documents\sopra_mission\mailslurper-1.14.1-windows\logo.png"));
            $email->viewVars(array('username' => "Manu"));
            $email->template('welcome');
            $email->emailFormat('html'); //text, html, both

            debug($email->send('Ceci est un mail de test'));
            die('test');
        }
}