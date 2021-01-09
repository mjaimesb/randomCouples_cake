<?php
require('Match.php');

/**
 * Undocumented class
 */
class Fixture {

    private $members;
    private $couples;
    private $iterations;
    private $numberCouples;

    public function __construct($list){
        $this->setMembers($list);
        $this->setIterations(count($list) - 1);
        $this->setNumberCouples(count($list)/2);
    }

    public function getMembers(){
        return $this->members;
    }

    public function getcouples(){
        return $this->couples;
    }

    public function getIterations(){
        return $this->iterations;
    }

    public function getNumberCouples(){
        return $this->numberCouples;
    }

    public function setMembers($members){
        $this->members = $members;
    }

    public function setcouples($couples){
        $this->couples = $couples;
    }

    public function setIterations($iterations){
        $this->iterations = $iterations;
    }

    public function setNumberCouples($number){
        $this->numberCouples = $number;
    }

    /**
     * Get couples not sorted
     *
     * @return void
     */
    public function getListCouples(){
        $couples = array();
        $players = $this->members;

        foreach($players as $k){
            foreach($players as $j){
                if($k == $j){
                    continue;
                }
                $z = array($k,$j);
                sort($z);
                if(!in_array($z,$couples)){
                    $couples[] = $z;
                }
            }
        }

        var_dump($couples);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function Generate(){
        $this->couples = array();

        for($i=0,$k=0; $i < $this->iterations; $i++){
            for($j=0; $j < $this->numberCouples; $j++){
                $this->couples[$i][$j] = new Match();
                $this->couples[$i][$j]->firstMember = $k;

                $k++;
                if($k == $this->iterations) $k=0;

            }

        }

        for ($i = 0; $i < $this->iterations; $i++)
        {
            if ($i % 2 == 0)
            {
                $this->couples[$i][0]->secondMember = count($this->getMembers()) - 1;
            }
            else
            {
                $this->couples[$i][0]->secondMember = $this->couples[$i][0]->firstMember;
                $this->couples[$i][0]->secondMember = count($this->getMembers()) - 1;
            }
        }

        $highTeam = count($this->getMembers()) - 1;
        $nonPairHT = $highTeam - 1;

        for ($i = 0, $k = $nonPairHT; $i < $this->iterations; $i ++)
        {
            for ( $j = 1; $j < $this->numberCouples; $j ++)
            {
                $this->couples[$i][$j]->secondMember = $k;

                $k --;

                if ($k == -1)
                    $k = $nonPairHT;
            }
        }


        return $this->couples;
    }

    /**
     * Undocumented function
     *
     * @param [type] $planning
     * @param [type] $players
     * @return void
     */
    public function displayMeetings($planning, $model)
    {

        for ($i = 0; $i < count($planning); $i ++)
        {
            echo "Round " . ($i + 1) . ": \r\n";
            $couples_aux = array();

            $model->Round->create();
            $round = $model->Round->save(array(
                'Round' => array(
                    'name' => "Round " . ($i + 1))
                )
            );

            for ($j = 0; $j < count($planning[$i]); $j ++)
            {
                echo " " . $this->members[(int)$planning[$i][$j]->firstMember] . "-" . $this->members[(int)$planning[$i][$j]->secondMember] . " \r\n";
                $couples_aux = "'idFirst' => " . $this->members[$planning[$i][$j]->firstMember] . "," .
                     "'idSecond' => " . $this->members[$planning[$i][$j]->secondMember];

                $model->Round->Couple->save(array(
                    'Round' => array('id' => $round['Round']['id']),
                    'Couple'  => array(
                        'idFirst' => $this->members[$planning[$i][$j]->firstMember],
                        'idSecond' => $this->members[$planning[$i][$j]->secondMember])
                ));
                $model->Round->Couple->create();
            }

        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $players
     * @param [type] $workTeamsNumber
     * @return $workTeams
     */
    public function getGroups($workTeamsNumber){

        $workTeams = array();
        $players = $this->getMembers();

        for($i=0; $i < $workTeamsNumber; $i++){
            $workTeams[$i]= array();
        }

        $indexGroup = 0;

        while(count($players) > 0){
            $randomIndex = rand(0,count($players));

            if(isset($players[$randomIndex])){
                $playerSelected = $players[$randomIndex];
                array_push($workTeams[$indexGroup], $playerSelected);

                array_splice($players, $randomIndex, 1);

                if($indexGroup == $workTeamsNumber -1)
                    $indexGroup = 0;
                else
                    $indexGroup += 1;
            }

        }

        return $workTeams;

    }

}
?>