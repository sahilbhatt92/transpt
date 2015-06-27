<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB as DB;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('RoleTableSeeder');
		$this->call('BranchTableSeeder');
		$this->call('AccountYearTableSeeder');
	}

}


class RoleTableSeeder extends Seeder {
 
  public function run()
  {
  	
  	DB::table('roles')->delete();

	App\Role::create([
		'name'=>'admin',
		'display_name'=>'Administrator',
		'description'=>'Administrator is allowed to manage whole software',
	]);

  	App\Role::create([
  		'name'=>'master',
  		'display_name'=>'Master',
  		'description'=>'Master is allowed to manage master section of software',
  	]);

    App\Role::create([
      'name'=>'master-add',
      'display_name'=>'Add',
      'description'=>'Add is allowed to manage master section of software',
    ]);

    App\Role::create([
      'name'=>'master-view',
      'display_name'=>'View',
      'description'=>'View is allowed to manage master section of software',
    ]);

    App\Role::create([
      'name'=>'master-edit',
      'display_name'=>'Edit',
      'description'=>'Edit is allowed to manage master section of software',
    ]);

    App\Role::create([
      'name'=>'master-delete',
      'display_name'=>'Delete',
      'description'=>'Delete is allowed to manage master section of software',
    ]);

  	App\Role::create([
  		'name'=>'transaction',
  		'display_name'=>'Transaction',
  		'description'=>'Transaction is allowed to manage transaction section of software',
  	]);

    App\Role::create([
      'name'=>'transaction-add',
      'display_name'=>'Add',
      'description'=>'Add is allowed to manage transaction section of software',
    ]);

    App\Role::create([
      'name'=>'transaction-view',
      'display_name'=>'View',
      'description'=>'View is allowed to manage transaction section of software',
    ]);

    App\Role::create([
      'name'=>'transaction-edit',
      'display_name'=>'Edit',
      'description'=>'Edit is allowed to manage transaction section of software',
    ]);

    App\Role::create([
      'name'=>'transaction-delete',
      'display_name'=>'Delete',
      'description'=>'Delete is allowed to manage transaction section of software',
    ]);

    App\Role::create([
      'name'=>'bill',
      'display_name'=>'Bill',
      'description'=>'Bill is allowed to manage bill section of software',
    ]);

    App\Role::create([
      'name'=>'bill-add',
      'display_name'=>'Add',
      'description'=>'Add is allowed to manage bill section of software',
    ]);

    App\Role::create([
      'name'=>'bill-view',
      'display_name'=>'View',
      'description'=>'View is allowed to manage bill section of software',
    ]);

    App\Role::create([
      'name'=>'bill-edit',
      'display_name'=>'Edit',
      'description'=>'Edit is allowed to manage bill section of software',
    ]);

    App\Role::create([
      'name'=>'bill-delete',
      'display_name'=>'Delete',
      'description'=>'Delete is allowed to manage bill section of software',
    ]);

    App\Role::create([
      'name'=>'fleet',
      'display_name'=>'Fleet',
      'description'=>'Fleet is allowed to manage fleet section of software',
    ]);

    App\Role::create([
      'name'=>'fleet-add',
      'display_name'=>'Add',
      'description'=>'Add is allowed to manage fleet section of software',
    ]);

    App\Role::create([
      'name'=>'fleet-view',
      'display_name'=>'View',
      'description'=>'View is allowed to manage fleet section of software',
    ]);

    App\Role::create([
      'name'=>'fleet-edit',
      'display_name'=>'Edit',
      'description'=>'Edit is allowed to manage fleet section of software',
    ]);

    App\Role::create([
      'name'=>'fleet-delete',
      'display_name'=>'Delete',
      'description'=>'Delete is allowed to manage fleet section of software',
    ]);

    App\Role::create([
      'name'=>'accounts',
      'display_name'=>'Accounts',
      'description'=>'Accounts is allowed to manage accounts section of software',
    ]);

    App\Role::create([
      'name'=>'accounts-add',
      'display_name'=>'Add',
      'description'=>'Add is allowed to manage accounts section of software',
    ]);

    App\Role::create([
      'name'=>'accounts-view',
      'display_name'=>'View',
      'description'=>'View is allowed to manage accounts section of software',
    ]);

    App\Role::create([
      'name'=>'accounts-edit',
      'display_name'=>'Edit',
      'description'=>'Edit is allowed to manage accounts section of software',
    ]);

    App\Role::create([
      'name'=>'accounts-delete',
      'display_name'=>'Delete',
      'description'=>'Delete is allowed to manage accounts section of software',
    ]);

  	App\Role::create([
  		'name'=>'reports',
  		'display_name'=>'Reports',
  		'description'=>'Reports is allowed to manage reports section of software',
  	]);

    App\Role::create([
      'name'=>'reports-add',
      'display_name'=>'Add',
      'description'=>'Add is allowed to manage reports section of software',
    ]);

    App\Role::create([
      'name'=>'reports-view',
      'display_name'=>'View',
      'description'=>'View is allowed to manage reports section of software',
    ]);

    App\Role::create([
      'name'=>'reports-edit',
      'display_name'=>'Edit',
      'description'=>'Edit is allowed to manage reports section of software',
    ]);

    App\Role::create([
      'name'=>'reports-delete',
      'display_name'=>'Delete',
      'description'=>'Delete is allowed to manage reports section of software',
    ]);
  
  }
 
}

class AccountYearTableSeeder extends Seeder {
 
  public function run()
  {
  	
  	DB::table('account_year')->delete();
  	App\AccountYear::create([
  		'name'=>'01-04-2015-31-03-2016'
    ]);
  
  }
 
}

class BranchTableSeeder extends Seeder {
 
  public function run()
  {
  	
  	DB::table('branches')->delete();
  	App\Branch::create([
  		'name'=>'all'
    ]);
  
  }
 
}