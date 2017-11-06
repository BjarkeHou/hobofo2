<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tournament'), ['action' => 'edit', $tournament->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tournament'), ['action' => 'delete', $tournament->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tournaments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tournament'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Elo Changes'), ['controller' => 'EloChanges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Elo Change'), ['controller' => 'EloChanges', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rating Changes'), ['controller' => 'RatingChanges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rating Change'), ['controller' => 'RatingChanges', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tournaments view large-9 medium-8 columns content">
    <h3><?= h($tournament->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tournament->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($tournament->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Started') ?></th>
            <td><?= h($tournament->started) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ended') ?></th>
            <td><?= h($tournament->ended) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Groups') ?></h4>
        <?php if (!empty($tournament->groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tournament Id') ?></th>
                <th scope="col"><?= __('Group Number') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tournament->groups as $groups): ?>
            <tr>
                <td><?= h($groups->id) ?></td>
                <td><?= h($groups->tournament_id) ?></td>
                <td><?= h($groups->group_number) ?></td>
                <td><?= h($groups->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Groups', 'action' => 'view', $groups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Groups', 'action' => 'edit', $groups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Groups', 'action' => 'delete', $groups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $groups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Matches') ?></h4>
        <?php if (!empty($tournament->matches)): ?>
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
            <?php foreach ($tournament->matches as $matches): ?>
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
        <?php if (!empty($tournament->teams)): ?>
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
            <?php foreach ($tournament->teams as $teams): ?>
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
    <div class="related">
        <h4><?= __('Related Elo Changes') ?></h4>
        <?php if (!empty($tournament->elo_changes)): ?>
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
            <?php foreach ($tournament->elo_changes as $eloChanges): ?>
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
    <div class="related">
        <h4><?= __('Related Rating Changes') ?></h4>
        <?php if (!empty($tournament->rating_changes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tournament Id') ?></th>
                <th scope="col"><?= __('Player Id') ?></th>
                <th scope="col"><?= __('Rating Change') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tournament->rating_changes as $ratingChanges): ?>
            <tr>
                <td><?= h($ratingChanges->id) ?></td>
                <td><?= h($ratingChanges->tournament_id) ?></td>
                <td><?= h($ratingChanges->player_id) ?></td>
                <td><?= h($ratingChanges->rating_change) ?></td>
                <td><?= h($ratingChanges->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RatingChanges', 'action' => 'view', $ratingChanges->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RatingChanges', 'action' => 'edit', $ratingChanges->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RatingChanges', 'action' => 'delete', $ratingChanges->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ratingChanges->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
