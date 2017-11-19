<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Match $match
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Match'), ['action' => 'edit', $match->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Match'), ['action' => 'delete', $match->id], ['confirm' => __('Are you sure you want to delete # {0}?', $match->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matchtypes'), ['controller' => 'Matchtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Matchtype'), ['controller' => 'Matchtypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Elo Changes'), ['controller' => 'EloChanges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Elo Change'), ['controller' => 'EloChanges', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="matches view large-9 medium-8 columns content">
    <h3><?= h($match->team1->player1->name." og ".$match->team1->player2->name." vs ".$match->team2->player1->name." og ".$match->team2->player2->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tournament') ?></th>
            <td><?= $match->has('tournament') ? $this->Html->link($match->tournament->id, ['controller' => 'Tournaments', 'action' => 'view', $match->tournament->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group') ?></th>
            <td><?= $match->has('group') ? $this->Html->link($match->group->id, ['controller' => 'Groups', 'action' => 'view', $match->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Matchtype') ?></th>
            <td><?= $match->has('matchtype') ? $this->Html->link($match->matchtype->name, ['controller' => 'Matchtypes', 'action' => 'view', $match->matchtype->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($match->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team1 Id') ?></th>
            <td><?= $this->Number->format($match->team1_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team2 Id') ?></th>
            <td><?= $this->Number->format($match->team2_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team1 Score') ?></th>
            <td><?= $this->Number->format($match->team1_score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team2 Score') ?></th>
            <td><?= $this->Number->format($match->team2_score) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Winner Id') ?></th>
            <td><?= $this->Number->format($match->winner_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($match->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Started') ?></th>
            <td><?= h($match->started) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ended') ?></th>
            <td><?= h($match->ended) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Elo Changes') ?></h4>
        <?php if (!empty($match->elo_changes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Player Id') ?></th>
                <th scope="col"><?= __('Match Id') ?></th>
                <th scope="col"><?= __('Tournament Id') ?></th>
                <th scope="col"><?= __('Elo Change') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($match->elo_changes as $eloChanges): ?>
            <tr>
                <td><?= h($eloChanges->id) ?></td>
                <td><?= h($eloChanges->player_id) ?></td>
                <td><?= h($eloChanges->match_id) ?></td>
                <td><?= h($eloChanges->tournament_id) ?></td>
                <td><?= h($eloChanges->elo_change) ?></td>
                <td><?= h($eloChanges->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'EloChanges', 'action' => 'view', $eloChanges->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'EloChanges', 'action' => 'edit', $eloChanges->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'EloChanges', 'action' => 'delete', $eloChanges->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eloChanges->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
