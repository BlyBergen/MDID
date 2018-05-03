<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Devices'), ['controller' => 'Devices', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Device'), ['controller' => 'Devices', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agency') ?></th>
            <td><?= h($user->agency) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($user->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($user->city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Badge') ?></th>
            <td><?= h($user->badge) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Devices') ?></h4>
        <?php if (!empty($user->devices)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Booking No') ?></th>
                <th scope="col"><?= __('Charges') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Mac') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Details') ?></th>
                <th scope="col"><?= __('Date Added') ?></th>
                <th scope="col"><?= __('Date Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->devices as $devices): ?>
            <tr>
                <td><?= h($devices->id) ?></td>
                <td><?= h($devices->name) ?></td>
                <td><?= h($devices->booking_no) ?></td>
                <td><?= h($devices->charges) ?></td>
                <td><?= h($devices->user_id) ?></td>
                <td><?= h($devices->mac) ?></td>
                <td><?= h($devices->type) ?></td>
                <td><?= h($devices->details) ?></td>
                <td><?= h($devices->date_added) ?></td>
                <td><?= h($devices->date_modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Devices', 'action' => 'view', $devices->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Devices', 'action' => 'edit', $devices->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Devices', 'action' => 'delete', $devices->id], ['confirm' => __('Are you sure you want to delete # {0}?', $devices->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
