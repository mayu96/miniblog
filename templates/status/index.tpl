{* header.tplが入ってくる*}

{include file='header.tpl'}
<title>{$title}</title>

<h2>ホーム</h2>

<form action="{$base_url}/status/post" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{$_token}" >

    {if isset($errors) && count($errors) > 0}
    {include file='errors.tpl' links=$errors}
    {/if}

    <textarea name="body" row="2" cols="60">{$body}</textarea>

    {* 画像ファイルをアップロードする処理 *}
    <p>
    <div class="element_wrap">
        <label>画像ファイルの添付</label>
        <input type="file" name="upimg">
    </div>
    </p>

    <p>
        <input type="submit" value="発言">
    </p>

</form>

{* 投稿一覧が表示される *}
<div id="statuses">
    {foreach from=$statuses item=status}

        {* status/status.tplが入ってくる*}
    {include file='status/status.tpl' links=$status}
    {/foreach}
</div>

{* footer.tplが入ってくる*}
{include file='footer.tpl'}





