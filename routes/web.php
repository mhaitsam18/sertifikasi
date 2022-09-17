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
use App\Http\Controllers\AdminKeahlianController;
use App\Http\Controllers\AdminKelasAcaraController;
use App\Http\Controllers\AdminNotifikasiController;
use App\Http\Controllers\AdminSertifikatController;
use App\Http\Controllers\BeritaAcaraController;
use App\Http\Controllers\ChatController;
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
use App\Models\Notifikasi;

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
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name("index");
        Route::get('/login', 'login')->name("login");
        Route::post('/login', 'authenticate')->name("auth.authenticate");

        Route::prefix('registrasi')->group(function () {
            Route::get('/', 'registrasi')->name("auth.registrasi.index");
            Route::post('/', 'store')->name("auth.registrasi.store");
            Route::post('/email-blur', 'emailBlur')->name("auth.registrasi.email-blur");
            Route::post('/email-focus', 'emailFocus')->name("auth.registrasi.email-focus");
            Route::put('/reset-password/{user}', 'resetPassword')->name("auth.registrasi.reset-password");
        });

        Route::prefix('acara')->group(function () {
            Route::get('/', 'acara')->name('guest.acara.dibuka');
            Route::get('/dibuka', 'acaraBuka')->name('guest.acara.dibuka');
            Route::get('/berlangsung', 'acaraLangsung')->name('guest.acara.berlangsung');
            Route::get('/{acara}', 'showAcara')->name('guest.acara.show');
        });
        Route::prefix('berita')->group(function () {
            Route::get('/', 'berita')->name('guest.berita.index');
            Route::get('/{berita:slug}', 'showBerita')->name('guest.berita.show');
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/chat', [ChatController::class, 'index'])->name("auth.chat.index");
    Route::get('/chat/get-chat-2', [ChatController::class, 'getChat2'])->name("auth.chat.get2");
    Route::get('/chat/get-chat-3', [ChatController::class, 'getChat3'])->name("auth.chat.get3");
    Route::post('/chat/get-chat', [ChatController::class, 'getChat'])->name("auth.chat.get");
    Route::post('/chat/kirim-chat', [ChatController::class, 'kirimChat'])->name("auth.chat.kirim");
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
            Route::delete('/tutup-notifikasi/{notifikasi}', [AdminNotifikasiController::class, 'destroy'])->name('admin.tutup-notifikasi');
        });
        Route::prefix('dashboard')->group(function () {
            Route::get('/', function () {
                return view('admin.index', [
                    'title' => 'Dashboard',
                    'active' => 'home',
                    'data_notifikasi' => Notifikasi::whereIn('kategori_notifikasi_id', [2, 3])->get(),
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

            Route::resource('/acara/kelas-acara', AdminKelasAcaraController::class);
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

            Route::controller(AdminKeahlianController::class)->group(function () {
            });
            Route::controller(AdminPesertaController::class)->group(function () {
                Route::prefix('peserta')->group(function () {
                    Route::get('/', 'index')->name('admin.peserta.index');
                    Route::post('/berkas-show', 'berkasShow')->name('admin.peserta.berkas-show');
                    Route::post('/ubahStatus', 'ubahStatus')->name('admin.peserta.ubah-status'); //URL SALAH
                    Route::post('/getPembayaranById', 'getPembayaranById')->name('admin.peserta.get-pembayaran-by-id');

                    Route::get('/pembayaran', 'pembayaran')->name('admin.peserta.pembayaran');
                    Route::post('/pembayaran/validasi', 'validasi')->name('admin.peserta.pembayaran.validasi');
                    Route::post('/validasi-berkas/{peserta}', 'validasiBerkas')->name('admin.peserta.validasi-berkas');
                });
                Route::get('/pembayaran', 'pembayaran')->name('admin.pembayaran');
            });
            Route::controller(AdminSertifikatController::class)->group(function () {
                Route::prefix('sertifikat')->group(function () {
                    Route::get('/', 'index')->name('admin.sertifikat.index');
                    Route::post('/isTake', 'isTake')->name('admin.sertifikat.is-take'); //URL SALAH
                    Route::get('/{acara}', 'list')->name('admin.sertifikat.list');
                });
            });
            Route::resource('/beritas', AdminBeritaController::class);
            Route::resource('/dosen/keahlian', AdminKeahlianController::class);
            Route::resource('/dosen', AdminDosenController::class);
        });
    });
    Route::middleware('mahasiswa')->group(function () {
        Route::prefix('mahasiswa')->group(function () {
            Route::prefix('berita')->group(function () {
                Route::controller(MahasiswaBeritaController::class)->group(function () {
                    Route::get('/', 'index')->name('mahasiswa.berita.index');
                    Route::post('/like', 'like')->name('mahasiswa.berita.like');
                    Route::post('/komentar', 'komentar')->name('mahasiswa.berita.komentar');
                    Route::get('/{berita:slug}', 'show')->name('mahasiswa.berita.show');
                });
            });
            Route::prefix('acara')->group(function () {
                Route::controller(MahasiswaAcaraController::class)->group(function () {
                    Route::get('/', 'index')->name('mahasiswa.acara.index');
                    Route::get('/diikuti', 'diikuti')->name('mahasiswa.acara.diikuti');
                    Route::get('/{acara}', 'show')->name('mahasiswa.acara.show');
                    Route::post('/rateCreate', 'rateCreate')->name('mahasiswa.acara.rate-create');
                    Route::post('/rateUpdate/{rating}', 'rateUpdate')->name('mahasiswa.acara.rate-create');
                });
            });
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
            Route::get('/pelatihan', [MahasiswaPelatihanController::class, 'index'])->name('mahasiswa.pelatihan.index');
            Route::get('/sertifikasi', [MahasiswaSertifikasiController::class, 'index'])->name('mahasiswa.sertifikasi.index');
        });
        Route::prefix('peserta')->group(function () {
            Route::controller(PesertaController::class)->group(function () {
                Route::get('/', 'index')->name('mahasiswa.peserta.index');
                Route::post('/', 'store')->name('mahasiswa.peserta.store');
                Route::get('/bayar', 'bayar')->name('mahasiswa.peserta.bayar');
                Route::post('/bayar', 'storeBayar')->name('mahasiswa.peserta.bayar.store');
                Route::get('/invoice',  'invoice')->name('mahasiswa.peserta.invoice.index');
                Route::get('/invoice/{peserta}', 'showInvoice')->name('mahasiswa.peserta.invoice.show');
                Route::get('/kelas/{kelasAcara}', 'kelas')->name('mahasiswa.peserta.kelas');
                Route::get('/histori', 'histori')->name('mahasiswa.peserta.histori');
                Route::get('/pembayaran', 'pembayaran')->name('mahasiswa.peserta.pembayaran');
            });
        });
    });
    Route::middleware('dosen')->group(function () {
        Route::prefix('dosen')->group(function () {
            Route::controller(DosenDashboardController::class)->group(function () {
                Route::get('/', 'index')->name('dosen.index');
                Route::post('/filter-kelas', 'pesertaByKelas')->name('dosen.filter-kelas');
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
                Route::get('/jadwal/{kelas_acara}', 'jadwal')->name('dosen.instruktur.jadwal');
                Route::get('/peserta/{kelas_acara}', 'peserta')->name('dosen.instruktur.peserta');
                Route::get('/histori', 'histori')->name('dosen.instruktur.histori');
                Route::get('/acara/{acara}', 'acara')->name('dosen.instruktur.acara');
            });
            Route::controller(NilaiController::class)->group(function () {
                Route::put('/updateTanpaSertifikat/{nilai}', 'updateTanpaSertifikat')->name('dosen.instruktur.update-nilai-tanpa-sertifikat');
            });

            Route::get('/berita-acara/create/{jadwal_acara}', [BeritaAcaraController::class, 'create'])->name('dosen.instruktur.berita-acara');
            Route::resource('/berita-acara', BeritaAcaraController::class);
            Route::resource('/nilai', NilaiController::class);
        });
        Route::prefix('koordinator')->group(function () {

            Route::prefix('acara')->group(function () {
                Route::controller(DosenAcaraController::class)->group(function () {
                    Route::get('/', 'index')->name('dosen.acara.index');
                    Route::prefix('instruktur')->group(function () {
                        Route::get('/{acara}', 'instruktur')->name('dosen.acara.instruktur');
                        Route::post('/hapus', 'hapusInstruktur')->name('dosen.acara.instruktur.hapus');
                        Route::post('/tambah', 'tambahInstruktur')->name('dosen.acara.instruktur.tambah');
                    }); //UNTUK DOSEN MEMILIH INSTRUKTUR ACARA
                    Route::get('/peserta/{acara}', 'peserta')->name('dosen.acara.peserta');
                    Route::post('/ubahKelasPeserta', 'ubahKelasPeserta')->name('dosen.acara.ubah-kelas-peserta');
                    Route::post('/ubahStatusPeserta', 'ubahStatusPeserta')->name('dosen.acara.ubah-status-peserta');
                });

                Route::resource('/kelas-acara', KelasAcaraController::class);

                Route::post('/ubahStatusJadwal', [JadwalAcaraController::class, 'ubahStatusJadwal'])->name('dosen.acara.jadwal.ubah-status-jadwal');

                Route::resource('/jadwal-acara', JadwalAcaraController::class);
                Route::get('/jadwal-acara/bap/{berita_acara}', [JadwalAcaraController::class, 'showBerita'])->name('dosen.acara.jadwal.berita-acara');
                Route::resource('/materi', MateriAcaraController::class)->middleware(['dosen']);
                Route::controller(FasilitasAcaraController::class)->group(function () {
                    Route::get('/fasilitas', 'index')->name('dosen.koordinator.acara.fasilitas.index');
                    Route::post('/fasilitas', 'store')->name('dosen.koordinator.acara.fasilitas.store');
                    Route::get('/fasilitas/create', 'create')->name('dosen.koordinator.acara.fasilitas.create');
                    Route::get('/fasilitas/{fasilitas}', 'show')->name('dosen.koordinator.acara.fasilitas.show');
                    Route::put('/fasilitas/{fasilitas}', 'update')->name('dosen.koordinator.acara.fasilitas.update');
                    Route::delete('/fasilitas/{fasilitas}', 'destroy')->name('dosen.koordinator.acara.fasilitas.destroy');
                    Route::get('/fasilitas/{fasilitas}/edit', 'edit')->name('dosen.koordinator.acara.fasilitas.edit');
                });
            });
            Route::resource('/acara', DosenAcaraController::class);
            Route::get('/nilai', [KoordinatorNilaiController::class, 'index'])->name('dosen.koordinator.nilai.index'); //KOORDINATOR PESERTA
            Route::resource('/sertifikat', SertifikatController::class); //KOORDINATOR PESERTA

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
