<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title_for_layout; ?></title>
    <?= $this->fetch('meta'); ?>
	  <?php //$this->Html->css('foundation'); ?>
	  <?php //$this->Html->css('motion-ui'); ?>
	  <?php //$this->Html->css('foundation-prototype'); ?>
    <?= $this->fetch('css'); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation-prototype.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
    <!-- optional CDN for Foundation Icons ^^ -->
  </head>
  <body>
    <!-- Info Banner For Announcements or Links -->
    <!-- <a href="https://zurb.com/university/foundation-intro" class="docs-banner course-banner">
      <div class="info">
        <h5 class=""><strong>To master everything new in 6.4, along with the rest of Foundation register for our Aug 8th Webinar Class &rsaquo;</strong></h5>
      </div>
    </a> -->

    <!-- <a href="https://zurb.com/wired" id="notice">
      <div class="info hide-for-small">
        <div id="clockdiv" class="countdown">
            <span class="timer-day days"></span>
            <span class="timer-colon">:</span>
          <span class="timer-hour hours"></span>
          <span class="timer-colon">:</span>
          <span class="timer-hour minutes"></span>
          <span class="timer-colon">:</span>
          <span class="timer-seconds seconds"></span>
        </div>
      </div>
    </a> -->


    <!-- Navigation -->
    <div class="title-bar" data-responsive-toggle="realEstateMenu" data-hide-for="small">
      <button class="menu-icon" type="button" data-toggle></button>
      <div class="title-bar-title">Menu</div>
    </div>

    <div class="top-bar" id="realEstateMenu">
      <div class="top-bar-left">
        <ul class="menu">
          <li class="menu-text">Random Couples</li>

        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu">
          <?php if($this->Session->read('Auth.User.id')): ?>
            <li><?= $this->Html->link('Se deconnecter', array('controller' => 'users', 'action' => 'logout')); ?></li>
          <?php else: ?>
            <li><?= $this->Html->link('Se connecter', array('controller' => 'users', 'action' => 'login')); ?></li>
          <?php endif ?>
        </ul>
      </div>
    </div>
    <!-- /Navigation -->

	<div class="row">
    <p>&nbsp;</p>
    <?= $this->Session->flash(); ?>
    <?= $this->Session->flash('auth'); ?>
    <?= $this->fetch('content'); ?>
    <?php echo $this->element('sql_dump'); ?>
	</div>

    <br>




	<?= $this->fetch('script'); ?>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
