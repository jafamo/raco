<?php
define('HANDLER_CLASS', 'ParticipantHandler');

switch ($op) {
	case 'index':
		define('HANDLER_CLASS', 'ParticipantHandler');
                import('pages.participant.participantHandler');
                
                break;
}
?>
