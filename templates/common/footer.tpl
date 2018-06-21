{**
 * templates/common/footer.tpl
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2003-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Backend site footer.
 *
 *} 
{assign var=brandImage value="templates/images/ojs_brand.png"}
{assign var=packageKey value="common.openJournalSystems"}
{assign var=pkpLink value="http://pkp.sfu.ca/ojs"}

{strip} 
    {if $pageFooter==''}
  
  <div class="issn">
  {$currentJournal->getSetting('onlineIssn')}
</div>
    	{if $currentJournal && $currentJournal->getSetting('onlineIssn')}
  
  
    		{assign var=issn value=$currentJournal->getSetting('onlineIssn')}
  
         	{elseif $currentJournal && $currentJournal->getSetting('printIssn')}
         		{assign var=issn value=$currentJournal->getSetting('printIssn')}
         	{/if}
          	{if $issn}
  
  		{translate|assign:"issnText" key="journal.issn"}
              		{assign var=pageFooter value="$issnText: $issn"}
  
         	{/if}
        
    {/if}
  
  
    {include file="core:common/footer.tpl"}
  
  
    {/strip}
    
{include file="core:common/footer.tpl"}