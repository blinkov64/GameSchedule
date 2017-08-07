<?php

use Phinx\Seed\AbstractSeed;

class AdminSeeder extends AbstractSeed
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
                'login' => 'admin',
                'password' => 'password',
            ]
        ];
        
        $admin = $this->table('admin');
        $admin->insert($data)->save();
    }
}
