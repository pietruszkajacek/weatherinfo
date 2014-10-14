<?php foreach ($cities as $city): ?>
	<li data-country="<?php echo $city->Country; ?>" data-city="<?php echo $city->City; ?>" class="list-group-item">
		<input type="hidden" value="<?php echo $city->Country; ?>">
		<input type="hidden" value="<?php echo $city->City; ?>">
		<?php echo $city->City; ?><br />
		<p class="text-info"><small><?php echo $city->Country; ?></small></p>
	</li>
<?php endforeach; ?>
