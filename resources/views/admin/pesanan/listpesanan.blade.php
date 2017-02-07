@extends('admin.templateadmin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Pesanan</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"></h1>
			</div>
		</div><!--/.row-->
				
		
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">List Pesanan</div>
					<div class="panel-body">
						<table data-toggle="table" id="table-style"  data-row-style="rowStyle">
						    <thead>
                                    <th>No.</th>
                                    <th>Nama Pemesan</th>
                                    <th>Email</th>
                                    <!-- <th>Phone</th> -->
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah Pesanan</th><!-- 
                                    <th>Harga yang disepakati</th> -->
                                    <th>Status</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                    @foreach($data as $post)
                                        <tr>
                                            <td>{{ $i++}}.</td>
                                            <td>{{ $post->nama_pemesan }}</td>
                                            <td>{{ $post->email_pemesan }}</td>
                                            <!-- <td>{{ $post->phone_pemesan }}</td> -->
                                            <td>{{ $post->kode }}</td>
                                            <td>{{ $post->nama_produk }}</td>
                                            <td>{{ "Rp".number_format($post->harga,0,',','.') }}/Pcs</td>
                                            <td>{{ $post->jumlah_pesanan }} Pcs</td><!-- 
                                            <td>{{ "Rp".number_format($post->total_harga,0,',','.') }}</td> -->
                                            <td>{{ $post->status }}</td>
                                            <td><a class="btn btn-info" href="{{ url('/list/pesanan/detail/'.$post->id) }}">Detail</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
						</table>
						<script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->
@endsection