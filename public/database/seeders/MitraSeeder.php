<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraSeeder extends Seeder
{
    public function run()
    {
        DB::table('mitra')->insert([
            ['id_mitra' => 1, 'nama_mitra' => 'PT. Infineon Technologies', 'lingkup' => 'Internasional', 'website' => 'https://www.infineon.com', 'email' => 'contact@infineon.com'],
            ['id_mitra' => 2, 'nama_mitra' => 'PT. Telkom Indonesia', 'lingkup' => 'Nasional', 'website' => 'https://www.telkom.co.id', 'email' => 'info@telkom.co.id'],
            ['id_mitra' => 3, 'nama_mitra' => 'PT. Astra International', 'lingkup' => 'Nasional', 'website' => 'https://www.astra.co.id', 'email' => 'corporate@astra.co.id'],
            ['id_mitra' => 4, 'nama_mitra' => 'PT. Bank Central Asia', 'lingkup' => 'Nasional', 'website' => 'https://www.bca.co.id', 'email' => 'customer@bca.co.id'],
            ['id_mitra' => 5, 'nama_mitra' => 'PT. Google Indonesia', 'lingkup' => 'Internasional', 'website' => 'https://about.google', 'email' => 'indonesia@google.com'],
            ['id_mitra' => 6, 'nama_mitra' => 'PT. Microsoft Indonesia', 'lingkup' => 'Internasional', 'website' => 'https://www.microsoft.com/id-id', 'email' => 'indonesia@microsoft.com'],
            ['id_mitra' => 7, 'nama_mitra' => 'PT. Samsung Electronics', 'lingkup' => 'Internasional', 'website' => 'https://www.samsung.com/id', 'email' => 'support.id@samsung.com'],
            ['id_mitra' => 8, 'nama_mitra' => 'PT. Unilever Indonesia', 'lingkup' => 'Nasional', 'website' => 'https://www.unilever.co.id', 'email' => 'info@unilever.co.id'],
            ['id_mitra' => 9, 'nama_mitra' => 'PT. Pertamina', 'lingkup' => 'Nasional', 'website' => 'https://www.pertamina.com', 'email' => 'pcc@pertamina.com'],
            ['id_mitra' => 10, 'nama_mitra' => 'PT. Gojek Indonesia', 'lingkup' => 'Nasional', 'website' => 'https://www.gojek.com', 'email' => 'support@gojek.com'],
            ['id_mitra' => 11, 'nama_mitra' => 'PT. Tokopedia', 'lingkup' => 'Nasional', 'website' => 'https://www.tokopedia.com', 'email' => 'help@tokopedia.com'],
            ['id_mitra' => 12, 'nama_mitra' => 'PT. Bukalapak', 'lingkup' => 'Nasional', 'website' => 'https://www.bukalapak.com', 'email' => 'support@bukalapak.com'],
            ['id_mitra' => 13, 'nama_mitra' => 'PT. Shopee Indonesia', 'lingkup' => 'Internasional', 'website' => 'https://shopee.co.id', 'email' => 'cs@shopee.co.id'],
            ['id_mitra' => 14, 'nama_mitra' => 'PT. Huawei Technologies', 'lingkup' => 'Internasional', 'website' => 'https://www.huawei.com/id', 'email' => 'indonesia@huawei.com'],
            ['id_mitra' => 15, 'nama_mitra' => 'PT. Siemens Indonesia', 'lingkup' => 'Internasional', 'website' => 'https://www.siemens.com/id/id', 'email' => 'info.id@siemens.com'],
            ['id_mitra' => 16, 'nama_mitra' => 'PT. Berkat Sentosa', 'lingkup' => 'Internasional', 'website' => 'https://chat.deepseek.com', 'email' => 'flowtunder@gmail.com'],
        ]);
    }
}
