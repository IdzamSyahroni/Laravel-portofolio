<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\depanController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\pengaturanHalamanController;







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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [depanController::class, 'index']);

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/logout', function () {
    auth::logout();
    return redirect('login');
})->middleware('auth');

Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();
    $id = $githubUser->id;
    $avatar = $githubUser->avatar;

    $avatar_file = $id. ".jpg";
    $fileContent = file_get_contents($avatar);
    File::put(public_path("admin/images/faces/$avatar_file"), $fileContent);

    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->nickname,
        'email' => $githubUser->email,
        'password' => Hash::make('rahasia'),
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
        'avatar' => $avatar_file
    ]);

    Auth::login($user);
 
    return redirect('/dashboard');
});

Route::prefix('dashboard')->middleware('auth')->group(
  function()  {
    Route::get('/', [halamanController::class, 'index']);
    Route::resource('halaman', halamanController::class);
    Route::resource('experience', experienceController::class);
    Route::resource('education', educationController::class);
    Route::get('skill', [skillController::class, 'index'])->name('skill.index');
    Route::post('skill', [skillController::class, 'update'])->name('skill.update');
    Route::get('profile', [profileController::class, 'index'])->name('profile.index');
    Route::post('profile', [profileController::class, 'update'])->name('profile.update');
    Route::get('pengaturanhalaman', [pengaturanHalamanController::class, 'index'])->name('pengaturanhalaman.index');
    Route::post('pengaturanhalaman', [pengaturanHalamanController::class, 'update'])->name('pengaturanhalaman.update');
  }  
);

