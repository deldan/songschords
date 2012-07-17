<?php

/**
 * 
 * 
 * @copyright Copyright 2012 Francois Deschenes (http://francoisdeschenes.com)
 * @since CakePHP(tm) v 2.0
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('PdfView', 'cakephp-dompdf-view.View');
if (version_compare(Configure::version(), '2.1.1', '<')) {
	App::load('PdfView');
}

Configure::load('cakephp-dompdf-view.dompdf');