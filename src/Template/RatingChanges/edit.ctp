<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RatingChange $ratingChange
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ratingChange->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ratingChange->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Rating Changes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ratingChanges form large-9 medium-8 columns content">
    <?= $this->Form->create($ratingChange) ?>
    <fieldset>
        <legend><?= __('Edit Rating Change') ?></legend>
        <?php
            echo $this->Form->control('tournament_id', ['options' => $tournaments]);
            echo $this->Form->control('player_id', ['options' => $players]);
            echo $this->Form->control('rating_change');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
