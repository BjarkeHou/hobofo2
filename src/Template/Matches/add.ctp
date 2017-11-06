<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matchtypes'), ['controller' => 'Matchtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Matchtype'), ['controller' => 'Matchtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Elo Changes'), ['controller' => 'EloChanges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Elo Change'), ['controller' => 'EloChanges', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="matches form large-9 medium-8 columns content">
    <?= $this->Form->create($match) ?>
    <fieldset>
        <legend><?= __('Add Match') ?></legend>
        <?php
            echo $this->Form->control('tournament_id', ['options' => $tournaments]);
            echo $this->Form->control('group_id', ['options' => $groups]);
            echo $this->Form->control('team1_id');
            echo $this->Form->control('team2_id');
            echo $this->Form->control('team1_score');
            echo $this->Form->control('team2_score');
            echo $this->Form->control('winner_id');
            echo $this->Form->control('matchtype_id', ['options' => $matchtypes]);
            echo $this->Form->control('started', ['empty' => true]);
            echo $this->Form->control('ended', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
