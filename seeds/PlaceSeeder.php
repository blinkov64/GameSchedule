<?php

use Phinx\Seed\AbstractSeed;

class PlaceSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Zvezdniy',
                'address' => 'Saratov, Bolshaya Zatonskaya, 3B',
                'active' => '1'
            ],
            [
                'name' => 'Kristall',
                'address' => 'Saratov, Chernyshevskogo, 63',
                'active' => '1'
            ],
            [
                'name' => 'Megasport',
                'address' => 'Moscow, Khodynskiy bulvar, 3',
                'active' => '1'
            ],
            [
                'name' => 'USC CSKA',
                'address' => 'Moscow, Leningradskiy prospekt, 39/3',
                'active' => '1'
            ]
        ];
        
        $place = $this->table('place');
        $place->insert($data)->save();
    }
}
