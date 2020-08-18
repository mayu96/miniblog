{* header.tplが入ってくる*}

{include file='header.tpl'}
<title>{$title}</title>

<h2>{$user.user_name}</h2>

{if !is_null($following)}
{if $following}
<p>フォローしています</p>
{else}
<form action="{$base_url}/follow" method="post">
    <input type="hidden" name="_token" value="{$_token}" >
    <input type="hidden" name="following_name" value="{$user.user_name}">

    <input type="submit" value="フォローする">
</form>
{/if}
{/if}


<div id="statuses">
    {foreach from=$statuses item=status}
        {include file='status/status.tpl' links=$status}
    {/foreach}
</div>
{include file='footer.tpl'}
