<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Matchtype $matchtype
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Matchtype'), ['action' => 'edit', $matchtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Matchtype'), ['action' => 'delete', $matchtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Matchtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Matchtype'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="matchtypes view large-9 medium-8 columns content">
    <h3><?= h($matchtype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($matchtype->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($matchtype->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Matches') ?></h4>
        <?php if (!empty($matchtype->matches)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tournament Id') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Team1 Id') ?></th>
                <th scope="col"><?= __('Team2 Id') ?></th>
                <th scope="col"><?= __('Team1 Score') ?></th>
                <th scope="col"><?= __('Team2 Score') ?></th>
                <th scope="col"><?= __('Winner Id') ?></th>
                <th scope="col"><?= __('Matchtype Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Started') ?></th>
                <th scope="col"><?= __('Ended') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($matchtype->matches as $matches): ?>
            <tr>
                <td><?= h($matches->id) ?></td>
                <td><?= h($matches->tournament_id) ?></td>
                <td><?= h($matches->group_id) ?></td>
                <td><?= h($matches->team1_id) ?></td>
                <td><?= h($matches->team2_id) ?></td>
                <td><?= h($matches->team1_score) ?></td>
                <td><?= h($matches->team2_score) ?></td>
                <td><?= h($matches->winner_id) ?></td>
                <td><?= h($matches->matchtype_id) ?></td>
                <td><?= h($matches->created) ?></td>
                <td><?= h($matches->started) ?></td>
                <td><?= h($matches->ended) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Matches', 'action' => 'view', $matches->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Matches', 'action' => 'edit', $matches->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Matches', 'action' => 'delete', $matches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matches->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
