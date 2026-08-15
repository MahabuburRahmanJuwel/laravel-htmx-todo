<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table("users")->insert([
            [
                "name" => "test",
                "email" => "test@test.com",
                "password" => Hash::make("123456"),
                "email_verified_at" => Carbon::now(),
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            
        ]);
        $todos = ['Learn Laravel HTMX', 'Build Todo CRUD', 'Learn Alpine.js'];
        for ($i=0; $i <count($todos) ; $i++) { 
           Todo::create([ 'title' => $todos[$i], 'user_id' => 1 ]);
        }
        
    }
}
