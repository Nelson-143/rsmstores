<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Admin::create([
        'name' => 'Buzz',
        'email' => 'eggplant@gmail.com',
        'password' => bcrypt('Xml@2023@Tcsupport4321nvx'),
        'is_superadmin' => true
    ]);
    
    // Add more admins if needed
}
}
