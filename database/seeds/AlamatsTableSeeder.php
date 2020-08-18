<?php

use Illuminate\Database\Seeder;

class AlamatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alamat_users')->delete();
        $data = [
            //nadiah
            [
                'id_user' => 7,
                'id_provinces' => 6,
                'id_cities' => 151,
                'kecamatan' => 'Kebon Jeruk',
                'kelurahan' => 'Duri Kepa',
                'alamat' => 'Jl. Mawar no. 46',
                'kodepos' => '11530',
            ],
            //priska
            [
                'id_user' => 5,
                'id_provinces' => 6,
                'id_cities' => 155,
                'kecamatan' => 'Pademangan',
                'kelurahan' => 'Ancol',
                'alamat' => 'Jl. Mushola no. 133',
                'kodepos' => '14410',
            ],
            //rizkyta
            [
                'id_user' => 6,
                'id_provinces' => 6,
                'id_cities' => 154,
                'kecamatan' => 'Kramat Jati',
                'kelurahan' => 'Baru Ampar',
                'alamat' => 'Jl. Apel no. 131',
                'kodepos' => '13520',
            ],
            //jallu
            [
                'id_user' => 24,
                'id_provinces' => 6,
                'id_cities' => 154,
                'kecamatan' => 'Pasar Rebo',
                'kelurahan' => 'Kalisari',
                'alamat' => 'Jl. SMA 98 no. 80',
                'kodepos' => '13790',
            ],
            //robby
            [
                'id_user' => 30,
                'id_provinces' => 6,
                'id_cities' => 154,
                'kecamatan' => 'Jagakarsa',
                'kelurahan' => 'Jagakarsa',
                'alamat' => 'Jl. Buntu no. 131',
                'kodepos' => '12620',
            ],
            //reza
            [
                'id_user' => 9,
                'id_provinces' => 6,
                'id_cities' => 153,
                'kecamatan' => 'Duren Sawit ',
                'kelurahan' => 'Duren Sawit',
                'alamat' => 'Jl. Agung no. 12',
                'kodepos' => '13440',
            ],
            //rafi
            [
                'id_user' => 8,
                'id_provinces' => 6,
                'id_cities' => 152,
                'kecamatan' => 'Duren Sawit',
                'kelurahan' => 'Duren Sawit',
                'alamat' => 'Jl. Agung no. 41',
                'kodepos' => '13440',
            ],
            //mala
            [
                'id_user' => 4,
                'id_provinces' => 6,
                'id_cities' => 153,
                'kecamatan' => 'Ciracas',
                'kelurahan' => 'Cibubur',
                'alamat' => 'Jl. Bulak Ringin no. 47',
                'kodepos' => '13720',
            ],
            //deliana
            [
                'id_user' => 10,
                'id_provinces' => 6,
                'id_cities' => 152,
                'kecamatan' => 'Menteng',
                'kelurahan' => 'Cikini',
                'alamat' => 'Jl. Melati no. 81',
                'kodepos' => '10330',
            ],
            //maulida
            [
                'id_user' => 25,
                'id_provinces' => 6,
                'id_cities' => 189,
                'kecamatan' => 'Jagakarsa',
                'kelurahan' => 'Jagakarsa',
                'alamat' => 'Jl. Buntu no. 131',
                'kodepos' => '12620',
            ],
        ];
        \DB::table('alamat_users')->insert($data);
    }
}
