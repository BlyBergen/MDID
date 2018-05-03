<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WifiClientOb $wifiClientOb
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wifi Client Ob'), ['action' => 'edit', $wifiClientOb->mac]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wifi Client Ob'), ['action' => 'delete', $wifiClientOb->mac], ['confirm' => __('Are you sure you want to delete # {0}?', $wifiClientOb->mac)]) ?> </li>
        <li><?= $this->Html->link(__('List Wifi Client Obs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wifi Client Ob'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="wifiClientObs view large-9 medium-8 columns content">
    <h3><?= h($wifiClientOb->mac) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Mac') ?></th>
            <td><?= h($wifiClientOb->mac) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num Probes') ?></th>
            <td><?= $this->Number->format($wifiClientOb->num_probes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sunc') ?></th>
            <td><?= $this->Number->format($wifiClientOb->sunc) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Run Id') ?></th>
            <td><?= $this->Number->format($wifiClientOb->run_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Obs') ?></th>
            <td><?= h($wifiClientOb->first_obs) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Obs') ?></th>
            <td><?= h($wifiClientOb->last_obs) ?></td>
        </tr>
    </table>
</div>
