@extends('adminlte::_layout.base')

@section('content')
	<div class="wrapper">
        <header class="main-header">
            <a class="navbar-brand logo" href="{{ Admin::instance()->router->routeHome() }}">{{{ $adminTitle }}}</a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                @include('adminlte::_partials.user')
            </nav>
        </header>
        @include('adminlte::_partials.aside')
        <div class="content-wrapper">
			@yield('innerContent')
		</div>
	</div>
@stop