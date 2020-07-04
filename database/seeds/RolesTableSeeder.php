<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 *
 */
class RolesTableSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {

    Schema::disableForeignKeyConstraints();
    DB::table('permissions')->truncate();
    Schema::enableForeignKeyConstraints();
    // Reset cached roles and permissions.
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    // Reset cached roles and permissions
    app()['cache']->forget('spatie.permission.cache');

    // Create permissions.
    Permission::create(['name' => 'manage-users']);
    Permission::create(['name' => 'edit-users']);
    Permission::create(['name' => 'delete-users']);
    Permission::create(['name' => 'create-users']);
    Permission::create(['name' => 'manage-roles']);
    Permission::create(['name' => 'manage-offices']);
    Permission::create(['name' => 'manage-providers']);

    // Create roles and assign created permissions
    // This can be done as separate statements.
    $role = Role::create(['name' => 'user']);

    // Or may be done by chaining.
    $role = Role::create(['name' => 'author']);
      $role->givePermissionTo('manage-users');
      $role->givePermissionTo('edit-users');
      $role->givePermissionTo('manage-roles');

    $role = Role::create(['name' => 'admin']);
    $role->givePermissionTo(Permission::all());

    Artisan::call('cache:clear');
  }

}
