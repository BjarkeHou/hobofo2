<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RatingChange $ratingChange
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Rating Change'), ['action' => 'edit', $ratingChange->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Rating Change'), ['action' => 'delete', $ratingChange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratingChange->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Rating Changes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rating Change'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ratingChanges view large-9 medium-8 columns content">
    <h3><?= h($ratingChange->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tournament') ?></th>
            <td><?= $ratingChange->has('tournament') ? $this->Html->link($ratingChange->tournament->id, ['controller' => 'Tournaments', 'action' => 'view', $ratingChange->tournament->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Player') ?></th>
            <td><?= $ratingChange->has('player') ? $this->Html->link($ratingChange->player->name, ['controller' => 'Players', 'action' => 'view', $ratingChange->player->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($ratingChange->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rating Change') ?></th>
            <td><?= $this->Number->format($ratingChange->rating_change) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($ratingChange->created) ?></td>
        </tr>
    </table>
</div>
