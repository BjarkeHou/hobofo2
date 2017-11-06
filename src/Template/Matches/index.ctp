<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match[]|\Cake\Collection\CollectionInterface $matches
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?></li>
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
<div class="matches index large-9 medium-8 columns content">
    <h3><?= __('Matches') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tournament_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team1_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team2_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team1_score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team2_score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('winner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('matchtype_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('started') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ended') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matches as $match): ?>
            <tr>
                <td><?= $this->Number->format($match->id) ?></td>
                <td><?= $match->has('tournament') ? $this->Html->link($match->tournament->id, ['controller' => 'Tournaments', 'action' => 'view', $match->tournament->id]) : '' ?></td>
                <td><?= $match->has('group') ? $this->Html->link($match->group->id, ['controller' => 'Groups', 'action' => 'view', $match->group->id]) : '' ?></td>
                <td><?= $this->Number->format($match->team1_id) ?></td>
                <td><?= $this->Number->format($match->team2_id) ?></td>
                <td><?= $this->Number->format($match->team1_score) ?></td>
                <td><?= $this->Number->format($match->team2_score) ?></td>
                <td><?= $this->Number->format($match->winner_id) ?></td>
                <td><?= $match->has('matchtype') ? $this->Html->link($match->matchtype->name, ['controller' => 'Matchtypes', 'action' => 'view', $match->matchtype->id]) : '' ?></td>
                <td><?= h($match->created) ?></td>
                <td><?= h($match->started) ?></td>
                <td><?= h($match->ended) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $match->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $match->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $match->id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->id)]) ?>
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
