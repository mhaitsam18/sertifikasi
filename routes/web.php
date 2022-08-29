<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaHomeController;
use App\Http\Controllers\MahasiswaPelatihanController;
use App\Http\Controllers\MahasiswaSertifikasiController;
use App\Http\Controllers\MahasiswaBeritaController;
use App\Http\Controllers\MahasiswaAcaraController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AdminPesertaController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminAcaraController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminDosenController;
use App\Http\Controllers\AdminSertifikatController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\DosenDashboardController;
use App\Http\Controllers\DosenAcaraController;
use App\Http\Controllers\InstrukturController;
use App\Http\Controllers\KelasAcaraController;
use App\Http\Controllers\JadwalAcaraController;
use App\Http\Controllers\FasilitasAcaraController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\MateriAcaraController;
use App\Http\Controllers\SertifikatController;

use App\Http\Controllers\FileController;
use App\Http\Controllers\KoordinatorNilaiController;
use App\Http\Controllers\MahasiswaNotifikasiController;

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

// Auth::routes();
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->middleware('admin');


//AUTH
Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name("index");
        Route::get('/login', 'login')->name("login");
        Route::post('/login', 'authenticate')->name("auth.authenticate");

        Route::prefix('registrasi')->group(function () {
            Route::get('/', 'registrasi')->name("auth.registrasi.index");
            Route::post('/', 'registrasi')->name("auth.registrasi.store");
            Route::get('/email-blur', 'emailBlur')->name("auth.registrasi.email-blur");
            Route::get('/email-focus', 'emailFocus')->name("auth.registrasi.email-focus");
            Route::put('/reset-password/{user}', 'resetPassword')->name("auth.registrasi.reset-password");
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name("auth.logout");
    Route::controller(HomeController::class)->group(function () {
        Route::get('/put-img', 'putImg')->name("home.put-img");
        Route::get('/home', 'index')->name('home.index');
        Route::post('/profil/edit/{user}', 'updateProfil')->name('home.profil.edit');
        Route::put('/profil/{user}', 'updateProfil')->name('home.profil.update');
        Route::put('/update-password/{user}', 'updatePassword')->name('home.update-password');
    });
    Route::controller(FileController::class)->group(function () {
        Route::get('/view', 'index')->name("file.index");
        Route::get('/get', 'getFile')->name("file.get");
    });

    Route::middleware('admin')->group(function () {
        Route::prefix('admin')->group(function () {
        });
        Route::prefix('dashboard')->group(function () {
            Route::get('/', function () {
                return view('admin.index', [
                    'title' => 'Dashboard',
                    'active' => 'home',
                ]);
            })->name("admin.index");

            Route::controller(AdminAcaraController::class)->group(function () {
                Route::prefix('acara')->group(function () {
                    Route::get('/', 'index')->name('admin.acara.index');
                    Route::post('/ubahStatus', 'ubahStatus')->name('admin.acara.ubah-status'); //URL SALAH
                    Route::get('/detail/{acara}', 'show')->name('admin.acara.show'); //URL SALAH
                    Route::get('/validasi', 'validasi')->name('admin.acara.validasi');
                });
            });
            Route::controller(AdminBeritaController::class)->group(function () {
                Route::prefix('berita')->group(function () {
                    Route::get('/', 'index')->name('admin.berita.index');
                    Route::get('/checkSlug', 'checkSlug')->name('admin.berita.check-slug'); //URL SALAH
                    Route::get('/publish/{berita:slug}', 'publish')->name('admin.berita.publish');
                    Route::get('/takedown/{berita:slug}', 'takedown')->name('admin.berita.takedown');
                    Route::post('/restore', 'restore')->name('admin.berita.restore');
                    Route::get('/{berita:slug}', 'show')->name('admin.berita.show');
                    Route::delete('/komentar/{komentarBerita}', 'hapusKomentar')->name('admin.berita.komentar.delete');
                });
            });

            Route::controller(AdminDashboardController::class)->group(function () {
                Route::get('/profil', 'index')->name("admin.profil");
            });
            Route::controller(AdminDosenController::class)->group(function () {
                Route::put('/userDosen', 'updateProfil')->name('admin.update-profil'); //URL SALAH
            });
            Route::controller(AdminPesertaController::class)->group(function () {
                Route::prefix('peserta')->group(function () {
                    Route::get('/', 'index')->name('admin.peserta.index');
                    Route::post('/berkas-show', 'berkasShow')->name('admin.peserta.berkas-show');
                    Route::post('/ubahStatus', 'ubahStatus')->name('admin.peserta.ubah-status'); //URL SALAH
                    Route::post('/getPembayaranById', 'getPembayaranById')->name('admin.peserta.get-pembayaran-by-id');

                    Route::get('/pembayaran', 'pembayaran')->name('admin.peserta.pembayaran');
                    Route::post('/pembayaran/validasi', 'validasi')->name('admin.peserta.pembayaran.validasi');
                });
            });
            Route::controller(AdminSertifikatController::class)->group(function () {
                Route::prefix('sertifikat')->group(function () {
                    Route::get('/', 'index')->name('admin.sertifikat.index');
                    Route::post('/isTake', 'isTake')->name('admin.sertifikat.is-take'); //URL SALAH
                    Route::get('/{acara}', 'list')->name('admin.sertifikat.list');
                });
            });
            Route::resource('/beritas', AdminBeritaController::class);
            Route::resource('/dosen', AdminDosenController::class);
        });
    });
    Route::middleware('mahasiswa')->group(function () {
        Route::prefix('mahasiswa')->group(function () {
            Route::controller(MahasiswaHomeController::class)->group(function () {
                Route::get('/', 'index')->name('mahasiswa.index');
                Route::get('/profil', 'profil')->name('mahasiswa.profil');
                Route::get('/edit', 'editProfil')->name('mahasiswa.profil.edit');
                Route::post('/edit/{mahasiswa}', 'update')->name('mahasiswa.profil.update'); //URL SALAH
            });
            Route::controller(MahasiswaNotifikasiController::class)->group(function () {
                Route::prefix('notifikasi')->group(function () {
                    Route::get('/', 'index')->name('mahasiswa.notifikasi.index');
                    Route::get('/read', 'read')->name('mahasiswa.notifikasi.read');
                    Route::post('/clear', 'clear')->name('mahasiswa.notifikasi.clear');
                    Route::get('/{notifikasi}', 'show')->name('mahasiswa.notifikasi.show');
                });
            });
        });
        Route::prefix('peserta')->group(function () {
            Route::controller(PesertaController::class)->group(function () {
                Route::get('/', 'index')->name('mahasiswa.peserta.index');
                Route::post('/', 'store')->name('mahasiswa.peserta.store');
                Route::get('/invoice', 'invoice')->name('mahasiswa.peserta.invoice');
                Route::get('/bayar', 'bayar')->name('mahasiswa.peserta.bayar');
                Route::post('/bayar', 'storeBayar')->name('mahasiswa.peserta.bayar.store');
                Route::get('/kelas/{kelasAcara}', 'kelas')->name('mahasiswa.peserta.kelas');
                Route::get('/histori', 'histori')->name('mahasiswa.peserta.histori');
            });
        });
    });
    Route::middleware('dosen')->group(function () {
        Route::prefix('dosen')->group(function () {
            Route::controller(DosenAcaraController::class)->group(function () {
                Route::get('/', 'index')->name('dosen.acara.index');
                Route::prefix('instruktur')->group(function () {
                    Route::get('/{acara}', 'instruktur')->name('dosen.acara.instruktur');
                    Route::post('/hapus', 'hapusInstruktur')->name('dosen.acara.instruktur.hapus');
                    Route::post('/tambah', 'tambahInstruktur')->name('dosen.acara.instruktur.tambah');
                }); //UNTUK DOSEN MEMILIH INSTRUKTUR ACARA
                Route::get('/peserta/{acara}', 'peserta')->name('dosen.acara.peserta');
            });
            Route::controller(DosenDashboardController::class)->group(function () {
                Route::get('/', 'index')->name('dosen.index');
                Route::get('/profil', 'profil')->name('dosen.profil');
                Route::get('/edit', 'editProfil')->name('dosen.edit');
                Route::put('/edit/{dosen}', 'update')->name('dosen.update'); //URL SALAH
                Route::get('/destroy/{user}', 'destroy')->name('dosen.destroy'); //URL SALAH
            });
        });
        Route::prefix('instruktur')->group(function () {
            Route::controller(InstrukturController::class)->group(function () {
                Route::get('/', 'index')->name('dosen.instruktur.index');
                Route::get('/list', 'list')->name('dosen.instruktur.list');
                Route::get('/acara/{acara}', 'acara')->name('dosen.instruktur.acara');
                Route::get('/jadwal/{kelas_acara}', 'jadwal')->name('dosen.instruktur.jadwal');
                Route::get('/peserta/{kelas_acara}', 'peserta')->name('dosen.instruktur.peserta');
                Route::get('/histori', 'histori')->name('dosen.instruktur.histori');
            });
            Route::controller(NilaiController::class)->group(function () {
                Route::put('/updateTanpaSertifikat/{nilai}', 'updateTanpaSertifikat')->name('dosen.instruktur.update-nilai-tanpa-sertifikat');
            });
            Route::resource('/nilai', NilaiController::class);
        });
        Route::prefix('koordinator')->group(function () {
            Route::get('/nilai', [KoordinatorNilaiController::class, 'index'])->name('dosen.koordinator.nilai.index');
            Route::resource('/sertifikat', SertifikatController::class)->middleware(['dosen']); //KOORDINATOR
        });
        Route::prefix('kaprodi')->group(function () {
            Route::controller(KaprodiController::class)->group(function () {
                Route::get('/', 'index')->name('dosen.kaprodi');
                Route::get('/index', 'index')->name('dosen.kaprodi.index');
                Route::get('/pelatihan', 'pelatihan')->name('dosen.kaprodi.pelatihan');
                Route::get('/sertifikasi', 'sertifikasi')->name('dosen.kaprodi.sertifikasi');
                Route::get('/histori', 'histori')->name('dosen.kaprodi.histori');
                Route::get('/master', 'master')->name('dosen.kaprodi.master');
                Route::get('/peserta',  'peserta')->name('dosen.kaprodi.peserta');
                Route::get('/peserta-lulus', 'pesertaLulus')->name('dosen.kaprodi.peserta-lulus');
            });
        });
    });
});

