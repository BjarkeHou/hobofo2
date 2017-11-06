<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Team $team
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Team'), ['action' => 'edit', $team->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Team'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teams view large-9 medium-8 columns content">
    <h3><?= h($team->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tournament') ?></th>
            <td><?= $team->has('tournament') ? $this->Html->link($team->tournament->id, ['controller' => 'Tournaments', 'action' => 'view', $team->tournament->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $team->has('group') ? $this->Html->link($team->group->id, ['controller' => 'Groups', 'action' => 'view', $team->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($team->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Player1 Id') ?></th>
            <td><?= $this->Number->format($team->player1_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Player2 Id') ?></th>
            <td><?= $this->Number->format($team->player2_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($team->created) ?></td>
        </tr>
    </table>
</div>
