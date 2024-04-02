<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
          Product::factory(20)->create();
        // Seed users table
        DB::table('users')->insert([
            [
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => '2024-03-31 02:47:55',
                'created_at' => '2024-03-31 02:47:44',
                'usertype' => 'admin', // Add user_type for admin user
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => '2024-03-31 02:47:55',
                'created_at' => '2024-03-31 02:47:44',
                'usertype' => 'admin', // Add user_type for admin user
            ],
            [
                'name' => 'admin3',
                'email' => 'admin3@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => '2024-03-31 02:47:55',
                'created_at' => '2024-03-31 02:47:44',
                'usertype' => 'admin', // Add user_type for admin user
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => '2024-03-31 02:47:55',
                'created_at' => '2024-03-31 02:47:44',
                'usertype' => 'user', // Add user_type for regular user
            ],
            [
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => Hash::make('12345678'),
                'email_verified_at' => '2024-03-31 02:47:55',
                'created_at' => '2024-03-31 02:47:44',
                'usertype' => 'user', // Add user_type for regular user
            ],
        ]);

        // Seed carts table
        $users = User::all();

        foreach ($users as $user) {
            Cart::create([
                'user_id' => $user->id,
            ]);
        }

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}