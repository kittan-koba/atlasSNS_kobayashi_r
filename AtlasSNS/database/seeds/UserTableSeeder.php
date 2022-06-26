<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     User::create([
            'username' => 'ジョン・スミス',
            'mail' => 'jon.smith@system.co.jp',
            'password' => 'jon19990626',
        ]);
        User::create([
            'username' => 'マリオ・ロッシ',
            'mail' => 'mario.lodge@system.co.jp',
            'password' => 'mario19990726',
        ]);
        User::create([
            'username' => 'ジャン・ピエール・ベルナール',
            'mail' => 'jan.piele.bellnarl@system.co.jp',
            'password' => 'janPB19990826',
        ]);
        User::create([
            'username' => 'ウィリアム・スミス',
            'mail' => 'william.smith@system.co.jp',
            'password' => 'WS19990626',
        ]);
        User::create([
            'username' => 'キム・チョルス',
            'mail' => 'KIM.TYOLS@system.co.jp',
            'password' => 'kimikim19990626',
        ]);
    }
}
