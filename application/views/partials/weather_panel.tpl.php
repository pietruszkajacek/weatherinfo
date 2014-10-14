<div id="weather-panel" class="panel panel-primary">
	<div class="panel-heading">Weather panel</div>
	<div class="panel-body">
		<select id="front-end-cities-select" class="form-control input-sm">
			<?php foreach ($front_end_cities as $i => $city): ?>
				<option value="<?php echo $i; ?>"><?php echo $city->city_name . ' / ' . $city->country_name; ?></option>
			<?php endforeach; ?>
		</select>
		<div class="well well-sm">
			<?php foreach ($front_end_cities as $i => $city): ?>
				<div class="info-panel hidden" data-country="<?php echo $city->country_name; ?>" data-city="<?php echo $city->city_name; ?>" data-post-req="0">
					<h6>Location:<br /><small data-location><?php echo $city->location; ?></small></h6>
					<h6>Wind:<br /><small data-wind><?php echo $city->wind; ?></small></h6>
					<h6>Visibility:<br /><small data-visibility><?php echo $city->visibility; ?></small></h6>
					<h6>Sky conditions:<br /><small data-skyconditions><?php echo $city->skyconditions; ?></small></h6>
					<h6>Temp.:<br /><small data-temp><?php echo $city->temperature; ?></small></h6>
					<h6>Dew point:<br /><small data-dewpoint><?php echo $city->dewpoint; ?></small></h6>
					<h6>Relative humidity:<br /><small data-relativehumidity><?php echo $city->relativehumidity; ?></small></h6>
					<h6>Pressure:<br /><small data-pressure><?php echo $city->pressure; ?></small></h6>
					<img class="ajax-loader invisible" src="<?php base_url(); ?>assets/img/ajax-loader.gif">
				</div>
			<?php endforeach; ?>
			<button id="update-btn" type="button" class="btn btn-default btn-xs">Update</button>
		</div>
	</div>
</div>