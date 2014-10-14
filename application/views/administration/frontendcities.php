<div class="container">
	<div class="row">
		<div id="main" class="col-xs-8 col-xs-offset-2">
			<?php $this->load->view('partials/message_error.tpl.php'); ?>
			<?php echo form_open("administration/frontendcities/", $form_attr); ?>
			
			<ul class="nav nav-tabs" role="tablist">
				<li><a href="/administration/provider">Provider settings</a></li>
				<li class="active"><a href="#">Front-end cities</a></li>
			</ul>

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
					<button id="submit-btn" type="submit" class="btn btn-default btn-lg btn-block">Submit</button>
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
								<?php foreach ($front_end_cities as $city): ?>
									<li data-country="<?php echo $city->country_name; ?>" data-city="<?php echo $city->city_name; ?>" 
										class="list-group-item">
										<input value="<?php echo $city->country_name; ?>" type="hidden">
										<input value="<?php echo $city->city_name; ?>" type="hidden">
										<?php echo $city->city_name; ?><br>
										<p class="text-info"><small><?php echo $city->country_name; ?></small></p>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</row>
</div>

