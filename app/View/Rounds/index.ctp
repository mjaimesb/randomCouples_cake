<?php

        echo '<h3> Les meetings actives aujourd\'hui: </h3><br>';
        if(isset($listCouples)){
            echo '<ul>';
            foreach($listCouples as $couple){
                echo '<li><strong>' . $couple[0] . ' - ' . $couple[1] . '</strong></li><br>';
            }
            echo '</ul>';
        }
?>

<?php // $this->Form->create('Round'); ?>
<?= $this->Form->create(false, array(
    'url' => array('controller' => 'rounds', 'action' => 'sendMails'),
    'id' => 'RoundsSendMails'
    ));
?>

<?= $this->Form->end('Envoyer les invitations!'); ?>