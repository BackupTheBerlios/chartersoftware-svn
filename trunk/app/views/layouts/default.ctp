<?php
/**
 * @author: a.behrens
 */
?>

<!--XML Header-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<!--HTML Header-->
<head>
	<?php echo $html->charset(); ?>
	<title>
		Rent-A-Jet: <?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $html->meta('icon');
		echo $html->css('cake.generic');
		echo $scripts_for_layout;
		echo $javascript->link('prototype');
		echo $javascript->link('scriptaculous.js?load=effects'); 
	?>
</head>

<!--HTML Body-->
<body>
	<div id="container">

		<div id="header">
			<h1><?php echo $html->link('Rent-A-Jet','/')?></h1>
		</div>


		<div id="content">
			<?php $session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>

		<div id="footer">
			<?php echo $html->link('Impressum','/impressum')?>
		</div>
	</div>
	<?php echo $cakeDebug; ?>
</body>
</html>