<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    protected $key = 'id';
    protected $Permissions = [];

    public function __construct()
    {
        $this->Permissions = collect([
            [
                'id' => 1,
                'name' => 'modul_pengguna',
                'label' => 'modul_pengguna',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'name' => 'profile',
                'label' => 'profile',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'name' => 'change_password',
                'label' => 'change_password',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'name' => 'hak_akses',
                'label' => 'hak_akses',
                'created_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'name' => 'user',
                'label' => 'user',
                'created_at' => Carbon::now()
            ]


        ])->keyBy($this->key);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         foreach ($this->Permissions as $key => $value) {
             $Exists = DB::table('permissions')
                 ->where('id', $value['id'])->first();

             if ($Exists) {
                 DB::table('permissions')
                 ->where('id', $value['id'])
                 ->update([
                     'name' => $value['name'],
                     'label' => $value['label'],
                 ]);
             } else {
                 DB::table('permissions')
                 ->insert([
                     'id' => $value['id'],
                     'name' => $value['name'],
                     'label' => $value['label'],
                 ]);
             }
         }
     }
}
