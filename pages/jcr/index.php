<?php

/**
 * @defgroup pages_publisher
 */
 
/**
 * @file pages/publisher/index.php
 *
 * Copyright (c) 2012 CESCA
 *
 * @ingroup pages_publisher
 * @brief Handle Reading Tools requests. 
 *
 */

// $Id$

//echo "entra en fecyt/index.php<br>";

define('HANDLER_CLASS', 'JcrHandler');

switch ($op) {
	case 'index':
		define('HANDLER_CLASS', 'JcrHandler');
                import('pages.jcr.JcrHandler');
                //echo "importando pages.fecyt.FecytHandler <br>";
                break;
}

?>
