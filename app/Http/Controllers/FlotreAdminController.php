<?php

namespace App\Http\Controllers;

use App;
use Input;
use DB;
use App\Produk;
use App\Pesanan;
use App\Contact;
use App\User;

use Illuminate\Http\Request;

use App\Http\Requests;

class FlotreAdminController extends Controller
{
    public function index()
    {   
        if(\Auth::user()){        
        $users = DB::table('users')->count();
        $pesanans = DB::table('pesanans')->count();
    	$contacts = DB::table('contacts')->count();
        $produks = DB::table('produks')->where('jenis','Flower')->count();
        $produks2 = DB::table('produks')->where('jenis','Tree')->count();
        }
        else{
            abort(403);
        }
		return view('admin.home')->with('users', $users)->with('pesanans', $pesanans)->with('contacts', $contacts)->with('produks',$produks)->with('produks2',$produks2);
    }

    public function login()
    {
    	return view('admin.login');
    }



    // --------------------------------------------------------------------



    public function tambahadmin()
    {   
        if(\Auth::user()){ 
        }
        else{
            abort(403);
        }
        return view('admin.tambahadmin');
    }

    public function tambahadminsave(Request $req)
    {
        $this->validate($req,[
            'username'=> 'required|unique:users',
            'name'=>'required']);
        $post = new User;
        $post->name = $req->input('name');
        $post->username = $req->input('username');
        $post->password = \Hash::make($req->input('password'));
        $post->jeniskelamin = $req->input('jeniskelamin');
        $post->ttl = $req->input('ttl');
        $post->alamat = $req->input('alamat');
        $post->no_tlp = $req->input('no_tlp');

        $post->save();
        return redirect(url('/list/admin'));
    }

    public function listadmin()
    {   
        if(\Auth::user()){ 
        $data = array('data'=>User::all());
        }
        else{
            abort(403);
        }
        return view('admin.listadmin')->with($data);
    }

    public function listadmindetail($id)
    {   
        if(\Auth::user()){ 
        $data = array('data'=>User::find($id));
        }
        else{
            abort(403);
        }
        return view('admin.listadmindetail')->with($data);
    }

    public function listadminedit($id)
    {
        if(\Auth::user()){ 
            $data = array('data'=>User::find($id));
            if($data['data']->username != \Auth::user()->username){
                abort(403);
            }
        }
        else{
            abort(403);
        }
        return view('admin.listadminedit')->with($data);
    }

    public function listadminupdate(Request $req)
    {
        $this->validate($req,[
            'name'=>'required']);
            $data = array(
            'name' => $req->input('name'),
            'jenisKelamin' => $req->input('jeniskelamin'),
            'ttl' => $req->input('ttl'),
            'alamat' => $req->input('alamat'),
            'no_tlp' => $req->input('no_tlp'),
        );
        \DB::table('users')->where('id', $req->input('id'))->update($data);
        return redirect(url('/list/admin/'));
    }

    public function listadmindelete($id)
    {
        if(\Auth::user()){
            User::find($id)->delete();
        }
        else{
            abort(403);
        }
        return redirect(url('/'));
    }

    public function contactadmin()
    {
        if(\Auth::user()){ 
        $data = array('data'=>User::all());
        }
        else{
            abort(403);
        }
        return view('admin.contactadmin')->with($data);
    }




    // --------------------------------------------------------------------


    public function profile()
    {
        if(\Auth::user()){ 
        }
        else{
            abort(403);
        }
        return view('admin.profile');
    }

    public function profileedit($id)
    {
        if(\Auth::user()){ 
        $data = array('data'=>User::find($id));
        }
        else{
            abort(403);
        }
        return view('admin.profileedit')->with($data);
    }

