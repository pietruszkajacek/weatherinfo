<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Weatherinfo</a>
        </div>
        <div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">

			</ul>
			<?php if (isset($nav)) : ?>
				<?php echo $nav; ?>
			<?php endif; ?>			
        </div><!--/.nav-collapse -->
	</div>
</div>