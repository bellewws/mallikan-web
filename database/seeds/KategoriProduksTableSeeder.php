<?php

use Illuminate\Database\Seeder;

class KategoriProduksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_produks')->delete();
        $data = [
            [
                'kategori'=>'ikan',
            ],
            [
                'kategori'=>'cumi', 
            ],
            [
                'kategori'=>'udang', 
            ],
            [
                'kategori'=>'kepiting', 
            ],[
                'kategori'=>'kerang', 
            ],

        ];
        \DB::table('kategori_produks')->insert($data);
    }
}
