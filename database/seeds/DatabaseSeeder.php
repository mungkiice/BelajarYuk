<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(ProvinsiSeeder::class);
        $this->call(KabupatenSeeder::class);
        $this->call(KecamatanSeeder::class);
        $this->call(KelurahanSeeder::class);

        $this->call(BeritaSeeder::class);
        $this->call(KampanyeSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(PelajaranSeeder::class);
        $this->call(PertanyaanSeeder::class);

        $this->call(PenyelenggaraSeeder::class);
        $this->call(KegiatanSeeder::class);

        $this->call(PengajarSeeder::class);
        $this->call(KursusSeeder::class);
        $this->call(UlasanSeeder::class);
        $this->call(MengajarSeeder::class);
        $this->call(JawabanSeeder::class);
        $this->call(AktivitasSeeder::class);
    }
}
