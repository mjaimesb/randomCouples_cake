<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array (
        'Session',
        'Cookie',
        'Test'
        ,
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    //'fields' => array ('username' => 'mail', 'password' => 'pass'),
                    'scope' => array('User.active' => 1)
                )
            ),
            //'authorize' => array('Controller')

        )
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        /*
        $menu = 'home';
        $this->set(compact('menu'));*/

        //$this->Session->write('test', 'test1');
        /*$this->Session->write('Authentification.User.id', array('test' => 1));
        //$this->Session->delete('Authentification');
        //$this->Session->destroy();
        $session = $this->Session->read();
        debug($session);


        $this->Cookie->name = 'CakeFormation';
        $this->Cookie->key = '6d5a851bb2e8e56bb6125c695186';
        $this->Cookie->httpOnly = true;
        $this->Cookie->write('User.id', '2');
        $cookie = $this->Cookie->read();
        debug($_COOKIE);

        debug($cookie);
        //*/

    }

    public function isAuthorized($user = null){
        return true;

    }
}
