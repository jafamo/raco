{strip}
{assign var="pageTitle" value="revista"}
{assign var="pageCrumbTitle" value="revista.browse"}
{include file="frontend/components/header.tpl" }
{/strip}

{if $revistaId}
    <div class="content">
    <h2>Revistes</h2>
    <table style="width:100%" class="listing">
    <tr class="heading">
            <td>ISSN PAPER</td>
            <td>ISSN ELECTRÒNIC</td>
            <td>TÍTOL DE LA REVISTA</td>
            <!--<td>{translate key="partic.titol_revista"}</td>-->
    </tr>
    
    <tr>
        <td colspan="3" class="headseparator">&nbsp;</td>
    </tr>
     {foreach from=$misjournals  key=k item=journal}
    
        
         <tr><td style="width:15%;">{$journal.printIssn}</td><td style="width:20%;">{$journal.onlineIssn}</td><td><a href="{url journal=$journal.path}" tabindex="140" title="{$journal.path}">{$journal.name}</a></td></tr>
    
        
        
        
    {/foreach}
 
        
    </table>
    </div>
{/if}
  
{include file="common/footer.tpl"}