//URL BERMASALAH

//GUEST

//AUTHCONTROLLER
Route::get('/home/berita', [AuthController::class, 'berita'])->middleware('guest');
Route::get('/home/acara-dibuka', [AuthController::class, 'acaraBuka'])->middleware('guest');
Route::get('/home/acara-berlangsung', [AuthController::class, 'acaraLangsung'])->middleware('guest');
Route::get('/home/berita/{berita:slug}', [AuthController::class, 'showBerita'])->middleware('guest');
Route::get('/home/acara/{acara}', [AuthController::class, 'showAcara'])->middleware('guest');


//MAHASISWA

// MAHASISWAACARACONTROLLER
Route::get('/acara/diikuti', [MahasiswaAcaraController::class, 'diikuti'])->name('event-mahasiswa')->middleware('mahasiswa');
Route::get('/acara', [MahasiswaAcaraController::class, 'index'])->name('acara-mahasiswa')->middleware('mahasiswa');
Route::get('/acara/{acara}', [MahasiswaAcaraController::class, 'show'])->name('acara-show-mahasiswa')->middleware('mahasiswa');
Route::post('/acara/rateCreate', [MahasiswaAcaraController::class, 'rateCreate'])->name('acara-rateCreate-mahasiswa')->middleware('mahasiswa');
Route::post('/acara/rateUpdate/{rating}', [MahasiswaAcaraController::class, 'rateUpdate'])->name('acara-rateUpdate-mahasiswa')->middleware('mahasiswa');


