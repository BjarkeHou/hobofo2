<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tournament $tournament
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tournament->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tournament->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tournaments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Elo Changes'), ['controller' => 'EloChanges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Elo Change'), ['controller' => 'EloChanges', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rating Changes'), ['controller' => 'RatingChanges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Rating Change'), ['controller' => 'RatingChanges', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tournaments form large-9 medium-8 columns content">
    <!-- <?= $this->Form->create($tournament) ?> -->
    <fieldset>
        <legend><?= __('Edit Tournament') ?></legend>
        <?php echo $this->element('addTeam', ["players" => $players, "tournament_id" => $tournament->id]); ?>
    </fieldset>
 <!--    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?> -->
    <div class="related">
        <h4><?= __('Related Teams') ?></h4>
        <?php if (!empty($tournament->teams)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Group') ?></th>
                <th scope="col"><?= __('Player1') ?></th>
                <th scope="col"><?= __('Player2') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tournament->teams as $teams): ?>
            <tr>
                <td><?= h($teams->group_id) ?></td>
                <td><?= h($teams->player1->name) ?></td>
                <td><?= h($teams->player2->name) ?></td>
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

