<?php

use Illuminate\Database\Seeder;

class StatusPembeliansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pembelians')->delete();
        $data = [
            [
                'status' => 'Keranjang'
            ],
            [
                'status' => 'Menunggu Konfirmasi Admin'
            ],
            [
                'status' => 'Menunggu Proses dari Penjual'
            ],
            [
                'status' => 'Sedang Diproses'
            ],
            [
                'status' => 'Dikirim'
            ],
            [
                'status' => 'Telah Diterima Pembeli'
            ],
            [
                'status' => 'Pembayaran dibatalkan'
            ],
            [
                'status' => 'Dibatalkan Pembeli'
            ],
            [
                'status' => 'Menunggu Pembayaran'
            ],
            [
                'status' => 'Sudah Ditransfer'
            ],
        ];
        \DB::table('status_pembelians')->insert($data);
    }
}
