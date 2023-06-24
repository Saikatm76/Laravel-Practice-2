<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactNoteController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


// Route::get('/', function () {

//     $html = "
//             <div>

//                <a href='" . route('admin.contact.index') . "'>contact</a>

//             </div>
// ";

//     return $html;
// });

// Route::get('/new', function () {

//     $html = "
//             <div>

//                <a href='" . route('admin.contact.index') . "'>contact</a>

//             </div>
// ";

//     return Blade::render($html);
// });


// Route::get('template', function () {


//     $contact = [
//         1 => ['name' => 'saikat', 'id' => '1'],
//         2 => ['name' => 'argha', 'id' => '2']
//     ];


//     // abort_if(!isset($contact), 404);

//     abort_unless(isset($contact), 404);

//     return view('template')->with('contact', $contact);

//     // return view('template', compact('contact'));
//     // return view('template', ['contact' => $contact]);
// });

// Route::prefix('admin')->name('admin.')->group(function () {

//     Route::get('/companies_name', function ($contacts = 'contacts') {
//         return $contacts;
//     })->name('contact.index');

//     Route::get('/companies/id/{id}', function ($id) {
//         return $id;
//     })->where('id', '[0-9]+');

//     Route::get('companies/t_id/{t_id}', function ($tid) {
//         return $tid;
//     })->whereNumber('t_id');

//     Route::get('/company_details/name/{name?}', function ($name = 'abc') {
//         return $name;
//     })->where('name', '[a-zA-Z]+')->name('company.name');

//     Route::get('companies/t_name/{t_name}', function ($tname) {
//         return $tname;
//     })->whereAlpha('t_name');

//     Route::get('companies/tag/{tag}', function (Request $request) {
//         return $request->tag;
//     })->whereIn('tag', ['movie', 'song', 'painting']);

//     Route::get('companies/string/{string}', function ($string) {
//         return $string;
//     })->whereAlphaNumeric('string');
// });


// Route::resource('/companies', CompanyController::class);

// Route::resources([
//     '/tags' => TagController::class,
//     '/tasks' => TaskController::class
// ]);


// Route::resource('activities' , ActivityController::class)->only([
//     'index','create'
// ]);


// Route::resource('activities' , ActivityController::class)->except([
//     'index','create'
// ]);

// Route::resource('activities', ActivityController::class)->names([
//     'index' => 'activities.all',
//     'show'  => 'activities.view'
// ]);



#nested resources

// Route::resource('contacts.notes', ContactNoteController::class);

// Route::resource('contacts.notes', ContactNoteController::class)->shallow();

Route::get('/', WelcomeController::class);


Route::prefix('user')->name('user.')->controller(ContactController::class)->group(function () {

    Route::get('contacts', 'index')->name('index');

    Route::get('contact/create', 'create')->name('create');

    Route::get('single_contact/{id}', 'single_contact')->name('single_contact');
});



Route::fallback(function () {
    return "
       <h1>sorry</h1>
  ";
});
