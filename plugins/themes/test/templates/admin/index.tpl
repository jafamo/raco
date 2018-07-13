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

<p>Hello world</p>
    
{include file="common/footer.tpl"}
