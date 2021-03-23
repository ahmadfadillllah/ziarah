<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ZiarahForm;
use App\Models\Jenazah;
use App\Models\Peziarah;
use App\Models\TanggalZiarah;
use App\Models\WaktuZiarah;
use Database\Seeders\TanggalSeeder;
use Database\Seeders\WaktuSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ZiarahFormTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed WaktuSeeder');
        $this->artisan('db:seed TanggalSeeder');

        // ...
    }

    /** @test */
    public function user_bisa_mendaftar_sebagai_peziarah()
    {
        $jenazah = Jenazah::factory()->create();

        dd(Jenazah::all()->count());

        $zForm = Livewire::test(ZiarahForm::class);

        $tanggal_dipilih = TanggalZiarah::find(1);

        $tanggal_dipilih->waktu()->attach(1);

        $j_el = ['pria', 'wanita'];

        $peziarah  = Peziarah::factory()->make([
            'jenazah_id'    =>  $jenazah->id
        ]);

        $zForm->set('nama', $peziarah->nama);
        $zForm->set('jenis_kelamin', $j_el[rand(0, 1)]);
        $zForm->set('email', $peziarah->email);
        $zForm->set('no_hp', $peziarah->no_hp);

        $zForm->set('tanggal_dipilih', $tanggal_dipilih->id);
        $zForm->set('waktu_dipilih', 1);

        $zForm->call('simpan');

        // ...
    }

    // ...
}
