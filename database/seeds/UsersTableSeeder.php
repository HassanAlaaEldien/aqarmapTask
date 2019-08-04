<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customEmailForAdmin = User::count() ? [] : ['email' => 'admin@task.com'];

        factory(User::class)->create($customEmailForAdmin);
    }
}
