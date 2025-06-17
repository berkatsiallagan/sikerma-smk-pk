<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokumenSeeder extends Seeder
{
    public function run()
    {
        DB::table('dokumen')->insert([
            ['id_dokumen' => 17, 'catatan' => 'qwe56yhn', 'dokumen' => 'dokumen/BImIU8hbERTAvbBLCMjTFxD3t71lP4zaTEi7SqXX.pdf', 'status' => 'aktif', 'tanggal_mulai' => null, 'tanggal_selesai' => null],
            ['id_dokumen' => 19, 'catatan' => 'wesrd', 'dokumen' => 'dokumen/su9SRtSK4tY9hDTrsY9KlWRryBK4SkOzphzc90aJ.pdf', 'status' => 'aktif', 'tanggal_mulai' => null, 'tanggal_selesai' => null],
            ['id_dokumen' => 20, 'catatan' => 'qwerty', 'dokumen' => 'dokumen/yNtxqgjwAnQ6nqSpnEmXXb3BtjGEpqTnAdQILwp7.pdf', 'status' => 'aktif', 'tanggal_mulai' => null, 'tanggal_selesai' => null],
            ['id_dokumen' => 21, 'catatan' => 'PLIZ WORK', 'dokumen' => 'dokumen/HuNZt77PT3F0gQgV9DNZRWIofKUBtKw5UDkmKA1Z.pdf', 'status' => 'aktif', 'tanggal_mulai' => null, 'tanggal_selesai' => null],
        ]);
    }
}