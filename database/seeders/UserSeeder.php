<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $users = [
            [
                'name' => "Balbone Wahab",
                'cuid' => "CCSL3490",
                'email' => "faisal@gmail.com",
                'departement_direction' => "IT/[DSID]",
                'password' => Hash::make("password"),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Dicko Issa",
                'cuid' => "ZYYF8115",
                'email' => "dicko@gmail.com",
                'departement_direction' => "IT/[DSID]",
                'password' => Hash::make("12345678"),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($users as $user) {

            $dbUser = new User();
            $dbUser->name         = $user['name'];
            $dbUser->cuid         = $user['cuid'];
            $dbUser->email         = $user['email'];
            $dbUser->departement_direction        = $user['departement_direction'];
            $dbUser->password      = $user['password'];
            $dbUser->remember_token = $user['remember_token'];
            $dbUser->save();
            
        }
    }
}