<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Imran Sultanov, esmus@simbyte.az">

    <title><?= $main_title; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <link href="/templates/default/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/templates/default/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">EsMus</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/<?= $this->uri->segment(1); ?>"><?= $this->lang->line('esmus_toolbar_home'); ?></a>        
		<a class="p-2 text-dark" href="/<?= $this->uri->segment(1); ?>/app/about"><?= $this->lang->line('esmus_toolbar_about'); ?></a>
        <a class="p-2 text-dark" href="/<?= $this->uri->segment(1); ?>/app/contacts"><?= $this->lang->line('esmus_toolbar_contacts'); ?></a>
      </nav>
	  <select onChange="window.document.location.href=this.options[this.selectedIndex].value;" class="btn btn-outline-primary">
		<option value="/az/" <?php if($this->uri->segment(1)=='az'):?> selected="selected" <?php endif;?>>AZ</option>
		<option value="/en/" <?php if($this->uri->segment(1)=='en'):?> selected="selected" <?php endif;?>>EN</option>
		<option value="/ru/" <?php if($this->uri->segment(1)=='ru'):?> selected="selected" <?php endif;?>>RU</option>
	  </select>
    </div>