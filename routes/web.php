<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Models\Record;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});



// .- Realizar autenticación de usuarios y proteger las rutas del servicio REST 
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // CRUD DE PACIENTES 
    Route::resource('patients', PatientController::class);

    // Vistas para mostar el historial clinico del paciente
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/patients/{patient}', [AppointmentController::class, 'show'])->name('appointments.show');



    // Ruta para crear ficha medica
    Route::post('/records', [RecordController::class, 'store'])->name('records.store');
});