Route::get('/pelatihan', [MahasiswaPelatihanController::class, 'index'])->name('pelatihan-mahasiswa')->middleware('mahasiswa');
Route::get('/sertifikasi', [MahasiswaSertifikasiController::class, 'index'])->name('sertifikasi-mahasiswa')->middleware('mahasiswa');

//MAHASISWABERITACONTROLLER
Route::get('/berita', [MahasiswaBeritaController::class, 'index'])->name('berita-mahasiswa')->middleware('mahasiswa');
Route::post('/berita/like', [MahasiswaBeritaController::class, 'like']);
Route::post('/berita/komentar', [MahasiswaBeritaController::class, 'komentar']);
Route::get('/berita/{berita:slug}', [MahasiswaBeritaController::class, 'show'])->name('show-berita-mahasiswa')->middleware('mahasiswa');

//PESERTACONTROLLER
Route::get('/pembayaran', [PesertaController::class, 'pembayaran'])->middleware('mahasiswa');
Route::get('/invoice', [PesertaController::class, 'dataInvoice'])->middleware('mahasiswa');


//DOSEN
Route::get('/berita-acara/create/{jadwal_acara}', [BeritaAcaraController::class, 'create'])->middleware('dosen');
Route::resource('/berita-acara', BeritaAcaraController::class)->middleware('dosen');
Route::post('/acara/ubahStatusJadwal', [JadwalAcaraController::class, 'ubahStatusJadwal']);
Route::post('/acara/ubahKelasPeserta', [DosenAcaraController::class, 'ubahKelasPeserta']);
Route::post('/acara/ubahStatusPeserta', [DosenAcaraController::class, 'ubahStatusPeserta']);

