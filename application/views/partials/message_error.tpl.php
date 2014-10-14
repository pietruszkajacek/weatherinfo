<?php if (isset($message['msg'])): ?>
	<?php
		echo '<div class="alert ' . (($message['type'] === 'error') ? 'alert-danger fade in' : 'alert-info') . '" role="alert">';
		echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
		echo '<h4>' . (($message['type'] === 'error') ? 'Error!' : 'Info!') . '</h4>';
		echo $message['msg'];
		echo '</div>';
	?>
<?php endif;?>