<?php

use App\Http\Controllers\dataJenazahController;
use App\Http\Controllers\DataPeziarahController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\tokenController;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ZiarahForm;
use App\Imports\JenazahImport;
use App\Models\Jenazah;
use App\Models\Peziarah;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

// ini_set('max_execution_time', 150 * 2);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ZiarahForm::class)->name('daftar');
Route::get('/kirim-email/{peziarah_id}', [MailController::class,  'kirimEmail'])->name('kirim_email');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/data-peziarah', [DataPeziarahController::class, 'index'])->name('dataPeziarah');

    Route::get('/dashboard', function () {
        return view('layouts.admin.dashboard');
    })->name('dashboard');

    Route::get(
        '/data-jenazah',
        [dataJenazahController::class, 'index']
    )->name('dataJenazah');

    //Tambah Jenazah
    Route::get(
        '/data-jenazah/tambah',
        [dataJenazahController::class, 'create']
    )->name('tambahJenazah');
    Route::post('/data-jenazah/post', [dataJenazahController::class, 'post']);

    //Edit Jenazah
    Route::get(
        '/data-jenazah/{id}/ubah',
        [dataJenazahController::class, 'ubah']
    )->name('editJenazah');
    Route::post('/data-jenazah/{id}/edit', [dataJenazahController::class, 'edit']);

    //Hapus Jenazah
    Route::get('/data-jenazah/{id}/hapus', [dataJenazahController::class, 'hapus']);

    //Token
    Route::get(
        '/token',
        [tokenController::class, 'index']
    )->name('token');

    //Edit Token
    Route::get(
        '/token/{id}/ubah',
        [tokenController::class, 'ubah']
    )->name('editToken');
    Route::post('/token/{id}/edit', [tokenController::class, 'edit']);


    Route::get('/import', function () {

        ini_set('max_execution_time', 300);

        // DB::table('jenazah')->delete();

        $data = Excel::toArray(new JenazahImport, storage_path('/app/MACANDA GROUP.xlsx'));
        $index = 0;

        foreach ($data[0] as $jenazah) {

            if ($index === 0) {
                $index++;
                continue;
            }

            try {

                // mencari apakah data sudah ada di dalam database
                $isExists = Jenazah::where([
                    ['blok', '=', $jenazah[0]],
                    ['nama', '=', $jenazah[1]],
                    ['alamat', '=', $jenazah[5]],
                ])->get();

                // jika data belum ada maka tambahkan data
                if (count($isExists) === 0) {

                    Jenazah::create([
                        'blok'  =>  $jenazah[0],
                        'nama' => $jenazah[1],
                        'tgl_lahir' => $jenazah[2],
                        'tgl_wafat' => $jenazah[3],
                        'alamat' => $jenazah[5],
                        'agama'   =>  $jenazah[4],
                        'rumah_sakit'   =>  $jenazah[8],
                        'tpk'   =>  $jenazah[9]
                    ]);

                    // ...
                }

                // ...
            } catch (\Exception $e) {


                // ...
            }

            // ...
        }

        return back();

        // ...
    })->name('import-jenazah');

    // ...
});
