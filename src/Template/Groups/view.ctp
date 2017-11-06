<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['controller' => 'Tournaments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['controller' => 'Tournaments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groups view large-9 medium-8 columns content">
    <h3><?= h($group->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tournament') ?></th>
            <td><?= $group->has('tournament') ? $this->Html->link($group->tournament->id, ['controller' => 'Tournaments', 'action' => 'view', $group->tournament->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($group->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Group Number') ?></th>
            <td><?= $this->Number->format($group->group_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($group->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Matches') ?></h4>
        <?php if (!empty($group->matches)): ?>
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
            <?php foreach ($group->matches as $matches): ?>
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
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($group->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tournament Id') ?></th>
                <th scope="col"><?= __('Group Id') ?></th>
                <th scope="col"><?= __('Player1 Id') ?></th>
                <th scope="col"><?= __('Player2 Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->teams as $teams): ?>
            <tr>
                <td><?= h($teams->id) ?></td>
                <td><?= h($teams->tournament_id) ?></td>
                <td><?= h($teams->group_id) ?></td>
                <td><?= h($teams->player1_id) ?></td>
                <td><?= h($teams->player2_id) ?></td>
                <td><?= h($teams->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Teams', 'action' => 'view', $teams->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teams->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
