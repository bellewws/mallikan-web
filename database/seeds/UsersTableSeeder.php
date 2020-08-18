<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $data = [
            [
                'name'=>'Admin', 
                'email'=>'admin@admin.com', 
                'password'=>bcrypt('adminadmin'),
                'user_role'=>1,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],
            [
                'name'=>'Ipah', 
                'email'=>'ipah@gmail.com', 
                'password'=>bcrypt('ipah1234'),
                'user_role'=>2,
                'boolean_penjual'=>1,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],
            [
                'name'=>'Ruhyadi', 
                'email'=>'ruhyadi@gmail.com', 
                'password'=>bcrypt('ruhyadi1234'),
                'user_role'=>2,
                'boolean_penjual'=>1,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],
            [
                'name'=>'Asymala', 
                'email'=>'asymalapsari@gmail.com', 
                'password'=>bcrypt('asymala1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],
            [
                'name'=>'Priska', 
                'email'=>'priskaputri15@gmail.com', 
                'password'=>bcrypt('priska1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],
            [
                'name'=>'Rizkyta', 
                'email'=>'rizrab15@gmail.com', 
                'password'=>bcrypt('rizkyta1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],
            [
                'name'=>'Nadiah Tsamara', 
                'email'=>'nadiah@gmail.com', 
                'password'=>bcrypt('nadiah1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],
            [
                'name'=>'Rafi Nugroho', 
                'email'=>'rafi@gmail.com', 
                'password'=>bcrypt('rafi1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Reza Pahlevi', 
                'email'=>'reza@gmail.com', 
                'password'=>bcrypt('reza1234'),
                'user_role'=>2,
                'boolean_penjual'=>1,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Deliana', 
                'email'=>'delianapsari@gmail.com', 
                'password'=>bcrypt('deliana1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Abdullah Khalid', 
                'email'=>'abdullah@gmail.com', 
                'password'=>bcrypt('abdullah1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Adityo Bagas', 
                'email'=>'adityo@gmail.com', 
                'password'=>bcrypt('adityo1234'),
                'user_role'=>2,
                'boolean_penjual'=>1,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Akli Hakiki', 
                'email'=>'akli@gmail.com', 
                'password'=>bcrypt('akli1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Andi Makkasau', 
                'email'=>'andi@gmail.com', 
                'password'=>bcrypt('andi1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Dimas Rama', 
                'email'=>'dimas@gmail.com', 
                'password'=>bcrypt('dimas1234'),
                'user_role'=>2,
                'boolean_penjual'=>1,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Dzaki', 
                'email'=>'dzaki@gmail.com', 
                'password'=>bcrypt('dzaki1234'),
                'user_role'=>2,
                'boolean_penjual'=>1,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Fakhirah Maharani', 
                'email'=>'fakhirah@gmail.com', 
                'password'=>bcrypt('fakhirah'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Gita Diaz', 
                'email'=>'gita@gmail.com', 
                'password'=>bcrypt('gita1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Hizkia Robinsar', 
                'email'=>'hizkia@gmail.com', 
                'password'=>bcrypt('hizkia1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Guntur Januar', 
                'email'=>'guntur@gmail.com', 
                'password'=>bcrypt('guntur1234'),
                'user_role'=>2,
                'boolean_penjual'=>1,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Ikhsan Solihin', 
                'email'=>'ikhsan@gmail.com', 
                'password'=>bcrypt('ikhsan1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Irfan Ahmad', 
                'email'=>'irfan@gmail.com', 
                'password'=>bcrypt('irfan1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Jack Martin', 
                'email'=>'jack@gmail.com', 
                'password'=>bcrypt('jack1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Jallu Ramadhan', 
                'email'=>'jallu@gmail.com', 
                'password'=>bcrypt('jallu1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Maulida Nuzulia', 
                'email'=>'maulida@gmail.com', 
                'password'=>bcrypt('maulida1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'M Rafly', 
                'email'=>'rafly@gmail.com', 
                'password'=>bcrypt('rafly1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'M Adhi', 
                'email'=>'adhi@gmail.com', 
                'password'=>bcrypt('adhi1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Nadia Nurul', 
                'email'=>'nadia@gmail.com', 
                'password'=>bcrypt('nadia1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Rio Anggara', 
                'email'=>'rio@gmail.com', 
                'password'=>bcrypt('rio1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Robby Kurnia', 
                'email'=>'robby@gmail.com', 
                'password'=>bcrypt('robby1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Siti Nurdiana', 
                'email'=>'diana@gmail.com', 
                'password'=>bcrypt('diana1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Siti Sarah', 
                'email'=>'sarah@gmail.com', 
                'password'=>bcrypt('sarah1234'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],[
                'name'=>'Vidy Ayuningtyas', 
                'email'=>'vidy@gmail.com', 
                'password'=>bcrypt('vidy'),
                'user_role'=>2,
                'boolean_penjual'=>0,
                'no_kontak'=>'081807879100',
                'jml_transaksi'=>0
            ],

        ];
        \DB::table('users')->insert($data);
    }
}
