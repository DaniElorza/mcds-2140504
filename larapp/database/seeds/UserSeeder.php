<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Lisa Simpson',
            'email'     => 'lisa@gmail.com',
            'phone'     => 3103403452,
            'birthdate' => '1993-09-10',
            'gender'    => 'Female',
            'address'   => 'Aveniu Siempre Viva',
            'password'  => bcrypt('admin'),
            'role'      => 'Admin',
            'created_at'=> now()
        ]);

        $usr = new User;
        $usr->name      = 'Homero Simpson';
        $usr->email     = 'homer@gmail.com';
        $usr->phone     = 3113344567;
        $usr->birthdate = '1969-09-10';
        $usr->gender    = 'Male';
        $usr->address   = 'Aveniu Siempre Viva';
        $usr->password  = bcrypt('admin');
        $usr->save();


        // Factory
        factory(User::class, 10)->create();
    }
}
