<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $user = User::where('email', 'diksha.yadav022@gmail.com')->first();
            if(!$user){
                User::create([
                        'name' =>'Diksha Mohanty',
                        'email' =>'diksha.yadav022@gmail.com',
                        'password'=>'diksha123'
                    ]);
            }
    }
}
