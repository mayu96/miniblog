{* header.tplが入ってくる*}

{include file='header.tpl'}
<title>{$title}</title>

<h2>ログイン</h2>

<p>
    <a href="{$base_url}/account/signup">新規ユーザ登録</a>
</p>

{* ログインフォーム *}
<form action="{$base_url}/account/authenticate" method="post">
    <input type="hidden" name="_token" value="{$_token}">

    {if isset($errors) && count($errors) > 0}
    {include file='errors.tpl' links=$errors}
    {/if}

    {* account/inputs.tplが入ってくる *}
    {include file='account/inputs.tpl' links=$user_name,$password}



    <p>
        <input type="submit" value="ログイン" ?>
    </p>
</form>
{include file='footer.tpl'}