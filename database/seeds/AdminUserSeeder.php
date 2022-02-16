<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
        	[
        		'name'=>'Admin User', 
        		'email'=>'admin@admin.com', 
        		'email_verified_at'=> now(),    
        		'password'=> bcrypt('NDRkUriyWT4dwK7')
        	]
        );
    }
}
