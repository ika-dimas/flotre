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
                @if(count($errors->all()) > 0)
                <div class="alert bg-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <span>{{ $error }}</span><br>
                    @endforeach
                </div>
                @endif
				<div class="panel panel-default">
					<div class="panel-heading">Input Produk</div>
					<div class="panel-body">
						<div class="col-md-7">
							<form action="{{ url('input/produk/save') }}" method="POST" enctype="multipart/form-data">
                            <table class="table hovered" style="width: 100%">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <tr>
                                    <td>Kode Produk</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <input class="form-control" type="number" name="kode" id="kode" autocomplete="off" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <input class="form-control" type="text" name="nama_produk" id="nama_produk" autocomplete="off" required><!-- 
                                            <input class="form-control" value="{{ Auth::user()->username }}" name="username_pemasuk" id="username_pemasuk" type="hidden" autocomplete="off" required> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" type="text" autocomplete="off" ></textarea>
                                            <!-- <input class="form-control" name="info_produk" id="info_produk" type="text" autocomplete="off" required> -->
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>
                                        <div class="finput-control text full-size">
                                            <div class="btn btn-menu biru">
                                            <input type="file" required name="foto"/>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis</td>
                                    <td>                        
                                        <div class="input-control select">
                                            <select class="form-control" name="jenis" id="jenis"  required>
                                                <option>Flower</option>
                                                <option>Tree</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ukuran : <br><br>Panjang <br><br><br> Lebar <br><br>Tinggi</td>
                                    <td><br><br>
                                        <div class="form-group input-group">
                                            <input class="form-control" type="number" name="panjang" id="panjang" autocomplete="off" placeholder="Panjang">
                                            <span class="input-group-addon">cm</span>
                                        </div>
                                        <div class="form-group input-group">
                                            <input class="form-control" type="number" name="lebar" id="lebar" autocomplete="off" placeholder="Lebar">
                                            <span class="input-group-addon">cm</span>
                                        </div>
                                        <div class="form-group input-group">
                                            <input class="form-control" type="number" name="tinggi" id="tinggi" autocomplete="off" placeholder="Tinggi">
                                            <span class="input-group-addon">cm</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Rp</span>
                                            <input class="form-control" type="number" name="harga" id="harga" autocomplete="off" required>
                                            <span class="input-group-addon">/ Pcs</span>
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>Nama Pemasuk</td>
                                    <td>                        
                                        <div class="input-control select">
                                            <select class="form-control" name="nama_pemasuk" id="nama_pemasuk"  required>
                                                @foreach($users as $key => $user)
                                                    <option value="{{ $user->nama }}">{{ $user->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>  --> 
                            </table>
							<br>
                    		<div id="success"></div>
                    		<div class="row">
                        	<div class="form-group col-xs-12">
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
							</div>
                   			</div>							
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
@endif
@endsection