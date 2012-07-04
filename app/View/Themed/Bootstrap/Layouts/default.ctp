<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Coctelsongs');
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta(array("name"=>"viewport","content"=>"width=device-width,  initial-scale=1.0"));
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('songs');
		// docs.css is only for this exapmple, remove for app dev
		echo $this->Html->css('docs');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script(array(
				'libs/modernizr.min',
				'libs/jquery',
				'libs/bootstrap.min',
				'bootstrap/application',
				//'vendors/jquery-1.7.2.min',
				'vendors/jquery.print',
				'vendors/underscore',
				'vendors/lowpro',
				'vendors/raphael',
				'vendors/jtab',
				'vendors/backbone',
				'vendors/jquery.validate',
				'router',
				'song'
		));
		echo $this->fetch('script');?>
</head>
<body data-spy="scroll" data-target=".subnav" data-offset="50">

	<header class="container">


    </header> <!-- /container -->

	<div id="container">
		<div id="content">
			<?php echo $this->element('menu/top_menu'); ?>
			<div class="container">
				<? echo $this->Session->flash('error', array('element' => 'error'));?>
				<? echo $this->Session->flash('success', array('element' => 'success'));?>
				<? echo $this->Session->flash('information', array('element' => 'information'));?>
				<? echo $this->Session->flash('warning', array('element' => 'warning'));?>
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>

	<footer class="container">
songs 2012
	</footer><!-- /container -->

	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
