<div class="container">
	<?php echo form_open("administration/login", $form_attr); ?>
        <h2 class="form-signin-heading">Please sign in</h2>
		<?php $this->load->view('partials/message_error.tpl.php'); ?>
		<?php $this->load->view('partials/validation_error.tpl.php'); ?>	
		<div class="form-group<?php echo $form_groups['email'] ?>">
			<?php echo form_input($email); ?>
		</div>
		<div class="form-group<?php echo $form_groups['password'] ?>">
			<?php echo form_input($password); ?>
		</div>
        <div class="checkbox">
			<?php echo form_label($remember_label['text']); ?>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	<?php echo form_close(); ?>
</div>