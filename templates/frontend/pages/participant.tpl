{strip}
{assign var="pageTitle" value="participant"}
{assign var="pageCrumbTitle" value="participant.browse"}
{include file="frontend/components/header.tpl" }
{/strip}

{if $participantId}
    <div class="content">
    <h2>Participants</h2>
    <table style="width:100%" class="listing">
  
     {foreach from=$misjournals  key=k item=journal}
         <h5>{$journal.Title}</h5>        
         <tr>
             <td style="width:0%;"><a href="{$journal.url}">web institució</a></td>
             <td style="width:2%;"><a href=""{$journal.onlineIssn} Revistes</a></td>
             <td><a href="{url journal=$journal.path()}" tabindex="140" title="{$journal.path}">{$journal.name}</a></td>
         </tr>
    
    {/foreach}
    
    </table>
    </div>
{/if}
  
{include file="common/footer.tpl"}

