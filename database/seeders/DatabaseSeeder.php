<?php

namespace Database\Seeders;

use App\Models\Agama;
use App\Models\Role;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Fakultas;
use App\Models\Kelas;
use App\Models\Rekening;
use App\Models\Mahasiswa;
use App\Models\RoleAdvance;
use App\Models\StatusAcara;
use App\Models\StatusJadwal;
use App\Models\KategoriAcara;
use App\Models\StatusPeserta;
use Illuminate\Database\Seeder;
use App\Models\KategoriNotifikasi;
use App\Models\Prodi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Agama::create([
            'agama' => 'Islam'
        ]);
        Agama::create([
            'agama' => 'Kristen Protestan'
        ]);
        Agama::create([
            'agama' => 'Kristen Katolik'
        ]);
        Agama::create([
            'agama' => 'Hindu'
        ]);
        Agama::create([
            'agama' => 'Buddha'
        ]);
        Agama::create([
            'agama' => 'Konghucu'
        ]);
        Agama::create([
            'agama' => 'Yahudi'
        ]);

        Role::create([
            'nama' => 'Administrator'
        ]);
        Role::create([
            'nama' => 'Mahasiswa'
        ]);
        Role::create([
            'nama' => 'Dosen'
        ]);
        // Role::create([
        //     'nama' => 'Publik'
        // ]);
        Role::create([
            'id' => 0,
            'nama' => 'Developer'
        ]);
        RoleAdvance::create([
            'nama' => 'Kaprodi'
        ]);
        RoleAdvance::create([
            'nama' => 'Koordinator'
        ]);
        RoleAdvance::create([
            'nama' => 'Instruktur'
        ]);

        StatusPeserta::create([
            'status' => 'Menunggu Persetujuan'
        ]);
        StatusPeserta::create([
            'status' => 'Ditolak'
        ]);
        StatusPeserta::create([
            'status' => 'Aktif / diterima'
        ]);
        StatusPeserta::create([
            'status' => 'Mengundurkan diri'
        ]);
        StatusPeserta::create([
            'status' => 'Diskualifikasi'
        ]);
        StatusPeserta::create([
            'status' => 'Lulus'
        ]);
        StatusPeserta::create([
            'status' => 'Tidak Lulus'
        ]);

        StatusJadwal::create([
            'status' => 'Akan dilaksanakan'
        ]);
        StatusJadwal::create([
            'status' => 'Terlaksana'
        ]);
        StatusJadwal::create([
            'status' => 'Tidak Terlaksana (diundur/dimajukan)'
        ]);
        StatusJadwal::create([
            'status' => 'Tidak Terlaksana (dibatalkan/ditiadakan)'
        ]);

        StatusAcara::create([
            'status' => 'Akan dibuka'
        ]);
        StatusAcara::create([
            'status' => 'Pendaftaran dibuka'
        ]);
        StatusAcara::create([
            'status' => 'Pelatihan dibatalkan'
        ]);
        StatusAcara::create([
            'status' => 'Pelatihan diundur'
        ]);
        StatusAcara::create([
            'status' => 'Pendaftaran ditutup'
        ]);
        StatusAcara::create([
            'status' => 'Sedang Berlangsung'
        ]);
        StatusAcara::create([
            'status' => 'Selesai'
        ]);

        Rekening::create([
            'bank' => 'Mandiri',
            'nomor_rekening' => '1234567890',
            'atas_nama' => 'Nadila Rahmatika',
            'email' => 'nadila@gmail.com',
        ]);
        Rekening::create([
            'bank' => 'BNI',
            'nomor_rekening' => '021389120831',
            'atas_nama' => 'M. Rayhan Hafidz Siregar',
            'email' => 'rayhan@gmail.com',
        ]);
        Rekening::create([
            'bank' => 'BCA',
            'nomor_rekening' => '9382730213',
            'atas_nama' => 'Nuriffah Syahirah',
            'email' => 'ipeh@gmail.com',
        ]);
        Rekening::create([
            'bank' => 'BRI',
            'nomor_rekening' => '0987654321',
            'atas_nama' => 'Andini Septia',
            'email' => 'andiniseptia60@gmail.com',
        ]);

        Kelas::create([
            'kelas' => 'D3SI-43-01'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-43-02'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-43-03'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-43-04'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-44-01'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-44-02'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-44-03'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-44-04'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-45-01'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-45-02'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-45-03'
        ]);
        Kelas::create([
            'kelas' => 'D3SI-45-04'
        ]);

        KategoriNotifikasi::create([
            'kategori' => 'Notifikasi'
        ]);
        KategoriNotifikasi::create([
            'kategori' => 'Pendaftaran Baru',
            'role_id' => 1
        ]);
        KategoriNotifikasi::create([
            'kategori' => 'Konfirmasi Pembayaran',
            'role_id' => 1
        ]);
        KategoriNotifikasi::create([
            'kategori' => 'Status Approval',
            'role_id' => 2
        ]);
        KategoriNotifikasi::create([
            'kategori' => 'Sertifikat Selesai',
            'role_id' => 2
        ]);
        KategoriNotifikasi::create([
            'kategori' => 'Berita Baru',
            'role_id' => 2
        ]);
        KategoriNotifikasi::create([
            'kategori' => 'Chat',
            'role_id' => 3
        ]);

        KategoriAcara::create([
            'kategori' => 'Sertifikasi'
        ]);
        KategoriAcara::create([
            'kategori' => 'Pelatihan'
        ]);

        User::create([
            'nama' => 'Muhammad Haitsam',
            'email' => 'haitsam03@gmail.com',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Madinah',
            'tanggal_lahir' => '1998-02-18',
            'nomor_telepon' => '082117503125',
            'alamat' => 'Bandung',
            'agama' => 'Islam',
            'tentang' => 'Haloo, Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam eum omnis laborum nam, sequi libero tempore vitae alias qui inventore labore earum adipisci commodi consequatur odio a animi assumenda maxime.',
            'foto' => 'default.jpg',
            'password' => Hash::make('1234'),
            'role_id' => 1,
            'is_active' => 1,
        ]);
        User::create([
            'nama' => 'Nadila Rahmatika',
            'email' => 'nadila@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Kota',
            'tanggal_lahir' => now(),
            'nomor_telepon' => '081334015015',
            'alamat' => 'Bandung',
            'agama' => 'Islam',
            'tentang' => 'Haloo, Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam eum omnis laborum nam, sequi libero tempore vitae alias qui inventore labore earum adipisci commodi consequatur odio a animi assumenda maxime.',
            'foto' => 'default.jpg',
            'password' => Hash::make('1234'),
            'role_id' => 1,
            'is_active' => 1,
        ]);
        User::create([
            'nama' => 'M. Rayhan Hafidz Siregar',
            'email' => 'rayhan@gmail.com',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Kota',
            'tanggal_lahir' => now(),
            'nomor_telepon' => '089506531139',
            'alamat' => 'Bandung',
            'agama' => 'Islam',
            'tentang' => 'Haloo, Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam eum omnis laborum nam, sequi libero tempore vitae alias qui inventore labore earum adipisci commodi consequatur odio a animi assumenda maxime.',
            'foto' => 'default.jpg',
            'password' => Hash::make('1234'),
            'role_id' => 2,
            'is_active' => 1,
        ]);
        User::create([
            'nama' => 'Wawa Wikusna',
            'email' => 'wawa@gmail.com',
            'jenis_kelamin' => 'Laki-laki',
            'tempat_lahir' => 'Kota',
            'tanggal_lahir' => now(),
            'nomor_telepon' => '081320604160',
            'alamat' => 'Bandung',
            'agama' => 'Islam',
            'tentang' => 'Haloo, Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam eum omnis laborum nam, sequi libero tempore vitae alias qui inventore labore earum adipisci commodi consequatur odio a animi assumenda maxime.',
            'foto' => 'default.jpg',
            'password' => Hash::make('1234'),
            'role_id' => 3,
            'is_active' => 1,
        ]);
        User::create([
            'nama' => 'Nuriffah Syahirah',
            'email' => 'ipeh@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Kota',
            'tanggal_lahir' => now(),
            'nomor_telepon' => '082274822295',
            'alamat' => 'Bandung',
            'agama' => 'Islam',
            'tentang' => 'Haloo, Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam eum omnis laborum nam, sequi libero tempore vitae alias qui inventore labore earum adipisci commodi consequatur odio a animi assumenda maxime.',
            'foto' => 'default.jpg',
            'password' => Hash::make('1234'),
            'role_id' => 3,
            'is_active' => 1,
        ]);
        User::create([
            'nama' => 'Andini Septia',
            'email' => 'andiniseptia60@gmail.com',
            'jenis_kelamin' => 'Perempuan',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2001-10-27',
            'nomor_telepon' => '081285508410',
            'alamat' => 'Bandung',
            'agama' => 'Islam',
            'tentang' => 'Haloo, Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam eum omnis laborum nam, sequi libero tempore vitae alias qui inventore labore earum adipisci commodi consequatur odio a animi assumenda maxime.',
            'foto' => 'default.jpg',
            'password' => Hash::make('1234'),
            'role_id' => 3,
            'is_active' => 1,
        ]);
        Mahasiswa::create([
            'user_id' => 3,
            'kelas_id' => 1,
            'nim' => '6701194089',
            'scan_ktm' => 'ktm.jpg',
        ]);
        Dosen::create([
            'user_id' => 4,
            'kode_dosen' => 'WIU',
            'nidn' => '04290674',
            'nip' => '14740031',
        ]);
        Dosen::create([
            'user_id' => 5,
            'kode_dosen' => 'NFS',
            'nidn' => '04291234',
            'nip' => '14741234',
        ]);
        Dosen::create([
            'user_id' => 6,
            'kode_dosen' => 'ANS',
            'nidn' => '04290643',
            'nip' => '14740192',
        ]);

        Fakultas::create([
            'kode' => '',
            'nama' => 'Fakultas Teknik Elektro',
            'singkatan' => 'FTE',
        ]);
        Fakultas::create([
            'kode' => '',
            'nama' => 'Fakultas Rekayasa Industri',
            'singkatan' => 'FRI',
        ]);
        Fakultas::create([
            'kode' => '',
            'nama' => 'Fakultas Informatika',
            'singkatan' => 'FIF',
        ]);
        Fakultas::create([
            'kode' => '',
            'nama' => 'Fakultas Ekonomi dan Bisnis',
            'singkatan' => 'FEB',
        ]);
        Fakultas::create([
            'kode' => '',
            'nama' => 'Fakultas Komunikasi dan Bisnis',
            'singkatan' => 'FKB',
        ]);
        Fakultas::create([
            'kode' => '',
            'nama' => 'Fakultas Industri Kreatif',
            'singkatan' => 'FIK',
        ]);
        Fakultas::create([
            'kode' => '',
            'nama' => 'Fakultas Ilmu Terapan',
            'singkatan' => 'FIT',
        ]);

        Prodi::create([
            'singkatan' => 'D3SI',
            'nama' => 'D3 Sistem Informasi',
            'keterangan' => 'Akreditasi A',
            'fakultas_id' => 7,
            'kaprodi_id' => 1,
        ]);


        Prodi::create([
            'singkatan' => 'D3TE',
            'nama' => 'D3 Digital Connectivity',
            'keterangan' => 'Akreditasi Unggul',
            'fakultas_id' => 7,
            'kaprodi_id' => 1,
        ]);

        Prodi::create([
            'singkatan' => 'D3TI',
            'nama' => 'D3 Teknik Informatika',
            'keterangan' => 'Akreditasi Unggul',
            'fakultas_id' => 7,
            'kaprodi_id' => 1,
        ]);

        Prodi::create([
            'singkatan' => 'D3SIA',
            'nama' => 'D3 Sistem Informasi Akuntansi',
            'keterangan' => 'Akreditasi A',
            'fakultas_id' => 7,
            'kaprodi_id' => 1,
        ]);


        Prodi::create([
            'singkatan' => 'D3TK',
            'nama' => 'D3 Teknik Komputer',
            'keterangan' => 'Akreditasi Unggul',
            'fakultas_id' => 7,
            'kaprodi_id' => 1,
        ]);

        Prodi::create([
            'singkatan' => 'D3DM',
            'nama' => 'D3 Digital Marketing',
            'keterangan' => 'Akreditasi B',
            'fakultas_id' => 7,
            'kaprodi_id' => 1,
        ]);

        Prodi::create([
            'singkatan' => 'DCA',
            'nama' => 'S1 Terapan Digital Creative Multimedia',
            'keterangan' => 'Akreditasi C',
            'fakultas_id' => 7,
            'kaprodi_id' => 1,
        ]);
    }
}
