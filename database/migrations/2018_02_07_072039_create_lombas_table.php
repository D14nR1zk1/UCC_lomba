<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\lomba;
class CreateLombasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lombas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('deskripsi');
            $table->date('tanggal_tutup');
            $table->string('poster');
            $table->timestamps();//keluar kapan di update dan kapan dibuatnya
        });

        $faker=Faker\factory::create();
        for($i=0;$i<10;$i++){
            $lomba = new lomba();
            $lomba->nama=$faker->word;
            $lomba->deskripsi=$faker->text($maxNbChars = 100);
            $lomba->tanggal_tutup=$faker->date($format= 'Y-m-d', $max = '+ 5 years');
            $lomba->poster = $faker->imageUrl($width = 620, $height = 877);
            $lomba->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lombas');
    }
}
