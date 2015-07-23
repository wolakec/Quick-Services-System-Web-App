<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $users = [
                 ['email' => 'admin@example.com', 'name' => 'admin', 'password' =>  Hash::make('123')],
                 ['email' => 'wolakec@live.com', 'name' => 'Wol', 'password' =>  Hash::make('lomac')],
                
                  
              ] ;
		DB::table('users')->insert(
    		$users
		);

        // $this->call('UserTableSeeder');

        Model::reguard();
    }
}
