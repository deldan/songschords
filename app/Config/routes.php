<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect(
		'/:language/:controller/:action/*',
        array(),
        array('language' => '[a-z]{3}','id' => '[0-9]+','persist' => array('language'))
    );
	Router::connect('/', array('controller' => 'songs', 'action' => 'principal')); //antes había una acción display, no sé si sirve
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/canciones', array('controller' => 'songs', 'action' => 'index'));
	Router::connect('/cancion/view/*', array('controller' => 'songs', 'action' => 'view'));
	Router::connect('/cancion/confirm_song/*', array('controller' => 'songs', 'action' => 'confirmSong'));
	Router::connect('/registro', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/nuevapassword', array('controller' => 'users', 'action' => 'resetUserPassword'));

//extensión para CakePDF
	Router::parseExtensions('pdf');
	Router::parseExtensions('json');
	//Router::mapResources('backbones');

//Para localizacion
	/*Router::connect(
	    '/:lang/:controller/:action/:id',
	    array(),
	    array('lang' => '[a-z]{3}','id' => '[0-9]+',  'persist' => array('lang'))
	);*/
	

	/*Router::connect(
	    '/:language/:controller/:action/*',
	    array(),
	    array('language' => '[a-z]{3}')
	);*/


/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();


/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
