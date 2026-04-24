<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Paket;
use App\Models\Keberangkatan;
use App\Models\Jamaah;
use App\Models\SuratTemplate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Users
        User::create(['name' => 'Admin Utama', 'email' => 'admin@amantubillahi.com', 'password' => Hash::make('password'), 'role' => 'admin']);
        User::create(['name' => 'Staf Marketing', 'email' => 'marketing@amantubillahi.com', 'password' => Hash::make('password'), 'role' => 'marketing']);
        User::create(['name' => 'Staf Keuangan', 'email' => 'keuangan@amantubillahi.com', 'password' => Hash::make('password'), 'role' => 'keuangan']);
        User::create(['name' => 'Staf Operasional', 'email' => 'operasional@amantubillahi.com', 'password' => Hash::make('password'), 'role' => 'operasional']);

        // Paket
        $paket = Paket::create(['nama_paket' => 'Umrah Reguler 9 Hari', 'harga' => 25000000, 'durasi_hari' => 9]);
        Paket::create(['nama_paket' => 'Umrah Plus Turki 12 Hari', 'harga' => 35000000, 'durasi_hari' => 12]);

        // Keberangkatan
        $keberangkatan = Keberangkatan::create(['paket_id' => $paket->id, 'nama_grup' => 'Kloter April 2026', 'tanggal_berangkat' => '2026-04-15']);

        // Jamaah
        Jamaah::create([
            'paket_id' => $paket->id,
            'keberangkatan_id' => $keberangkatan->id,
            'nama_lengkap' => 'Ahmad Fulan',
            'no_paspor' => 'B1234567',
            'tanggal_lahir' => '1980-05-20',
            'status' => 'prospek'
        ]);

        // Surat Template
        SuratTemplate::create([
            'nama_template' => 'Surat Rekomendasi Imigrasi',
            'konten_html' => '<div style="font-family: Arial, sans-serif; padding: 20px;">
                <h2 style="text-align: center; text-decoration: underline;">SURAT REKOMENDASI PEMBUATAN PASPOR</h2>
                <p style="text-align: right;">Jakarta, {{tanggal_hari_ini}}</p>
                <p>Nomor: {{nomor_surat}}<br>Hal: Rekomendasi Pembuatan Paspor<br>Kepada Yth.<br>Kepala Kantor Imigrasi<br>Di Tempat</p>
                <p>Dengan hormat,</p>
                <p>Yang bertanda tangan di bawah ini, Pimpinan PT Amantubillahi Travel, menerangkan bahwa:</p>
                <table style="margin-left: 20px; margin-bottom: 20px;">
                    <tr><td style="width: 150px;">Nama Lengkap</td><td>: <b>{{nama_jamaah}}</b></td></tr>
                    <tr><td>Nomor Paspor Lama</td><td>: {{no_paspor}}</td></tr>
                    <tr><td>Tanggal Lahir</td><td>: {{tanggal_lahir}}</td></tr>
                </table>
                <p>Adalah benar merupakan jamaah umrah yang terdaftar pada biro perjalanan kami dan akan berangkat pada kloter keberangkatan kami yang akan datang.</p>
                <p>Surat rekomendasi ini dibuat sebagai persyaratan untuk pembuatan/perpanjangan paspor jamaah yang bersangkutan.</p>
                <p>Demikian surat ini kami buat agar dapat dipergunakan sebagaimana mestinya.</p>
                <br><br>
                <p style="text-align: right;">Hormat kami,<br><br><br><b>Pimpinan PT Amantubillahi</b></p>
            </div>'
        ]);
    }
}
