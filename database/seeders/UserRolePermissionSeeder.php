<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'read mahasiswa',
            'create mahasiswa',
            'update mahasiswa',
            'delete mahasiswa',
            'read matkul',
            'create matkul',
            'update matkul',
            'delete matkul',
            'start absensi',
            'absensi',
            'read rekapan sementara',
            'read rekapan tetap'
        ];
            $role_admin = Role::create(['name' => 'Super Admin']);
            $role_mahasiswa = Role::create(['name' => 'Mahasiswa']);

            foreach ($permissions as $permission){
                $p = Permission::create(['name' => $permission]);
            }

            $user = User::create([
                'nim' => '216151001',
                'last_login' => '20-06-23 11:52:13',
                'nama' => 'Irfan Noor Hidayat',
                'email' => 'irfannoorh@gmail.com',
                'password' => bcrypt('12345678'),
            ]);
            $user->assignRole('Super Admin');
            $user->assignRole('Mahasiswa');

            foreach($permissions as $permission){
                $role_admin->givePermissionTo($permission);
            }

            $user2 = User::create([
                'nim' => '216151023',
                'last_login' => '20-06-23 11:52:13',
                'nama' => 'Sri Ajeng Kartika',
                'email' => 'sriajengkartika.com',
                'password' => bcrypt('12345678'),
            ]);
            $user2->assignRole('Mahasiswa');

            $role_mahasiswa->givePermissionTo('read mahasiswa');
            $role_mahasiswa->givePermissionTo('read matkul');
            $role_mahasiswa->givePermissionTo('read rekapan tetap');
            $role_mahasiswa->givePermissionTo('absensi');
    }
}