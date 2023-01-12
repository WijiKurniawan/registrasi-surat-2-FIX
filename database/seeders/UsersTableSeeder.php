<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->nik = "123";
        $user->nama = "User";
        $user->email = "user@mail.com";
        $user->password = bcrypt('12345678');
        $user->jabatan = "ARSIPARIS";
        $user->save();
    }
}
