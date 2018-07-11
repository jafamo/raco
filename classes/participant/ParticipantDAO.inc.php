
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

class ParticipantDAO extends DAO {

        /**
         * Constructor.
         */
    function __constructor() {         
            parent::DAO();
           
        }
/**Query de todas las journals con fecyt con su printIssn y onlineIssn 
 * 
 * @param type $arg
 * @param type $request
 * @return type
 */
    function getAllParticipant(){
        
        $result = $this->retrieve('SELECT institucio_id,title,url,logotipo FROM institucions');

        $journalDao =& DAORegistry::getDAO('JournalDAO');
        $journals = array();

       
        
        
        while (!$result->EOF) { 
                        $participantId = $result->fields[0];//id de la revista
                        $participantTitle = $result->fields[1];//path de la revista
                        $participantUrl = $result->fields[2];//name journal
                        $participantLogotipo = $result->fields[3];                    
                        //echo $journalId ." ".$journalPrintIssn." " .$journalsOnlineIssn."<br>";
                        $journals[$journalId] =array( 'Id' => $journalDao->_fromRow($participantId),
                                                    "participantTitle" => $participantTitle,
                                                    "participantUrl" => $participantUrl,
                                                    "participantLogotipo" => $participantLogotipo,                                                    
                                                      );
                        $result->moveNext();            
        }

        
        $result->Close();
        
        return $journals;   
    }
}

?>
                