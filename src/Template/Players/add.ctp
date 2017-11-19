<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Player $player
 */
?>

<div class="players form large-9 medium-8 columns content">
    <?= $this->Form->create($player) ?>
    <fieldset>
        <legend><?= __('Add Player') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('phone');
            echo $this->Form->control('active_membership');
            echo $this->Form->control('receive_sms');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
