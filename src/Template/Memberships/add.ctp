<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Memberships'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="memberships form large-9 medium-8 columns content">
    <?= $this->Form->create($membership) ?>
    <fieldset>
        <legend><?= __('Add Membership') ?></legend>
        <?php
            echo $this->Form->control('player_id', ['options' => $players]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
