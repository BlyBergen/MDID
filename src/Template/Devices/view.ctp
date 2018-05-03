<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device $device
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Device'), ['action' => 'edit', $device->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Device'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="devices view large-9 medium-8 columns content">
    <h3><?= h($device->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($device->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking No') ?></th>
            <td><?= h($device->booking_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Charges') ?></th>
            <td><?= h($device->charges) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mac') ?></th>
            <td><?= h($device->mac) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($device->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($device->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($device->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Added') ?></th>
            <td><?= h($device->date_added) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Modified') ?></th>
            <td><?= h($device->date_modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Details') ?></h4>
        <?= $this->Text->autoParagraph(h($device->details)); ?>
    </div>
</div>
