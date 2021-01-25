<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\People;
use App\Models\Role;
use App\Models\CashReceipt;
use App\Models\AttentionSchedule;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
     public function run()
     {
       $adminRole = Role::create([
         "name" => "admin"
       ]);

       $adminRole = Role::create([
         "name" => "cajero"
       ]);


       $adminCash = CashReceipt::create([
         "name"=> "admin_cash"
       ]);


       $adminPeople = People::create([
         'first_name' => "Dohosan",
         'second_name' => "Hiawassee",
         "first_surname"=> "Hopi",
         "second_surname" => "Pawnee",
         "phone"=> "8717930155",
         "cash_receipt_id" => 1,
       ]);

       $adminUser = User::create([
         'email' => "admin@admin.com",
         'email_verified_at' => now(),
         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
         "enrollment"=>"123456789",
         "people_id"=>1,
         "role_id"=>1,
         'remember_token' => Str::random(10),
       ]);


       $scheduleTime = AttentionSchedule::create([
         "start" => "09:00:00",
         "end"=> "16:00:00",
       ]);

     }
}
