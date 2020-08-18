{* header.tplが入ってくる*}

{include file='header.tpl'}
<title>{$title}</title>

<h2>アカウント登録</h2>

{* アカウント登録フォーム *}
<form action="{$base_url}/account/register" method="post">
    <input type="hidden" name="_token" value="{$_token}">

    {if isset($errors) && count($errors) > 0}
    {include file='errors.tpl' links=$errors}
    {/if}

    {* account/inputs.tplが入ってくる *}
    {include file='account/inputs.tpl' links=$user_name,$password}
    <p>
        <input type="submit" value="登録">
    </p>

</form>
{include file='footer.tpl'}