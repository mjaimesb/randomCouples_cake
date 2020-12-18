<?= $this->Form->create('User'); ?>
    <?= $this->Form->input('username', array('label' => 'Identfiant')); ?>
    <?= $this->Form->input('password', array('label' => 'Mot de passe')); ?>
<?= $this->Form->end('Se connecter'); ?>