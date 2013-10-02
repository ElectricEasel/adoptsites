<div class="well" style="padding:9px 0">
	<ul class="nav nav-list">

		<li><?php echo anchor('admin', lang('global:dashboard'), 'class="top-link '.( ! $this->module ? 'active ' : '').'"') ?></li>
		<?php
		// Display the menu items.
		// We have already vetted them for permissions
		// in the Admin_Controller, so we can just
		// display them now.
		foreach ($menu_items as $key => $menu_item)
		{
			if (is_array($menu_item))
			{
				echo '<li class="nav-header">'.lang_label($key).'</li>';

				foreach ($menu_item as $lang_key => $uri)
				{
					echo '<li><a href="'.site_url($uri).'" class="">'.lang_label($lang_key).'</a></li>';

				}
			}
			elseif (is_array($menu_item) and count($menu_item) == 1)
			{
				foreach ($menu_item as $lang_key => $uri)
				{
					echo '<li><a href="'.site_url($menu_item).'" class="top-link no-submenu">'.lang_label($lang_key).'</a></li>';
				}
			}
			elseif (is_string($menu_item))
			{
				echo '<li><a href="'.site_url($menu_item).'" class="top-link no-submenu">'.lang_label($key).'</a></li>';
			}

		}
		?>
	</ul>
</div>