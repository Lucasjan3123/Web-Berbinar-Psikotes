<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FreeQuestionController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\JawabanStatementController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\OptionPilihanGandaController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TipeTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });




// endpoint API Login dan RegisterA

Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {
    Route::post('/register',[AuthController::class, 'register']);
    Route::post('/login',[AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
    
    Route::get('/GetNilaiByTest/{id}', [NilaiController::class, 'GetNilaiByTes']);
    Route::post('/Nilai', [NilaiController::class, 'calculateScore']);
    Route::put('/EditNilai/{id}', [NilaiController::class, 'EditNilai']);
    Route::delete('/DeleteNilai/{id}', [NilaiController::class, 'DeleteNilai']);


    Route::get('/jawabanbyTest/{test_id}', [JawabanController::class, 'GetJawaban']);
    Route::post('/addJawaban',[JawabanController::class, 'store']);
    Route::put('/update-jawaban/{test_id}', [JawabanController::class, 'update']);
    Route::delete('/delete-jawaban/{test_id}', [JawabanController::class, 'destroy']);
    
    Route::resource('TipeTest', TipeTestController::class);
    Route::resource('Test', TestController::class);
    Route::resource('Modul', ModulController::class);
    Route::resource('Section', SectionController::class);
    
    // endpoint Test
    Route::post('/AddSoalTest',[SoalController::class, 'CreateTest']);
    Route::get('/GetSoalTest',[SoalController::class, 'getAllSoal']);
    Route::get('/GetSoalTestByid/{id}',[SoalController::class, 'getSoalById']);
    Route::put('/UpdateSoalTest/{id}',[SoalController::class, 'updateTest']);
    Route::delete('/deleteSoalTest/{id}',[SoalController::class, 'deleteTest']);
    
    
    Route::resource('jawaban_statement', JawabanStatementController::class);
    Route::resource('OptionPilihanGanda', OptionPilihanGandaController::class);


});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('free-questions', FreeQuestionController::class);