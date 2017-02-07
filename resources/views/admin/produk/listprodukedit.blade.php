@extends('admin.templateadmin')

@section('content')
@if(\Auth::check())
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="/home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Produk</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"></h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Edit Produk</div>
					<div class="panel-body">
						<div class="col-md-7">
							<form action="{{ url('list/produk/edit/update') }}" method="POST" enctype="multipart/form-data">
                            <table class="table hovered" style="width: 100%">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <tr>
                                    <td>Kode Produk</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <input class="form-control" type="text" name="kode" readonly value="{{ $data->kode }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <input class="form-control" type="text" name="nama_produk" value="{{ $data->nama_produk }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <textarea class="form-control" name="deskripsi" type="text">{{ $data->deskripsi }}</textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>
                                        <div class="form-group input-group">
                                            <input  type="file" name="foto">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>
                                    <div class="input-control text full-size">
                                        <select class="form-control" name="jenis">
                                        @if($data->jenis=='Flower')
                                            <option selected>Flower</option>
                                            <option>Tree</option>
                                        @else
                                            <option>Flower</option>
                                            <option selected>Tree</option>
                                        @endif 
                                        </select>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ukuran : <br><br>- Panjang<br><br>- Lebar<br><br>- Tinggi</td>
                                    <td>
                                        <br>
                                        <br>
                                        <div class="input-control text full-size">
                                            <input class="form-control" type="text" name="panjang" value="{{ $data->panjang }}">
                                        </div>
                                        <div class="input-control text full-size">
                                            <input class="form-control" type="text" name="lebar" value="{{ $data->lebar }}">
                                        </div>
                                        <div class="input-control text full-size">
                                            <input class="form-control" type="text" name="tinggi" value="{{ $data->tinggi }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input class="form-control" type="number" value="{{ $data->harga }}" name="harga">
                                            <span class="input-group-addon">/ Pcs</span>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>Harga Jual</td>
                                    <td>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Rp.</span>
                                            <input class="form-control" type="number" value="{{ $data->harga_jual }}" name="harga_jual">
                                            <span class="input-group-addon">/ Pcs</span>
                                        </div>
                                    </td>
                                </tr> -->
                            </table>    
                            <br>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ url('/list/produk/detail/'.$data->id) }}"><div class="btn btn-default" onclick="return confirm('Batal ?')">Batal</div></a>
                            </form>   
                            <br>   
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
@endif
@endsection