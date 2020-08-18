<?php

use Illuminate\Database\Seeder;

class PembayaransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pembayarans')->delete();
        $data = [
            [
                'nomor'=>'081807879100',
                'foto'=>'barcode.jpeg' 
            ],
        ];
        \DB::table('pembayarans')->insert($data);
    }
}