    public function profileupdate(Request $req)
    {
        $this->validate($req,[
            'name'=>'required']);
        $data = array(
            'name' => $req->input('name'),
            'jenisKelamin' => $req->input('jeniskelamin'),
            'ttl' => $req->input('ttl'),
            'alamat' => $req->input('alamat'),
            'no_tlp' => $req->input('no_tlp'),
        );
        \DB::table('users')->where('id', $req->input('id'))->update($data);
        return redirect(url('/profile'));
    }




    // --------------------------------------------------------------------



    public function inputproduk()
    {   
        if(\Auth::user()){ 
        $users = User::all();
        }
        else{
            abort(403);
        }
        return view('admin.produk.inputproduk')->with('users',$users);
    }

    public function inputproduksave(Request $req)
    {

        $this->validate($req,[
            'kode'=> 'required|unique:pesanans']);

            $destinationPath = "material/images/";
            if(!is_dir($destinationPath)){
              File::makeDirectory(public_path().'/'.$destinationPath,0777,true);
            }
            $file = $req->file('foto');
            //Display File Name
            $fileName = time()."-".$file->getClientOriginalName();
            $fileExt = $file->getClientOriginalExtension();

            // return $fileMime;
            $file->move($destinationPath, $fileName);
            $foto = $destinationPath.$fileName;

        // $buku = new Buku;
        // $buku->isbn = $r->input('isbn');
        // $buku->judul = $r->input('judul');
        // $buku->deskripsi = $r->input('deskripsi');
        // $buku->foto = $foto;
        // $buku->tahun_terbit = $r->input('tahun_terbit');
        // $buku->tempat_terbit = $r->input('tempat_terbit');
        // $buku->bahasa = $r->input('bahasa');
        // $buku->prefix_item = $r->input('prefix_item');
        // $buku->minimal_angka = $r->input('minimal_angka');
        // $buku->suffix_item = $r->input('suffix_item');
        // $buku->save();


        $post = new Produk;
        $post->kode = $req->input('kode');
        $post->nama_produk = $req->input('nama_produk');
        $post->deskripsi = $req->input('deskripsi');        
        $post->foto = $foto;
        $post->jenis = $req->input('jenis');
        $post->panjang = $req->input('panjang');
        $post->lebar = $req->input('lebar');
        $post->tinggi = $req->input('tinggi');
        $post->harga = $req->input('harga');

        $post->save();
        return redirect(url('/list/produk'));
    }

    public function listproduk()
    {   
        if(\Auth::user()){ 
        $data = array('data'=>Produk::orderBy('jenis','asc')->get());
        }
        else{
            abort(403);
        }
        return view('admin.produk.listproduk')->with($data);
    }

    public function listprodukdetail($id)
    {   
        if(\Auth::user()){ 
            $data = array('data'=>Produk::find($id));
        }
        else{
            abort(403);
        }
        return view('admin.produk.listprodukdetail')->with($data);
    }

    public function listprodukedit($id)
    {
        $data = array('data'=>Produk::find($id));
        if(\Auth::user()){ 
            return view('admin.produk.listprodukedit')->with($data);
        }
        else{
            abort(403);
        }
    }

