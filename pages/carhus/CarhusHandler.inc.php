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
//import('classes.carhus.Carhus');
import('classes.handler.Handler');

class CarhusHandler extends Handler {
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
           parent::validate();
           $templateMgr = TemplateManager::getManager($request); 
           $this->setupTemplate($request);
           $journal = $request->getJournal();
           //$journal->getLocalizedSetting
	   $carhusDao =& DAORegistry::getDAO('CarhusDAO');
           $misjournals = $carhusDao->getNumAllCarhus();
           
           
           $carhusId='ALL'; 
           
            
            $templateMgr->assign(array(
                'carhusId'=>$carhusId,
                'misjournals' => $misjournals
                    ));
            
            $templateMgr->display('frontend/pages/carhus.tpl');
             //$templateMgr->display('frontend/pages/fecyt.tpl');

            
            /*
            echo "entra en el index:<br>";
            //$daofecyt;
            $fecytDAO =& DAORegistry::getDAO('FecytDAO');
            $myjournals = $fecytDAO->getJournalsByFecytPrintIssn($args,$request);
            $myfecyt = $fecytDAO->getPrintIssnJournals($args,$request);
      
            $fecytId='ALL';
                       
            //var_dump($myjournals);
            //die();
            //Obtener todos los registros
            //$test = $fecytDAO->getJournalsByFecyt($fecytId);
            //var_dump($journals);
            //echo "entrando index DAO<br>";
            //var_dump($journals);
            
            $templateMgr = TemplateManager::getManager($request);
            $templateMgr->assign('fecytId',$fecytId);
            $templateMgr->assign_by_ref('myjournals', $journals);
            $templateMgr->assign_by_ref('myfecyt', $myfecyt);
            $templateMgr->display('frontend/pages/fecyt.tpl');
            
/**            
            
            
            
	parent::validate();
        $templateMgr = TemplateManager::getManager();
	$fecytId = "All";
        $journals = $request->getJournal();
//$journals= array();
        
        echo "test<br>";
        echo "journalDAO<br>";
        
        $journalDao =& DAORegistry::getDAO('FecytDAO');
        var_dump($journalDao);
        die();
        
        
        
        $fecytDao = DAORegistry::getDAO('FecytDAO');
        
       
        var_dump($fecytDao);
        die();
           
        $journals= $fecytDao->getJournalsByFecyt($fecytId);

        $templateMgr->assign('fecytId',$fecytId);
        //$templateMgr->assign('fecytTitle',AppLocale::Translate('fecyt.llista_completa'));
        $templateMgr->assign_by_ref('journals', $journals);
        //aqui ya no llegamos
        $templateMgr->display('frontend/pages/testjfarinos.tpl');
*/
    }
    function carhusA($args,$request){
        
        $templateMgr = TemplateManager::getManager($request); 
           $this->setupTemplate($request);
           $journal = $request->getJournal();
           //$journal->getLocalizedSetting
	   $carhusDao =& DAORegistry::getDAO('CarhusDAO');
           $misjournals = $carhusDao->getJournalsCarhusA();
           
           $carhusId='ALL'; 
           
            
            $templateMgr->assign(array(
                'carhusId'=>$carhusId,
                'misjournals' => $misjournals
                    ));
            
            $templateMgr->display('frontend/pages/A.tpl');

    }
           
}
?>
