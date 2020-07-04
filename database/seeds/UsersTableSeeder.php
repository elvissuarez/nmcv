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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $admin = User::create(
            [
            'name' => 'Admin User',
            'email' => 'admin@nmcv.com',
            'password' => Hash::make('password'),
            ]
        );

        $author = User::create(
            [
            'name' => 'Author User',
            'email' => 'author@nmcv.com',
            'password' => Hash::make('password'),
            ]
        );

        $user = User::create(
            [
            'name' => 'Generic User',
            'email' => 'user@nmcv.com',
            'password' => Hash::make('password'),
            ]
        );

        $elvis = User::create(
            [
            'name' => 'Elvis Suarez',
            'email' => 'elvis@nmcv.com',
            'password' => Hash::make('password'),
            ]
        );

        $admin->assignRole('admin');
        $author->assignRole('author');
        $user->assignRole('user');
        $elvis->assignRole('admin');

    }
}
