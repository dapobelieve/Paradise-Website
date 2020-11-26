@extends('admin.layout.template')


@section('admin-content')

	<div id="content">
		<div id="content-header" class="mini">
			<h1>Dashboard</h1>
		</div>
		<div id="breadcrumb">
			<a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
			<a href="#" class="current">Dashboard</a>
			<a href="#" class="current">Add File</a>
		</div>
		<div id="store" class="container-fluid">
			{{-- @include('admin.layout.stats') --}}
			<br />

			<add-file/>
		</div>
	</div>


@stop