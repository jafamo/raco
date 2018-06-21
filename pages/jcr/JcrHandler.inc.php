
<?php

/**
 * @file pages/subject/SubjectHandler.inc.php
 *
 * 2012 CESCA
 *
 * @class AdminPublisherHandler
 * @ingroup pages_admin
 *
 * @brief Handle requests for journal management in site administration.
 */

// $Id$
import('classes.handler.Handler');

class JcrHandler extends Handler {
	/**
	 * Display a list of the publishers availables on the site.
	 */
	function index($args,$request) {

        /**parent::validate();
        $templateMgr = &TemplateManager::getManager();

        $fecytDao = &DAORegistry::getDAO('FecytDAO');
	$a = &$fecytDao->countJournalsByFecyt('');

	$templateMgr->assign('a',$a);

        $templateMgr->display('fecyt/index.tpl');
	*/
           $templateMgr = TemplateManager::getManager($request); 
           $this->setupTemplate($request);
           $journal = $request->getJournal();
	   $jcrDao =& DAORegistry::getDAO('JcrDAO');
           $misjournals = $jcrDao->getJournalsByJcrPrintIssnOnlineIssn();
           $jcrId='ALL'; 
           
            
            $templateMgr->assign(array(
                
                'jcrId'=>$jcrId,
                'misjournals' => $misjournals
                    ));
            
            $templateMgr->display('frontend/pages/jcr.tpl');
             //$templateMgr->display('frontend/pages/fecyt.tpl');

    }
 
}
?>
