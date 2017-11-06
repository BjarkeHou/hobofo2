<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Player $player
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $player->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Players'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Memberships'), ['controller' => 'Memberships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Membership'), ['controller' => 'Memberships', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Elo Changes'), ['controller' => 'EloChanges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Elo Change'), ['controller' => 'EloChanges', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rating Changes'), ['controller' => 'RatingChanges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rating Change'), ['controller' => 'RatingChanges', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="players form large-9 medium-8 columns content">
    <?= $this->Form->create($player) ?>
    <fieldset>
        <legend><?= __('Edit Player') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('phone');
            echo $this->Form->control('active_membership');
            echo $this->Form->control('last_paid_membership', ['empty' => true]);
            echo $this->Form->control('rating');
            echo $this->Form->control('elo');
            echo $this->Form->control('receive_sms');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
