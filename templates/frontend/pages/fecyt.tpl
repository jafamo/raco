
{strip}
{assign var="pageTitle" value="fecyt"}
{assign var="pageCrumbTitle" value="fecyt.browse"}
{include file="frontend/components/header.tpl" }
{/strip}

{if $fecytId}
    <div class="content">
    <h2>Segell de qualitat FECYT</h2>
    <table style="width:100%" class="listing">
    <tr class="heading">
            <td>fecyt.issn_paper</td>
            <td>fecyt.issn_electronic</td>
            <td>fecyt.Journal</td>
            <!--<td>{translate key="fecyt.titol_revista"}</td>-->
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