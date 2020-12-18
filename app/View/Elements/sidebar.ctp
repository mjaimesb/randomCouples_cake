<?php $posts = $this->requestAction(array(
    'controller' => 'posts',
    'action' => 'getLastPosts'
    ));
?>

<div class='medium-3 cell'>
    <ul>
        <?php foreach($posts as $k => $post): ?>
            <li>
                <?= $this->Html->link($post['Post']['name'], $post['Post']['url']); ?>
            </li>
        <?php endforeach ?>
    </ul>
</div>
