<?php

import('classes.handler.Handler');

class RevistaHandler extends Handler {
	/**
	 * Display a list of the publishers availables on the site.
	 */
	function index($args,$request) {

           $templateMgr = TemplateManager::getManager($request); 
           $this->setupTemplate($request);
           $journal = $request->getJournal();
	   $participantDao =& DAORegistry::getDAO('ParticipantDAO');
           $misjournals = $participantDao->getAllParticipant();
           $participantId='ALL'; 
           
            $templateMgr->assign(array(
                'participantId'=>$participantId,
                'misjournals' => $misjournals
                    ));
            
            $templateMgr->display('frontend/pages/participant.tpl');
             //$templateMgr->display('frontend/pages/fecyt.tpl');
    }
}
?>
