<?php

/**
 * fecytDAO.inc.php
 *
 * Copyright (c) 2018 CSUC
*
*/
//import('lib.pkp.classes.context.ContextDAO');
import('classes.journal.Journal');
import('classes.journal.JournalDAO');

class RevistaDAO extends DAO {

        /**
         * Constructor.
         */
    function __constructor() {          
            parent::DAO();
           
        }
    
        /** Obtenir el PrintIssn,OnlineIssn i el Nom de la revista
         * Si vols el nom curt de l arevista es tindria que afexir 
         * imprimir el path i no el nom
         * 
         * @return type array
         */
    function getJournalsPrintIssnOnlineIssn(){
        
        $result = $this->retrieve(
                'SELECT distinct j1.journal_id, j1.path,js3.setting_value, js1.setting_value, js2.setting_value '
                . 'FROM journals as j1 '
                . 'INNER JOIN journal_settings as js1 '
                . 'INNER JOIN journal_settings as js2 '
                . 'INNER JOIN journal_settings as js3 '
                . 'WHERE j1.journal_id=js1.journal_id '
                . 'AND j1.journal_id=js2.journal_id '
                . 'AND js1.journal_id = js3.journal_id '
                . 'AND js1.setting_name like "%printIssn%" '
                . 'AND js2.setting_name like "%onlineIssn%" '
                . 'AND js3.setting_name="name"');

        $journalDao =& DAORegistry::getDAO('JournalDAO');
        $journals = array();

        while (!$result->EOF) { 
                        $journalId = $result->fields[0];//id de la revista
                        $journalPath = $result->fields[1];//path de la revista
                        $journalName = $result->fields[2];//name journal
                        $journalPrintIssn = $result->fields[3];
                        $journalsOnlineIssn = $result->fields[4];
                        //echo $journalId ." ".$journalPrintIssn." " .$journalsOnlineIssn."<br>";
                        $journals[$journalId] =array( 'Id'=> $journalDao->_fromRow($journalId),
                                                    "path" => $journalPath,
                                                    "name" => $journalName,
                                                    "printIssn"=>$journalPrintIssn,
                                                    "onlineIssn"=>$journalsOnlineIssn,
                                                      );
                        $result->moveNext();            
        }

        
        $result->Close();
        
        return $journals;   
    }
}

?>
                