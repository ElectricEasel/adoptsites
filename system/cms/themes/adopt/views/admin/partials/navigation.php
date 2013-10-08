<div class="well" style="padding:0">
	<img src="/system/cms/themes/adopt/img/dashboard_sample.jpg" alt="Stats" style="width:100%" />
	<div class="dark-blue-bg inset-shadow" style="padding:20px;color:#FFF;">
		Liam & Julie
	</div>
	<ul class="nav nav-list">

		<li class="<?php echo !$this->module ? ' active' : ''; ?>"><?php echo anchor('admin', '<i class="icon icon-home"></i>'.lang('global:dashboard')) ?></li>
		<?php
		// Display the menu items.
		// We have already vetted them for permissions
		// in the Admin_Controller, so we can just
		// display them now.
		foreach ($menu_items as $key => $menu_item)
		{
			$class = strtolower($key);
			if (is_array($menu_item))
			{
				echo '<li class="nav-header section-'.$class.'">'.lang_label($key).'</li>';

				foreach ($menu_item as $lang_key => $uri)
				{
					$itemClass = str_replace(' ', '-', $class.'-'.strtolower(lang_label($lang_key)));

					echo ($uri === 'admin/' . $this->module) ? '<li class="active">' : '<li>';
					echo '<a href="'.site_url($uri).'" class="'.$itemClass.'"><i></i>'.lang_label($lang_key).'</a></li>';

				}
			}
			elseif (is_array($menu_item) and count($menu_item) == 1)
			{
				foreach ($menu_item as $lang_key => $uri)
				{
					$itemClass = str_replace(' ', '-', $class.'-'.strtolower(lang_label($lang_key)));
					echo '<li><a href="'.site_url($menu_item).'" class="no-submenu '.$itemClass.'"><i></i>'.lang_label($lang_key).'</a></li>';
				}
			}
			elseif (is_string($menu_item))
			{
				$itemClass = str_replace(' ', '-', $class.'-'.strtolower(lang_label($key)));
				echo '<li><a href="'.site_url($menu_item).'" class="no-submenu '.$itemClass.'"><i></i>'.lang_label($key).'</a></li>';
			}

		}
		?>
	</ul>
</div>