<?php
/**
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
 * @package       Cake.View.Layouts.Emails.html
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
	<title><?php echo $title_for_layout;?></title>
</head>
<body>
  <div style="background-color: #ffffff;
              border-color: #2C2C2C;
              border-style: solid;
              border-width: 1px;
              padding-bottom: 20px;
              padding-top: 20px;
              text-align: center;">
    <p style="text-align:center;">
      <a href="http://www.coctelsong.com" style="text-decoration:none;">
        CoctelSong
      </a>
    </p>
      <?php echo $content_for_layout;?>
    <div style="text-align: center;">
      <p style="font-size: 9px;">coctelsong.com - Para darse de baja ecribenos a info@coctelsong.com</p>
    </div>
  </div>
</body>
</html>