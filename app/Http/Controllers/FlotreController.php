<?php

namespace App\Http\Controllers;


use App\Contact;
use App;
use App\Produk;
use App\Pesanan;
use App\User;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class FlotreController extends Controller
{
    public function index()
    {
    	$pesans = array('pesans'=>Produk::all());
    	$data = array('data'=>User::all());
    	$produk = array('produk'=>Produk::orderBy('jenis','asc')->get());
    	return view('welcome')->with($produk)->with($pesans)->with($data);
    }

    public function contactsave(Request $req)
	{
		$post = new Contact;
		$post->name = $req->input('name');
		$post->email = $req->input('email');
		$post->phone = $req->input('phone');
		$post->message = $req->input('message');

		$post->save();
		return redirect(url('/#contact'));
	}

	public function ajaxpesanproduk(Request $req){
		$pesanproduk = Produk::find($req->id);
		return $pesanproduk;
	}

	public function pesanproduksave(Request $req)
	{
		$post = new Pesanan;
		$post->nama_pemesan = $req->input('nama_pemesan');
		$post->email_pemesan = $req->input('email_pemesan');
		$post->phone_pemesan = $req->input('phone_pemesan');
		$post->keterangan_pemesan = $req->input('keterangan_pemesan');
		$post->kode = $req->input('kode');
		$post->nama_produk = $req->input('nama_produk');
		$post->deskripsi = $req->input('deskripsi');
		$post->foto = $req->input('foto');
		$post->jenis = $req->input('jenis');
		$post->panjang = $req->input('panjang');
		$post->lebar = $req->input('lebar');
		$post->tinggi = $req->input('tinggi');
		$post->harga = $req->input('harga');
		$post->jumlah_pesanan = $req->input('jumlah_pesanan');
		$post->total_harga = $req->input('total_harga');

		$post->save();
		return redirect(url('/#portfolio'));
	}

	public function getProduk(Request $req) {
		$produk = Produk::where('jenis',$req->jenis)->get();
		return $produk;
	}
}
