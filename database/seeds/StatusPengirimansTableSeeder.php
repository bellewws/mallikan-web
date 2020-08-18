<?php

use Illuminate\Database\Seeder;

class StatusPengirimansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pengirimans')->delete();
        $data = [
            [
                'status' => 'Kirim Sekarang'
            ],
            [
                'status' => 'Kirim Nanti'
            ],
        ];
        \DB::table('status_pengirimans')->insert($data);
    }
}
