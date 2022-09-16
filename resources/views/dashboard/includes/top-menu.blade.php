<!-- begin #top-menu -->
<div id="top-menu" class="top-menu">
	<!-- begin top-menu nav -->
	<ul class="nav">
		@php
			$currentUrl = (Request::path() != '/') ? '/'. Request::path() : '/';
			
			function renderHeaderSubMenu($value, $currentUrl) {
				$subMenu = '';
				$GLOBALS['sub_level'] += 1 ;
				$GLOBALS['active'][$GLOBALS['sub_level']] = '';
				$currentLevel = $GLOBALS['sub_level'];
				foreach ($value as $key => $menu) {
					$GLOBALS['subparent_level'] = '';
					
					$subSubMenu = '';
					$hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
					$hasCaret = (!empty($menu['sub_menu'])) ? '<b class="caret pull-right"></b>' : '';
					$hasTitle = (!empty($menu['title'])) ? $menu['title'] : '';
					$hasHighlight = (!empty($menu['highlight'])) ? '<i class="fa fa-paper-plane text-theme m-l-5"></i>' : '';
					
					if (!empty($menu['sub_menu'])) {
						$subSubMenu .= '<ul class="sub-menu">';
						$subSubMenu .= renderHeaderSubMenu($menu['sub_menu'], $currentUrl);
						$subSubMenu .= '</ul>';
					}
					
					$active = ($currentUrl == $menu['url']) ? 'active' : '';
					
					if ($active) {
						$GLOBALS['parent_active'] = true;
						$GLOBALS['active'][$GLOBALS['sub_level'] - 1] = true;
					}
					if (!empty($GLOBALS['active'][$currentLevel])) {
						$active = 'active';
					}
					$subMenu .= '
						<li class="'. $hasSub .' '. $active .'">
							<a href="'. $menu['url'] .'">'. $hasTitle . $hasHighlight . $hasCaret .'</a>
							'. $subSubMenu .'
						</li>
					';
				}
				return $subMenu;
			}
			
			foreach (config('sidebar.menu') as $key => $menu) {
				$GLOBALS['parent_active'] = '';
				
				$hasSub = (!empty($menu['sub_menu'])) ? 'has-sub' : '';
				$hasCaret = (!empty($menu['caret'])) ? '<b class="caret"></b>' : '';
				$hasIcon = (!empty($menu['icon'])) ? '<i class="'. $menu['icon'] .'"></i>' : '';
				$hasImg = (!empty($menu['img'])) ? '<div class="icon-img"><img src="'. $menu['img'] .'" /></div>' : '';
				$hasLabel = (!empty($menu['label'])) ? '<span class="label label-theme m-l-5">'. $menu['label'] .'</span>' : '';
				$hasTitle = (!empty($menu['title'])) ? '<span>'. $menu['title'] . $hasLabel .'</span>' : '';
				$hasBadge = (!empty($menu['badge'])) ? '<span class="badge pull-right">'. $menu['badge'] .'</span>' : '';
				
				$subMenu = '';
				
				if (!empty($menu['sub_menu'])) {
					$GLOBALS['sub_level'] = 0;
					$subMenu .= '<ul class="sub-menu">';
					$subMenu .= renderHeaderSubMenu($menu['sub_menu'], $currentUrl);
					$subMenu .= '</ul>';
				}
				$active = ($currentUrl == $menu['url']) ? 'active' : '';
				$active = (empty($active) && !empty($GLOBALS['parent_active'])) ? 'active' : $active;
				echo '
					<li class="'. $hasSub .' '. $active .'">
						<a href="'. $menu['url'] .'">
							'. $hasImg .'
							'. $hasIcon .'
							'. $hasTitle .'
							'. $hasBadge .'
							'. $hasCaret .'
						</a>
						'. $subMenu .'
					</li>
				';
			}
		@endphp
		<li class="menu-control menu-control-left">
			<a href="javascript:;" data-click="prev-menu"><i class="fa fa-angle-left"></i></a>
		</li>
		<li class="menu-control menu-control-right">
			<a href="javascript:;" data-click="next-menu"><i class="fa fa-angle-right"></i></a>
		</li>
	</ul>
	<!-- end top-menu nav -->
</div>
<!-- end #top-menu -->

