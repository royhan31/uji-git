<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Notification;
use App\Company;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin::create([
        //   'name'      => 'Administrator',
        //   'username'  => 'admin',
        //   'email'     => 'admin@gmail.com',
        //   'password'   => bcrypt('12345678')
        // ]);
        //
        Notification::create([
          'admin_id' => 1,
          'message' => 'halo Admin',
          'subject' => 'User verification'
        ]);

        Notification::create([
          'admin_id' => 1,
          'message' => 'halo Admin2',
          'subject' => 'User verification'
        ]);


    }
}
