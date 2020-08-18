<?php

use Illuminate\Database\Seeder;

class ProduksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->delete();
        $data = [
            [
                'id_kategori' => 1,
                'id_jenis' => 1,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan bandeng berupa ikan beku',
                'foto_produk' => 'bandeng.png',
                'jumlah_stok' => 10000,
                'harga' => 25000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 7,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan kakap berupa ikan beku',
                'foto_produk' => 'kakap.jpg',
                'jumlah_stok' => 50000,
                'harga' => 25000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 2,
                'id_jenis' => 4,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Cumi-cumi berupa ikan beku',
                'foto_produk' => 'cumi.jpg',
                'jumlah_stok' => 5000,
                'harga' => 65000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 2,
                'id_jenis' => 4,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Cumi-cumi beku',
                'foto_produk' => 'cumi.jpg',
                'jumlah_stok' => 5000,
                'harga' => 65500,
                'terjual' => 0
            ],
            [
                'id_kategori' => 3,
                'id_jenis' => 18,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Udang beku',
                'foto_produk' => 'udang.jpg',
                'jumlah_stok' => 9000,
                'harga' => 67000,
                'terjual' => 0
            ],

            // bandeng
            [
                'id_kategori' => 1,
                'id_jenis' => 1,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan bandeng dengan harga lebih murah',
                'foto_produk' => 'bandeng1.jpg',
                'jumlah_stok' => 10000,
                'harga' => 24500,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 1,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Ikan bandeng dengan harga lebih murah',
                'foto_produk' => 'bandeng2.jpg',
                'jumlah_stok' => 10000,
                'harga' => 25500,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 1,
                'id_toko' => 4,
                'id_user' => 12,
                'deskripsi' => 'Ikan bandeng dengan harga lebih murah',
                'foto_produk' => 'bandeng3.jpg',
                'jumlah_stok' => 10000,
                'harga' => 26000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 1,
                'id_toko' => 5,
                'id_user' => 15,
                'deskripsi' => 'Ikan bandeng dengan harga lebih murah',
                'foto_produk' => 'bandeng4.jpg',
                'jumlah_stok' => 5000,
                'harga' => 25000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 1,
                'id_toko' => 6,
                'id_user' => 16,
                'deskripsi' => 'Ikan bandeng dengan harga lebih murah',
                'foto_produk' => 'bandeng5.jpg',
                'jumlah_stok' => 10000,
                'harga' => 24000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 1,
                'id_toko' => 7,
                'id_user' => 20,
                'deskripsi' => 'Ikan bandeng dengan harga lebih murah',
                'foto_produk' => 'bandeng.png',
                'jumlah_stok' => 10000,
                'harga' => 23000,
                'terjual' => 0

            ],
            //bawal laut
            [
                'id_kategori' => 1,
                'id_jenis' => 2,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan bawal dengan harga lebih murah',
                'foto_produk' => 'bawal.jpg',
                'jumlah_stok' => 10000,
                'harga' => 47000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 2,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan bawal dengan harga lebih murah',
                'foto_produk' => 'bawallaut.jpg',
                'jumlah_stok' => 10000,
                'harga' => 45000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 2,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Ikan bawal dengan harga lebih murah',
                'foto_produk' => 'bawallaut2.jpg',
                'jumlah_stok' => 10000,
                'harga' => 46000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 2,
                'id_toko' => 4,
                'id_user' => 12,
                'deskripsi' => 'Ikan bawal dengan harga lebih murah',
                'foto_produk' => 'bawallaut3.jpg',
                'jumlah_stok' => 10000,
                'harga' => 47000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 2,
                'id_toko' => 5,
                'id_user' => 15,
                'deskripsi' => 'Ikan bawal dengan harga lebih murah',
                'foto_produk' => 'bawallaut4.jpg',
                'jumlah_stok' => 10000,
                'harga' => 46500,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 2,
                'id_toko' => 6,
                'id_user' => 16,
                'deskripsi' => 'Ikan bawal dengan harga lebih murah',
                'foto_produk' => 'bawallaut5.jpg',
                'jumlah_stok' => 10000,
                'harga' => 45000,
                'terjual' => 0

            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 2,
                'id_toko' => 7,
                'id_user' => 20,
                'deskripsi' => 'Ikan bawal dengan harga lebih murah',
                'foto_produk' => 'bawal.jpg',
                'jumlah_stok' => 10000,
                'harga' => 46000,
                'terjual' => 0

            ],
            //bawal tawar
            // [
            //     'id_kategori' => 1,
            //     'id_jenis' => 3,
            //     'id_toko' => 1,
            //     'id_user' => 2,
            //     'deskripsi' => 'Ikan bawal tawar segar',
            //     'foto_produk' => 'bawaltawar.jpg',
            //     'jumlah_stok' => 10000,
            //     'harga' => 17000,
            //     'terjual' => 0

            // ],
            // [
            //     'id_kategori' => 1,
            //     'id_jenis' => 3,
            //     'id_toko' => 2,
            //     'id_user' => 3,
            //     'deskripsi' => 'Ikan bawal tawar segar',
            //     'foto_produk' => 'bawaltawar2.jpg',
            //     'jumlah_stok' => 10000,
            //     'harga' => 16000,
            //     'terjual' => 0

            // ],
            // [
            //     'id_kategori' => 1,
            //     'id_jenis' => 3,
            //     'id_toko' => 3,
            //     'id_user' => 9,
            //     'deskripsi' => 'Ikan bawal tawar segar',
            //     'foto_produk' => 'bawaltawar3.jpg',
            //     'jumlah_stok' => 10000,
            //     'harga' => 15000,
            //     'terjual' => 0

            // ],

            //baronang
            [
                'id_kategori' => 1,
                'id_jenis' => 3,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan baronang segar',
                'foto_produk' => 'baronang.jpg',
                'jumlah_stok' => 10000,
                'harga' => 45000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 3,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan baronang segar',
                'foto_produk' => 'baronang2.png',
                'jumlah_stok' => 10000,
                'harga' => 46000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 3,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Ikan baronang segar',
                'foto_produk' => 'baronang3.jpg',
                'jumlah_stok' => 10000,
                'harga' => 45500,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 3,
                'id_toko' => 4,
                'id_user' => 12,
                'deskripsi' => 'Ikan baronang segar',
                'foto_produk' => 'baronang4.jpg',
                'jumlah_stok' => 10000,
                'harga' => 46000,
                'terjual' => 0
            ],
            //cumi cumi
            [
                'id_kategori' => 2,
                'id_jenis' => 4,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Cumi-cumi segar',
                'foto_produk' => 'cumi2.jpg',
                'jumlah_stok' => 10000,
                'harga' => 63000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 2,
                'id_jenis' => 4,
                'id_toko' => 4,
                'id_user' => 12,
                'deskripsi' => 'Cumi-cumi segar',
                'foto_produk' => 'cumi3.jpg',
                'jumlah_stok' => 10000,
                'harga' => 62000,
                'terjual' => 0
            ],
            // ekor kuning
            [
                'id_kategori' => 1,
                'id_jenis' => 5,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan ekor kuning segar',
                'foto_produk' => 'ekuning.jpg',
                'jumlah_stok' => 10000,
                'harga' => 30000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 5,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan ekor kuning segar',
                'foto_produk' => 'ekuning2.webp',
                'jumlah_stok' => 10000,
                'harga' => 29000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 5,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Ikan ekor kuning segar',
                'foto_produk' => 'ekuning3.png',
                'jumlah_stok' => 10000,
                'harga' => 30500,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 5,
                'id_toko' => 4,
                'id_user' => 12,
                'deskripsi' => 'Ikan ekor kuning segar',
                'foto_produk' => 'ekuning4.jpg',
                'jumlah_stok' => 10000,
                'harga' => 31000,
                'terjual' => 0
            ],
            //kakap
            [
                'id_kategori' => 1,
                'id_jenis' => 6,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan kakap segar',
                'foto_produk' => 'kakap.jpg',
                'jumlah_stok' => 10000,
                'harga' => 50000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 6,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan kakap segar',
                'foto_produk' => 'kakap2.jpg',
                'jumlah_stok' => 10000,
                'harga' => 49000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 6,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Ikan kakap segar',
                'foto_produk' => 'kakap3.jpg',
                'jumlah_stok' => 10000,
                'harga' => 50500,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 6,
                'id_toko' => 4,
                'id_user' => 12,
                'deskripsi' => 'Ikan kakap segar',
                'foto_produk' => 'kakap4.jpg',
                'jumlah_stok' => 10000,
                'harga' => 50000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 6,
                'id_toko' => 5,
                'id_user' => 15,
                'deskripsi' => 'Ikan kakap segar',
                'foto_produk' => 'kakap5.jpg',
                'jumlah_stok' => 10000,
                'harga' => 48000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 6,
                'id_toko' => 6,
                'id_user' => 16,
                'deskripsi' => 'Ikan kakap segar',
                'foto_produk' => 'kakap6.jpg',
                'jumlah_stok' => 10000,
                'harga' => 51000,
                'terjual' => 0
            ],

            //ayam ayam
            [
                'id_kategori' => 1,
                'id_jenis' => 7,
                'id_toko' => 6,
                'id_user' => 16,
                'deskripsi' => 'Ikan ayam ayam segar',
                'foto_produk' => 'kakap6.jpg',
                'jumlah_stok' => 10000,
                'harga' => 20000,
                'terjual' => 0
            ],

            //kembung
            [
                'id_kategori' => 1,
                'id_jenis' => 8,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan kembung segar',
                'foto_produk' => 'kembung.jpg',
                'jumlah_stok' => 10000,
                'harga' => 28000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 8,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan kembung segar',
                'foto_produk' => 'kembung2.jpg',
                'jumlah_stok' => 10000,
                'harga' => 27000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 8,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Ikan kembung segar',
                'foto_produk' => 'kembung3.jpg',
                'jumlah_stok' => 10000,
                'harga' => 29000,
                'terjual' => 0
            ],

            //kuwe
            [
                'id_kategori' => 1,
                'id_jenis' => 9,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan kuwe segar',
                'foto_produk' => 'kuwe.jpg',
                'jumlah_stok' => 10000,
                'harga' => 33000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 9,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan kuwe segar',
                'foto_produk' => 'kuwe2.jpeg',
                'jumlah_stok' => 10000,
                'harga' => 30000,
                'terjual' => 0
            ],

            //krapu
            [
                'id_kategori' => 1,
                'id_jenis' => 10,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan krapu segar',
                'foto_produk' => 'krapu.jpeg',
                'jumlah_stok' => 10000,
                'harga' => 28000,
                'terjual' => 0
            ],

            //layang
            [
                'id_kategori' => 1,
                'id_jenis' => 11,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan layang segar',
                'foto_produk' => 'layang.webp',
                'jumlah_stok' => 10000,
                'harga' => 19000,
                'terjual' => 0
            ],

            // layur
            [
                'id_kategori' => 1,
                'id_jenis' => 12,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan layur segar',
                'foto_produk' => 'layur.jpg',
                'jumlah_stok' => 10000,
                'harga' => 30000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 12,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan layur segar',
                'foto_produk' => 'layur2.jpg',
                'jumlah_stok' => 10000,
                'harga' => 31000,
                'terjual' => 0
            ],

            // selar
            [
                'id_kategori' => 1,
                'id_jenis' => 13,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan selar segar',
                'foto_produk' => 'selar.jpg',
                'jumlah_stok' => 10000,
                'harga' => 20000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 13,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan selar segar',
                'foto_produk' => 'selar2.jpg',
                'jumlah_stok' => 10000,
                'harga' => 21000,
                'terjual' => 0
            ],

            //sotong
            [
                'id_kategori' => 2,
                'id_jenis' => 14,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Sontong beku',
                'foto_produk' => 'sontong.webp',
                'jumlah_stok' => 5000,
                'harga' => 32000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 2,
                'id_jenis' => 14,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Sontong beku',
                'foto_produk' => 'sontong2.jpg',
                'jumlah_stok' => 5000,
                'harga' => 33000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 2,
                'id_jenis' => 14,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Sontong beku',
                'foto_produk' => 'sontong3.jpg',
                'jumlah_stok' => 5000,
                'harga' => 32000,
                'terjual' => 0
            ],

            //salem
            [
                'id_kategori' => 1,
                'id_jenis' => 15,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan salem segar',
                'foto_produk' => 'salem.jpg',
                'jumlah_stok' => 10000,
                'harga' => 20000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 15,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan salem segar',
                'foto_produk' => 'salem2.jpg',
                'jumlah_stok' => 10000,
                'harga' => 19000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 15,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Ikan salem segar',
                'foto_produk' => 'salem3.webp',
                'jumlah_stok' => 10000,
                'harga' => 19000,
                'terjual' => 0
            ],
            //tenggiri
            [
                'id_kategori' => 1,
                'id_jenis' => 16,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan tenggiri segar',
                'foto_produk' => 'tenggiri.jpeg',
                'jumlah_stok' => 15000,
                'harga' => 55000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 16,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan tenggiri segar',
                'foto_produk' => 'tenggiri2.jpeg',
                'jumlah_stok' => 10000,
                'harga' => 56000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 16,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Ikan tenggiri segar',
                'foto_produk' => 'tenggiri3.jpg',
                'jumlah_stok' => 13000,
                'harga' => 55000,
                'terjual' => 0
            ],

            //tongkol
            [
                'id_kategori' => 1,
                'id_jenis' => 17,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Ikan tongkol segar',
                'foto_produk' => 'tongkol.jpg',
                'jumlah_stok' => 15000,
                'harga' => 21000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 17,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Ikan tongkol segar',
                'foto_produk' => 'tongkol2.jpg',
                'jumlah_stok' => 15000,
                'harga' => 21500,
                'terjual' => 0
            ],
            [
                'id_kategori' => 1,
                'id_jenis' => 17,
                'id_toko' => 3,
                'id_user' => 9,
                'deskripsi' => 'Ikan tongkol segar',
                'foto_produk' => 'tongkol3.jpg',
                'jumlah_stok' => 15000,
                'harga' => 22000,
                'terjual' => 0
            ],

            //udang
            [
                'id_kategori' => 3,
                'id_jenis' => 18,
                'id_toko' => 1,
                'id_user' => 2,
                'deskripsi' => 'Udang segar',
                'foto_produk' => 'udang.jpg',
                'jumlah_stok' => 5000,
                'harga' => 67000,
                'terjual' => 0
            ],
            [
                'id_kategori' => 3,
                'id_jenis' => 18,
                'id_toko' => 2,
                'id_user' => 3,
                'deskripsi' => 'Udang segar',
                'foto_produk' => 'udang2.jpg',
                'jumlah_stok' => 5000,
                'harga' => 65000,
                'terjual' => 0
            ],
            
            
        ];
        \DB::table('produks')->insert($data);
    }
}
