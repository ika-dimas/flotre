@extends('admin.templateadmin')

@section('content')
@if(\Auth::check())
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">           
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Detail Pesanan</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div><!--/.row-->
                
        
        
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $data->nama_pemesan }} memesan {{ $data->jumlah_pesanan }} {{ $data->nama_produk }}</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <td>Nama Pemesan</td><td>:</td>
                                    <td>{{ $data->nama_pemesan }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td><td>:</td>
                                    <td>{{ $data->email_pemesan }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td><td>:</td>
                                    <td>{{ $data->phone_pemesan }}</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td><td>:</td>
                                    <td><textarea style="width:100%;height:100px;" readonly>{{ $data->keterangan_pemesan }}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Kode Produk</td><td>:</td>
                                    <td>{{ $data->kode }}</td>
                                </tr>
                                <tr>
                                    <td>Nama Produk</td><td>:</td>
                                    <td>{{ $data->nama_produk }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td><td>:</td>
                                    <td><textarea style="width:100%;height:100px;" readonly>{{ $data->deskripsi }}</textarea></td>
                                </tr>
                                <tr>
                                    <td>Foto</td><td>:</td>
                                    <td><a href="/{{ $data->foto }}" target="_blank"><img src="/{{ $data->foto }}" style="width:100px;"></a></td>
                                </tr>
                                <tr>
                                    <td>Jenis</td><td>:</td>
                                    <td>{{ $data->jenis }}</td>
                                </tr>
                                <tr>
                                    <td>Ukuran : <br><br> Panjang <br><br> Lebar <br><br> Tinggi</td>
                                    <td><br><br> : <br><br> : <br><br> : </td>
                                    <td><br><br>{{ $data->panjang }}<br><br>{{ $data->lebar }}<br><br>{{ $data->tinggi }}</td>
                                </tr>
                                <tr>
                                    <td>Harga</td><td>:</td>
                                    <td>{{ "Rp".number_format($data->harga,0,',','.') }}/Pcs</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Pesanan</td><td>:</td>
                                    <td>{{ $data->jumlah_pesanan }}</td>
                                </tr>
                                <tr>
                                    <td>Harga yang disepakati</td><td>:</td>
                                    <td>{{ "Rp".number_format($data->total_harga,0,',','.') }}/Pcs</td>
                                </tr>
                                <tr>
                                    <td>Status</td><td>:</td>
                                    <td>{{ $data->status }}</td>
                                </tr>
                                <!-- <tr>
                                    <td>Deskripsi</td><td>:</td>
                                    <td>{{ $data->deskripsi }}</td>
                                </tr>
                                <tr>
                                    <td>Harga Jual</td><td>:</td>
                                    <td>Rp.{{ $data->harga_jual }}/Pcs</td>
                                </tr>
                                <tr>
                                    <td>Username Pemasuk</td><td>:</td>
                                    <td>{{ $data->username_pemasuk }}</td>
                                </tr> -->
                            </table>
                            <br>
                                <a href="{{ url('/list/pesanan/edit/'.$data->id) }}"><div class="btn btn-primary">Edit</div></a>
                                <a href="{{ url('/list/pesanan/delete/'.$data->id) }}" onclick="return confirm('Yakin Hapus ?')"><div class="btn btn-default">Hapus</div></a>
                            
                            <a href="{{ url('/list/pesanan/') }}"><div class="btn btn-primary">Back</div></a><br><br>
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