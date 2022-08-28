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

// Route::get('/', function () {
//     return view('welcome');
// });


//AUTH

Route::get('/', [AuthController::class, 'index'])->middleware('guest');
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->middleware('guest');
Route::post('/registrasi/email-blur', [AuthController::class, 'emailBlur'])->middleware('guest');
Route::post('/registrasi/email-focus', [AuthController::class, 'emailFocus'])->middleware('guest');
Route::post('/registrasi', [AuthController::class, 'store']);
Route::put('/reset-password/{user}', [AuthController::class, 'resetPassword']);

Route::get('/put-img', [HomeController::class, 'putImg'])->name('image');

Route::get('/view', [FileController::class, 'index']);
Route::get('/get', [FileController::class, 'getFile']);

Route::get('/home/berita', [AuthController::class, 'berita'])->middleware('guest');
Route::get('/home/acara-dibuka', [AuthController::class, 'acaraBuka'])->middleware('guest');
Route::get('/home/acara-berlangsung', [AuthController::class, 'acaraLangsung'])->middleware('guest');


Route::get('/home/berita/{berita:slug}', [AuthController::class, 'showBerita'])->middleware('guest');
Route::get('/home/acara/{acara}', [AuthController::class, 'showAcara'])->middleware('guest');
// Auth::routes();


//ADMIN
// Route::get('/dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->middleware('admin');
Route::get('/dashboard', function () {
    return view('admin.index', [
        'title' => 'Dashboard',
        'active' => 'home',
    ]);
});
Route::get('/dashboard/profil', [AdminDashboardController::class, 'index'])->middleware(['admin']);
Route::put('/dashboard/profil/{user}', [HomeController::class, 'updateProfil']);

Route::put('/dashboard/userDosen', [AdminDosenController::class, 'updateProfil'])->middleware(['admin']);
Route::resource('/dashboard/dosen', AdminDosenController::class)->middleware(['admin']);

Route::get('/dashboard/berita/checkSlug', [AdminBeritaController::class, 'checkSlug'])->middleware('admin');
Route::get('/dashboard/berita/', [AdminBeritaController::class, 'index']);
Route::get('/dashboard/berita/publish/{berita:slug}', [AdminBeritaController::class, 'publish']);
Route::get('/dashboard/berita/takedown/{berita:slug}', [AdminBeritaController::class, 'takedown']);
Route::post('/dashboard/berita/restore', [AdminBeritaController::class, 'restore']);
Route::get('/dashboard/berita/{berita:slug}', [AdminBeritaController::class, 'show']);
Route::resource('dashboard/beritas', AdminBeritaController::class)->middleware(['auth', 'admin']);

Route::delete('/komentar/hapus/{komentarBerita}', [AdminBeritaController::class, 'hapusKomentar']);

Route::get('/dashboard/acara', [AdminAcaraController::class, 'index']);
Route::get('/dashboard/valid', [AdminAcaraController::class, 'valid']);
Route::post('/dashboard/acara/ubahStatus', [AdminAcaraController::class, 'ubahStatus']);
Route::get('/dashboard/acara/detail/{acara}', [AdminAcaraController::class, 'show']);

