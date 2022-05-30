<?php
use App\Http\Controllers\ContactController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('index',[
        "title" => "Beranda"
    ]);
});
Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "nama"=>"Velarina Nurmalakana",
        "email"=>"velarina2014@gmail.com",
        "gambar"=>"vela.jpg"
    ]);
});
Route::get('/galery', function () {
    return view('galery',[
        "title" => "Gallery"
    ]);
});
Route::resource('/contacts', ContactController::class);


Route::get('/contacs/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacs/store', [ContactController::class, 'store'])->name('contacts.store');

Auth::routes();

Route::group(['middleware'=>['auth']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/contacs/index', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacs/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/contacs/{id}/update', [ContactController::class, 'update'])->name('contacts.update');
    Route::get('/contacs/{id}/destroy', [ContactController::class, 'destroy'])->name('contacts.destroy');

});

