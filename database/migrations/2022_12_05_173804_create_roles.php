<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //PERMISOS
        $permission1 = Permission::create(['name' => 'student-mod']); // MODIFICAR ESTUDIANTE
        $permission2 = Permission::create(['name' => 'prof-mod']); // MODIFICAR PROFESOR
        $permission3 = Permission::create(['name' => 'course-mod']); // MODIFICAR CURSO
        $permission4 = Permission::create(['name' => 'student-read']); // LEER ESTUDIANTE
        $permission5 = Permission::create(['name' => 'prof-read']); // LEER PROFESOR
        $permission6 = Permission::create(['name' => 'course-read']); // LEER CURSO


        $role = Role::create(['name' => 'super-admin']); // ROL (super-admin) 
        $user = User::find(1);
        $role->givePermissionTo($permission1, $permission2, $permission3, $permission4, $permission5, $permission6);
        $user->assignRole($role);

        $role = Role::create(['name' => 'student-admin']); // ROL (student-admin)
        $user = User::find(2);
        $role->givePermissionTo($permission1, $permission6);
        $user->assignRole($role);

        $role = Role::create(['name' => 'course-input']); // ROL (course-input)
        $user = User::find(3);
        $role->givePermissionTo($permission3);
        $user->assignRole($role);

        $role = Role::create(['name' => 'prof-input']); // ROL (prof-input)
        $user = User::find(4);
        $role->givePermissionTo($permission2, $permission4, $permission6);
        $user->assignRole($role);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
};
