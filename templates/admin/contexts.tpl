{**
 * templates/admin/journals.tpl
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2003-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Display list of journals in site administration.
 *
 *}
{strip}
{assign var="pageTitle" value="journal.journals"}
{include file="common/header.tpl"}
{/strip}

<p>Entrando en admin/contexts.tpl</p>
<script type="text/javascript">
	// Initialise JS handler.
	$(function() {ldelim}
		$('#contexts').pkpHandler(
				'$.pkp.pages.admin.ContextsHandler');
	{rdelim});
</script>

<div class="pkp_page_content pkp_page_admin">
    
	<div id="contexts">
<<<<<<< HEAD
		{if $openWizardLinkAction}  
			<div id="{$openWizardLinkAction->getId()}" class="pkp_linkActions inline">                           
				{include file="linkAction/linkAction.tpl" action=$openWizardLinkAction contextId="contexts" selfActivate=true}                                 
			</div>
		{/if}
<<<<<<< HEAD
                
=======
		

>>>>>>> release
		{url|assign:journalsUrl router=$smarty.const.ROUTE_COMPONENT component="grid.admin.journal.JournalGridHandler" op="fetchGrid" escape=false}
		{load_url_in_div id="journalGridContainer" url=$journalsUrl}              
=======

		{capture assign=journalsUrl}{url router=$smarty.const.ROUTE_COMPONENT component="grid.admin.journal.JournalGridHandler" op="fetchGrid" escape=false}{/capture}
		{load_url_in_div id="journalGridContainer" url=$journalsUrl}
>>>>>>> 18c9d7fa1040f6b227fd244569a98870b21d06ca
	</div>
        
</div><!-- .pkp_page_content -->

{include file="common/footer.tpl"}
