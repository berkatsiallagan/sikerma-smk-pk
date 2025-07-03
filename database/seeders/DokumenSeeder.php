<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder extends Seeder
{
    public function run()
    {
        DB::table('dokumen')->insert([
            ['id_dokumen' => 1, 'catatan' => 'Kerjasama pendidikan dengan PT. Infineon', 'dokumen' => 'dokumen/mou_infineon_2025.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-01-20', 'tanggal_selesai' => '2028-01-19'],
            ['id_dokumen' => 2, 'catatan' => 'Kerjasama penelitian dengan PT. Telkom', 'dokumen' => 'dokumen/moa_telkom_2025.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-02-25', 'tanggal_selesai' => '2026-02-24'],
            ['id_dokumen' => 3, 'catatan' => 'Kerjasama magang dengan PT. Astra', 'dokumen' => 'dokumen/mou_astra_2025.pdf', 'status' => 'Akan Berakhir', 'tanggal_mulai' => '2025-03-15', 'tanggal_selesai' => '2025-07-14'],
            ['id_dokumen' => 4, 'catatan' => 'Kerjasama sertifikasi dengan BCA', 'dokumen' => 'dokumen/moa_bca_2025.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-04-10', 'tanggal_selesai' => '2027-04-09'],
            ['id_dokumen' => 5, 'catatan' => 'Kerjasama digitalisasi dengan Google', 'dokumen' => 'dokumen/mou_google_2025.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-05-15', 'tanggal_selesai' => '2030-05-14'],
            ['id_dokumen' => 6, 'catatan' => 'Kerjasama kurikulum dengan Microsoft', 'dokumen' => 'dokumen/moa_microsoft_2025.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-06-20', 'tanggal_selesai' => '2025-07-30'],
            ['id_dokumen' => 7, 'catatan' => 'Kerjasama pelatihan dengan Samsung', 'dokumen' => 'dokumen/mou_samsung_2025.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-07-25', 'tanggal_selesai' => '2026-07-24'],
            ['id_dokumen' => 8, 'catatan' => 'Kerjasama CSR dengan Unilever', 'dokumen' => 'dokumen/moa_unilever_2025.pdf', 'status' => 'Kadaluarsa', 'tanggal_mulai' => '2025-01-05', 'tanggal_selesai' => '2025-06-04'],
            ['id_dokumen' => 9, 'catatan' => 'Kerjasama energi dengan Pertamina', 'dokumen' => 'dokumen/mou_pertamina_2025.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-09-15', 'tanggal_selesai' => '2028-09-14'],
            ['id_dokumen' => 10, 'catatan' => 'Kerjasama transportasi dengan Gojek', 'dokumen' => 'dokumen/moa_gojek_2025.pdf', 'status' => 'Tidak Aktif', 'tanggal_mulai' => '2025-10-30', 'tanggal_selesai' => '2026-10-29'],
            ['id_dokumen' => 11, 'catatan' => 'Kerjasama e-commerce dengan Tokopedia', 'dokumen' => 'dokumen/mou_tokopedia_2025.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-11-10', 'tanggal_selesai' => '2027-11-09'],
            ['id_dokumen' => 12, 'catatan' => 'Kerjasama marketplace dengan Bukalapak', 'dokumen' => 'dokumen/moa_bukalapak_2025.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-12-05', 'tanggal_selesai' => '2026-12-04'],
            ['id_dokumen' => 13, 'catatan' => 'Kerjasama digital dengan Shopee', 'dokumen' => 'dokumen/mou_shopee_2026.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2026-01-20', 'tanggal_selesai' => '2029-01-19'],
            ['id_dokumen' => 14, 'catatan' => 'Kerjasama teknologi dengan Huawei', 'dokumen' => 'dokumen/moa_huawei_2026.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2026-02-25', 'tanggal_selesai' => '2027-02-24'],
            ['id_dokumen' => 15, 'catatan' => 'Kerjasama industri dengan Siemens', 'dokumen' => 'dokumen/mou_siemens_2026.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2026-03-15', 'tanggal_selesai' => '2028-03-14'],
            ['id_dokumen' => 17, 'catatan' => 'YAYAYA', 'dokumen' => 'MOU_PT_Shopee_Indonesia_2025-06-18.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-06-18', 'tanggal_selesai' => '2025-10-30'],
            ['id_dokumen' => 18, 'catatan' => 'tes', 'dokumen' => 'MOA_PT_Pertamina_2025-06-30.pdf', 'status' => 'Aktif', 'tanggal_mulai' => '2025-06-30', 'tanggal_selesai' => '2025-07-01'],
        ]);
    }
}
