{* header.tplが入ってくる*}

{include file='header.tpl'}
<title>{$title}</title>

<h2>アカウント</h2>

<p>
    ユーザーID:
    <a href="{$base_url}/user/{$user.user_name}">
        <strong>{$user.user_name}</strong>
    </a>
</p>

<ul>
    <li>
        <a href="{$base_url}">ホーム</a>
    </li>
    <li>
        <a href="{$base_url}/account/signout">ログアウト</a>
    </li>
</ul>

<h3>フォロー中</h3>

{* フォローしてるユーザがいる場合は以下に表示する *}
{if count($followings) > 0}
<ul>
    {foreach from=$followings item=following}
    <li>
        <a href="{$base_url}/user/{$following.user_name}">
            {$following.user_name}
        </a>
    </li>
    {/foreach}
</ul>
{/if}
{include file='footer.tpl'}