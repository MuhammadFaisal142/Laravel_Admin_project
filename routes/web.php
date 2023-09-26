<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\propertyTypeController;
use App\Http\Controllers\Backend\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/', function () {
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
// require __DIR__.'/auth.php';
// Admin Group middlewere
// Route::middleware(['auth','role:admin'])->group(function(){
Route::any('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::any('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
// });End Admin Group Middlewwer


// Agents Group middlewere

// Route::middleware(['auth','role:agent'])->group(function(){
    Route::get('agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
// });

Route::get('user/dashboard', [UserController::class, 'UserDashboard'])->name('user.dashboard');

Route::any('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// Route::controller('propertyTypeController'::class)->group(function(){
//    Route::get('/all/type', 'AllType')->name('all.type');
// });


// propery Types All routes here

Route::any('/all/type', [propertyTypeController::class, 'AllType'])->name('all.type');
Route::any('/add/type', [propertyTypeController::class, 'AddType'])->name('add.type');
Route::post('/store/type', [propertyTypeController::class, 'StoreType'])->name('store.type');
Route::get('/edit/type/{id}', [propertyTypeController::class, 'EditType'])->name('edit.type');

Route::post('/update/type/', [propertyTypeController::class, 'UpdateType'])->name('update.type');
Route::get('/delete/type/{id}', [propertyTypeController::class, 'DeleteType'])->name('delete.type');



// Amenities Types All routes here

Route::any('/all/amenities', [propertyTypeController::class, 'AllAmenities'])->name('all.amenities');
Route::any('/add/amenities', [propertyTypeController::class, 'AddAmenities'])->name('add.amenities');
Route::post('/store/amenities', [propertyTypeController::class, 'StoreAmenities'])->name('store.amenities');
Route::any('edit/amenities/{id}', [propertyTypeController::class, 'EditAmenities'])->name('edit.amenities');
Route::post('/update/amenities', [propertyTypeController::class, 'UpdateAmenities'])->name('update.amenities');
Route::get('/delete/amenities/{id}', [propertyTypeController::class, 'DeleteAmenities'])->name('delete.amenities');



// Permission All Routes

Route::any('/all/permission', [RoleController::class, 'AllPermission'])->name('all.permission');
Route::any('/add/permission', [RoleController::class, 'AddPermission'])->name('add.permission');
Route::post('/store/permission', [RoleController::class, 'StorePermission'])->name('store.permission');
Route::get('/edit/permission/{id}', [RoleController::class, 'EditPermission'])->name('edit.permission');

Route::post('/update/permission/', [RoleController::class, 'UpdatePermission'])->name('update.permission');
Route::get('/delete/permission/{id}', [RoleController::class, 'DeletePermission'])->name('delete.permission');

Route::any('/import/permission', [RoleController::class, 'ImportPermission'])->name('import.permission');

Route::any('/export', [RoleController::class, 'Export'])->name('export');

Route::any('/import', [RoleController::class, 'Import'])->name('import');




// All Roles  Routes

Route::any('/all/roles', [RoleController::class, 'AllRoles'])->name('all.roles');
Route::any('/add/roles', [RoleController::class, 'AddRoles'])->name('add.roles');
Route::post('/store/roles', [RoleController::class, 'StoreRoles'])->name('store.roles');
Route::get('/edit/roles/{id}', [RoleController::class, 'EditRoles'])->name('edit.roles');
Route::post('/update/roles/', [RoleController::class, 'UpdateRoles'])->name('update.roles');
Route::any('/delete/roles/{id}', [RoleController::class, 'DeleteRoles'])->name('delete.roles');
// Route::any('/add/roles/permission', [RoleController::class, 'AddRolesPermission'])->name('add.roles.permission');
