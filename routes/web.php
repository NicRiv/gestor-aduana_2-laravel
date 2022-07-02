<?php

use App\Http\Livewire\Areas;
use App\Http\Livewire\AuditTrail;
use App\Http\Livewire\CondicionesAmbientales;
use App\Http\Livewire\ControlImpresiones;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Depositos;
use App\Http\Livewire\Divisiones;
use App\Http\Livewire\GestionAduana;
use App\Http\Livewire\MaterialesProductos;
use App\Http\Livewire\Roles;
use App\Http\Livewire\TiposIngresosEgresos;
use App\Http\Livewire\Ubicaciones;
use App\Http\Livewire\UnidadesLogisticas;
use App\Http\Livewire\Usuarios;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Principal
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/ingresos', GestionAduana::class)->name('ingresos');
    
    // Config
    Route::get('/materiales-productos', MaterialesProductos::class)->name('materiales-productos');
    Route::get('/depositos', Depositos::class)->name('depositos');
    Route::get('/areas', Areas::class)->name('areas');
    Route::get('/ubicaciones', Ubicaciones::class)->name('ubicaciones');
    Route::get('/condiciones-ambientales', CondicionesAmbientales::class)->name('condiciones-ambientales');
    Route::get('/unidades-logisticas', UnidadesLogisticas::class)->name('unidades-logisticas');
    Route::get('/divisiones', Divisiones::class)->name('divisiones');
    Route::get('/tipos-ingresos-egresos', TiposIngresosEgresos::class)->name('tipos-ingresos-egresos');
    
    // Administracion
    Route::get('/usuarios', Usuarios::class)->name('usuarios');
    Route::get('/roles', Roles::class)->name('roles');
    Route::get('/control-impresiones', ControlImpresiones::class)->name('control-impresiones');
    Route::get('/audit-trail', AuditTrail::class)->name('audit-trail');
});