<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds for roles table
     *  ['Admin', 'Agent', 'Cashier']
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Admin', 'Agent', 'Cashier'];

        foreach ($roles as $key => $value) {
        	Role::create([
        		'name' => $value
        	]);
        }
    }
}
