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
	   $revistaDao =& DAORegistry::getDAO('RevistaDAO');
           $misjournals = $revistaDao->getJournalsPrintIssnOnlineIssn();
           $revistaId='ALL'; 
           
            $templateMgr->assign(array(
                'revistaId'=>$revistaId,
                'misjournals' => $misjournals
                    ));
            
            $templateMgr->display('frontend/pages/revista.tpl');
             //$templateMgr->display('frontend/pages/fecyt.tpl');
    }
}
?>