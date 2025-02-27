<?php
use App\Http\Controllers\ShiftPenyiaranController;
use App\Http\Controllers\DataSiaran;
use App\Http\Controllers\PenyiarController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('layouts.template');



Route::middleware('auth')->group(function () {
    // Route::get('/dashboard')
    Route::get('/penyiar', [PenyiarController::class, 'index'])->name('penyiar.index');
    Route::get('/penyiar', [PenyiarController::class, 'index'])->name('penyiar.index');
    Route::post('/penyiar', [PenyiarController::class, 'store'])->name('penyiar.store');
    Route::get('/penyiar/{penyiar}/edit', [PenyiarController::class, 'edit'])->name('penyiar.edit');
    Route::get('/penyiar/{id}/edit', [PenyiarController::class, 'edit'])->name('penyiar.edit');// Tambahkan ini!
    Route::put('/penyiar/{penyiar}', [PenyiarController::class, 'update'])->name('penyiar.update');
    Route::get('/penyiar', [PenyiarController::class, 'index'])->name('penyiar.index');


    // Route untuk menampilkan form tambah penyiar
    Route::get('/penyiar/create', [PenyiarController::class, 'create'])->name('penyiar.create');

    // Route untuk menyimpan penyiar baru
    Route::post('/penyiar', [PenyiarController::class, 'store'])->name('penyiar.store');
    Route::delete('/penyiar/{penyiar}', [PenyiarController::class, 'destroy'])->name('penyiar.destroy');

    //shift siaran
    Route::get('/shift_penyiaran', [ShiftPenyiaranController::class, 'index'])->name('shift_penyiaran');
    Route::get('tambah',[ShiftPenyiaranController::class,'create'])->name('shift_penyiaran.create');
    Route::post('tambah', [ShiftPenyiaranController::class, 'store'])->name('shift_penyiaran.store');
    Route::get('shift_penyiaran/{id}/edit', [ShiftPenyiaranController::class, 'edit'])->name('shift_penyiaran.edit');
    Route::put('shift_penyiaran/{id}', [ShiftPenyiaranController::class, 'update'])->name('shift_penyiaran.update');
    Route::get('/shift_penyiaran', [ShiftPenyiaranController::class, 'index'])->name('shift_penyiaran.index');
    Route::get('/shift_penyiaran/create', [ShiftPenyiaranController::class, 'create'])->name('shift_penyiaran.create');
    Route::post('/shift_penyiaran', [ShiftPenyiaranController::class, 'store'])->name('shift_penyiaran.store');
    Route::get('/shift_penyiaran/{id}/edit', [ShiftPenyiaranController::class, 'edit'])->name('shift_penyiaran.edit');
    Route::put('/shift_penyiaran/{id}', [ShiftPenyiaranController::class, 'update'])->name('shift_penyiaran.update');
    Route::delete('/shift_penyiaran/{id}', [ShiftPenyiaranController::class, 'destroy'])->name('shift_penyiaran.destroy');
    
    Route::get('/shift_penyiaran/rekap', [ShiftPenyiaranController::class, 'rekapShift'])->name('shift_penyiaran.rekap');
    Route::get('/rekap_shift', [ShiftPenyiaranController::class, 'rekapShift'])->name('shift_penyiaran.rekap');
    Route::get('/shift/tambah', [ShiftPenyiaranController::class, 'create'])->name('shift_penyiaran.create');

    //data siaran
    Route::get('/data_siaran',[DataSiaran::class,'index'])->name('data_siaran');
    Route::post('tambah_siaran',[DataSiaran::class,'store'])->name('data_siaran.store');
    Route::get('/data_siaran/{id}/edit', [DataSiaran::class, 'edit'])->name('data_siaran.edit');
    Route::post('/data-siaran/store', [DataSiaran::class, 'store'])->name('data_siaran.store');
    Route::get('/data-siaran/edit/{id}', [DataSiaran::class, 'edit'])->name('data_siaran.edit');
    Route::post('/data-siaran/update/{id}', [DataSiaran::class, 'update'])->name('data_siaran.update');
    Route::delete('/data-siaran/delete/{id}', [DataSiaran::class, 'destroy'])->name('data_siaran.destroy');
    Route::resource('data_siaran', DataSiaran::class);

    //Info Pro2
    Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
    Route::post('/programs', [ProgramController::class, 'store'])->name('programs.store');

    // profil
    Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
});

    
});

require __DIR__.'/auth.php';
