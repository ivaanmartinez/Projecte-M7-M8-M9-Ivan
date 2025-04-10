<?php

use App\Models\Team;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

function createDefaultUser()
{
    $user = User::create([
        'name' => config('users.default_user.name'),
        'email' => config('users.default_user.email'),
        'password' => bcrypt(config('users.default_user.password')),
    ]);

    add_personal_team($user, 'Default Team');

    // Assigna el rol per defecte
    $user->assignRole('regular');

    return $user;
}

function createDefaultTeacher()
{
    $teacher = User::create([
        'name' => config('users.default_teacher.name'),
        'email' => config('users.default_teacher.email'),
        'password' => bcrypt(config('users.default_teacher.password')),
        'super_admin' => true,
    ]);

    add_personal_team($teacher, 'Default Teacher Team');

    // Assigna el rol de 'super_admin'
    $teacher->assignRole('super_admin');

    return $teacher;
}

function add_personal_team(User $user, string $teamName)
{
    $team = Team::create([
        'name' => $teamName,
        'user_id' => $user->id,
        'personal_team' => true,
    ]);

    $user->team()->associate($team);
    $user->save();
}

function create_regular_user()
{
    static $userCount = 0;
    $userCount++;

    $user = User::create([
        'name' => 'Regular',
        'email' => 'regular' . $userCount . '@videosapp.com',
        'password' => bcrypt('123456789'),
    ]);

    add_personal_team($user, 'Regular Team');

    // Assigna el rol de 'regular'
    $user->assignRole('regular');

    return $user;
}

function create_video_manager_user()
{
    $user = User::create([
        'name' => 'Video Manager',
        'email' => 'videosmanager@videosapp.com',
        'password' => bcrypt('123456789'),
    ]);

    add_personal_team($user, 'Video Manager Team');

    // Assigna el rol de 'video_manager'
    $user->assignRole('video_manager');

    return $user;
}

function create_superadmin_user()
{
    $user = User::create([
        'name' => 'Super Admin',
        'email' => 'superadmin@videosapp.com',
        'password' => bcrypt('123456789'),
        'super_admin' => true,
        'id' => 1,
    ]);

    add_personal_team($user, 'Super Admin Team');

    // Assigna el rol de 'super_admin' i tots els permisos
    $user->assignRole('super_admin');

    return $user;
}

function define_gates()
{
    Gate::define('manage-videos', function (User $user) {
        return $user->hasRole('video_manager') || $user->isSuperAdmin();
    });

    Gate::define('manage-users', function (User $user) {
        return $user->isSuperAdmin();
    });
}

function create_permissions()
{
    $permissions = [
        'manage users',
        'manage videos'
    ];

    foreach ($permissions as $permission) {
        Permission::firstOrCreate(['name' => $permission]);
    }

    $allPermissions = Permission::pluck('name')->toArray();

    $roles = [
        'regular' => [],
        'video_manager' => ['manage videos'],
        'super_admin' => ['manage videos', 'manage users'],
    ];

    foreach ($roles as $role => $perms) {
        $roleInstance = Role::firstOrCreate(['name' => $role]);
        $roleInstance->syncPermissions($perms);
    }
}

/**
 * Funció per crear un vídeo associat a un usuari.
 */
function create_video(User $user, string $title, string $description, string $url)
{

    return Video::create([
        'title' => $title,
        'description' => $description,
        'url' => $url,
        'user_id' => $user->id,
    ]);
}
