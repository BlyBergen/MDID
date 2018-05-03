
<div class="row">
  <div class="card" style="width:400px; margin-left:auto; margin-right:auto;" id="login">
  <!-- <?= $this->Flash->render('auth') ?> -->
  <?= $this->Form->create() ?>
      <fieldset>
          <legend><?= __('Please Sign In') ?></legend>
          <?= $this->Form->input('username', ['label' => false, 'placeholder' => 'Username', 'class' => 'form-control']) ?>
          <?= $this->Form->input('password', ['label' => false, 'placeholder' => 'Password', 'class' => 'form-control']) ?>
      </fieldset>
      <!-- <?= $this->Flash->render('bad_login') ?> -->
  <center><?= $this->Form->button(__('Sign In'),['class' => "btn btn-lg btn-block"]); ?></center>
  <?= $this->Form->end() ?>
  <br>
  <!-- <center><?= $this->Html->link('Create Account', ['controller'=>'Users','action'=>'add']) ?></center> -->
  </div>
</div>