    public function listprodukupdate(Request $req)
    {
        if($req->hasFile('foto')){
            $destinationPath = "material/images/";
            if(!is_dir($destinationPath)){
              File::makeDirectory(public_path().'/'.$destinationPath,0777,true);
            }
            $file = $req->file('foto');
            //Display File Name
            $fileName = time()."-".$file->getClientOriginalName();
            $fileExt = $file->getClientOriginalExtension();

            // return $fileMime;
            $file->move($destinationPath, $fileName);
            $foto = $destinationPath.$fileName;


            $post = Produk::find($req->input('id'));
            $post->nama_produk = $req->input('nama_produk');
            $post->deskripsi = $req->input('deskripsi');        
            $post->foto = $foto;
            $post->jenis = $req->input('jenis');
            $post->panjang = $req->input('panjang');
            $post->lebar = $req->input('lebar');
            $post->tinggi = $req->input('tinggi');
            $post->harga = $req->input('harga');

            $post->save();


            // $post = Pesanan::where('kode',$req->input('kode'))->first();
            // $post->nama_produk = $req->input('nama_produk');
            // $post->deskripsi = $req->input('deskripsi');
            // $post->foto = $foto;
            // $post->jenis = $req->input('jenis');
            // $post->panjang = $req->input('panjang');
            // $post->lebar = $req->input('lebar');
            // $post->tinggi = $req->input('tinggi');
            // $post->harga = $req->input('harga');
            // $post->save();

        }
        else{
            $post = Produk::find($req->input('id'));
            $post->nama_produk = $req->input('nama_produk');
            $post->deskripsi = $req->input('deskripsi');
            $post->jenis = $req->input('jenis');
            $post->panjang = $req->input('panjang');
            $post->lebar = $req->input('lebar');
            $post->tinggi = $req->input('tinggi');
            $post->harga = $req->input('harga');

            $post->save();
            

            // $post = Pesanan::where('kode',$req->input('kode'))->first();
            // $post->nama_produk = $req->input('nama_produk');
            // $post->deskripsi = $req->input('deskripsi');
            // $post->jenis = $req->input('jenis');
            // $post->panjang = $req->input('panjang');
            // $post->lebar = $req->input('lebar');
            // $post->tinggi = $req->input('tinggi');
            // $post->harga = $req->input('harga');
            // $post->save();
        }
        return redirect(url('/list/produk'));
    }

    public function listprodukdelete($id)
    {
        $data = array('data'=>Produk::find($id));
        if(\Auth::user()){
            Produk::find($id)->delete();
        }
        else{
            abort(403);
        }
        return redirect(url('/list/produk'));
    }


    // --------------------------------------------------------------------



    public function listpesanan()
    {   
        $data = array('data'=>Pesanan::orderBy('status','asc')->get());
        if(\Auth::user()){ 
            return view('admin.pesanan.listpesanan')->with($data);
        }
        else{
            abort(403);
        }
    }

    public function listpesanandetail($id)
    {   
        $data = array('data'=>Pesanan::find($id));
        if(\Auth::user()){ 
            return view('admin.pesanan.listpesanandetail')->with($data);
        }
        else{
            abort(403);
        }
    }

    public function listpesananedit($id)
    {
        $data = array('data'=>Pesanan::find($id));
        if(\Auth::user()){ 
            return view('admin.pesanan.listpesananedit')->with($data);
        }
        else{
            abort(403);
        }
    }

    public function listpesananupdate(Request $req)
    {
        if(\Auth::user()){ 
            $post = Pesanan::find($req->input('id'));
            $post->status = $req->input('status');

            $post->save();
        }
        else{
            abort(403);
        }
        return redirect(url('list/pesanan'));
    }

    public function listpesanandelete($id)
    {
        $data = array('data'=>Pesanan::find($id));
        if(\Auth::user()){
            Pesanan::find($id)->delete();
        }
        else{
            abort(403);
        }
        return redirect(url('/list/pesanan'));
    }


    // --------------------------------------------------------------------



    public function listkritiksaran()
    {   
        $data = array('data'=>Contact::all());
        if(\Auth::user()){
            return view('admin.kritiksaran.listkritiksaran')->with($data);        
        }
        else{
            abort(403);
        }
    }

    public function listkritiksarandetail($id)
    {   
        $data = array('data'=>Contact::find($id));
        if(\Auth::user()){ 
            return view('admin.kritiksaran.listkritiksarandetail')->with($data);
        }
        else{
            abort(403);
        }
    }

    public function listkritiksarandelete($id)
    {
        $data = array('data'=>Contact::find($id));
        if(\Auth::user()){
            Contact::find($id)->delete();
        }
        else{
            abort(403);
        }
        return redirect(url('/list/kritik/saran'));
    }
}
