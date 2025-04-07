<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    // $createAdmin = Role::create(['name' => 'Admin']);
    // $createUser = Role::create(['name' => 'User']);

    // $permHelloword = Permission::create(['name' => 'See hello-word']);
    // $permGoodbye = Permission::create(['name' => 'See goodbye']);

    // dump($permHelloword);
    // dump($permGoodbye);

    // $roleAdmin = Role::find(1);
    // $roleAdmin->givePermissionTo('See hello-word');

    // $roleUser = Role::find(2);
    // $roleUser->givePermissionTo('See goodbye');

    // dump($roleAdmin);
    // dump($roleUser);

    // $user = auth()->user();
    // $assignRole = $user->assignRole('Admin');
    // dump($user);    
    // dump($assignRole);

    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
