{* header.tplが入ってくる*}

{include file='header.tpl'}
<title>{$title}</title>
{$status.user_name}
{include file='status/status.tpl' links=$status}
{include file='footer.tpl'}