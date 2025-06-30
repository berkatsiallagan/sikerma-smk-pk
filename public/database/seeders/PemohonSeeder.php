<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemohonSeeder extends Seeder
{
    public function run()
    {
        DB::table('pemohon')->insert([
            ['id_pemohon' => 1, 'no_permohonan' => 'PMH2025001', 'nama_pemohon' => 'Budi Santoso', 'nomor_telp' => '081234567890'],
            ['id_pemohon' => 2, 'no_permohonan' => 'PMH2025002', 'nama_pemohon' => 'Ani Wijaya', 'nomor_telp' => '082134567890'],
            ['id_pemohon' => 3, 'no_permohonan' => 'PMH2025003', 'nama_pemohon' => 'Citra Dewi', 'nomor_telp' => '083123456789'],
            ['id_pemohon' => 4, 'no_permohonan' => 'PMH2025004', 'nama_pemohon' => 'Dodi Pratama', 'nomor_telp' => '084123456789'],
            ['id_pemohon' => 5, 'no_permohonan' => 'PMH2025005', 'nama_pemohon' => 'Eka Putri', 'nomor_telp' => '085123456789'],
            ['id_pemohon' => 6, 'no_permohonan' => 'PMH2025006', 'nama_pemohon' => 'Fajar Nugroho', 'nomor_telp' => '086123456789'],
            ['id_pemohon' => 7, 'no_permohonan' => 'PMH2025007', 'nama_pemohon' => 'Gita Sari', 'nomor_telp' => '087123456789'],
            ['id_pemohon' => 8, 'no_permohonan' => 'PMH2025008', 'nama_pemohon' => 'Hadi Susanto', 'nomor_telp' => '088123456789'],
            ['id_pemohon' => 9, 'no_permohonan' => 'PMH2025009', 'nama_pemohon' => 'Indah Permata', 'nomor_telp' => '089123456789'],
            ['id_pemohon' => 10, 'no_permohonan' => 'PMH2025010', 'nama_pemohon' => 'Joko Prabowo', 'nomor_telp' => '081012345678'],
            ['id_pemohon' => 11, 'no_permohonan' => 'PMH2025011', 'nama_pemohon' => 'Kartika Wulandari', 'nomor_telp' => '081112345678'],
            ['id_pemohon' => 12, 'no_permohonan' => 'PMH2025012', 'nama_pemohon' => 'Luki Hermawan', 'nomor_telp' => '081212345678'],
            ['id_pemohon' => 13, 'no_permohonan' => 'PMH2025013', 'nama_pemohon' => 'Maya Indah', 'nomor_telp' => '081312345678'],
            ['id_pemohon' => 14, 'no_permohonan' => 'PMH2025014', 'nama_pemohon' => 'Nanda Putra', 'nomor_telp' => '081412345678'],
            ['id_pemohon' => 15, 'no_permohonan' => 'PMH2025015', 'nama_pemohon' => 'Oki Setiawan', 'nomor_telp' => '081512345678'],
            ['id_pemohon' => 16, 'no_permohonan' => 'PMH2025016', 'nama_pemohon' => 'bagus', 'nomor_telp' => '081534337041'],
            ['id_pemohon' => 17, 'no_permohonan' => 'PMH2025017', 'nama_pemohon' => 'Bagus', 'nomor_telp' => '123456789044'],
            ['id_pemohon' => 18, 'no_permohonan' => 'PMH2025018', 'nama_pemohon' => 'bagus', 'nomor_telp' => '081534337041'],
        ]);
    }
}
