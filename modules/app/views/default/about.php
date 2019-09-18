<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4"><?= $this->lang->line('esmus_toolbar_about');?></h1>
      <p class="lead">
		<?php if($content): ?> 
				<?= htmlspecialchars_decode($content); ?> 
	    <?php endif; ?>
	  </p>
</div>
