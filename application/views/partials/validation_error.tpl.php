<?php if (validation_errors()): ?>
	<?php
		echo '<div class="alert alert-danger fade in" role="alert" id="validation-alert">';
		echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
		echo '<h4>Validation error!</h4>';
		echo validation_errors('', '<br />');
		echo '</div>';
	?>
<?php endif;?>