Route::get('/dashboard/peserta', [AdminPesertaController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('/dashboard/peserta/ubahStatus', [AdminPesertaController::class, 'ubahStatus']);
Route::post('/dashboard/peserta/getPembayaranById', [AdminPesertaController::class, 'getPembayaranById'])->middleware(['auth', 'admin']);

Route::get('/dashboard/pembayaran', [AdminPesertaController::class, 'pembayaran'])->middleware(['auth', 'admin']);
Route::post('/dahsboard/pembayaran/validasi', [AdminPesertaController::class, 'validasi'])->middleware(['auth', 'admin']);

Route::get('/dashboard/sertifikat', [AdminSertifikatController::class, 'index'])->middleware(['auth', 'admin']);
Route::post('/dashboard/sertifikat/isTake', [AdminSertifikatController::class, 'isTake'])->middleware(['auth', 'admin']);
Route::get('/dashboard/sertifikat/{acara}', [AdminSertifikatController::class, 'list'])->middleware(['auth', 'admin']);

//MAHASISWA
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/mahasiswa', [MahasiswaHomeController::class, 'index'])->name('mahasiswa')->middleware('mahasiswa');
Route::get('/mahasiswa/profil', [MahasiswaHomeController::class, 'profil'])->name('profil-mahasiswa')->middleware('mahasiswa');
Route::get('/mahasiswa/edit', [MahasiswaHomeController::class, 'editProfil'])->name('profil-mahasiswa-edit')->middleware('mahasiswa');

Route::post('/mahasiswa/edit/{mahasiswa}', [MahasiswaHomeController::class, 'update'])->middleware('mahasiswa');
Route::post('/profil/edit/{user}', [HomeController::class, 'updateProfil']);
Route::put('/update-password/{user}', [HomeController::class, 'updatePassword']);

Route::get('/acara/diikuti', [MahasiswaAcaraController::class, 'diikuti'])->name('event-mahasiswa')->middleware('mahasiswa');
Route::get('/acara', [MahasiswaAcaraController::class, 'index'])->name('acara-mahasiswa')->middleware('mahasiswa');
Route::get('/acara/{acara}', [MahasiswaAcaraController::class, 'show'])->name('acara-show-mahasiswa')->middleware('mahasiswa');
Route::post('/acara/rateCreate', [MahasiswaAcaraController::class, 'rateCreate'])->name('acara-rateCreate-mahasiswa')->middleware('mahasiswa');
Route::post('/acara/rateUpdate/{rating}', [MahasiswaAcaraController::class, 'rateUpdate'])->name('acara-rateUpdate-mahasiswa')->middleware('mahasiswa');
Route::get('/pelatihan', [MahasiswaPelatihanController::class, 'index'])->name('pelatihan-mahasiswa')->middleware('mahasiswa');
Route::get('/sertifikasi', [MahasiswaSertifikasiController::class, 'index'])->name('sertifikasi-mahasiswa')->middleware('mahasiswa');
Route::get('/berita', [MahasiswaBeritaController::class, 'index'])->name('berita-mahasiswa')->middleware('mahasiswa');
Route::post('/berita/like', [MahasiswaBeritaController::class, 'like']);
Route::post('/berita/komentar', [MahasiswaBeritaController::class, 'komentar']);
Route::get('/berita/{berita:slug}', [MahasiswaBeritaController::class, 'show'])->name('show-berita-mahasiswa')->middleware('mahasiswa');
// Route::resource('/pesertas', PesertaController::class)->middleware('mahasiswa');

Route::get('/peserta', [PesertaController::class, 'index'])->middleware('mahasiswa');
Route::post('/peserta', [PesertaController::class, 'store'])->middleware('mahasiswa');
Route::get('/peserta/invoice', [PesertaController::class, 'invoice'])->middleware('mahasiswa');
Route::get('/peserta/bayar', [PesertaController::class, 'bayar'])->middleware('mahasiswa');
Route::post('/peserta/bayar', [PesertaController::class, 'storeBayar'])->middleware('mahasiswa');
Route::get('/peserta/kelas/{kelasAcara}', [PesertaController::class, 'kelas'])->middleware('mahasiswa');
Route::get('/peserta/histori', [PesertaController::class, 'histori'])->middleware('mahasiswa');

Route::get('/pembayaran', [PesertaController::class, 'pembayaran'])->middleware('mahasiswa');
Route::get('/invoice', [PesertaController::class, 'dataInvoice'])->middleware('mahasiswa');


//DOSEN
Route::get('/dosen', [DosenDashboardController::class, 'index'])->name('dosen');
Route::get('/dosen/profil', [DosenDashboardController::class, 'profil'])->name('profil-dosen')->middleware('dosen');
Route::get('/dosen/edit', [DosenDashboardController::class, 'editProfil'])->name('profil-dosen-edit')->middleware('dosen');
Route::put('/dosen/edit/{dosen}', [DosenDashboardController::class, 'update'])->name('profil-dosen-update')->middleware('dosen');
Route::get('/dosen/destroy/{user}', [DosenDashboardController::class, 'destroy'])->name('dosen-destroy')->middleware('dosen');



Route::get('/dosen/acara', [DosenAcaraController::class, 'index'])->name('dosen');
Route::get('/dosen/acara/instruktur/{acara}', [DosenAcaraController::class, 'instruktur'])->middleware('dosen');
Route::get('/dosen/acara/peserta/{acara}', [DosenAcaraController::class, 'peserta'])->middleware('dosen');
Route::post('/dosen/acara/instruktur/hapus', [DosenAcaraController::class, 'hapusInstruktur'])->middleware('dosen');
Route::post('/dosen/acara/instruktur/tambah', [DosenAcaraController::class, 'tambahInstruktur'])->middleware('dosen');


Route::get('/instruktur', [InstrukturController::class, 'index'])->middleware('dosen');
Route::get('/instruktur/list', [InstrukturController::class, 'list'])->middleware('dosen');
Route::get('/instruktur/acara/{acara}', [InstrukturController::class, 'acara'])->middleware('dosen');
Route::get('/instruktur/jadwal/{kelas_acara}', [InstrukturController::class, 'jadwal'])->middleware('dosen');
Route::get('/instruktur/peserta/{kelas_acara}', [InstrukturController::class, 'peserta'])->middleware('dosen');

Route::get('/berita-acara/create/{jadwal_acara}', [BeritaAcaraController::class, 'create'])->middleware('dosen');
Route::resource('/berita-acara', BeritaAcaraController::class)->middleware('dosen');


Route::post('/acara/ubahStatusJadwal', [JadwalAcaraController::class, 'ubahStatusJadwal']);
Route::post('/acara/ubahKelasPeserta', [DosenAcaraController::class, 'ubahKelasPeserta']);
Route::post('/acara/ubahStatusPeserta', [DosenAcaraController::class, 'ubahStatusPeserta']);

Route::get('/dosen/fasilitas', [FasilitasAcaraController::class, 'index'])->middleware('dosen');
Route::post('/dosen/fasilitas', [FasilitasAcaraController::class, 'store'])->middleware('dosen');
Route::get('/dosen/fasilitas/create', [FasilitasAcaraController::class, 'create'])->middleware('dosen');
Route::get('/dosen/fasilitas/{fasilitas}', [FasilitasAcaraController::class, 'show'])->middleware('dosen');
Route::put('/dosen/fasilitas/{fasilitas}', [FasilitasAcaraController::class, 'update'])->middleware('dosen');
Route::delete('/dosen/fasilitas/{fasilitas}', [FasilitasAcaraController::class, 'destroy'])->middleware('dosen');
Route::get('/dosen/fasilitas/{fasilitas}/edit', [FasilitasAcaraController::class, 'edit'])->middleware('dosen');


Route::resource('/dosen/kelasAcara', KelasAcaraController::class)->middleware('dosen');



Route::resource('/dosen/jadwalAcara', JadwalAcaraController::class)->middleware('dosen');


Route::resource('/dosen/acara', DosenAcaraController::class)->middleware(['dosen']);
Route::resource('/dosen/materi', MateriAcaraController::class)->middleware(['dosen']);
Route::resource('/koordinator/sertifikat', SertifikatController::class)->middleware(['dosen']);
Route::resource('/instruktur/nilai', NilaiController::class)->middleware(['dosen']);
Route::put('/instruktur/updateTanpaSertifikat/{nilai}', [NilaiController::class, 'updateTanpaSertifikat'])->middleware(['dosen']);

Route::get('/instruktur/histori', [InstrukturController::class, 'histori'])->middleware(['dosen']);

Route::get('/koordinator/nilai', [NilaiController::class, 'index'])->middleware(['dosen']);

Route::get('/kaprodi/pelatihan', [KaprodiController::class, 'pelatihan'])->middleware(['dosen']);
Route::get('/kaprodi/sertifikasi', [KaprodiController::class, 'sertifikasi'])->middleware(['dosen']);
Route::get('/kaprodi/histori', [KaprodiController::class, 'histori'])->middleware(['dosen']);
Route::get('/kaprodi/master', [KaprodiController::class, 'master'])->middleware(['dosen']);
Route::get('/kaprodi/index', [KaprodiController::class, 'index'])->middleware(['dosen']);
Route::get('/kaprodi/peserta', [KaprodiController::class, 'peserta'])->middleware(['dosen']);
Route::get('/kaprodi/peserta-lulus', [KaprodiController::class, 'pesertaLulus'])->middleware(['dosen']);
