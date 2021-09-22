<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User\User::class, 50)->create();
//        $this->disableForeignKeys();
//        $this->truncate('users');
//
//        $users = [
//            [
//                'name' => 'First User',
//                'email' => 'f1@gmail.com',
//                'password' => bcrypt('1111'),
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//
//            [
//                'name' => 'Second User',
//                'email' => 'f2@gmail.com',
//                'password' => bcrypt('1112'),
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//
//            [
//                'name' => 'Third User',
//                'email' => 'f3@gmail.com',
//                'password' => bcrypt('1113'),
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//        ];
//
//        DB::table('users')->insert($users);

        $this->enableForeignKeys();
    }
}
