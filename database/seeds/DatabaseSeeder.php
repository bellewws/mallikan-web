<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KategoriProduksTableSeeder::class);
        $this->call(JenisProduksTableSeeder::class);
        $this->call(TokosTableSeeder::class);
        $this->call(ProduksTableSeeder::class);
        $this->call(StatusPembeliansTableSeeder::class);
        $this->call(TransaksisTableSeeder::class);
        $this->call(PembayaransTableSeeder::class);
        $this->call(AlamatsTableSeeder::class);
        $this->call(CouriersTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(LinRegSeeder::class);

    }
}
