$("div.alert").delay(4000).fadeOut(4000);

function xacnhanxoa (msg)
{
	if(window.confirm(msg))
	{
		return true;
	}
	return false;
}
