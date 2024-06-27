<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'   => 'admin',
                'email'       => 'admin@mvp.com',
                'password'    => bcrypt('secret')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
