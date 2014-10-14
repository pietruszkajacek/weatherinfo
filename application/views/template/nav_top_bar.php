<ul class="nav navbar-nav navbar-right">
	<?php if (!$this->ion_auth->logged_in()) : ?>
		<li class="active"><a href="/administration/login/">Sign in</a></li>
	<?php else : ?>
		<li class="active"><a href="/administration/logout/">Sign out</a></li>
	<?php endif; ?>
</ul>