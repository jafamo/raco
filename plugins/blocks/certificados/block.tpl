{**
 * plugins/blocks/certificados/block.tpl
 *
 * Copyright (c) 2018 jfarinos
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Common site sidebar menu -- language toggle.
 *}

 
 {**
  * 
 **}
 
  <div class="pkp_block">
     <!--
     Llamar a fecytDao para obtener todas las journals para pasarlas a la pages/fecyt
     -->
            
                 <h1>{$smarty.const}</h1>
                 <a href="{$baseUrl}/index.php/index/carhus">
                    <p>Carhus</p></a>
            <p>Nivell: {$currentJournal->getSetting('carhus')}</p>
            
           
            {if $currentJournal->getSetting('fecyt') != 0}
                <h1>{$smarty.const}
                 <a href="{$baseUrl}/index.php/index/fecyt">
                
                     <p>fecyt</p></a>
            {$currentJournal->getSetting('fecyt')}
            {/if}

            {if $currentJournal->getSetting('jcr') != 0}
             <span class="title"><a href="{$baseUrl}/index.php/index/jcr"> jcr</a>   
             </span>
            {$currentJournal->getSetting('jcr')}
            {/if}
        </div>
 
