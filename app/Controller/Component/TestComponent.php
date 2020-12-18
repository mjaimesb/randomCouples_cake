<?php
class TestComponent extends Component{

    public $controller = false;

    public function __construct(ComponentCollection $collection, $settings)
    {
        $this->controller = $collection->getController();
    }

    public function afficherLol(){
        //debug('Lol');
        //debug($this->controller->request);
    }

}