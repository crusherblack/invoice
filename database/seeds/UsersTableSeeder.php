<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'anugrah sandi',
            'email' => 'fadhildarma13@gmail.com',
            'password' => bcrypt('kelas2tkj')
        ]);
    }
}
