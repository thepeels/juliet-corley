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

        //$this->call('UsersSeeder');
        
        //$this->command->info('Users table seeded!');
        
        //$this->call('PriceSeeder');
        
        //$this->command->info('Prices table seeded!');
        
        //$this->call('DetailSeeder');
        
        //$this->command->info('Detail table seeded!');
		
        $this->call('PageloadSeeder');
        
        $this->command->info('Pageload table seeded!');
	}

}
