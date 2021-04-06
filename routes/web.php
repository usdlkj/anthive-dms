<?php

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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('companies', App\Http\Controllers\CompanyController::class);

Route::resource('companies.users', App\Http\Controllers\UserController::class);

Route::resource('projects', App\Http\Controllers\ProjectController::class);

Route::resource('projects.fields', App\Http\Controllers\ProjectFieldController::class);

Route::resource('projects.fields.selects', App\Http\Controllers\SelectValueController::class);

Route::resource('projects.users', App\Http\Controllers\ProjectUserController::class);

Route::resource('files', App\Http\Controllers\FileController::class);

Route::get('/projects/{projectId}/documents/showAll', [App\Http\Controllers\DocumentController::class, 'showAll'])->name('projects.documents.showAll');
Route::resource('projects.documents', App\Http\Controllers\DocumentController::class);

Route::resource('companyDocuments', App\Http\Controllers\CompanyDocumentController::class);

Route::resource('documentFields', App\Http\Controllers\DocumentFieldController::class);

Route::resource('projects.mailTypes', App\Http\Controllers\MailTypeController::class);

Route::get('/projects/{projectId}/mails/inbox', [App\Http\Controllers\MailController::class, 'inbox'])->name('projects.mails.inbox');
Route::get('/projects/{projectId}/mails/sent', [App\Http\Controllers\MailController::class, 'sent'])->name('projects.mails.sent');
Route::get('/projects/{projectId}/mails/draft', [App\Http\Controllers\MailController::class, 'draft'])->name('projects.mails.draft');
Route::resource('projects.mails', App\Http\Controllers\MailController::class);

Route::resource('mailUsers', App\Http\Controllers\MailUserController::class);

Route::resource('mailAttachments', App\Http\Controllers\MailAttachmentController::class);
