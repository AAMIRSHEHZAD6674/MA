<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('offices')->delete();
        
        \DB::table('offices')->insert(array (
            0 => 
            array (
                'id' => 1,
                'district_id' => 2,
            'name' => 'Abbottabad (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'district_id' => 2,
            'name' => 'Birote (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'district_id' => 2,
            'name' => 'Boi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'district_id' => 2,
            'name' => 'Chamhad (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'district_id' => 2,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'district_id' => 2,
            'name' => 'Dhamtour (F)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'district_id' => 2,
            'name' => 'Dhamtour (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'district_id' => 2,
            'name' => 'Hajia Gali (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'district_id' => 2,
            'name' => 'Havelian (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'district_id' => 2,
            'name' => 'Lora (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'district_id' => 2,
            'name' => 'Nagri Tutial (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'district_id' => 2,
            'name' => 'Nathia Gali (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'district_id' => 2,
            'name' => 'Pind Kargu Khan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'district_id' => 2,
            'name' => 'Qalandar Abad (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'district_id' => 2,
            'name' => 'Sherwan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'district_id' => 2,
            'name' => 'Abbottabad (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'district_id' => 2,
            'name' => 'Birote (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'district_id' => 2,
            'name' => 'Boi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'district_id' => 2,
            'name' => 'Chamhad (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'district_id' => 2,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'district_id' => 2,
            'name' => 'Dhamtour (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'district_id' => 2,
            'name' => 'Dhamtour (M)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'district_id' => 2,
            'name' => 'Hajia Gali (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'district_id' => 2,
            'name' => 'Havelian (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'district_id' => 2,
            'name' => 'Lora (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'district_id' => 2,
            'name' => 'Nagri Tutial (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'district_id' => 2,
            'name' => 'Nathia Gali (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'district_id' => 2,
            'name' => 'Pind Kargu Khan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'district_id' => 2,
            'name' => 'Qalandar Abad (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'district_id' => 2,
            'name' => 'Sherwan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'district_id' => 3,
            'name' => 'Barang (F)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'district_id' => 3,
            'name' => 'Barang (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'district_id' => 3,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'district_id' => 3,
            'name' => 'Khar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'district_id' => 3,
            'name' => 'Mamund (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'district_id' => 3,
            'name' => 'Nawagai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'district_id' => 3,
            'name' => 'Salarzai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'district_id' => 3,
            'name' => 'Utmankhel (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'district_id' => 3,
            'name' => 'Barang (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'district_id' => 3,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'district_id' => 3,
            'name' => 'Khar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'district_id' => 3,
            'name' => 'Mamund (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'district_id' => 3,
            'name' => 'Nawagai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'district_id' => 3,
            'name' => 'Salarzai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'district_id' => 3,
            'name' => 'Utmankhel (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'district_id' => 4,
            'name' => 'Baka Khel-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'district_id' => 4,
            'name' => 'Baka Khel-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'district_id' => 4,
            'name' => 'Bannu City (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'district_id' => 4,
            'name' => 'Boza Khel (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'district_id' => 4,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'district_id' => 4,
            'name' => 'Domel (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'district_id' => 4,
            'name' => 'Faiz Talab Abbas Mandan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'district_id' => 4,
            'name' => 'Jhando Khel (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'district_id' => 4,
            'name' => 'Kakki (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'district_id' => 4,
            'name' => 'Kotka Muhammad Khan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'district_id' => 4,
            'name' => 'Mamash Khel (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'district_id' => 4,
            'name' => 'Miryan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'district_id' => 4,
            'name' => 'Nurar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'district_id' => 4,
            'name' => 'Shaheed Baba (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'district_id' => 4,
            'name' => 'Taji Killa (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'district_id' => 4,
            'name' => 'Bahader Mank Khel (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'district_id' => 4,
            'name' => 'Bannu City (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'district_id' => 4,
            'name' => 'Daud Khel Nurar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'district_id' => 4,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'district_id' => 4,
            'name' => 'Dheri Saedan Mamash khel (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'district_id' => 4,
            'name' => 'Habib Ullah Baji khel Floor Mill (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'district_id' => 4,
            'name' => 'Jhando Khel (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'district_id' => 4,
            'name' => 'Kacha Bachak Ghoriwala (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'district_id' => 4,
            'name' => 'Koti Sadat (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'district_id' => 4,
            'name' => 'Kotka Muhammad Khan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'district_id' => 4,
            'name' => 'Nekum Kakki (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'district_id' => 4,
            'name' => 'Shaheed Baba (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'district_id' => 4,
            'name' => 'Township (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'district_id' => 5,
            'name' => 'Battagram (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'district_id' => 5,
            'name' => 'Battamori (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'district_id' => 5,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'district_id' => 5,
            'name' => 'Karg Allai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'district_id' => 5,
            'name' => 'Pora Kuzabanda (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'district_id' => 5,
            'name' => 'Thakot (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'district_id' => 5,
            'name' => 'Battagram (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'district_id' => 5,
            'name' => 'Battamori (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'district_id' => 5,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'district_id' => 5,
            'name' => 'Karg Allai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'district_id' => 5,
            'name' => 'Karg Allai (M)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'district_id' => 5,
            'name' => 'Pora Kuzabanda (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'district_id' => 5,
            'name' => 'Thakot (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'district_id' => 6,
            'name' => 'Amazai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'district_id' => 6,
            'name' => 'Ambela (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'district_id' => 6,
            'name' => 'Batara (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'district_id' => 6,
            'name' => 'Daggar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'district_id' => 6,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'district_id' => 6,
            'name' => 'Dewana Baba (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'district_id' => 6,
            'name' => 'Gadezi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'district_id' => 6,
            'name' => 'Mirzakay (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'district_id' => 6,
            'name' => 'Amazai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'district_id' => 6,
            'name' => 'Ambela (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'district_id' => 6,
            'name' => 'Batara (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'district_id' => 6,
            'name' => 'Daggar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'district_id' => 6,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'district_id' => 6,
            'name' => 'Dewana Baba (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'district_id' => 6,
            'name' => 'Gadezi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'district_id' => 6,
            'name' => 'Mirzakay (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'district_id' => 7,
            'name' => 'Charsadda Khass (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'district_id' => 7,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'district_id' => 7,
            'name' => 'Hisara Yaseen Zai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'district_id' => 7,
            'name' => 'Mandani (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'district_id' => 7,
            'name' => 'Nahaqi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'district_id' => 7,
            'name' => 'Shabqadar 1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'district_id' => 7,
            'name' => 'Shakar Dhand (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'district_id' => 7,
            'name' => 'Tangi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'district_id' => 7,
            'name' => 'Umarzai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'district_id' => 7,
            'name' => 'Utmanzai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'district_id' => 7,
            'name' => 'Charsadda Khass (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'district_id' => 7,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'district_id' => 7,
            'name' => 'Ghunda Karkana (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'district_id' => 7,
            'name' => 'Gul Bahar Kuladher (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'district_id' => 7,
            'name' => 'Mandani (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'district_id' => 7,
            'name' => 'Shabqadar 1 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'district_id' => 7,
            'name' => 'Shabqadar 2 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'district_id' => 7,
            'name' => 'Shakar Dhand (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'district_id' => 7,
            'name' => 'Tangi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'district_id' => 7,
            'name' => 'Tora Panra (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'district_id' => 7,
            'name' => 'Umarzai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'district_id' => 7,
            'name' => 'Utmanzai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'district_id' => 8,
            'name' => 'Chaudwan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'district_id' => 8,
            'name' => 'D.I.Khan City (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'district_id' => 8,
            'name' => 'Daraban Kalan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'district_id' => 8,
            'name' => 'Daraban Khurd (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'district_id' => 8,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'district_id' => 8,
            'name' => 'Dhakki (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'district_id' => 8,
            'name' => 'Kulachi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'district_id' => 8,
            'name' => 'Kurai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'district_id' => 8,
            'name' => 'Mandhra Kalan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'district_id' => 8,
            'name' => 'Paharpur (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'district_id' => 8,
            'name' => 'Paniala (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'district_id' => 8,
            'name' => 'Paroa (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'district_id' => 8,
            'name' => 'D.I.Khan City (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'district_id' => 8,
            'name' => 'Daraban Kalan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'district_id' => 8,
            'name' => 'Daraban Khurd (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'district_id' => 8,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'district_id' => 8,
            'name' => 'Dhakki (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'district_id' => 8,
            'name' => 'Kulachi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'district_id' => 8,
            'name' => 'Kurai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'district_id' => 8,
            'name' => 'Paharpur (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'district_id' => 8,
            'name' => 'Paniala (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'district_id' => 8,
            'name' => 'Paroa (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'district_id' => 8,
            'name' => 'Shore Kot (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'district_id' => 8,
            'name' => 'Yarak (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'district_id' => 9,
            'name' => 'Barawal (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'district_id' => 9,
            'name' => 'Chukyatan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'district_id' => 9,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'district_id' => 9,
            'name' => 'Kalkot (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'district_id' => 9,
            'name' => 'Larjam (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'district_id' => 9,
            'name' => 'Rehankot (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'district_id' => 9,
            'name' => 'Sahib Abad (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'district_id' => 9,
            'name' => 'Sheringal (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'district_id' => 9,
            'name' => 'Wari (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'district_id' => 9,
            'name' => 'Barawal (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'district_id' => 9,
            'name' => 'Chukyatan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'district_id' => 9,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'district_id' => 9,
            'name' => 'Kalkot (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'district_id' => 9,
            'name' => 'Larjam (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'district_id' => 9,
            'name' => 'Rehankot (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'district_id' => 9,
            'name' => 'Rehankot (M)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'district_id' => 9,
            'name' => 'Sahib Abad (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'district_id' => 9,
            'name' => 'Sheringal (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'district_id' => 9,
            'name' => 'Wari (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'district_id' => 10,
            'name' => 'Asbanr (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'district_id' => 10,
            'name' => 'Chakdara (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'district_id' => 10,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'district_id' => 10,
            'name' => 'Hayaserai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'district_id' => 10,
            'name' => 'Khall (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'district_id' => 10,
            'name' => 'Kityari (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'district_id' => 10,
            'name' => 'Kumbar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'district_id' => 10,
            'name' => 'Lal Qilla (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'district_id' => 10,
            'name' => 'Mayar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'district_id' => 10,
            'name' => 'Munda (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'district_id' => 10,
            'name' => 'Rabat (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'district_id' => 10,
            'name' => 'Samarbagh (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'district_id' => 10,
            'name' => 'Timergara (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'district_id' => 10,
            'name' => 'Ziarat Talash (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'district_id' => 10,
            'name' => 'Asbnar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'district_id' => 10,
            'name' => 'Chakdara (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'district_id' => 10,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'district_id' => 10,
            'name' => 'Hayaserai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'district_id' => 10,
            'name' => 'Khall (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'district_id' => 10,
            'name' => 'Kumbar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'district_id' => 10,
            'name' => 'Lal Qilla (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'district_id' => 10,
            'name' => 'Mayar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'district_id' => 10,
            'name' => 'Munda (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'district_id' => 10,
            'name' => 'Ouch (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'district_id' => 10,
            'name' => 'Rabat (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'district_id' => 10,
            'name' => 'Samarbagh (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'district_id' => 10,
            'name' => 'Timergara (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'district_id' => 10,
            'name' => 'Ziarat Talash (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'district_id' => 11,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'district_id' => 11,
            'name' => 'Hangu City (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'district_id' => 11,
            'name' => 'Jawar Ghundi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'district_id' => 11,
            'name' => 'Turkani (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'district_id' => 11,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'district_id' => 11,
            'name' => 'Hangu City (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'district_id' => 11,
            'name' => 'Jawar Ghundi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'district_id' => 12,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'district_id' => 12,
            'name' => 'Ghazi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'district_id' => 12,
            'name' => 'Haripur (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'district_id' => 12,
            'name' => 'Khanpur (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'district_id' => 12,
            'name' => 'Kohala Bala (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'district_id' => 12,
            'name' => 'Kotnajibullah (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'district_id' => 12,
            'name' => 'Nara Amazai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'district_id' => 12,
            'name' => 'Pharrala (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'district_id' => 12,
            'name' => 'Sarai Saleh (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'district_id' => 12,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'district_id' => 12,
            'name' => 'Ghazi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
                'district_id' => 12,
            'name' => 'Haripur (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'district_id' => 12,
            'name' => 'Khanpur (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'district_id' => 12,
            'name' => 'Kohala (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'district_id' => 12,
            'name' => 'Kotnajibullah (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'district_id' => 12,
            'name' => 'Nara Amazai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'district_id' => 12,
            'name' => 'Pharrala (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'district_id' => 12,
            'name' => 'Sarai Saleh (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'district_id' => 13,
            'name' => 'Ahmadi Banda (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'district_id' => 13,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
                'district_id' => 13,
            'name' => 'Jehangiri (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'district_id' => 13,
            'name' => 'Khurram (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
                'district_id' => 13,
            'name' => 'Official Colony (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'district_id' => 13,
            'name' => 'Sabir Abad (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
                'district_id' => 13,
            'name' => 'Takht-e-Nasrati (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
                'district_id' => 13,
            'name' => 'Ahmadi Banda (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
                'district_id' => 13,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
                'district_id' => 13,
            'name' => 'Hamidan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
                'district_id' => 13,
            'name' => 'Khurram (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
                'district_id' => 13,
            'name' => 'Masheri Banda (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
                'district_id' => 13,
            'name' => 'Sabir Abad (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
                'district_id' => 13,
            'name' => 'Takht-e-Nasrati  (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
                'district_id' => 14,
            'name' => 'Bara-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
                'district_id' => 14,
            'name' => 'Bara-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
                'district_id' => 14,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
                'district_id' => 14,
            'name' => 'Jamrud-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
                'district_id' => 14,
            'name' => 'Jamrud-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
                'district_id' => 14,
            'name' => 'Landikotal-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
                'district_id' => 14,
            'name' => 'Landikotal-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
                'district_id' => 14,
            'name' => 'Bara-1 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
                'district_id' => 14,
            'name' => 'Bara-2 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
                'district_id' => 14,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
                'district_id' => 14,
            'name' => 'Jamrud-1 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
                'district_id' => 14,
            'name' => 'Jamrud-2 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
                'district_id' => 14,
            'name' => 'Landikotal-1 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
                'district_id' => 14,
            'name' => 'Landikotal-2 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 => 
            array (
                'id' => 249,
                'district_id' => 15,
            'name' => 'City (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 => 
            array (
                'id' => 250,
                'district_id' => 15,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 => 
            array (
                'id' => 251,
                'district_id' => 15,
            'name' => 'Gumbat (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 => 
            array (
                'id' => 252,
                'district_id' => 15,
            'name' => 'Jarma (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 => 
            array (
                'id' => 253,
                'district_id' => 15,
            'name' => 'Lachi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 => 
            array (
                'id' => 254,
                'district_id' => 15,
            'name' => 'Togh (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 => 
            array (
                'id' => 255,
                'district_id' => 15,
            'name' => 'City (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 => 
            array (
                'id' => 256,
                'district_id' => 15,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 => 
            array (
                'id' => 257,
                'district_id' => 15,
            'name' => 'Gumbat (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 => 
            array (
                'id' => 258,
                'district_id' => 15,
            'name' => 'Lachi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 => 
            array (
                'id' => 259,
                'district_id' => 15,
            'name' => 'Muhammad Zai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 => 
            array (
                'id' => 260,
                'district_id' => 15,
            'name' => 'Togh (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 => 
            array (
                'id' => 261,
                'district_id' => 16,
            'name' => 'Bar Pallas (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 => 
            array (
                'id' => 262,
                'district_id' => 16,
            'name' => 'Bataitra Kolai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 => 
            array (
                'id' => 263,
                'district_id' => 16,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 => 
            array (
                'id' => 264,
                'district_id' => 16,
            'name' => 'Kuz Pallas (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 => 
            array (
                'id' => 265,
                'district_id' => 16,
            'name' => 'Bar Pallas (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 => 
            array (
                'id' => 266,
                'district_id' => 16,
            'name' => 'Bataitra Kolai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 => 
            array (
                'id' => 267,
                'district_id' => 16,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 => 
            array (
                'id' => 268,
                'district_id' => 16,
            'name' => 'Kuz Pallas (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 => 
            array (
                'id' => 269,
                'district_id' => 17,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 => 
            array (
                'id' => 270,
                'district_id' => 17,
            'name' => 'SDEO(M) CK',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 => 
            array (
                'id' => 271,
                'district_id' => 17,
            'name' => 'SDEO(M) LK',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 => 
            array (
                'id' => 272,
                'district_id' => 17,
            'name' => 'SDEO(M) UK',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 => 
            array (
                'id' => 273,
                'district_id' => 17,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 => 
            array (
                'id' => 274,
                'district_id' => 17,
            'name' => 'SDEO(F) CK',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 => 
            array (
                'id' => 275,
                'district_id' => 17,
            'name' => 'SDEO(F) LK',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 => 
            array (
                'id' => 276,
                'district_id' => 17,
            'name' => 'SDEO(F) UK',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 => 
            array (
                'id' => 277,
                'district_id' => 17,
            'name' => 'SDEO(M) UK',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 => 
            array (
                'id' => 278,
                'district_id' => 18,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 => 
            array (
                'id' => 279,
                'district_id' => 18,
            'name' => 'Gandi Khan Khel (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 => 
            array (
                'id' => 280,
                'district_id' => 18,
            'name' => 'Michen Khel (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 => 
            array (
                'id' => 281,
                'district_id' => 18,
            'name' => 'Mina Khel (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 => 
            array (
                'id' => 282,
                'district_id' => 18,
            'name' => 'Sarai Naurang (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 => 
            array (
                'id' => 283,
                'district_id' => 18,
            'name' => 'Taja Zai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 => 
            array (
                'id' => 284,
                'district_id' => 18,
            'name' => 'Tajori (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 => 
            array (
                'id' => 285,
                'district_id' => 18,
            'name' => 'Titer Khel  (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 => 
            array (
                'id' => 286,
                'district_id' => 18,
            'name' => 'Wanda Mash/Landiwah (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 => 
            array (
                'id' => 287,
                'district_id' => 18,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 => 
            array (
                'id' => 288,
                'district_id' => 18,
            'name' => 'Gandi Khan Khel (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 => 
            array (
                'id' => 289,
                'district_id' => 18,
            'name' => 'Mina Khel (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 => 
            array (
                'id' => 290,
                'district_id' => 18,
            'name' => 'Sarai Naurang (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 => 
            array (
                'id' => 291,
                'district_id' => 18,
            'name' => 'Sarai Naurang (M)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 => 
            array (
                'id' => 292,
                'district_id' => 18,
            'name' => 'Taja Zai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 => 
            array (
                'id' => 293,
                'district_id' => 18,
            'name' => 'Tajori (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 => 
            array (
                'id' => 294,
                'district_id' => 18,
            'name' => 'Titer Khel  (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 => 
            array (
                'id' => 295,
                'district_id' => 18,
            'name' => 'Wanda Mash/Landiwah (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 => 
            array (
                'id' => 296,
                'district_id' => 19,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 => 
            array (
                'id' => 297,
                'district_id' => 19,
            'name' => 'Drosh (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 => 
            array (
                'id' => 298,
                'district_id' => 19,
            'name' => 'Garam Chashma (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 => 
            array (
                'id' => 299,
                'district_id' => 19,
            'name' => 'Jughoor (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 => 
            array (
                'id' => 300,
                'district_id' => 19,
            'name' => 'Ariyan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 => 
            array (
                'id' => 301,
                'district_id' => 19,
            'name' => 'Dargirdini (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 => 
            array (
                'id' => 302,
                'district_id' => 19,
            'name' => 'Denin (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 => 
            array (
                'id' => 303,
                'district_id' => 19,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 => 
            array (
                'id' => 304,
                'district_id' => 20,
            'name' => 'Bankad (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 => 
            array (
                'id' => 305,
                'district_id' => 20,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 => 
            array (
                'id' => 306,
                'district_id' => 20,
            'name' => 'Pattan-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 => 
            array (
                'id' => 307,
                'district_id' => 20,
            'name' => 'Pattan-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 => 
            array (
                'id' => 308,
                'district_id' => 20,
            'name' => 'Bankad (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 => 
            array (
                'id' => 309,
                'district_id' => 20,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 => 
            array (
                'id' => 310,
                'district_id' => 20,
            'name' => 'Pattan-1 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 => 
            array (
                'id' => 311,
                'district_id' => 20,
            'name' => 'Pattan-2 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 => 
            array (
                'id' => 312,
                'district_id' => 21,
            'name' => 'Batkhela (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 => 
            array (
                'id' => 313,
                'district_id' => 21,
            'name' => 'Dargai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 => 
            array (
                'id' => 314,
                'district_id' => 21,
            'name' => 'DEO(M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 => 
            array (
                'id' => 315,
                'district_id' => 21,
            'name' => 'Thana (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 => 
            array (
                'id' => 316,
                'district_id' => 21,
            'name' => 'Totakan (F)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 => 
            array (
                'id' => 317,
                'district_id' => 21,
            'name' => 'Totakan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 => 
            array (
                'id' => 318,
                'district_id' => 21,
            'name' => 'Zormandi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 => 
            array (
                'id' => 319,
                'district_id' => 21,
            'name' => 'Batkhela (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 => 
            array (
                'id' => 320,
                'district_id' => 21,
            'name' => 'Dargai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 => 
            array (
                'id' => 321,
                'district_id' => 21,
            'name' => 'Thana (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 => 
            array (
                'id' => 322,
                'district_id' => 21,
            'name' => 'Totakan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 => 
            array (
                'id' => 323,
                'district_id' => 21,
            'name' => 'Zormandi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 => 
            array (
                'id' => 324,
                'district_id' => 22,
            'name' => 'Baffa (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 => 
            array (
                'id' => 325,
                'district_id' => 22,
            'name' => 'Balakot (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 => 
            array (
                'id' => 326,
                'district_id' => 22,
            'name' => 'Battal (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 => 
            array (
                'id' => 327,
                'district_id' => 22,
            'name' => 'Darband (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 => 
            array (
                'id' => 328,
                'district_id' => 22,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 => 
            array (
                'id' => 329,
                'district_id' => 22,
            'name' => 'Dhodial (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 => 
            array (
                'id' => 330,
                'district_id' => 22,
            'name' => 'Garhi Habibullah (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 => 
            array (
                'id' => 331,
                'district_id' => 22,
            'name' => 'Hangrai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 => 
            array (
                'id' => 332,
                'district_id' => 22,
            'name' => 'Kaghan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 => 
            array (
                'id' => 333,
                'district_id' => 22,
            'name' => 'Khaki (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 => 
            array (
                'id' => 334,
                'district_id' => 22,
            'name' => 'Mansehra (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 => 
            array (
                'id' => 335,
                'district_id' => 22,
            'name' => 'Oghi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 => 
            array (
                'id' => 336,
                'district_id' => 22,
            'name' => 'Phulra (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 => 
            array (
                'id' => 337,
                'district_id' => 22,
            'name' => 'Shahelia (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 => 
            array (
                'id' => 338,
                'district_id' => 22,
            'name' => 'Shergarh (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 => 
            array (
                'id' => 339,
                'district_id' => 22,
            'name' => 'Baffa (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 => 
            array (
                'id' => 340,
                'district_id' => 22,
            'name' => 'Balakot (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 => 
            array (
                'id' => 341,
                'district_id' => 22,
            'name' => 'Battal (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 => 
            array (
                'id' => 342,
                'district_id' => 22,
            'name' => 'Darband (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 => 
            array (
                'id' => 343,
                'district_id' => 22,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 => 
            array (
                'id' => 344,
                'district_id' => 22,
            'name' => 'Dhodial (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 => 
            array (
                'id' => 345,
                'district_id' => 22,
            'name' => 'Garhi Habibullah (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 => 
            array (
                'id' => 346,
                'district_id' => 22,
            'name' => 'Jabori (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 => 
            array (
                'id' => 347,
                'district_id' => 22,
            'name' => 'Kaghan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 => 
            array (
                'id' => 348,
                'district_id' => 22,
            'name' => 'Mansehra 1 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 => 
            array (
                'id' => 349,
                'district_id' => 22,
            'name' => 'Mansehra 2 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 => 
            array (
                'id' => 350,
                'district_id' => 22,
            'name' => 'Mansehra 3 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 => 
            array (
                'id' => 351,
                'district_id' => 22,
            'name' => 'Oghi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 => 
            array (
                'id' => 352,
                'district_id' => 22,
            'name' => 'PHULRA (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 => 
            array (
                'id' => 353,
                'district_id' => 22,
            'name' => 'Shergarh (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 => 
            array (
                'id' => 354,
                'district_id' => 23,
            'name' => 'Baizai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 => 
            array (
                'id' => 355,
                'district_id' => 23,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 => 
            array (
                'id' => 356,
                'district_id' => 23,
            'name' => 'Gujrat (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 => 
            array (
                'id' => 357,
                'district_id' => 23,
            'name' => 'Gumbat (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 => 
            array (
                'id' => 358,
                'district_id' => 23,
            'name' => 'Kata Khat (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 => 
            array (
                'id' => 359,
                'district_id' => 23,
            'name' => 'Katlang (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 => 
            array (
                'id' => 360,
                'district_id' => 23,
            'name' => 'Lund Khwar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 => 
            array (
                'id' => 361,
                'district_id' => 23,
            'name' => 'Mardan Khas (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 => 
            array (
                'id' => 362,
                'district_id' => 23,
            'name' => 'Rustam (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 => 
            array (
                'id' => 363,
                'district_id' => 23,
            'name' => 'Shahbaz Garhi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 => 
            array (
                'id' => 364,
                'district_id' => 23,
            'name' => 'Sharqi Hoti (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 => 
            array (
                'id' => 365,
                'district_id' => 23,
            'name' => 'Sher Garh (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 => 
            array (
                'id' => 366,
                'district_id' => 23,
            'name' => 'Takht Bhai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 => 
            array (
                'id' => 367,
                'district_id' => 23,
            'name' => 'Takkar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 => 
            array (
                'id' => 368,
                'district_id' => 23,
            'name' => 'Baizai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 => 
            array (
                'id' => 369,
                'district_id' => 23,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 => 
            array (
                'id' => 370,
                'district_id' => 23,
            'name' => 'Garhi Kapoora (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 => 
            array (
                'id' => 371,
                'district_id' => 23,
            'name' => 'Gujrat (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 => 
            array (
                'id' => 372,
                'district_id' => 23,
            'name' => 'Kata Khat (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 => 
            array (
                'id' => 373,
                'district_id' => 23,
            'name' => 'Katlang (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 => 
            array (
                'id' => 374,
                'district_id' => 23,
            'name' => 'Lund Khwar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 => 
            array (
                'id' => 375,
                'district_id' => 23,
            'name' => 'Mardan Khas (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 => 
            array (
                'id' => 376,
                'district_id' => 23,
            'name' => 'Rustam (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 => 
            array (
                'id' => 377,
                'district_id' => 23,
            'name' => 'Shahbaz Garhi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 => 
            array (
                'id' => 378,
                'district_id' => 23,
            'name' => 'Sharqi Hoti (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 => 
            array (
                'id' => 379,
                'district_id' => 23,
            'name' => 'Sher Garh (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 => 
            array (
                'id' => 380,
                'district_id' => 23,
            'name' => 'Takht Bhai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 => 
            array (
                'id' => 381,
                'district_id' => 23,
            'name' => 'Takkar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 => 
            array (
                'id' => 382,
                'district_id' => 24,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 => 
            array (
                'id' => 383,
                'district_id' => 24,
            'name' => 'Ekka Ghund/Prang Ghar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 => 
            array (
                'id' => 384,
                'district_id' => 24,
            'name' => 'Halimzai/Safi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 => 
            array (
                'id' => 385,
                'district_id' => 24,
            'name' => 'Khwezai/Baizai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 => 
            array (
                'id' => 386,
                'district_id' => 24,
            'name' => 'Pandiali/Ambar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 => 
            array (
                'id' => 387,
                'district_id' => 24,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 => 
            array (
                'id' => 388,
                'district_id' => 24,
            'name' => 'Ekka Ghund/Prang Ghar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 => 
            array (
                'id' => 389,
                'district_id' => 24,
            'name' => 'Halimzai/Safi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 => 
            array (
                'id' => 390,
                'district_id' => 24,
            'name' => 'Khwezai/Baizai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 => 
            array (
                'id' => 391,
                'district_id' => 24,
            'name' => 'Pandiali/Ambar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 => 
            array (
                'id' => 392,
                'district_id' => 25,
            'name' => 'Dattakhel Ghulam Khan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 => 
            array (
                'id' => 393,
                'district_id' => 25,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 => 
            array (
                'id' => 394,
                'district_id' => 25,
            'name' => 'Dossali Garyum (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 => 
            array (
                'id' => 395,
                'district_id' => 25,
            'name' => 'Mirali (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 => 
            array (
                'id' => 396,
                'district_id' => 25,
            'name' => 'Miranshah (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 => 
            array (
                'id' => 397,
                'district_id' => 25,
            'name' => 'Razmak Shawal (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 => 
            array (
                'id' => 398,
                'district_id' => 25,
            'name' => 'Shewa Spinwam (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 => 
            array (
                'id' => 399,
                'district_id' => 25,
            'name' => 'Dattakhel Ghulam Khan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 => 
            array (
                'id' => 400,
                'district_id' => 25,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 => 
            array (
                'id' => 401,
                'district_id' => 25,
            'name' => 'Dossali Garyum (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 => 
            array (
                'id' => 402,
                'district_id' => 25,
            'name' => 'Mirali (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 => 
            array (
                'id' => 403,
                'district_id' => 25,
            'name' => 'Miranshah (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 => 
            array (
                'id' => 404,
                'district_id' => 25,
            'name' => 'Razmak Shawal (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 => 
            array (
                'id' => 405,
                'district_id' => 25,
            'name' => 'Shewa Spinwam (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 => 
            array (
                'id' => 406,
                'district_id' => 26,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 => 
            array (
                'id' => 407,
                'district_id' => 26,
            'name' => 'Nowshera (M)  ',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 => 
            array (
                'id' => 408,
                'district_id' => 26,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 => 
            array (
                'id' => 409,
                'district_id' => 27,
            'name' => 'Central Orakzai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 => 
            array (
                'id' => 410,
                'district_id' => 27,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 => 
            array (
                'id' => 411,
                'district_id' => 27,
            'name' => 'Ismailzai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 => 
            array (
                'id' => 412,
                'district_id' => 27,
            'name' => 'Lower Orakzai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 => 
            array (
                'id' => 413,
                'district_id' => 27,
            'name' => 'Upper Orakzai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 => 
            array (
                'id' => 414,
                'district_id' => 27,
            'name' => 'Central Orakzai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 => 
            array (
                'id' => 415,
                'district_id' => 27,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 => 
            array (
                'id' => 416,
                'district_id' => 27,
            'name' => 'Ismailzai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 => 
            array (
                'id' => 417,
                'district_id' => 27,
            'name' => 'Lower Orakzai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 => 
            array (
                'id' => 418,
                'district_id' => 27,
            'name' => 'Upper Orakzai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 => 
            array (
                'id' => 419,
                'district_id' => 28,
            'name' => 'Badaber (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 => 
            array (
                'id' => 420,
                'district_id' => 28,
            'name' => 'Cantt (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 => 
            array (
                'id' => 421,
                'district_id' => 28,
            'name' => 'Chughal Pura (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 => 
            array (
                'id' => 422,
                'district_id' => 28,
            'name' => 'City (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 => 
            array (
                'id' => 423,
                'district_id' => 28,
            'name' => 'Daudzai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 => 
            array (
                'id' => 424,
                'district_id' => 28,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 => 
            array (
                'id' => 425,
                'district_id' => 28,
            'name' => 'Hayat Abad (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 => 
            array (
                'id' => 426,
                'district_id' => 28,
            'name' => 'Hazar Khawani (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 => 
            array (
                'id' => 427,
                'district_id' => 28,
            'name' => 'Mathra (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 => 
            array (
                'id' => 428,
                'district_id' => 28,
            'name' => 'Mattani (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 => 
            array (
                'id' => 429,
                'district_id' => 28,
            'name' => 'Takht Abad (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 => 
            array (
                'id' => 430,
                'district_id' => 28,
            'name' => 'Urmar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 => 
            array (
                'id' => 431,
                'district_id' => 28,
            'name' => 'Badaber (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 => 
            array (
                'id' => 432,
                'district_id' => 28,
            'name' => 'Badaber (M)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 => 
            array (
                'id' => 433,
                'district_id' => 28,
            'name' => 'Cantt (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 => 
            array (
                'id' => 434,
                'district_id' => 28,
            'name' => 'Chughal Pura (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 => 
            array (
                'id' => 435,
                'district_id' => 28,
            'name' => 'City (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 => 
            array (
                'id' => 436,
                'district_id' => 28,
            'name' => 'Daudzai-1 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 => 
            array (
                'id' => 437,
                'district_id' => 28,
            'name' => 'Daudzai-2 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 => 
            array (
                'id' => 438,
                'district_id' => 28,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 => 
            array (
                'id' => 439,
                'district_id' => 28,
            'name' => 'Hayat Abad (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 => 
            array (
                'id' => 440,
                'district_id' => 28,
            'name' => 'Hazar Khawani (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 => 
            array (
                'id' => 441,
                'district_id' => 28,
            'name' => 'Mathra-1 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 => 
            array (
                'id' => 442,
                'district_id' => 28,
            'name' => 'Mathra-2 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 => 
            array (
                'id' => 443,
                'district_id' => 28,
            'name' => 'Mattani (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 => 
            array (
                'id' => 444,
                'district_id' => 28,
            'name' => 'Urmar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 => 
            array (
                'id' => 445,
                'district_id' => 29,
            'name' => 'Aloch (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 => 
            array (
                'id' => 446,
                'district_id' => 29,
            'name' => 'Alpuri (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 => 
            array (
                'id' => 447,
                'district_id' => 29,
            'name' => 'Butyal (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 => 
            array (
                'id' => 448,
                'district_id' => 29,
            'name' => 'Chakesar (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 => 
            array (
                'id' => 449,
                'district_id' => 29,
            'name' => 'Dehrai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 => 
            array (
                'id' => 450,
                'district_id' => 29,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 => 
            array (
                'id' => 451,
                'district_id' => 29,
            'name' => 'Martung (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 => 
            array (
                'id' => 452,
                'district_id' => 29,
            'name' => 'Ranayal (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 => 
            array (
                'id' => 453,
                'district_id' => 29,
            'name' => 'Shahpur (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 => 
            array (
                'id' => 454,
                'district_id' => 29,
            'name' => 'Aloch (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 => 
            array (
                'id' => 455,
                'district_id' => 29,
            'name' => 'Alpuri (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 => 
            array (
                'id' => 456,
                'district_id' => 29,
            'name' => 'Besham (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 => 
            array (
                'id' => 457,
                'district_id' => 29,
            'name' => 'Butyal (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 => 
            array (
                'id' => 458,
                'district_id' => 29,
            'name' => 'Chakesar (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 => 
            array (
                'id' => 459,
                'district_id' => 29,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 => 
            array (
                'id' => 460,
                'district_id' => 29,
            'name' => 'Makhozi Martung (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 => 
            array (
                'id' => 461,
                'district_id' => 29,
            'name' => 'Martung (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 => 
            array (
                'id' => 462,
                'district_id' => 29,
            'name' => 'Martung (M)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 => 
            array (
                'id' => 463,
                'district_id' => 29,
            'name' => 'Shahpur (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 => 
            array (
                'id' => 464,
                'district_id' => 30,
            'name' => 'Birmal (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 => 
            array (
                'id' => 465,
                'district_id' => 30,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 => 
            array (
                'id' => 466,
                'district_id' => 30,
            'name' => 'Wana (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 => 
            array (
                'id' => 467,
                'district_id' => 30,
            'name' => 'Birmal (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 => 
            array (
                'id' => 468,
                'district_id' => 30,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 => 
            array (
                'id' => 469,
                'district_id' => 30,
            'name' => 'Wana (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 => 
            array (
                'id' => 470,
                'district_id' => 31,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 => 
            array (
                'id' => 471,
                'district_id' => 31,
            'name' => 'Ladha (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 => 
            array (
                'id' => 472,
                'district_id' => 31,
            'name' => 'Sararogha (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 => 
            array (
                'id' => 473,
                'district_id' => 31,
            'name' => 'Serwekai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 => 
            array (
                'id' => 474,
                'district_id' => 31,
            'name' => 'Tiarza (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 => 
            array (
                'id' => 475,
                'district_id' => 31,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            475 => 
            array (
                'id' => 476,
                'district_id' => 31,
            'name' => 'Ladha (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            476 => 
            array (
                'id' => 477,
                'district_id' => 31,
            'name' => 'Makin (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            477 => 
            array (
                'id' => 478,
                'district_id' => 31,
            'name' => 'Serwekai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            478 => 
            array (
                'id' => 479,
                'district_id' => 31,
            'name' => 'Tiarza (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            479 => 
            array (
                'id' => 480,
                'district_id' => 32,
            'name' => 'Bada (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            480 => 
            array (
                'id' => 481,
                'district_id' => 32,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            481 => 
            array (
                'id' => 482,
                'district_id' => 32,
            'name' => 'Firdos Abad (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            482 => 
            array (
                'id' => 483,
                'district_id' => 32,
            'name' => 'Gul Abad Yar Hussain (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            483 => 
            array (
                'id' => 484,
                'district_id' => 32,
            'name' => 'Kalu Khan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            484 => 
            array (
                'id' => 485,
                'district_id' => 32,
            'name' => 'Kunda (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            485 => 
            array (
                'id' => 486,
                'district_id' => 32,
            'name' => 'Maneri Bala (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            486 => 
            array (
                'id' => 487,
                'district_id' => 32,
            'name' => 'Mathani Changan (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            487 => 
            array (
                'id' => 488,
                'district_id' => 32,
            'name' => 'Thand Koi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            488 => 
            array (
                'id' => 489,
                'district_id' => 32,
            'name' => 'Topi (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            489 => 
            array (
                'id' => 490,
                'district_id' => 32,
            'name' => 'Utla (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            490 => 
            array (
                'id' => 491,
                'district_id' => 32,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            491 => 
            array (
                'id' => 492,
                'district_id' => 32,
            'name' => 'Gabasni (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            492 => 
            array (
                'id' => 493,
                'district_id' => 32,
            'name' => 'Gani Chatra (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            493 => 
            array (
                'id' => 494,
                'district_id' => 32,
            'name' => 'Kalu Khan (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            494 => 
            array (
                'id' => 495,
                'district_id' => 32,
            'name' => 'Lahor (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            495 => 
            array (
                'id' => 496,
                'district_id' => 32,
            'name' => 'Roshan Pora (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            496 => 
            array (
                'id' => 497,
                'district_id' => 32,
            'name' => 'Saifoor Banda (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            497 => 
            array (
                'id' => 498,
                'district_id' => 32,
            'name' => 'Swabi Maneri (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            498 => 
            array (
                'id' => 499,
                'district_id' => 32,
            'name' => 'Thand Koi (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            499 => 
            array (
                'id' => 500,
                'district_id' => 32,
            'name' => 'Topi Bada (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('offices')->insert(array (
            0 => 
            array (
                'id' => 501,
                'district_id' => 32,
            'name' => 'Yar Hussain (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 502,
                'district_id' => 33,
            'name' => 'Babozai-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 503,
                'district_id' => 33,
            'name' => 'Babozai-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 504,
                'district_id' => 33,
            'name' => 'Bahrain-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 505,
                'district_id' => 33,
            'name' => 'Bahrain-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 506,
                'district_id' => 33,
            'name' => 'Barikot (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 507,
                'district_id' => 33,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 508,
                'district_id' => 33,
            'name' => 'Kabal-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 509,
                'district_id' => 33,
            'name' => 'Kabal-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 510,
                'district_id' => 33,
            'name' => 'Khwazakhela-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 511,
                'district_id' => 33,
            'name' => 'Khwazakhela-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 512,
                'district_id' => 33,
            'name' => 'Kot Charbagh (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 513,
                'district_id' => 33,
            'name' => 'Matta-1 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 514,
                'district_id' => 33,
            'name' => 'Matta-2 (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 515,
                'district_id' => 33,
            'name' => 'Babozai-1 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 516,
                'district_id' => 33,
            'name' => 'Babozai-2 (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 517,
                'district_id' => 33,
            'name' => 'Bahrain (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 518,
                'district_id' => 33,
            'name' => 'Barikot (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 519,
                'district_id' => 33,
            'name' => 'Charbagh (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 520,
                'district_id' => 33,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 521,
                'district_id' => 33,
            'name' => 'Kabal (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 522,
                'district_id' => 33,
            'name' => 'Kabal-1 (M)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 523,
                'district_id' => 33,
            'name' => 'Kabal-2 (M)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 524,
                'district_id' => 33,
            'name' => 'Khwazakhela (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 525,
                'district_id' => 33,
            'name' => 'Khwazakhela-1 (M)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 526,
                'district_id' => 33,
            'name' => 'Matta  (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 527,
                'district_id' => 33,
            'name' => 'Matta (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 528,
                'district_id' => 34,
            'name' => 'City (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 529,
                'district_id' => 34,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 530,
                'district_id' => 34,
            'name' => 'Gara Baloch (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 531,
                'district_id' => 34,
            'name' => 'Gomal (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 532,
                'district_id' => 34,
            'name' => 'Tajori (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 533,
                'district_id' => 34,
            'name' => 'Baloch (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 534,
                'district_id' => 34,
            'name' => 'City (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 535,
                'district_id' => 34,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 536,
                'district_id' => 34,
            'name' => 'Gomal (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 537,
                'district_id' => 34,
            'name' => 'Tajori (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 538,
                'district_id' => 35,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 539,
                'district_id' => 35,
            'name' => 'Dour Maira (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 540,
                'district_id' => 35,
            'name' => 'Hassan Zai (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 541,
                'district_id' => 35,
            'name' => 'Judba (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 542,
                'district_id' => 35,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 543,
                'district_id' => 35,
            'name' => 'Dour Maira (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 544,
                'district_id' => 35,
            'name' => 'Hassan Zai (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 545,
                'district_id' => 35,
            'name' => 'Judba (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 546,
                'district_id' => 36,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 547,
                'district_id' => 36,
            'name' => 'Mastuj (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 548,
                'district_id' => 36,
            'name' => 'Mulkhow/Torkhow (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 549,
                'district_id' => 36,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 550,
                'district_id' => 36,
            'name' => 'Mastuj (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 551,
                'district_id' => 36,
            'name' => 'Mulkhow/Torkhow (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 552,
                'district_id' => 37,
            'name' => 'Dassu (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 553,
                'district_id' => 37,
            'name' => 'DEO (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 554,
                'district_id' => 37,
            'name' => 'Harban (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 555,
                'district_id' => 37,
            'name' => 'Kandia (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 556,
                'district_id' => 37,
            'name' => 'Seo (M)',
                'gender' => 'Boys',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 557,
                'district_id' => 37,
            'name' => 'Dassu Harban (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 558,
                'district_id' => 37,
            'name' => 'DEO (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 559,
                'district_id' => 37,
            'name' => 'Harban (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 560,
                'district_id' => 37,
            'name' => 'Kandia (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 561,
                'district_id' => 37,
            'name' => 'Seo (F)',
                'gender' => 'Girls',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}