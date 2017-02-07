<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('jeniskelamin', ['Laki-laki','Perempuan']);
            $table->string('ttl');
            $table->string('alamat');
            $table->string('no_tlp',25);
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User;
        $user->name = 'Admin';
        $user->username = 'admin';
        $user->password = \Hash::make('admin');
        $user->jeniskelamin = 'Laki-laki';
        $user->ttl = 'Jakarta, 17 Agustus 1945';
        $user->alamat = 'Jl. Raya No.13';
        $user->no_tlp = '082311019328';
        $user->save();

        $user = new User;
        $user->name = 'Faewfs Dse';
        $user->username = 'abcde';
        $user->password = \Hash::make('abcde');
        $user->jeniskelamin = 'Perempuan';
        $user->ttl = 'Jakarta, 09 Januari 2019';
        $user->alamat = 'Jl. Jdkale No.19';
        $user->no_tlp = '0889354465';
        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
