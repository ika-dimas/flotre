@if(Auth::user())
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Flowers & Trees</title>

<link href="{{ url('adminflower/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('adminflower/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ url('adminflower/css/bootstrap-table.css') }}" rel="stylesheet">
<link href="{{ url('adminflower/css/styles.css') }}" rel="stylesheet">
<link href="{{ url('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

<!--Icons-->
<script src="{{ url('adminflower/js/lumino.glyphs.js') }}"></script>

<!--[if lt IE 9]>
<script src="admin/js/html5shiv.js"></script>
<script src="admin/js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><span>Flo</span>Tre</a>
				@if(Auth::check())
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						@if(Auth::user()->jeniskelamin=="Perempuan")
							<svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>
						@else
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						@endif
								{{ Auth::user()->name }}
							<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="/profile">
									@if(Auth::user()->jeniskelamin=="Perempuan")
										<svg class="glyph stroked female user"><use xlink:href="#stroked-female-user"/></svg>
									@else
										<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
									@endif
									Profile
								</a>
							</li>
							<li><a href="/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
				@endif
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<br><br>
		<ul class="nav menu">
			@if(Auth::user())
			<li {{ Request::is('home') || Request::is('/') || Request::is('admin') ? 'class=active' : '' }}><a href="/home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"/></svg> Home</a></li>
			
			<!-- <li><a href="widgets.html"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg> Widgets</a></li>
			<li><a href="charts.html"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Charts</a></li>
			<li><a href="tables.html"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tables</a></li>
			<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li>
			<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
			<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li> -->
			
			<li class="parent collapse {{ Request::is('input/produk') || Request::is('list/produk') ? 'active' : '' }}">
				<a data-toggle="collapse" href="#produk">
					<span><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg></span> Produk 
				</a>
				<ul class="children collapse" id="produk">
					<li>
						<a href="/input/produk">
							<svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Input Produk 
						</a>
					</li>
					<li>
						<a class="" href="/list/produk">
							<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg> List Produk 
						</a>
					</li>
				</ul>
			</li>


			<!-- <li class="parent collapse {{ Request::is('input/pemasukan') || Request::is('list/pemasukan') ? 'active' : '' }}">
				<a data-toggle="collapse" href="#pemasukan">
					<span><svg class="glyph stroked download"><use xlink:href="#stroked-download"/></svg></span> Pemasukan 
				</a>
				<ul class="children collapse" id="pemasukan">
					<li>
						<a href="/input/pemasukan">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"></use></svg> Input Pemasukan 
						</a>
					</li>
					<li>
						<a class="" href="/list/pemasukan">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> List Pemasukan 
						</a>
					</li>
				</ul>
			</li> -->

			<li {{ Request::is('list/pesanan')  ? 'class=active' : '' }}><a href="/list/pesanan"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> List Pesanan</a></li>
			<li {{ Request::is('list/kritik/saran') || Request::is('/') ? 'class=active' : '' }}><a href="/list/kritik/saran"><svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg> List Kritik/Saran</a></li>
			
			<li class="parent collapse {{ Request::is('list/admin') || Request::is('list/admin/detail/{id}') || Request::is('tambah/admin') ? 'active' : '' }}">
				<a data-toggle="collapse" href="#admin">
					<span><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Admin 
				</a>
				<ul class="children collapse" id="admin">
					<li>
						<a class="" href="/tambah/admin">
							<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Tambah Admin 
						</a>
					</li>
					<li>
						<a href="/list/admin">
							<svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> List Admin 
						</a>
					</li>
				</ul>
			</li>
			
			<li role="presentation" class="divider"></li>
			<li {{ Request::is('contact/admin') ? 'class=active' : '' }}>
				<a class="" href="/contact/admin">
					<svg class="glyph stroked mobile device"><use xlink:href="#stroked-mobile-device"/></svg> List Contact 
				</a>
			</li>
			@endif
		</ul>

	</div><!--/.sidebar-->
		
	@yield('content')

	<script src="{{ url('adminflower/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ url('adminflower/js/bootstrap.min.js') }}"></script>
	<script src="{{ url('adminflower/js/chart.min.js') }}"></script>
	<script src="{{ url('adminflower/js/chart-data.js') }}"></script>
	<script src="{{ url('adminflower/js/easypiechart.js') }}"></script>
	<script src="{{ url('adminflower/js/easypiechart-data.js') }}"></script>
	<script src="{{ url('adminflower/js/bootstrap-datepicker.js') }}"></script>
	<script src="{{ url('adminflower/js/bootstrap-table.js') }}"></script>
	@yield('script')
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
@endif






 