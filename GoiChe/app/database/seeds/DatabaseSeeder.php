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
	}

}

class UserTableSeeder extends Seeder {

    function run() {
        User::truncate();
        
        $user = new User();
        $user->fill([
            'username' => 'admin',
            'password' => '123456',
			'email' => 'admin@chris.cn',
	    	'role_id' => '1',
	    	'created_at' => date('Y-m-d H:i:s'),
	    	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $user->save();
    }
}
