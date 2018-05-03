<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo $this->html->script('/vendor/jquery/jquery.min.js') ?>
<?php echo $this->html->script('/vendor/bootstrap/js/bootstrap.min.js') ?>
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<!-- <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"> -->
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Device[]|\Cake\Collection\CollectionInterface $devices
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Add Device Manually'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Scan For Devices'), ['controller' => 'wifiClientObs', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="devices index large-9 medium-8 columns content">
  <div class="modal" id="reAuth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Please Re-Authenticate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="username" class="col-form-label">Username:</label>
              <input type="text" class="form-control" id="username">
            </div>
            <div class="form-group">
              <label for="password" class="col-form-label">Password:</label>
              <input type="password" class="form-control" id="password"></textarea>
            </div>
            <!-- <input type="hidden" id="redir_id" value="temp"> -->
          </form>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <!-- <?= $this->Form->button(__('Sign In'),['class' => 'btn btn-primary','id' => 'auth_button', 'controller'=>'Users','action'=>'reauth']); ?> -->
          <?= $this->Form->postButton(__('Authenticate'),['class' => "btn btn-primary", 'id' => 'auth_button', 'type' => 'submit', 'data' => ['device_id' => $device_id]]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header text-center">
                  <h4 class="modal-title w-100 font-weight-bold">Re-Authenticate</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body mx-3">
                  <div class="md-form mb-5">
                      <i class="fa fa-envelope prefix grey-text"></i>
                      <input type="email" id="defaultForm-email" class="form-control validate">
                      <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                  </div>

                  <div class="md-form mb-4">
                      <i class="fa fa-lock prefix grey-text"></i>
                      <input type="password" id="defaultForm-pass" class="form-control validate">
                      <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                  </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                  <button class="btn btn-default">Authenticate</button>
              </div>
          </div>
      </div>
  </div
    <h3><?= __('Devices') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('booking_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('charges') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mac') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_added') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($devices as $device): ?>
            <tr>
                <td><?= h($device->name) ?></td>
                <td><?= h($device->booking_no) ?></td>
                <td><?= h($device->charges) ?></td>
                <td><?= h($device->state) ?></td>
                <td><?= h($device->city) ?></td>
                <td><?= h($device->mac) ?></td>
                <td><?= h($device->type) ?></td>
                <td><?= h($device->date_added) ?></td>
                <td class="actions">
                    <?php $device_id = $device->id; ?>
                    <a href="" class="btn btn-default mb-4" data-toggle="modal" data-target="#reAuth" data-device="<?php echo $device_id; ?>" data-username="<?php echo $username; ?>">View</a>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $device->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $device->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $device->id], ['confirm' => __('Are you sure you want to delete # {0}?', $device->id)]) ?>
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
</html>
<script type="text/javascript">
var username = 'temp';
var dev_id = 'temp';
$('#reAuth').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  username = button.data('username'); // Extract info from data-* attributes
  dev_id = button.data('device');
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-body #username').val(username);
  modal.find('.modal-body #redir_id').val(dev_id);
})
$('#auth_button').on('click', function(event){
  // event.preventDefault();
  var queryString = '/school/MDID/devices/view/' + dev_id;
  window.location.href = queryString;
})
</script>
