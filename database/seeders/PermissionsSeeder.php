<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit projects']);
        Permission::create(['name' => 'delete projects']);
        Permission::create(['name' => 'create projects']);
        Permission::create(['name' => 'update projects']);
        Permission::create(['name' => 'publish projects']);
        Permission::create(['name' => 'moderate projects']);

        // create roles and assign existing permissions
        $roleUser = Role::create(['name' => 'user']);
        $roleUser->givePermissionTo('create projects');

        $roleModerator = Role::create(['name' => 'moderator']);
        $roleModerator->givePermissionTo('create projects');
        $roleModerator->givePermissionTo('edit projects');
        $roleModerator->givePermissionTo('delete projects');
        $roleModerator->givePermissionTo('update projects');
        $roleModerator->givePermissionTo('publish projects');
        $roleModerator->givePermissionTo('moderate projects');

        //$roleSuperUser = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // User
        $user = User::factory()->create([
            'name' => 'user',
            'first_name' => 'Иван',
            'last_name' => 'Иванов',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($roleUser);

        // Moderator
        $user = User::factory()->create([
            'name' => 'moderator',
            'first_name' => 'Анна',
            'last_name' => 'Петрова',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($roleModerator);

        // Moderator
        $user = User::factory()->create([
            'name' => 'victor',
            'first_name' => 'Виктор',
            'last_name' => 'Петров',
            'email' => 'm@m.ru',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole($roleModerator);
    }
}
