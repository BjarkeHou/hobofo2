<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membership $membership
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Membership'), ['action' => 'edit', $membership->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Membership'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Memberships'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="memberships view large-9 medium-8 columns content">
    <h3><?= h($membership->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Player') ?></th>
            <td><?= $membership->has('player') ? $this->Html->link($membership->player->name, ['controller' => 'Players', 'action' => 'view', $membership->player->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($membership->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($membership->created) ?></td>
        </tr>
    </table>
</div>
