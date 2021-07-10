<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name'=>'super_admin',
            'email'=>'super_admin@app.com',
            'password'=>'123456',
        ]);

        $user->attachRole('super_admin');
    }
}
