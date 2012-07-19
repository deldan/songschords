<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$lang='esp';  
Configure::write('Config.language', $lang);  

App::uses('Controller', 'Controller');
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $helpers = array('Html','Js','Form','Session','TwitterBootstrap');
	public $theme = "Bootstrap";
	public $components = array('RequestHandler','Session','Auth','Cookie');

  public function beforeRender(){
    $idioma = $this->Cookie->read('lang');  
    $this->set('idioma',$idioma);  

    if($this->Auth->user()){
      $this->set('currentUser', $this->Auth->user('username'));
      $this->set('currentUserId', $this->Auth->user('id'));
    } else {
      $this->set('currentUser', null);
    }
  }

  function beforeFilter() {  
    $this->_setLanguage();  
  }   
  
  function _setLanguage() {  
    if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {
        $this->Session->write('Config.language', $this->Cookie->read('lang'));
    }
    else if (isset($this->params['language']) && ($this->params['language']
             !=  $this->Session->read('Config.language'))) {     

        $this->Session->write('Config.language', $this->params['language']);
        $this->Cookie->write('lang', $this->params['language'], false, '20 days');
    }
    else if (!isset($this->params['language']) AND $this->Session->read('Config.language')  == null)
    {
  $this->Session->write('Config.language', 'esp');
    }
  }

  function languageswitch($idioma){  
    $content ="";  
    if($idioma == 'esp'){  
        $content .= $this->Html->link(__("English",true), array('language'=>'eng'));  
    }else if($idioma == 'eng'){  
        $content .= $this->Html->link(__("English",true), array('language'=>'esp'));  
    }else{  
        $content .= $this->Html->link(__("English",true), array('language'=>'eng'));  
    }  
    return $content;  
  } 
}
