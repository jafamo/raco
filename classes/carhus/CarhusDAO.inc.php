<?php

/**
 * CarhusDAO.inc.php
 *
 * Copyright (c) 2018 CSUC
*
*/
//import('lib.pkp.classes.context.ContextDAO');
import('classes.journal.Journal');
import('classes.journal.JournalDAO');

class CarhusDAO extends DAO {

        /**
         * Constructor.
         */
    function __constructor() {
            echo "constructor de Carhus";    
            //$this->getJournalsByFecyt();
            parent::DAO();
           
        }
/**Query de todas las journals con fecyt con su printIssn y onlineIssn 
 * 
 * @param type $arg
 * @param type $request
 * @return type
 */
    function getJournalsByCarhusPrintIssnOnlineIssn(){
        /**
         * Consulta per obtenir el nom de la revista, el printIssn i 
         * el OnlineIssn anb el fecyt activat
         * 
         */
        $result2 = $this->retrieve(
                                   'SELECT distinct j1.journal_id as journal_id, j1.path,js3.setting_value, js1.setting_value as printIssn, js2.setting_value
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
                                        AND js.setting_name like "%enableCarhus%" 
                                        AND js.setting_value = 1) 
                                        group by  j1.path');
        
        

        $journalDao =& DAORegistry::getDAO('JournalDAO');
        $journals = array();

        //recogemos todos los id de las revistas
        while (!$result2->EOF) { 
                        $pathJournal = $result2->fields[0];//es utilitza sols per ordenar.
			$journalId = $result2->fields[1];//nom de la revista
                        //$journalId = $result2->fields[1];//name journal
                        $journalPrintIssn = $result2->fields[2];
                        $journalsOnlineIssn = $result2->fields[3];
                        //echo $journalId ." ".$journalPrintIssn." " .$journalsOnlineIssn."<br>";
                        $journals[$journalId] =array( 'nom'=> $journalDao->_fromRow($journalId),
                                                    "printIssn"=>$journalPrintIssn,
                                                    "onlineIssn"=>$journalsOnlineIssn,
                                                     "path" => $pathJournal ); 
                       
                        $result2->moveNext();
                        
                        
        }
        $result->Close();
        
        return $journals;   
        
    }
    
    /**
     * Funcio que et retorna un llistat de les que tenen el A,B,C,D amb el num total
     */
    function getNumAllCarhus(){
        /**retorna una lista de elementos agrupados por A,B,C,D
         * 
         */
        $carhus = array();
        /**retorna un array:
         * setting_value : count (A)
         * setting_value : count (B)...
         * 
         */
                    $result2 = $this->retrieve('SELECT js.setting_value, count(js.setting_value )
                                                FROM journal_settings AS js
                                                WHERE js.setting_name LIKE "carhus"
                                                AND js.setting_value <> ""
                                                GROUP BY setting_value');
                    
                    while (!$result2->EOF) { 
                        $carhus[$result2->fields[0]] = array(
                            'nomcarhus' => $result2->fields[0],
                            'numcarhus' => $result2->fields[1]);
                        $result2->moveNext();
                        
                    }

        $result2->Close();
        return $carhus;
                    
    }
    
    /**
     * 
     * @param type $args
     
    function getJournalsByCarhus($args){
        $journals = array();
        $journaldao =& DAORegistry::getDAO('JournalDAO');
        $result2 = $this->retrieve(
                'SELECT journal_id,setting_value, setting_type FROM journal_settings where  setting_name=\'carhus\' and setting_value=? and journal_id IN (select s.journal_id from journal_settings s, journals j where s.setting_name=\'enableCarhus\' and s.setting_value=1 and j.enabled=1 and s.journal_id=s.journal_id)', $arg
                );
        while(!$result2->EOF){
            $journalId = $result->fields[0];
            $journals[$journalId] = $journaldao->getJournal
        }
    
    }
    */
    
    function getJournalsCarhusA(){
            
        
        $result2 = $this->retrieve('SELECT distinct j.journal_id as journal_id, j.path, js2.setting_value,js3.setting_value
                                   FROM journals AS j
                                    INNER JOIN journal_settings AS js1 ON js1.journal_id = j.journal_id 
                                    INNER JOIN journal_settings AS js2 ON js2.journal_id = j.journal_id
                                    INNER JOIN journal_settings AS js3 ON js3.journal_id = j.journal_id
                                    WHERE js1.setting_name = "carhus
                                    AND js1.setting_value = "A"
                                    AND js2.setting_name = "printIssn""
                                    AND js3.setting_name = "onlineIssn"');
        
         $journalDao =& DAORegistry::getDAO('JournalDAO');
          $journals = array();
            
          while (!$result2->EOF) { 
                        $pathJournal = $result2->fields[0];//es utilitza sols per ordenar.
			$journalId = $result2->fields[1];//nom de la revista
                        //$journalId = $result2->fields[1];//name journal
                        $journalPrintIssn = $result2->fields[2];
                        $journalsOnlineIssn = $result2->fields[3];
                        //echo $journalId ." ".$journalPrintIssn." " .$journalsOnlineIssn."<br>";
                        $journals[$journalId] =array( 'nom'=> $journalDao->_fromRow($journalId),
                                                    "printIssn"=>$journalPrintIssn,
                                                    "onlineIssn"=>$journalsOnlineIssn,
                                                     "path" => $pathJournal ); 
                       
                        $result2->moveNext();
                        
                        
        }
        $result2->Close();
        return $journals;
        
    }
    
}

?>