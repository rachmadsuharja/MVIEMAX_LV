<?php
use App\Models\Film;
use App\Models\Role;
use App\Models\Feedback;
use App\Models\Publisher;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function() {
    $films = Film::select('*')->get();
    return view('index', [
        "title" => "Halaman Utama",
        "films"=> $films,
    ]);
})->name('login');


/*
LOGIN, REGISTER, & FORGOT PASSWORD
==================================
- Login Admin
- Register Member
- Login Member
- Register Publisher
- Login Publisher
*/
Route::get('/admin-login', [UserController::class, 'loginAdministrator']);
Route::post('/admin-login/store', [UserController::class, 'storeLoginAdmin'])->name('store-login-admin');

Route::get('/membership-register', [UserController::class, 'registerMembership']);
Route::post('/membership-register/store', [UserController::class, 'storeRegMember'])->name('store-reg-member');
Route::get('/membership-login', [UserController::class, 'loginMembership']);
Route::post('/membership-login/store', [UserController::class, 'storeLoginMember'])->name('store-login-member');
Route::get('/membership-forgot-password', [UserController::class, 'forgotMember']);
Route::put('/membership-update-password', [UserController::class, 'updateMemberPass'])->name('member-update-password');

Route::get('/publisher-register', [UserController::class, 'registerPublisher']);
Route::post('/publisher-register/store', [UserController::class, 'storeRegPublisher'])->name('store-reg-publisher');
Route::get('/publisher-login', [UserController::class, 'loginPublisher']);
Route::get('/publisher-forgot-password', [UserController::class, 'forgotPublisher']);
Route::put('/publisher-update-password', [UserController::class, 'updatePublishPass'])->name('publisher-update-password');
Route::post('/publisher-login/store', [UserController::class, 'storeLoginPublisher'])->name('store-login-publisher');

Route::middleware('auth')->group(function() {
    Route::group(['middleware' => 'adminaccess'], function() {
        //dashboard
        Route::get('/administrator', [AdminController::class, 'dashboard'])->name('admin-dashboard');
        //movie
        Route::get('/admin/all-movies', [AdminController::class, 'film'])->name('all-movies');
        Route::delete('/admin/all-movies/delete-movie/{id}', [AdminController::class, 'deleteFilm'])->name('rm-movie');
        //roles
        Route::get('/admin/roles', [AdminController::class, 'role'])->name('roles');
        Route::get('/admin/roles/add-role', [AdminController::class, 'addRole'])->name('add-role');
        Route::post('/admin/roles/add-role', [AdminController::class, 'storeRole'])->name('store-role');
        Route::get('/admin/roles/edit-role/{id}', [AdminController::class, 'editRole'])->name('edit-role');
        Route::put('/admin/roles/update-role/{id}', [AdminController::class, 'updateRole'])->name('update-role');
        Route::get('/admin/roles/delete-role/{id}', [AdminController::class, 'deleteRole'])->name('delete-role');
        //publishers
        Route::get('/admin/publishers', [AdminController::class, 'publisher'])->name('publisher');
        Route::get('/admin/publishers/add-publisher', [AdminController::class, 'addPublisher'])->name('add-publisher');
        Route::post('/admin/publishers/add-publisher/store', [AdminController::class, 'storePublisher'])->name('store-publisher');
        Route::get('/admin/publishers/edit-publisher/{id}', [AdminController::class, 'editPublisher'])->name('edit-publisher');
        Route::put('/admin/publishers/update-publisher/{id}', [AdminController::class, 'updatePublisher'])->name('update-publisher');
        Route::get('/admin/publishers/delete-publisher/{id}', [AdminController::class, 'deletePublisher'])->name('delete-publisher');
        //memberships
        Route::get('/admin/memberships', [AdminController::class, 'membership'])->name('membership');
        Route::get('/admin/memberships/add-member', [AdminController::class, 'addMember'])->name('add-member');
        Route::post('/admin/memberships/add-member/store', [AdminController::class, 'storeMember'])->name('store-member');
        Route::get('/admin/memberships/edit-member/{id}', [AdminController::class, 'editMember'])->name('edit-member');
        Route::put('/admin/memberships/update-member/{id}', [AdminController::class, 'updateMember'])->name('update-member');
        Route::get('/admin/memberships/delete-member/{id}', [AdminController::class, 'deleteMember'])->name('delete-member');
        //feedbacks
        Route::get('/user-feedback', [AdminController::class, 'addFeedback'])->name('add-feedback');
        Route::post('/user-feedback/store-feedback', [AdminController::class, 'storeFeedback'])->name('store-feedback');
        Route::get('/admin/feedback', [AdminController::class, 'feedback'])->name('feedback');
        Route::get('/admin/feedback/edit-feedback/{id}', [AdminController::class, 'editFeedback'])->name('edit-feedback');
        Route::put('/admin/feedback/update-feedback/{id}', [AdminController::class, 'updateFeedback'])->name('update-feedback');
        Route::get('/admin/feedback/delete-feedback/{id}', [AdminController::class, 'deleteFeedback'])->name('delete-feedback');
        //logout
        Route::get('/admin-logout', [UserController::class, 'adminLogout']);
    });
    
    /*PUBLISHER PAGE*/
    Route::group(['middleware' => 'publishaccess'], function() {
        Route::get('/publisher', function() {
            $films = count(Film::select('*')->get());
            $publisher = count(Publisher::select('*')->get());
            return view('/publisher/dashboard', [
                "title" => "Publisher",
                "films" => $films,
                "publisher" => $publisher,
            ]);
        });
        Route::get('/publisher/film-settings', [FilmController::class, 'index']);
        Route::get('/publisher/film-settings/add-movies', [FilmController::class, 'create']);
        Route::post('/publisher/film-settings/store', [FilmController::class, 'store'])->name('add-movie');
        Route::get('/publisher/film-settings/update-movies/{id}', [FilmController::class, 'edit'])->name('edit-movie');
        Route::put('/publisher/film-settings/update-movies/{id}', [FilmController::class, 'update'])->name('update-movie');
        Route::get('/publisher/film-settings/delete-movies/{id}', [FilmController::class, 'destroy'])->name('delete-movie');
        //logout
        Route::get('/publisher-logout', [UserController::class, 'publisherLogout']);
    });
    
    /*MEMBER PAGE*/
    Route::group(['middleware' => 'memberaccess'], function() {
        Route::get('/membership', function() {
            return view('/membership/dashboard', [
                "title" => "Membership"
            ]);
        });
    
        Route::get('/membership/all-movies', function() {
            $films = Film::latest()->paginate('3');
            return view('/membership/all-movies', [
                "title" => "All Movies",
                "films" => $films
            ]);
        });
    
        Route::get('/membership-logout', [UserController::class, 'memberLogout']);
    });
});
Route::get('/about-laravel', function () {
    return view('welcome');
});