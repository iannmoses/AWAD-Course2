<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $lecturerRole = Role::firstOrCreate(['name' => 'lecturer']);
        $studentRole = Role::firstOrCreate(['name' => 'student']);

        // Create permissions
        $viewDashboardPermission = Permission::firstOrCreate(['name' => 'view dashboard']);
        $manageUsersPermission = Permission::firstOrCreate(['name' => 'manage users']);
        $manageStudentsPermission = Permission::firstOrCreate(['name' => 'manage students']);
        $manageCoursesPermission = Permission::firstOrCreate(['name' => 'manage courses']);
        $manageRegistrationsPermission = Permission::firstOrCreate(['name' => 'manage registrations']);
        $viewAssignedCoursesPermission = Permission::firstOrCreate(['name' => 'view assigned courses']);
        $viewCourseStudentsPermission = Permission::firstOrCreate(['name' => 'view course students']);
        $viewCoursesPermission = Permission::firstOrCreate(['name' => 'view courses']);
        $registerCoursePermission = Permission::firstOrCreate(['name' => 'register course']);
        $viewOwnRegistrationsPermission = Permission::firstOrCreate(['name' => 'view own registrations']);

        // Assign permissions to roles
        $adminRole->givePermissionTo($viewDashboardPermission, $manageUsersPermission, $manageStudentsPermission, $manageCoursesPermission, $manageRegistrationsPermission);

        $lecturerRole->givePermissionTo($viewDashboardPermission, $viewAssignedCoursesPermission, $viewCourseStudentsPermission);

        $studentRole->givePermissionTo($viewDashboardPermission, $viewCoursesPermission, $registerCoursePermission, $viewOwnRegistrationsPermission);
    }
}
