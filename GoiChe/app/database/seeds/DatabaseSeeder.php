<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('RoleTableSeeder');
        $this->call('ProductSeeder');
		$this->call('CategorySeeder');
	}

}

class UserTableSeeder extends Seeder {

    function run() {
        User::truncate();
        
        $user = new User();
        $user->fill([
            'username' => 'admin',
            'password' => Hash::make('123456'),
			'email' => 'admin@chris.cn',
	    	'role_id' => '1',
	    	'created_at' => date('Y-m-d H:i:s'),
	    	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $user->save();

        $user = new User();
        $user->fill([
            'username' => 'tunglv',
            'password' => Hash::make('123456'),
			'email' => 'tunglv@nadia.bz',
	    	'role_id' => '2',
	    	'created_at' => date('Y-m-d H:i:s'),
	    	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $user->save();
    }
}

class RoleTableSeeder extends Seeder {

    function run() {
        Role::truncate();
        
        $role = new Role();
        $role->fill([
            'id' => '1',
            'description' => 'admin',
        ]);
        $role->save();

        $role = new Role();
        $role->fill([
            'id' => '2',
            'description' => 'user',
        ]);
        $role->save();
    }
}
