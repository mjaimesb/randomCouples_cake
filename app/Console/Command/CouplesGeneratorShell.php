<?php
include 'db/DB.php';
require('classes/Fixture.php');

class CouplesGeneratorShell extends AppShell
{
    public function main()
    {

        $isOK = $this->loadModel('Users');

        //$players = array('Member1','Member2','Member3','Member4','Member5','Member6');
        $players = array();

        if($isOK){
            $users = $this->Users->find('all', array('conditions' => array('Users.active = 1')));

            foreach($users as $user){

                $players[] = $user['Users']['id'];

            }
            //die(var_dump($players));

        }

        $fixture = new Fixture($players);

        //get simple couples not sorted
        //$fixture->getListCouples();

        //generate couples by fixture algorithm
        $planning = $fixture->Generate();
        $this->loadModel('Round');
        $this->loadModel('Couple');
        $fixture->displayMeetings($planning,$this);

        /*
        //create 'n' groups
        $groups =  $fixture->getGroups(3);
        var_dump($groups);
        */

        /*
        //Test db connection using a simple PHP Query Builder class:  https://github.com/mareimorsy/DB.git
        $db = DB::getInstance();
        $rows = $db->table('posts')->get();
        //var_dump($rows);
        */
    }
}
?>