<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tokos')->delete();
        $data = [
            [
                'username_toko'=>'toko_ipah', 
                'name'=>'Toko Mawar', 
                'foto_toko'=>'foto_toko_1.jpg',
                'id_user'=>2,
                'id_kota'=>155,
                'rata_rating'=>0,
                'jml_transaksi_berhasil'=>0,
                'jml_transaksi_batal'=>0
            ],
            [
                'username_toko'=>'toko_ruhyadi', 
                'name'=>'Toko Yadi', 
                'foto_toko'=>'foto_toko_2.jpg',
                'id_user'=>3,
                'id_kota'=>152,
                'rata_rating'=>0,
                'jml_transaksi_berhasil'=>0,
                'jml_transaksi_batal'=>0
            ],
            [
                'username_toko'=>'toko_reza', 
                'name'=>'Toko Rezawan', 
                'foto_toko'=>'foto_toko_3.jpg',
                'id_user'=>9,
                'id_kota'=>152,
                'rata_rating'=>0,
                'jml_transaksi_berhasil'=>0,
                'jml_transaksi_batal'=>0
            ],
            [
                'username_toko'=>'toko_bagas', 
                'name'=>'Toko Ikan Bagas', 
                'foto_toko'=>'foto_toko_4.jpg',
                'id_user'=>12,
                'id_kota'=>152,
                'rata_rating'=>0,
                'jml_transaksi_berhasil'=>0,
                'jml_transaksi_batal'=>0
            ],
            [
                'username_toko'=>'kios_segar', 
                'name'=>'Kios Ikan Segar', 
                'foto_toko'=>'foto_toko_5.jpg',
                'id_user'=>15,
                'id_kota'=>152,
                'rata_rating'=>0,
                'jml_transaksi_berhasil'=>0,
                'jml_transaksi_batal'=>0
            ],
            [
                'username_toko'=>'ikan_indo', 
                'name'=>'Toko Ikan Indo', 
                'foto_toko'=>'foto_toko_6.jpg',
                'id_user'=>16,
                'id_kota'=>152,
                'rata_rating'=>0,
                'jml_transaksi_berhasil'=>0,
                'jml_transaksi_batal'=>0
            ],
            [
                'username_toko'=>'ikan_abadi', 
                'name'=>'Toko Ikan Abadi', 
                'foto_toko'=>'foto_toko_7.jpg',
                'id_user'=>20,
                'id_kota'=>152,
                'rata_rating'=>0,
                'jml_transaksi_berhasil'=>0,
                'jml_transaksi_batal'=>0
            ],
        ];
        \DB::table('tokos')->insert($data);
    }
}
