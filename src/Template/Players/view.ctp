<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Player $player
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Player'), ['action' => 'edit', $player->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Player'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Players'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Player'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Memberships'), ['controller' => 'Memberships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership'), ['controller' => 'Memberships', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Elo Changes'), ['controller' => 'EloChanges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Elo Change'), ['controller' => 'EloChanges', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rating Changes'), ['controller' => 'RatingChanges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Rating Change'), ['controller' => 'RatingChanges', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="players view large-9 medium-8 columns content">
    <h3><?= h($player->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($player->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($player->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($player->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rating') ?></th>
            <td><?= $this->Number->format($player->rating) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Elo') ?></th>
            <td><?= $this->Number->format($player->elo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($player->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Paid Membership') ?></th>
            <td><?= h($player->last_paid_membership) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Active Membership') ?></th>
            <td><?= $player->active_membership ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receive Sms') ?></th>
            <td><?= $player->receive_sms ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Memberships') ?></h4>
        <?php if (!empty($player->memberships)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Player Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($player->memberships as $memberships): ?>
            <tr>
                <td><?= h($memberships->id) ?></td>
                <td><?= h($memberships->player_id) ?></td>
                <td><?= h($memberships->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Memberships', 'action' => 'view', $memberships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Memberships', 'action' => 'edit', $memberships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Memberships', 'action' => 'delete', $memberships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $memberships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Elo Changes') ?></h4>
        <?php if (!empty($player->elo_changes)): ?>
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
            <?php foreach ($player->elo_changes as $eloChanges): ?>
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
        <?php if (!empty($player->rating_changes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tournament Id') ?></th>
                <th scope="col"><?= __('Player Id') ?></th>
                <th scope="col"><?= __('Rating Change') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($player->rating_changes as $ratingChanges): ?>
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
