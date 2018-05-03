<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WifiClientOb $wifiClientOb
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $wifiClientOb->mac],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wifiClientOb->mac)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Wifi Client Obs'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="wifiClientObs form large-9 medium-8 columns content">
    <?= $this->Form->create($wifiClientOb) ?>
    <fieldset>
        <legend><?= __('Edit Wifi Client Ob') ?></legend>
        <?php
            echo $this->Form->control('last_obs', ['empty' => true]);
            echo $this->Form->control('num_probes');
            echo $this->Form->control('sunc');
            echo $this->Form->control('run_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
