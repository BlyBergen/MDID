<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\WifiClientOb[]|\Cake\Collection\CollectionInterface $wifiClientObs
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Scan Again'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="wifiClientObs index large-9 medium-8 columns content">
    <h3><?= __('Wifi Client Obs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('mac') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_obs') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_obs') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num_probes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sunc') ?></th>
                <th scope="col"><?= $this->Paginator->sort('run_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($devices as $wifiClientOb): ?>
            <tr>
                <td><?= h($wifiClientOb->mac) ?></td>
                <td><?= h($wifiClientOb->first_obs) ?></td>
                <td><?= h($wifiClientOb->last_obs) ?></td>
                <td><?= $this->Number->format($wifiClientOb->num_probes) ?></td>
                <td><?= $this->Number->format($wifiClientOb->sunc) ?></td>
                <td><?= $this->Number->format($wifiClientOb->run_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Save'), ['controller' => 'devices', 'action' => 'add', 'mac' => $wifiClientOb->mac ]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wifiClientOb->mac], ['confirm' => __('Are you sure you want to delete # {0}?', $wifiClientOb->mac)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
