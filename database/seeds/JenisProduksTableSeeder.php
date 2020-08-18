<?php

use Illuminate\Database\Seeder;

class JenisProduksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_produks')->delete();
        $data = [
            [
                'jenis' => 'ikan bandeng',
                'id_kategori' => 1 ,
                'foto_jenis' => 'bandeng.png'
            ],
            [
                'jenis' => 'ikan bawal laut',
                'id_kategori' => 1 ,
                'foto_jenis' => 'bawal.jpg'
            ],
            // [
            //     'jenis' => 'ikan bawal tawar',
            //     'id_kategori' => 1 ,
            //     'foto_jenis' => 'bawal.jpg'
            // ],
            [
                'jenis' => 'ikan baronang',
                'id_kategori' => 1 ,
                'foto_jenis' => 'baronang.png'
            ],
            [
                'jenis' => 'cumi cumi',
                'id_kategori' => 2 ,
                'foto_jenis' => 'cumi.jpg'
            ],
            [
                'jenis' => 'ikan ekor kuning',
                'id_kategori' => 1 ,
                'foto_jenis' => 'ekor-kuning.png'
            ],
            [
                'jenis' => 'ikan kakap',
                'id_kategori' => 1 ,
                'foto_jenis' => 'kakap.png'
            ],
            [
                'jenis' => 'ikan ayam ayam',
                'id_kategori' => 1 ,
                'foto_jenis' => 'ayamayam.jpg'
            ],
            [
                'jenis' => 'ikan kembung',
                'id_kategori' => 1 ,
                'foto_jenis' => 'kembung (1).jpg'
            ],
            [
                'jenis' => 'ikan kuwe',
                'id_kategori' => 1 ,
                'foto_jenis' => 'kuwe.png'
            ],
            [
                'jenis' => 'ikan krapu',
                'id_kategori' => 1 ,
                'foto_jenis' => 'kerapu.jpg'
            ],
            [
                'jenis' => 'ikan layang',
                'id_kategori' => 1 ,
                'foto_jenis' => 'layang.jpg'
            ],
            [
                'jenis' => 'ikan layur',
                'id_kategori' => 1 ,
                'foto_jenis' => 'layur.jpg'
            ],
            [
                'jenis' => 'ikan selar',
                'id_kategori' => 1 ,
                'foto_jenis' => 'selar.jpg'
            ],
            [
                'jenis' => 'sontong',
                'id_kategori' => 2 ,
                'foto_jenis' => 'sontong.png'
            ],
            [
                'jenis' => 'ikan salem',
                'id_kategori' => 1 ,
                'foto_jenis' => 'salem.jpg'
            ],
            // [
            //     'jenis' => 'Teri',
            //     'id_kategori' => 1 ,
            //     'foto_jenis' => 'asd' //blm ada
            // ],
            [
                'jenis' => 'ikan tenggiri',
                'id_kategori' => 1 ,
                'foto_jenis' => 'tenggiri.jpg'
            ],
            [
                'jenis' => 'ikan tongkol',
                'id_kategori' => 1 ,
                'foto_jenis' => 'tongkol.jpg'
            ],
            [
                'jenis' => 'udang',
                'id_kategori' => 3 ,
                'foto_jenis' => 'udang.jpg'
            ],
            // [
            //     'jenis' => 'Kepiting',
            //     'id_kategori' => 4 ,
            //     'foto_jenis' => 'asd'
            // ],

        ];
        \DB::table('jenis_produks')->insert($data);
    }
}
