<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('title', 'admin')->first();
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@admin.co';
        $admin->email_verified_at = Carbon::now();
        $admin->password = Hash::make('123456123');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
