<?php

use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CasesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes(['register' => false]);
Route::redirect('/', '/login');
Route::get('/registration', 'FrontendController@index')->name('organization.new');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('language/{locale}', 'LanguageController@setLocale')->name('locale');

Route::resources([
    'user' => 'UserController',
    'province' => 'ProvinceController',
    'district' => 'DistrictController',
    'municipality' => 'MunicipalityController',
    'ward' => 'WardController',
]);
// organization
Route::get('organization', [OrganizationController::class, 'index'])->name('organization.index');
Route::get('organization/create', [OrganizationController::class, 'create'])->name('organization.create');
Route::post('organization', [OrganizationController::class, 'store'])->name('organization.store');
Route::get('organization/{organization}/edit', [OrganizationController::class, 'edit'])->name('organization.edit');
Route::put('organization/{organization}', [OrganizationController::class, 'update'])->name('organization.update');
Route::delete('organization/{organization}', [OrganizationController::class, 'destroy'])->name('organization.destroy');

// cases
Route::get('cases', [CasesController::class, 'index'])->name('cases.index');
Route::post('cases', [CasesController::class, 'store'])->name('cases.store');
Route::delete('cases/{cases}', [CasesController::class, 'destroy'])->name('cases.destroy');
Route::get('cases/{cases}/edit', [CasesController::class, 'edit'])->name('cases.edit');
Route::get('cases/{cases}/view', [CasesController::class, 'view'])->name('cases.view');
Route::put('cases/{cases}', [CasesController::class, 'update'])->name('cases.update');
Route::get('cases/create', [CasesController::class, 'create'])->name('cases.create');

// project routes
Route::get('project', [ProjectController::class, 'index'])->name('project.index');
Route::get('project/create', [ProjectController::class, 'create'])->name('project.create');
Route::post('project/store', [ProjectController::class, 'store'])->name('project.store');
Route::delete('project/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::get('project/{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
Route::put('project/{project}', [ProjectController::class, 'update'])->name('project.update');

// Route::get('/data/{key}', 'TableController@index');
// Route::post('/data/{key}', 'TableController@store');
Route::get('data/{slug}/create', 'ResourceTemplateController@create');
Route::post('data/{slug}', 'ResourceTemplateController@store');

Route::get('resources', 'ResourceController@index')->name('resources.index');
Route::get('resources/create', 'ResourceController@create')->name('resources.create');
Route::post('resources', 'ResourceController@store')->name('resources.store');
Route::get('resources/{slug}/edit', 'ResourceController@edit')->name('resources.edit');

Route::post('resources/{slug}/fields', 'ResourceController@saveFields')->name('resources.fields.store');


Route::get('fiscal-year/{fiscalYear?}', 'FiscalYearController@index')->name('fiscal-year.index');
Route::post('fiscal-year', 'FiscalYearController@store')->name('fiscal-year.store');
Route::put('fiscal-year/{fiscalYear}', 'FiscalYearController@update')->name('fiscal-year.update');
Route::delete('fiscal-year/{fiscalYear}', 'FiscalYearController@destroy')->name('fiscal-year.destroy');

// Route::delete('document', 'DocumentController@destroy')->name('ajax.document.destroy');

Route::get('change-password/{user}', 'UserPasswordController@form')->name('password.change.form');
Route::put('change-password/{user}', 'UserPasswordController@change')->name('password.change');

// Route::get('mysettings', 'UserSettingsController@index')->name('user.settings.index');
// Route::post('mysettings', 'UserSettingsController@sync')->name('user.settings.sync');

Route::get('settings', 'SettingsController@index')->name('settings.index');
Route::post('settings', 'SettingsController@sync')->name('settings.sync');

Route::get('configuration-checklist', 'ConfigurationChecklistController@index')->name('configuration-checklist.index');

Route::group(
    [
        'middleware' => ['auth', 'role:super-admin']
    ],
    function () {
        Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');
    }
);

Route::any('/{all}', function () {
    return view('app');
})->where(['all' => '.*']);


