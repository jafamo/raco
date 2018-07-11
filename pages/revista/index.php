<?php
define('HANDLER_CLASS', 'RevistaHandler');

switch ($op) {
	case 'index':
		define('HANDLER_CLASS', 'RevistaHandler');
                import('pages.revista.revistaHandler');
                
                break;
}
?>