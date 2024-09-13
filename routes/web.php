<?php

use App\Models\catin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\catinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApiCatinController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\LaporanController;

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

//  Route::get('/', function () {
//      return view('home.index');
// });
Route::get('/', function () {
    return view('auth.login');
 });

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// C:\laragon\www\CATIN--APP\resources\views\home\catinhome.balde.php

//Route::get('/', [App\Http\Controllers\TampilanController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['role:admin,user'])->group(function () {
    //Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    //Route::get('user/dashboard', [HomeController::class, 'index'])->name('user.dashboard');
    Route::get('/catin', [catinController::class, 'index'])->name('catin');
    Route::get('/catin/create', [catinController::class, 'create'])->name('catin.create');
    Route::post('/catin/save', [catinController::class, 'save'])->name('catin.save');
    Route::get('/catin/{id}', [catinController::class, 'show'])->name('catin.show');
    Route::get('/catin/edit/{id}', [catinController::class, 'edit'])->name('catin.edit');
    Route::put('/catin/update/{id}', [catinController::class, 'update'])->name('catin.update');
    Route::get('/catin/delete/{id}', [catinController::class, 'delete'])->name('catin.delete');
    Route::get('catins', [ApiCatinController::class, 'index']);

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/laporan/laporan', [LaporanController::class, 'index'])->name('laporan.laporan');
    Route::get('/laporan/{id}/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
    Route::get('/laporan/export', [LaporanController::class, 'export'])->name('laporan.export');
    Route::get('/laporan/cetak-semua', [LaporanController::class, 'cetakSemua'])->name('laporan.cetakSemua');

});


Route::get('/tes', function(){
$url = "https://api.madiunkab.go.id/view-penduduk";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "secret-key: demo",
   "Content-Type: application/json",
   "user-agent: wicaksu"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
    "query":"nik",
    "data":"3213131312313131"
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

return $resp;

});