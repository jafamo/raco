
<?php

/**
 * JcrDAO.inc.php
 *
 * Copyright (c) 2012 CESCA
*
*/
//import('lib.pkp.classes.context.ContextDAO');
import('classes.journal.Journal');

class JcrDAO extends DAO {

        /**
         * Constructor.
         */
    function __constructor() {
            echo "constructor de JCR";    
            //$this->getJournalsByJcr();
            parent::DAO();
           
        }
/**Query de todas las journals con jcr con su printIssn y onlineIssn 
 * 
 * @param type $arg
 * @param type $request
 * @return type
 */
    function getJournalsByJcrPrintIssnOnlineIssn(){
        
        /*Obtener con la consulta todas las revistas*/
        //FUNCIONA $result = $this->retrieve('SELECT journal_id,setting_value FROM journal_settings');
        //obtener todoas las revistas con setting_name=printIssn y enablejcr      
        
        $result = $this->retrieve('SELECT journal_id '
                                  . 'FROM journal_settings '
                                  . 'WHERE setting_name like "%jcr%" '
                                  . 'AND setting_value=1 order by journal_id');  
        
        
        /**
         * Consulta per obtenir el nom de la revista, el printIssn i 
         * el OnlineIssn anb el jcr activat
         * 
         */
        $result2 = $this->retrieve('SELECT distinct j1.path,js3.setting_value, js1.setting_value as printIssn, js2.setting_value
                                    FROM journals as j1
                                    INNER JOIN journal_settings as js1 
                                    INNER JOIN journal_settings as js2 
                                    INNER JOIN journal_settings as js3
                                    WHERE  j1.journal_id=js1.journal_id
                                    AND j1.journal_id=js2.journal_id
                                    AND js1.journal_id = js3.journal_id
                                    AND js1.setting_name like "%printIssn%"
                                    AND js2.setting_name like "%onlineIssn%"
                                    AND js3.setting_name="name"
                                    AND js1.journal_id 
                                    IN (SELECT distinct(j.journal_id)
                                        FROM journals as j, journal_settings as js
                                            WHERE j.journal_id=js.journal_id  
                                        AND js.setting_name like "%jcr%" 
                                        AND js.setting_value = 1) 
                                        group by  j1.path');
        
        

        $journalDao =& DAORegistry::getDAO('JournalDAO');
        $journals = array();
       
        //recogemos todos los id de las revistas
        while (!$result2->EOF) {
                        $pathJournal = $result2->fields[0];//no es utilitza la abrev sols per ordenar.
			$journalId = $result2->fields[1];
                        $journalPrintIssn = $result2->fields[2];
                        $journalsOnlineIssn = $result2->fields[3];
                        //echo $journalId ." ".$journalPrintIssn." " .$journalsOnlineIssn."<br>";
                        $journals[$journalId] =array( 'valor'=> $journalDao->_fromRow($journalId),
                                                    "printIssn"=>$journalPrintIssn,
                                                    "onlineIssn"=>$journalsOnlineIssn,
                                                     "path" => $pathJournal ); 
                       
                        $result2->moveNext();
                        
                        
        }
        $result->Close();
        
        return $journals;   
        
    }
/**GET num all journals with enable jcr
 * 
 * @param type $arg
 * @return type
 */
    function countJournalsByJcr($arg){
        $result = &$this->retrieve('SELECT count(*) FROM journal_settings WHERE setting_name like "%jcr%" and setting_value=1');
        return isset($result->fields[0]);
    }

    /**
     * 
     * @param type $args
     * @param type $request
     * @return array
     */
    
         
}

?>