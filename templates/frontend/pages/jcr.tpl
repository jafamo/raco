
{strip}
{assign var="pageTitle" value="fecyt"}
{assign var="pageCrumbTitle" value="fecyt.browse"}
{include file="frontend/components/header.tpl" }
{/strip}

{if $jcrId}
    <div class="content">
    <h2>Segell de qualitat JCR</h2>
    <table style="width:100%" class="listing">
    <tr class="heading">
            <td>jcr.issn_paper</td>
            <td>jcr.issn_electronic</td>
            <td>jcr.Journal</td>
            <!--<td>{translate key="jcr.titol_revista"}</td>-->
    </tr>
    
    <tr>
        <td colspan="3" class="headseparator">&nbsp;</td>
    </tr>
     {foreach from=$misjournals  key=k item=journal}
    <tr><td style="width:15%;">{$journal.printIssn}</td><td style="width:20%;">{$journal.onlineIssn}</td><td><a href="{url journal=$journal.path}" tabindex="140" title="{$k}">{$k}</a></td></tr>
    
    {/foreach}
   
    </table>
    </div>
{/if}
  
{include file="common/footer.tpl"}
