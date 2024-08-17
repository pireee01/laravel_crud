<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrediksiNama;

class PrediksiNamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data
        $data = [
            [
                'id_admin' => 1,
                'nama' => 'Aiko Tanaka',
                'negara_1' => 'Jepang',
                'negara_2' => null,
                'negara_3' => null,
                'negara_4' => null,
            ],
            [
                'id_admin' => 1,
                'nama' => 'Kim Taehyung',
                'negara_1' => 'Korea Selatan',
                'negara_2' => null,
                'negara_3' => null,
                'negara_4' => null,
            ],
            [
                'id_admin' => 1,
                'nama' => 'John Smith',
                'negara_1' => 'Inggris',
                'negara_2' => 'Amerika Serikat',
                'negara_3' => 'Australia',
                'negara_4' => null,
            ],
            [
                'id_admin' => 1,
                'nama' => 'Maria Garcia',
                'negara_1' => 'Spanyol',
                'negara_2' => 'Meksiko',
                'negara_3' => 'Argentina',
                'negara_4' => null,
            ],
            [
                'id_admin' => 1,
                'nama' => 'Ahmed Khan',
                'negara_1' => 'India',
                'negara_2' => 'Pakistan',
                'negara_3' => 'Bangladesh',
                'negara_4' => null,
            ],
            [
                'id_admin' => 1,
                'nama' => 'Olivia Dubois',
                'negara_1' => 'Perancis',
                'negara_2' => 'Kanada',
                'negara_3' => null,
                'negara_4' => null,
            ],
            [
                'id_admin' => 1,
                'nama' => 'Ivan Petrov',
                'negara_1' => 'Rusia',
                'negara_2' => null,
                'negara_3' => null,
                'negara_4' => null,
            ],
            [
                'id_admin' => 1,
                'nama' => 'Sofia Rossi',
                'negara_1' => 'Italia',
                'negara_2' => null,
                'negara_3' => null,
                'negara_4' => null,
            ],
            [
                'id_admin' => 1,
                'nama' => 'Muhammad Ali',
                'negara_1' => 'Mesir',
                'negara_2' => 'Arab Saudi',
                'negara_3' => 'Maroko',
                'negara_4' => null,
            ],
            [
                'id_admin' => 1,
                'nama' => 'Emily Chen',
                'negara_1' => 'Tiongkok',
                'negara_2' => 'Taiwan',
                'negara_3' => null,
                'negara_4' => null,
            ],
        ];

        // Insert data to database
        foreach ($data as $item) {
            PrediksiNama::create($item);
        }
    }
}