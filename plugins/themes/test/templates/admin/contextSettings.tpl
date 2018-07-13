{**
 * templates/admin/journalSettings.tpl
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2003-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Basic journal settings under site administration.
 *
 *}

<script>
	$(function() {ldelim}
		// Attach the form handler.
		$('#journalSettingsForm').pkpHandler('$.pkp.controllers.form.AjaxFormHandler');
	{rdelim});
</script>

<form class="pkp_form" id="journalSettingsForm" method="post" action="{url router=$smarty.const.ROUTE_COMPONENT component="grid.admin.journal.JournalGridHandler" op="updateContext"}">
	{csrf}
	{include file="controllers/notification/inPlaceNotification.tpl" notificationId="journalSettingsNotification"}

	{if $contextId}
		{fbvElement id="contextId" type="hidden" name="contextId" value=$contextId}
	{else}
		<p>{translate key="admin.journals.createInstructions"}</p>
	{/if}

	{fbvFormArea id="journalSettings"}
		
		{fbvFormSection for="enabled" list=true}
			{if $enabled}{assign var="enabled" value="checked"}{/if}
			{fbvElement type="checkbox" id="enabled" checked=$enabled value="1" label="admin.journals.enableJournalInstructions"}
		{/fbvFormSection}

		<p><span class="formRequired">{translate key="common.requiredField"}</span></p>
		{fbvFormButtons id="journalSettingsFormSubmit" submitText="common.save"}
	{/fbvFormArea}
</form>
