<?php

foreach ($files as $file)
{
	if (strpos($file->mimetype, 'image/') === 0)
	{
		echo '<img class="item img-polaroid" src="/files/thumb/'.$file->id.'/150/150/crop" data-path="'.$file->path.'" />';
	}
}