<?php
class RoundsController extends AppController{

    public $listCouples = array();

    public function beforeRender()
    {
      parent:: beforeRender();

    }

    public function beforeFilter()
    {
      parent::beforeFilter();

      $date = new DateTime();

      $rounds = $this->Round->find('all', array(
          'conditions' => array(
              'Round.statut = 0',
              'Round.created < ' . '\'' . $date->format('Y-m-d') . '\'')));

        $isOK = $this->loadModel('Users');

        if($isOK){
            foreach($rounds as $round){
                foreach($round['Couple'] as $couple){
                    $ids = array($couple['idFirst'],$couple['idSecond']);
                    $users = $this->Users->find('all', array(
                        'conditions' => array('Users.id' => $ids)
                        ));
                    $this->listCouples[]= array($users[0]['Users']['username'], $users[1]['Users']['username']);

                }
            }
        }

    }

    public function index(){
        $listCouples = $this->listCouples;
        $this->set(compact('listCouples',$listCouples));
    }

    public function sendMails(){

        //Prepare email
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('smtp');
        $email->subject('Test d\envoie d\'email');
        $email->viewVars(array('username' => "Manu"));
        $email->template('welcome');
        $email->emailFormat('html'); //text, html, both

        foreach($this->listCouples as $couple){
            $to = array ($couple[0] . '@test.com' , $couple[1]. '@test.com');
            $email->to($to);
            $email->send('Ceci est un mail de test');
        }

        $this->render('sendmail-success');

    }

}