<!-- START PAGE SOURCE -->
        <div id="content">
            <div class="notification">
                <h2><?php echo $this->Session->flash('loginError');?></h2>
            </div>
            <div class="login-form">
                <h3 id="respond"><?php echo __('LOGIN');?></h3>
                <?php echo $this->Session->flash('auth');?>
                <?php echo $this->Form->create('User', array('id' => 'comment-form')); ?>
                <?php echo $this->Form->input('username',array('placeholder' => 'Username', 'id' => 'comment-name', 'class' => 'formid', 'label' => '')); ?>
                <?php echo $this->Form->input('password', array('placeholder' => 'Password', 'label' => '')); ?>
                <?php echo $this->Form->button(__('Login', array('class' => 'button'))); ?>
            </div>

<!-- END PAGE SOURCE -->



