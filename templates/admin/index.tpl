{**
 * templates/admin/index.tpl
 *
 * Copyright (c) 2014-2018 Simon Fraser University
 * Copyright (c) 2003-2018 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Site administration index.
 *
 *}
{strip}
{assign var="pageTitle" value="admin.siteAdmin"}
{include file="common/header.tpl"}
{/strip}

{* @todo This warning notification needs to be styled *}
{if $newVersionAvailable}
<div class="warningMessage">{translate key="site.upgradeAvailable.admin" currentVersion=$currentVersion latestVersion=$latestVersion}</div>
{/if}

<div class="pkp_page_content pkp_page_admin">
	<h3>{translate key="admin.siteManagement"}</h3>

	<ul>
		<li><a href="{url op="contexts"}">{translate key="admin.hostedJournals"}</a></li>
<<<<<<< HEAD
                
                {*AÑADIR MENU*}
                <li><a href="{url op="contexts_1"}">{translate key="Context_1"}</a></li>
		
                {call_hook name="Templates::Admin::Index::SiteManagement"}
		{if $multipleContexts}
			<li><a href="{url op="settings"}">{translate key="admin.siteSettings"}</a></li>
                        
                        
		{/if}
=======
		{call_hook name="Templates::Admin::Index::SiteManagement"}                
		{if $multipleContexts}
			<li><a href="{url op="settings"}">{translate key="admin.siteSettings"}</a></li>
		{/if}                
>>>>>>> release
	</ul>

	<h3>{translate key="admin.adminFunctions"}</h3>

	<ul>
		<li><a href="{url op="systemInfo"}">{translate key="admin.systemInformation"}</a></li>
		<li><a href="{url op="expireSessions"}" onclick="return confirm({translate|json_encode|escape key="admin.confirmExpireSessions"})">{translate key="admin.expireSessions"}</a></li>
		<li><a href="{url op="clearDataCache"}">{translate key="admin.clearDataCache"}</a></li>
		<li><a href="{url op="clearTemplateCache"}" onclick="return confirm({translate|json_encode|escape key="admin.confirmClearTemplateCache"})">{translate key="admin.clearTemplateCache"}</a></li>
		<li><a href="{url op="clearScheduledTaskLogFiles"}" onclick="return confirm({translate|json_encode|escape key="admin.scheduledTask.confirmClearLogs"})">{translate key="admin.scheduledTask.clearLogs"}</a></li>
		{call_hook name="Templates::Admin::Index::AdminFunctions"}
	</ul>

</div><!-- .pkp_page_content -->
{include file="common/footer.tpl"}
