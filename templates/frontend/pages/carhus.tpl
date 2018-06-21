
{strip}
{assign var="pageTitle" value="carhus"}
{assign var="pageCrumbTitle" value="carhus.browse"}
{include file="frontend/components/header.tpl" }
{/strip}



{if $carhusId}
    <div class="content">
    <h2>Segell de qualitat CARHUS</h2>
    <table style="width:100%" class="listing">

    <tr>
        <td colspan="3" class="headseparator">&nbsp;</td>
    </tr>
     {foreach from=$misjournals  key=k item=journal}
    
         
         <tr><td style="width:15%;"> 
                 {* Hacer un link per cada un dels tipus de Carhus *}
                 {if $journal.nomcarhus=='A'}
                 
                 <a href="{url route=$smarty.const.ROUTE_PAGE  page="A"}" tabindex="140" title="">Segell de tipus:{$journal.nomcarhus|escape}({$journal.numcarhus|escape})
                 </a>
                 {/if}
                 
                 {if $journal.nomcarhus=='B'}
                 <a href="{url journal="index" page="carhusB"}" tabindex="140" title="">Segell de tipus:{$journal.nomcarhus}({$journal.numcarhus})
                 </a>
                 {/if}
                 
                 {if $journal.nomcarhus=='C'}
                 <a href="{url journal="index" page="carhusC"}" tabindex="140" title="">Segell de tipus:{$journal.nomcarhus}({$journal.numcarhus})
                 </a>
                 {/if}
                 
                 {if $journal.nomcarhus=='D'}
                 <a href="{url journal="index" page="carhusD"}" tabindex="140" title="">Segell de tipus:{$journal.nomcarhus}({$journal.numcarhus})
                 </a>
                 {/if}
                 
                 
                 
             </td>
         </tr>
  
    {/foreach}
 {/if}
        
    </table>
    </div>
 

  
{include file="common/footer.tpl"}
