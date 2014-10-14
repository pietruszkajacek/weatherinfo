<div class="container">
	<div class="row">
		<div id="main" class="col-xs-8 col-xs-offset-2">
			<?php $this->load->view('partials/message_error.tpl.php'); ?>
			<?php echo form_open("administration/index", $form_attr); ?>
			
			<ul class="nav nav-tabs" role="tablist">
				<li class="active"><a href="#">Provider settings</a></li>
				<li><a href="#">Front-end cities</a></li>
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
			<div class="form-group" id="form-group-get-cities-btn">
				<?php echo form_label($country_name_label['text'], $country_name_label['for'], $country_name_label['attributes']); ?>
				<div class="row">
					<div class="col-xs-6">
						<div class="row">
							<div class="col-xs-9">
								<?php echo form_input($country_name); ?>
							</div>
							<div class="col-xs-3">
								<a href="#" id="get-cities-btn" class="btn btn-success" role="button">
									<span class="glyphicon glyphicon-cloud-download"></span>
								</a>
							</div>
						</div>
						
							
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<div class="panel panel-info">
						<!-- Default panel contents -->
						<div class="panel-heading">Cities</div>
						<div class="panel-body">
							<p>Drag and drop cities to front-end panel.</p>
						</div>

						<div id="cities">
							<!-- List group -->
							<ul class="list-group">
								
							</ul>
						</div>

					</div>
				</div>
				<div class="col-xs-6">
					<div class="panel panel-success">
						<!-- Default panel contents -->
						<div class="panel-heading">Front-end cities </div>
						<div class="panel-body">
							<p>Change order or remove cities.</p>
						</div>

						<div id="front-end-cities">
							<!-- List group -->
							<ul class="list-group">
							
							</ul>
						</div>
					</div>
					<button id="submit-btn" type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>		
	</row>
</div>
