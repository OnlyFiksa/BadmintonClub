<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AnggotaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'       => 'Taufik Hidayat',
                'posisi'     => 'Atlet Tunggal',
                'foto'       => 'default.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'nama'       => 'Hendra Setiawan',
                'posisi'     => 'Atlet Ganda',
                'foto'       => 'default.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ]
        ];

        // Insert ke database
        $this->db->table('anggota')->insertBatch($data);
    }
}