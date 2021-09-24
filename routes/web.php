<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Pesi\Models\Role;
use App\Pesi\Models\Permission;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\HelperTestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('maintenance');

Route::get('/test', function () {
    $user = User::find(2);
    Gate::authorize('haveaccess','role.index');
    return $user;
});

Auth::routes();

Route::resource('/role','RoleController')->names('role')->middleware('maintenance');

Route::resource('/user','UserController')->names('user');
Route::resource('/reporte','ReporteController')->names('reporte');


Route::resource('/bitacora', 'BitacoraController')->middleware('maintenance');
Route::get('/admin/bitacora/bitacora', 'BitacoraController@bitacora')->middleware('maintenance');

Route::get('/home', 'HomeController@index')->name('home')->middleware('maintenance');

Route::resource('/incidencias','IncidenciaController')->names('incidencias')->middleware('maintenance');
Route::resource('/incidentes','IncidenteController')->names('incidentes')->middleware('maintenance');
