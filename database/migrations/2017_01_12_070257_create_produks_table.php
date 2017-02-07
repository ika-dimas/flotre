<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Produk;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode')->unique();
            $table->string('nama_produk');
            $table->text('deskripsi');
            $table->string('foto');
            $table->enum('jenis', ['Flower','Tree']);
            $table->integer('panjang');
            $table->integer('lebar');
            $table->integer('tinggi');
            $table->integer('harga');
            $table->timestamps();
        });

        $produk = new Produk;
        $produk->kode = '1001';
        $produk->nama_produk = 'Planter partisi & grass ball';
        $produk->deskripsi = 'rass Ball (bola dari rumput plastik) hijau cerah dikombinasikan dengan planter rotan sintetis disusun berjajar hadirkan partisi yang elegan untuk memisahkan customer area dengan jalan. Suasana ruang akan terasa lebih segar namun tetap terjaga keanggunannya. Tampilan Grass Ball yang simpel dan elegan memudahkan anda untuk menempatkannya dalam berbagai desain ruangan. Cukup dengan memvariasi planter/container maka anda akan mendapatkan berbagai suasana baru. Grass ball diameter 60cm ini terbuat dari rumput plastik dari jenis rumput jarum. Grass ball ini cukup ringan sehingga dapat digantung dengan bracket untuk mempercantik bagian atas ruang anda. 
Grass Ball ini adalah salah satu rangkaian tanaman plastik yang pernah dipesan oleh salah satu customer kami untuk difungsikan sebagai partisi di Amadeus Café cabang Kuningan City, Setiabudi One, Gandaria City & Botani Square (bogor). Ronce Kembang florist selalu memberikan desain yang unik untuk setiap pesanan. Silakan hubungi kami dan dapatkan rangkaian tanaman plastik dan grass ball dengan berbagai ukuran yang khusus didesain untuk anda.';
        $produk->foto = 'material/images/1486429036-Planter_partisi__50bad2a53b21f.jpg';
        $produk->jenis = 'Flower';
        $produk->panjang = '60';
        $produk->lebar = '60';
        $produk->tinggi = '100';
        $produk->harga = '100000';
        $produk->save();

        $produk = new Produk;
        $produk->kode = '1002';
        $produk->nama_produk = 'Pohon Plastik, Maple Jari Melingkar';
        $produk->deskripsi = 'Artificial tree (pohon plastik) setinggi 4m ini menggunakan daun maple tipe jari dan pot warna terakota. Pohon-pohon plastik ini diletakkan pada serambi rumah makan yang bernuansa kebun untuk menghadirkan kesegaran pohon asli. Para pengunjung bagai diteduhi kesegaran pepohonan hijau saat duduk di serambi depan. Pohon-pohon plastik tersebut juga membantu meredam kebisingan sehingga menambah kenyamanan bagi customer. Finishing antara pot dan pohon menggunakan batu putih. Pohon plastik ini menggunakan batang & dahan kayu asli yang telah diproses agar tahan lama. Daun beringin terbuat dari kain silk dengan warna hijau segar.  Dengan Artificial Tree anda tidak perlu setiap hari repot menyiraminya dan keindahan hijau daun yang lebih lama.

Tersedia berbagai pilihan jenis & warna daun yang sesuai dengan kebutuhan anda (lihat gambar).

Ini adalah salah satu Artificial Tree dengan daun maple tipe jari yang pernah dipesan oleh salah satu customer kami untuk dipasang di Bibliotheque-Jakarta, Sampoerna Strategic Square, Jl. Jend. Sudirman Kav. 45-46, Jakarta. Ronce Kembang selalu memberikan desain yang unik untuk setiap pesanan. Silakan hubungi kami untuk informasi Artificial Tree yang khusus didesain untuk anda.';
        $produk->foto = 'material/images/1486429561-Pohon_Plastik__M_4fcc257f46624.jpg';
        $produk->jenis = 'Tree';
        $produk->panjang = '0';
        $produk->lebar = '0';
        $produk->tinggi = '400';
        $produk->harga = '125000';
        $produk->save();

        $produk = new Produk;
        $produk->kode = '1003';
        $produk->nama_produk = 'Charming Elegant';
        $produk->deskripsi = "Bunga-bunga mekar nan anggun dipadu menjadi rangkaian bunga meja yang menawan. Tiger Lily merah maroon merona dengan indah, ditemani oleh mawar-mawar mekar pink magenta dan merah maroon, menyiratkan kemewahannya. Disemarakkan oleh Baby's Breath yang menyeruak diantara rangkaian, serta manisnya Hortensia dan Tulip-tulip magenta. Bak keindahan bunga-bunga di musim semi, senantiasa memikat hati. 

Hadirkan rangkaian bunga satu muka ini dalam ruangan anda dan rasakanlah kemewahannya. Rangkaian bunga meja ini didesain khusus oleh Ronce Kembang Florist untuk anda, pelanggan tercinta.";
        $produk->foto = 'material/images/1486429985-Charming_Elegant_4f5d5dcbbecc7.jpg';
        $produk->jenis = 'Flower';
        $produk->panjang = '0';
        $produk->lebar = '0';
        $produk->tinggi = '95';
        $produk->harga = '475000';
        $produk->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produks');
    }
}
