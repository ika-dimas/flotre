@if(Auth::user())
@extends('admin.templateadmin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Home</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fa fa-pagelines" style="font-size:45px"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{ $produks }}</div>
							<div class="text-muted">Flowers</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
						<i class="fa fa-tree" style="font-size:45px"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{ $produks2 }}</div>
							<div class="text-muted">Trees</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{ $pesanans }}</div>
							<div class="text-muted">Pesanan</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{{ $contacts }}</div>
							<div class="text-muted">Kritik/Saran</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div> -->
		</div><!--/.row-->
@if(Auth::check())
	<div class="row">
		<div class="col-md-8">
		<div class="panel panel-default">
			<div class="alert bg-primary" role="alert">
				<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg> Selamat Datang di FloTre, <b><i>{{ Auth::user()->name }}!</i></b> <a href="#" class="pull-right"></a>
			</div>
		</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-teal">
				<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Calendar</div>
				<div class="panel-body">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
@endif
@if(\Auth::guest())
	<div class="row">
		<div class="col-md-8">
		<div class="panel panel-default">
			<div class="alert bg-primary" role="alert">
				<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg> Selamat Datang di FloTre</i></b> <a href="#" class="pull-right"></a>
			</div>
		</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-teal">
				<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Calendar</div>
				<div class="panel-body">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
@endif
	</div>	<!--/.main-->
@endsection
@endif