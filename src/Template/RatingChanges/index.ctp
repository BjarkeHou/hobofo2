<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RatingChange[]|\Cake\Collection\CollectionInterface $ratingChanges
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Rating Change'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ratingChanges index large-9 medium-8 columns content">
    <h3><?= __('Rating Changes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tournament_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('player_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating_change') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ratingChanges as $ratingChange): ?>
            <tr>
                <td><?= $this->Number->format($ratingChange->id) ?></td>
                <td><?= $ratingChange->has('tournament') ? $this->Html->link($ratingChange->tournament->id, ['controller' => 'Tournaments', 'action' => 'view', $ratingChange->tournament->id]) : '' ?></td>
                <td><?= $ratingChange->has('player') ? $this->Html->link($ratingChange->player->name, ['controller' => 'Players', 'action' => 'view', $ratingChange->player->id]) : '' ?></td>
                <td><?= $this->Number->format($ratingChange->rating_change) ?></td>
                <td><?= h($ratingChange->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ratingChange->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ratingChange->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ratingChange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratingChange->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
