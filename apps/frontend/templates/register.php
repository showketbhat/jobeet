
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php /*?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
  </head>
  <body>
    <?php echo $sf_content ?>
  </body>
</html>

<?php */?>

<!-- apps/frontend/templates/layout.php -->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	
<!-- 		<title>Jobeet - Your best job board</title> -->
	
		<!--Default Title For Pages Without Provided Title below way or the comented belower one -->
		<title>
			<?php include_slot('title', 'Jobeet - Your best job board') ?> 
		</title>
		
		
		
		<title><?php include_slot('title') ?></title>   <!-- page no. 54 (We are adding a Slot here) -->


<?php
/*		<title>
			<?php if (!include_slot('title')): ?>
				Jobeet - Your best job board
			<?php endif ?>
		</title>
		
*/ ?>		
		<link rel="shortcut icon" href="http://www.symfony.jobeet.lcl/images/favicon.ico" />
		<?php include_javascripts() ?>
		<?php include_stylesheets() ?>
	</head>
	<body>
	
	
		<div id="container">
			<div id="header">
				<div class="content">
					<h1><a href="<?php echo url_for('job/index') ?>">
						<img src="http://www.symfony.jobeet.lcl/images/logo.jpg" alt="Jobeet Job Board" />
					</a></h1>
					
				</div>
			</div>
			<div id="content">
				<?php if ($sf_user->hasFlash('notice')): ?>
					<div class="flash_notice">
						<?php echo $sf_user->getFlash('notice') ?>
					</div>
				<?php endif ?>
				<?php if ($sf_user->hasFlash('error')): ?>
					<div class="flash_error">
						<?php echo $sf_user->getFlash('error') ?>
					</div>
				<?php endif ?>
				<div class="content">
					<?php echo $sf_content ?>
				</div>
			</div>
			<div id="footer">
				<div class="content">
					<span class="symfony">
						<img src="http://www.symfony-project.org/images/jobeet-mini.png" />
						powered by <a href="http://www.symfony-project.org/">
						<img src="http://www.symfony-project.org/images/symfony.gif" alt="symfony framework" />
						</a>
					</span>
					<ul>
						<li><a href="">About Jobeet</a></li>
						<li class="feed"><a href="">Full feed</a></li>
						<li><a href="">Jobeet API</a></li>
						<li class="last"><a href="">Affiliates</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
