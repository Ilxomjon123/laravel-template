<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
	@include('dashboard.includes.head')
</head>
@php
$bodyClass = (!empty($boxedLayout)) ? 'boxed-layout' : '';
$bodyClass .= (!empty($paceTop)) ? 'pace-top ' : '';
$bodyClass .= (!empty($bodyExtraClass)) ? $bodyExtraClass . ' ' : '';
$sidebarHide = (!empty($sidebarHide)) ? $sidebarHide : '';
$sidebarTwo = (!empty($sidebarTwo)) ? $sidebarTwo : '';
$sidebarSearch = (!empty($sidebarSearch)) ? $sidebarSearch : '';
$topMenu = (!empty($topMenu)) ? $topMenu : '';
$footer = (!empty($footer)) ? $footer : '';

$pageContainerClass = (!empty($topMenu)) ? 'page-with-top-menu ' : '';
$pageContainerClass .= (!empty($sidebarRight)) ? 'page-with-right-sidebar ' : '';
$pageContainerClass .= (!empty($sidebarLight)) ? 'page-with-light-sidebar ' : '';
$pageContainerClass .= (!empty($sidebarWide)) ? 'page-with-wide-sidebar ' : '';
$pageContainerClass .= (!empty($sidebarHide)) ? 'page-without-sidebar ' : '';
$pageContainerClass .= (!empty($sidebarMinified)) ? 'page-sidebar-minified ' : '';
$pageContainerClass .= (!empty($sidebarTwo)) ? 'page-with-two-sidebar ' : '';
$pageContainerClass .= (!empty($contentFullHeight)) ? 'page-content-full-height ' : '';

$contentClass = (!empty($contentFullWidth) || !empty($contentFullHeight)) ? 'content-full-width ' : '';
$contentClass .= (!empty($contentInverseMode)) ? 'content-inverse-mode ' : '';
@endphp

<body class="{{ $bodyClass }}">
	@include('dashboard.includes.component.page-loader')

	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed {{ $pageContainerClass }}">

		@include('dashboard.includes.header')

		@includeWhen($topMenu, 'dashboard.includes.top-menu')

		@includeWhen(!$sidebarHide, 'dashboard.includes.sidebar')

		@includeWhen($sidebarTwo, 'dashboard.includes.sidebar-right')

		<div id="content" class="content {{ $contentClass }}">
			@yield('content')
		</div>

		@includeWhen($footer, 'dashboard.includes.footer')

		{{-- @include('dashboard.includes.component.theme-panel') --}}

		@include('dashboard.includes.component.scroll-top-btn')

	</div>

	@include('dashboard.includes.page-js')
</body>

</html>