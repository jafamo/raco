{**
 * journals.tpl
 *
 * Copyright (c) 2012 CESCA
*
*}
<h1>dentro</h1>
{strip}

{include file="common/header.tpl"}
{/strip}
<h1>test jfarinos </h1>
{if $fecytId }
    <table style="width:100%" class="listing">
    <!--
    <tr class="heading">
            <td>{translate key="fecyt.issn_paper"}</td>
            <td>{translate key="fecyt.issn_electronic"}</td>
            <td>{translate key="fecyt.titol_revista"}</td>
    </tr>
    -->
    <tr>
        <td colspan="3" class="headseparator">&nbsp;</td>
    </tr>
    {foreach from=$journals item=journal}

    <tr><td style="width:15%;">{$journal->getSetting("printIssn")}</td><td style="width:20%;">{$journal->getSetting("onlineIssn")}</td><td><a href="{url journal=$journal->getPath()}" tabindex="140" title="{$journal->getLocalizedTitle()|escape}">{$journal->getLocalizedTitle()|escape}</a></td></tr>
    {/foreach}
    </table>
{/if}
  
{include file="common/footer.tpl"}
