<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="devices form large-9 medium-8 columns content">
    <?= $this->Form->create($device) ?>
    <fieldset>
        <legend><?= __('Add Device') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('booking_no');
            echo $this->Form->control('charges');
            echo $this->Form->control('mac');
            echo $this->Form->control('type');
            echo $this->Form->control('details');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
