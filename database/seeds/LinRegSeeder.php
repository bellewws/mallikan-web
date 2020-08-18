<?php

use Illuminate\Database\Seeder;
use App\HistoriHarga;

class LinRegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id_produk'=>1,
                'harga_produk'=>30000,
                'tanggal_harga'=>'2019-01-01',
            ],
            [
                'id_produk'=>1,
                'harga_produk'=>30000,
                'tanggal_harga'=>'2019-01-02',
            ],
            [
                'id_produk'=>1,
                'harga_produk'=>27000,
                'tanggal_harga'=>'2019-01-03',
            ],
            [
                'id_produk'=>2,
                'harga_produk'=>50000,
                'tanggal_harga'=>'2019-01-01',
            ],
            [
                'id_produk'=>2,
                'harga_produk'=>50000,
                'tanggal_harga'=>'2019-01-02',
            ],
            [
                'id_produk'=>2,
                'harga_produk'=>48000,
                'tanggal_harga'=>'2019-01-03',
            ],
            [
                'id_produk'=>3,
                'harga_produk'=>50000,
                'tanggal_harga'=>'2019-01-01',
            ],
            [
                'id_produk'=>3,
                'harga_produk'=>50000,
                'tanggal_harga'=>'2019-01-02',
            ],
            [
                'id_produk'=>3,
                'harga_produk'=>45000,
                'tanggal_harga'=>'2019-01-03',
            ],
        ];
        HistoriHarga::insert($data);
    }
}
