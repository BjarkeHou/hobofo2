<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Elo Changes'), ['controller' => 'EloChanges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Elo Change'), ['controller' => 'EloChanges', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rating Changes'), ['controller' => 'RatingChanges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rating Change'), ['controller' => 'RatingChanges', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tournaments form large-9 medium-8 columns content">
    <?= $this->Form->create($tournament) ?>
    <fieldset>
        <legend><?= __('Add Tournament') ?></legend>
        <?php
            echo $this->Form->control('started', ['empty' => true]);
            echo $this->Form->control('ended', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