Route::get('/dosen/fasilitas', [FasilitasAcaraController::class, 'index'])->name('dosen.koordinator.acara.fasilitas.index')->middleware('dosen');

Route::post('/dosen/fasilitas', [FasilitasAcaraController::class, 'store'])->name('dosen.koordinator.acara.fasilitas.store')->middleware('dosen');

Route::get('/dosen/fasilitas/create', [FasilitasAcaraController::class, 'create'])->name('dosen.koordinator.acara.fasilitas.create')->middleware('dosen');

Route::get('/dosen/fasilitas/{fasilitas}', [FasilitasAcaraController::class, 'show'])->name('dosen.koordinator.acara.fasilitas.show')->middleware('dosen');

Route::put('/dosen/fasilitas/{fasilitas}', [FasilitasAcaraController::class, 'update'])->name('dosen.koordinator.acara.fasilitas.update')->middleware('dosen');

Route::delete('/dosen/fasilitas/{fasilitas}', [FasilitasAcaraController::class, 'destroy'])->name('dosen.koordinator.acara.fasilitas.destroy')->middleware('dosen');
Route::get('/dosen/fasilitas/{fasilitas}/edit', [FasilitasAcaraController::class, 'edit'])->name('dosen.koordinator.acara.fasilitas.edit')->middleware('dosen');


//DOSEN DAN KOORDINATOR
Route::resource('/dosen/acara', DosenAcaraController::class)->middleware(['dosen']);


//KOORDINATOR
Route::resource('/dosen/kelasAcara', KelasAcaraController::class)->middleware('dosen');
Route::resource('/dosen/jadwalAcara', JadwalAcaraController::class)->middleware('dosen');
Route::resource('/dosen/materi', MateriAcaraController::class)->middleware(['dosen']);


//URL BERMASALAH
