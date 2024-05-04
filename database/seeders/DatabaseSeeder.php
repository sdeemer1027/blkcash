<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Dr.Steve',
             'email' => 'dr.steve@steven.news',
             'firstname'=>'Steve',
             'lastname' => 'Deemer',
             'address' => '123 Main St.',
             'city' => 'Hollywood',
             'state' => 'FL',
             'zip' => '33020',
             'phone' => '888-555-1212',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'williebabes',
             'email' => 'williebabes1@gmail.com',
             'firstname'=>'Joe',
             'lastname' => ' ',
             'address' => '123 Main St.',
             'city' => 'sometown',
             'state' => 'NC',
             'zip' => '12345',
             'phone' => '888-444-1212',
         ]);
         \App\Models\User::factory()->create([
             'name' => 'Corey',
             'email' => 'coery@gmail.com',
             'firstname'=>'Corey',
             'lastname' => ' ',
             'address' => '123 Main St.',
             'city' => 'sometown',
             'state' => 'NC',
             'zip' => '12345',
             'phone' => '888-444-1212',
         ]);
         \App\Models\CreditCard::create([
             'name' => 'Steve',
             'braintree_token' => '1111',
             'expires'=>'12/26',
             'cvv' => ' ',
             'user_id' => '1',
             
         ]);
\App\Models\CreditCard::create([
             'name' => 'Steve',
             'braintree_token' => '1111',
             'expires'=>'12/26',
             'cvv' => ' ',
             'user_id' => '1',
             
         ]);
\App\Models\CreditCard::create([
             'name' => 'Joe',
             'braintree_token' => '1111',
             'expires'=>'12/26',
             'cvv' => ' ',
             'user_id' => '2',
             
         ]);
\App\Models\CreditCard::create([
             'name' => 'Joe',
             'braintree_token' => '1111',
             'expires'=>'12/26',
             'cvv' => ' ',
             'user_id' => '2',
             
         ]);
\App\Models\CreditCard::create([
             'name' => 'Corey',
             'braintree_token' => '1111',
             'expires'=>'12/26',
             'cvv' => ' ',
             'user_id' => '3',
             
         ]);
\App\Models\CreditCard::create([
             'name' => 'Corey',
             'braintree_token' => '1111',
             'expires'=>'12/26',
             'cvv' => ' ',
             'user_id' => '3',
             
         ]);

    }
}
