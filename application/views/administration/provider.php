<div class="container">
	<div class="row">
		<div id="main" class="col-xs-8 col-xs-offset-2">
			<?php $this->load->view('partials/message_error.tpl.php'); ?>
			<?php $this->load->view('partials/validation_error.tpl.php'); ?>
			
			<?php echo form_open("administration/provider", $form_attr); ?>
			
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#">Provider settings</a></li>
				<li><a href="/administration/frontendcities">Front-end cities</a></li>
			</ul>
			
			<div class="form-group">
				<?php echo form_label($wsdl_label['text'], $wsdl_label['for'], $wsdl_label['attributes']); ?>
				<?php echo form_input($wsdl); ?>
			</div>
			<div class="form-group">
				<?php echo form_label($connection_timeout_label['text'], $connection_timeout_label['for'], $connection_timeout_label['attributes']); ?>
				<div class="row">
					<div class="col-xs-2 col-xs-3">
						<?php echo form_input($connection_timeout); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<button id="submit-btn" type="submit" class="btn btn-default btn-lg btn-block">Submit</button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>		
	</row>
</div>
