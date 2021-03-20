<?php

use App\Http\Livewire\ZiarahForm;
use App\Imports\JenazahImport;
use App\Models\Jenazah;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/import', function () {

    $data = Excel::toArray(new JenazahImport, storage_path('/app/MACANDA GROUP.xlsx'));
    $index = 0;

    foreach ($data[0] as $jenazah) {

        if ($index === 0) {
            $index++;
            continue;
        }

        Jenazah::create([
            'nama' => $jenazah[1],
        ]);

        // ...
    }

    // ...
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
