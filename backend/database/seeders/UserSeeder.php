<?php

namespace Database\Seeders;

use App\Infra\Adapters\Persistence\Eloquent\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
   public function run(): void
   {
       // Cria 10 usuários utilizando a factory
       User::factory()->count(10)->create();
   }
}
