<?php

use App\Document;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\PartyDetailController;
use App\Http\Controllers\OppositPartyController;
use App\Http\Controllers\InformToPartyController;
use App\Http\Controllers\CaseTypeController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FacilitationController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\DebateController;
use App\Http\Controllers\ReconcilationController;
use App\Http\Controllers\JudgementController;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\DistrictCourtController;
use App\Http\Controllers\HighCourtController;
use App\Http\Controllers\SupremeCourtController;
use App\Http\Controllers\OtherCourtController;
use App\Http\Controllers\LocalLevelController;
use App\Http\Controllers\DecisionController;
use App\Http\Controllers\RejectedController;
use App\Http\Controllers\VerspController;
use App\Http\Controllers\PersonalDetailController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DocumentController;
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
// Card
Route::get('card', [CardController::class, 'index'])->name('card.index');
Route::get('card/total', [CardController::class, 'total'])->name('cases.total');




Route::group(
    [
        'middleware' => ['auth', 'role:super-admin']
    ],
    function () {
        Route::get('admin/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('admin.logs');





        // ==============================
        // Report
        Route::get('report', [ReportController::class, 'index'])->name('report.index');
        Route::post('report/search', [ReportController::class, 'search'])->name('report.search');
        Route::post('report/dateFilter', [ReportController::class, 'dateFilter'])->name('report.dateFilter');
        Route::get('status/{key}', [ReportController::class, 'caseStatus'])->name('status.caseStatus');
        Route::get('witness/{witness}', [ReportController::class, 'witness'])->name('witness.witness');
        Route::get('type/{type}', [ReportController::class, 'caseType'])->name('type.caseType');
        Route::get('userId/{userId}', [ReportController::class, 'userId'])->name('user.userId');


        // cases
        Route::get('cases', [CasesController::class, 'index'])->name('cases.index');
        Route::post('cases', [CasesController::class, 'store'])->name('cases.store');
        Route::post('cases/search', [CasesController::class, 'search'])->name('cases.search');
        Route::post('cases/dateFilter', [CasesController::class, 'dateFilter'])->name('cases.dateFilter');
        Route::delete('cases/{cases}', [CasesController::class, 'destroy'])->name('cases.destroy');
        Route::get('cases/{cases}/edit', [CasesController::class, 'edit'])->name('cases.edit');
        // Route::get('cases/{cases}/view', [CasesController::class, 'view'])->name('cases.view');
        Route::put('cases/{cases}', [CasesController::class, 'update'])->name('cases.update');
        Route::get('cases/create', [CasesController::class, 'create'])->name('cases.create');

        // party detail
        Route::get('partydetail/{cases}', [PartyDetailController::class, 'index'])->name('partydetail.index');
        Route::post('partydetail', [PartyDetailController::class, 'store'])->name('partydetail.store');
        Route::get('partydetail/{cases}/create', [PartyDetailController::class, 'create'])->name('partydetail.create');
        Route::delete('partydetail/{partyDetail}', [PartyDetailController::class, 'destroy'])->name('partydetail.destroy');
        Route::get('partydetail/{partyDetail}/edit', [PartyDetailController::class, 'edit'])->name('partydetail.edit');
        Route::put('partydetail/{partyDetail}', [PartyDetailController::class, 'update'])->name('partydetail.update');

        //Opposit party detail
        Route::get('opposit-party/{cases}', [OppositPartyController::class, 'index'])->name('opposit-party.index');
        Route::post('opposit-party', [OppositPartyController::class, 'store'])->name('opposit-party.store');
        Route::get('opposit-party/{cases}/create', [OppositPartyController::class, 'create'])->name('opposit-party.create');
        Route::delete('opposit-party/{oppositParty}', [OppositPartyController::class, 'destroy'])->name('opposit-party.destroy');
        Route::get('opposit-party/{oppositParty}/edit', [OppositPartyController::class, 'edit'])->name('opposit-party.edit');
        Route::put('opposit-party/{oppositParty}', [OppositPartyController::class, 'update'])->name('opposit-party.update');

        //Inform to party detail
        Route::get('inform-to-party/{cases}', [InformToPartyController::class, 'index'])->name('inform-to-party.index');
        Route::post('inform-to-party', [InformToPartyController::class, 'store'])->name('inform-to-party.store');
        Route::get('inform-to-party/{cases}/create', [InformToPartyController::class, 'create'])->name('inform-to-party.create');
        Route::delete('inform-to-party/{informToParty}', [InformToPartyController::class, 'destroy'])->name('inform-to-party.destroy');
        Route::get('inform-to-party/{informToParty}/edit', [InformToPartyController::class, 'edit'])->name('inform-to-party.edit');
        Route::put('inform-to-party/{informToParty}', [InformToPartyController::class, 'update'])->name('inform-to-party.update');


        // 
        Route::get('facilation/{cases}', [FacilitationController::class, 'index'])->name('facilation.index');
        Route::post('facilation', [FacilitationController::class, 'store'])->name('facilation.store');
        Route::get('facilation/{cases}/create', [FacilitationController::class, 'create'])->name('facilation.create');
        Route::delete('facilation/{consultation}', [FacilitationController::class, 'destroy'])->name('facilation.destroy');
        Route::get('facilation/{consultation}/edit', [FacilitationController::class, 'edit'])->name('facilation.edit');
        Route::put('facilation/{consultation}', [FacilitationController::class, 'update'])->name('facilation.update');

        // 
        Route::get('draft/{cases}', [DraftController::class, 'index'])->name('draft.index');
        Route::post('draft', [DraftController::class, 'store'])->name('draft.store');
        Route::get('draft/{cases}/create', [DraftController::class, 'create'])->name('draft.create');
        Route::delete('draft/{consultation}', [DraftController::class, 'destroy'])->name('draft.destroy');
        Route::get('draft/{consultation}/edit', [DraftController::class, 'edit'])->name('draft.edit');
        Route::put('draft/{consultation}', [DraftController::class, 'update'])->name('draft.update');



        // reconcilation
        Route::get('reconcilation/{cases}', [ReconcilationController::class, 'index'])->name('reconcilation.index');
        Route::post('reconcilation', [ReconcilationController::class, 'store'])->name('reconcilation.store');
        Route::get('reconcilation/{cases}/create', [ReconcilationController::class, 'create'])->name('reconcilation.create');
        Route::delete('reconcilation/{consultation}', [ReconcilationController::class, 'destroy'])->name('reconcilation.destroy');
        Route::get('reconcilation/{consultation}/edit', [ReconcilationController::class, 'edit'])->name('reconcilation.edit');
        Route::put('reconcilation/{consultation}', [ReconcilationController::class, 'update'])->name('reconcilation.update');

        // reconcilation
        Route::get('judgement/{cases}', [JudgementController::class, 'index'])->name('judgement.index');
        Route::post('judgement', [JudgementController::class, 'store'])->name('judgement.store');
        Route::get('judgement/{cases}/create', [JudgementController::class, 'create'])->name('judgement.create');
        Route::delete('judgement/{consultation}', [JudgementController::class, 'destroy'])->name('judgement.destroy');
        Route::get('judgement/{consultation}/edit', [JudgementController::class, 'edit'])->name('judgement.edit');
        Route::put('judgement/{consultation}', [JudgementController::class, 'update'])->name('judgement.update');

        // PoliceStationController
        Route::get('police-station/{cases}', [PoliceStationController::class, 'index'])->name('police-station.index');
        Route::post('police-station', [PoliceStationController::class, 'store'])->name('police-station.store');
        Route::get('police-station/{cases}/create', [PoliceStationController::class, 'create'])->name('police-station.create');
        Route::delete('police-station/{consultation}', [PoliceStationController::class, 'destroy'])->name('police-station.destroy');
        Route::get('police-station/{consultation}/edit', [PoliceStationController::class, 'edit'])->name('police-station.edit');
        Route::put('police-station/{consultation}', [PoliceStationController::class, 'update'])->name('police-station.update');

        // DistrictCourtController
        Route::get('district-court/{cases}', [DistrictCourtController::class, 'index'])->name('district-court.index');
        Route::post('district-court', [DistrictCourtController::class, 'store'])->name('district-court.store');
        Route::get('district-court/{cases}/create', [DistrictCourtController::class, 'create'])->name('district-court.create');
        Route::delete('district-court/{consultation}', [DistrictCourtController::class, 'destroy'])->name('district-court.destroy');
        Route::get('district-court/{consultation}/edit', [DistrictCourtController::class, 'edit'])->name('district-court.edit');
        Route::put('district-court/{consultation}', [DistrictCourtController::class, 'update'])->name('district-court.update');

        // HighCourtController
        Route::get('high-court/{cases}', [HighCourtController::class, 'index'])->name('high-court.index');
        Route::post('high-court', [HighCourtController::class, 'store'])->name('high-court.store');
        Route::get('high-court/{cases}/create', [HighCourtController::class, 'create'])->name('high-court.create');
        Route::delete('high-court/{consultation}', [HighCourtController::class, 'destroy'])->name('high-court.destroy');
        Route::get('high-court/{consultation}/edit', [HighCourtController::class, 'edit'])->name('high-court.edit');
        Route::put('high-court/{consultation}', [HighCourtController::class, 'update'])->name('high-court.update');

        // SupremeCourtController
        Route::get('supreme-court/{cases}', [SupremeCourtController::class, 'index'])->name('supreme-court.index');
        Route::post('supreme-court', [SupremeCourtController::class, 'store'])->name('supreme-court.store');
        Route::get('supreme-court/{cases}/create', [SupremeCourtController::class, 'create'])->name('supreme-court.create');
        Route::delete('supreme-court/{consultation}', [SupremeCourtController::class, 'destroy'])->name('supreme-court.destroy');
        Route::get('supreme-court/{consultation}/edit', [SupremeCourtController::class, 'edit'])->name('supreme-court.edit');
        Route::put('supreme-court/{consultation}', [SupremeCourtController::class, 'update'])->name('supreme-court.update');

        // OtherCourtController
        Route::get('other-court/{cases}', [OtherCourtController::class, 'index'])->name('other-court.index');
        Route::post('other-court', [OtherCourtController::class, 'store'])->name('other-court.store');
        Route::get('other-court/{cases}/create', [OtherCourtController::class, 'create'])->name('other-court.create');
        Route::delete('other-court/{consultation}', [OtherCourtController::class, 'destroy'])->name('other-court.destroy');
        Route::get('other-court/{consultation}/edit', [OtherCourtController::class, 'edit'])->name('other-court.edit');
        Route::put('other-court/{consultation}', [OtherCourtController::class, 'update'])->name('other-court.update');

        // LocalLevelController
        Route::get('local-level/{cases}', [LocalLevelController::class, 'index'])->name('local-level.index');
        Route::post('local-level', [LocalLevelController::class, 'store'])->name('local-level.store');
        Route::get('local-level/{cases}/create', [LocalLevelController::class, 'create'])->name('local-level.create');
        Route::delete('local-level/{consultation}', [LocalLevelController::class, 'destroy'])->name('local-level.destroy');
        Route::get('local-level/{consultation}/edit', [LocalLevelController::class, 'edit'])->name('local-level.edit');
        Route::put('local-level/{consultation}', [LocalLevelController::class, 'update'])->name('local-level.update');

        // DecisionController
        Route::get('decision/{cases}', [DecisionController::class, 'index'])->name('decision.index');
        Route::post('decision', [DecisionController::class, 'store'])->name('decision.store');
        Route::get('decision/{cases}/create', [DecisionController::class, 'create'])->name('decision.create');
        Route::delete('decision/{consultation}', [DecisionController::class, 'destroy'])->name('decision.destroy');
        Route::get('decision/{consultation}/edit', [DecisionController::class, 'edit'])->name('decision.edit');
        Route::put('decision/{consultation}', [DecisionController::class, 'update'])->name('decision.update');

        // RejectedController
        Route::get('rejected/{cases}', [RejectedController::class, 'index'])->name('rejected.index');
        Route::post('rejected', [RejectedController::class, 'store'])->name('rejected.store');
        Route::get('rejected/{cases}/create', [RejectedController::class, 'create'])->name('rejected.create');
        Route::delete('rejected/{consultation}', [RejectedController::class, 'destroy'])->name('rejected.destroy');
        Route::get('rejected/{consultation}/edit', [RejectedController::class, 'edit'])->name('rejected.edit');
        Route::put('rejected/{consultation}', [RejectedController::class, 'update'])->name('rejected.update');

        // 
        Route::get('debate/{cases}', [DebateController::class, 'index'])->name('debate.index');
        Route::post('debate', [DebateController::class, 'store'])->name('debate.store');
        Route::get('debate/{cases}/create', [DebateController::class, 'create'])->name('debate.create');
        Route::delete('debate/{consultation}', [DebateController::class, 'destroy'])->name('debate.destroy');
        Route::get('debate/{consultation}/edit', [DebateController::class, 'edit'])->name('debate.edit');
        Route::put('debate/{consultation}', [DebateController::class, 'update'])->name('debate.update');


        //Case type
        Route::get('case-type/{cases}', [CaseTypeController::class, 'index'])->name('case-type.index');
        Route::post('case-type', [CaseTypeController::class, 'store'])->name('case-type.store');
        Route::get('case-type/{cases}/create', [CaseTypeController::class, 'create'])->name('case-type.create');
        Route::delete('case-type/{caseType}', [CaseTypeController::class, 'destroy'])->name('case-type.destroy');
        Route::get('case-type/{caseType}/edit', [CaseTypeController::class, 'edit'])->name('case-type.edit');
        Route::put('case-type/{caseType}', [CaseTypeController::class, 'update'])->name('case-type.update');


        //Case type
        Route::get('consultation/{cases}', [ConsultationController::class, 'index'])->name('consultation.index');
        Route::post('consultation', [ConsultationController::class, 'store'])->name('consultation.store');
        Route::get('consultation/{cases}/create', [ConsultationController::class, 'create'])->name('consultation.create');
        Route::delete('consultation/{consultation}', [ConsultationController::class, 'destroy'])->name('consultation.destroy');
        Route::get('consultation/{consultation}/edit', [ConsultationController::class, 'edit'])->name('consultation.edit');
        Route::put('consultation/{consultation}', [ConsultationController::class, 'update'])->name('consultation.update');

        // document
        Route::get('document/{consultation}', [DocumentController::class, 'index'])->name('document.index');
        // Route::post('documents', [DocumentController::class, 'store'])->name('documents.store');
        Route::post('document/store', 'DocumentController@store')->name('document.store');
        Route::get('document/{cases}/create', [DocumentController::class, 'create'])->name('document.create');
        Route::delete('document/{document}', [DocumentController::class, 'destroy'])->name('document.destroy');

        // versp 
        Route::get('versp', [VerspController::class, 'index'])->name('versp.index');
        Route::get('versp/create', [VerspController::class, 'create'])->name('versp.create');
        Route::post('vresp/store', [VerspController::class, 'store'])->name('versp.store');
        Route::post('vresp/dateFilter', [VerspController::class, 'dateFilter'])->name('versp.dateFilter');
        Route::post('vresp/search', [VerspController::class, 'search'])->name('versp.search');
        Route::delete('versp/{versp}', [VerspController::class, 'destroy'])->name('versp.destroy');
        Route::get('versp/{versp}/edit', [VerspController::class, 'edit'])->name('versp.edit');
        Route::put('versp/{versp}', [VerspController::class, 'update'])->name('versp.update');

        // PersonalDetailController
        Route::get('personal-detail/{versp}', [PersonalDetailController::class, 'index'])->name('personal-detail.index');
        Route::get('personal-detail/{versp}/create', [PersonalDetailController::class, 'create'])->name('personal-detail.create');
        Route::post('personal-detail/store', [PersonalDetailController::class, 'store'])->name('personal-detail.store');
        Route::delete('personal-detail/{personalDetail}', [PersonalDetailController::class, 'destroy'])->name('personal-detail.destroy');
        Route::get('personal-detail/{personalDetail}/edit', [PersonalDetailController::class, 'edit'])->name('personal-detail.edit');
        Route::put('personal-detail/{personalDetail}', [PersonalDetailController::class, 'update'])->name('personal-detail.update');


        Route::get('change-password/{user}', 'UserPasswordController@form')->name('password.change.form');
        Route::put('change-password/{user}', 'UserPasswordController@change')->name('password.change');

        // Route::get('mysettings', 'UserSettingsController@index')->name('user.settings.index');
        // Route::post('mysettings', 'UserSettingsController@sync')->name('user.settings.sync');

        Route::get('settings', 'SettingsController@index')->name('settings.index');
        Route::post('settings', 'SettingsController@sync')->name('settings.sync');

        Route::get('configuration-checklist', 'ConfigurationChecklistController@index')->name('configuration-checklist.index');
    }
);






Route::group(
    [
        'middleware' => ['auth', 'role:super-admin|admin']
    ],
    function () {
        // ==============================
        // Report
        Route::get('report', [ReportController::class, 'index'])->name('report.index');
        Route::post('report/search', [ReportController::class, 'search'])->name('report.search');
        Route::post('report/dateFilter', [ReportController::class, 'dateFilter'])->name('report.dateFilter');
        Route::get('status/{key}', [ReportController::class, 'caseStatus'])->name('status.caseStatus');
        Route::get('witness/{witness}', [ReportController::class, 'witness'])->name('witness.witness');
        Route::get('type/{type}', [ReportController::class, 'caseType'])->name('type.caseType');


        // cases
        Route::get('cases', [CasesController::class, 'index'])->name('cases.index');
        Route::post('cases', [CasesController::class, 'store'])->name('cases.store');
        Route::post('cases/search', [CasesController::class, 'search'])->name('cases.search');
        Route::post('cases/dateFilter', [CasesController::class, 'dateFilter'])->name('cases.dateFilter');
        Route::delete('cases/{cases}', [CasesController::class, 'destroy'])->name('cases.destroy');
        Route::get('cases/{cases}/edit', [CasesController::class, 'edit'])->name('cases.edit');
        // Route::get('cases/{cases}/view', [CasesController::class, 'view'])->name('cases.view');
        Route::put('cases/{cases}', [CasesController::class, 'update'])->name('cases.update');
        Route::get('cases/create', [CasesController::class, 'create'])->name('cases.create');

        // party detail
        Route::get('partydetail/{cases}', [PartyDetailController::class, 'index'])->name('partydetail.index');
        Route::post('partydetail', [PartyDetailController::class, 'store'])->name('partydetail.store');
        Route::get('partydetail/{cases}/create', [PartyDetailController::class, 'create'])->name('partydetail.create');
        Route::delete('partydetail/{partyDetail}', [PartyDetailController::class, 'destroy'])->name('partydetail.destroy');
        Route::get('partydetail/{partyDetail}/edit', [PartyDetailController::class, 'edit'])->name('partydetail.edit');
        Route::put('partydetail/{partyDetail}', [PartyDetailController::class, 'update'])->name('partydetail.update');

        //Opposit party detail
        Route::get('opposit-party/{cases}', [OppositPartyController::class, 'index'])->name('opposit-party.index');
        Route::post('opposit-party', [OppositPartyController::class, 'store'])->name('opposit-party.store');
        Route::get('opposit-party/{cases}/create', [OppositPartyController::class, 'create'])->name('opposit-party.create');
        Route::delete('opposit-party/{oppositParty}', [OppositPartyController::class, 'destroy'])->name('opposit-party.destroy');
        Route::get('opposit-party/{oppositParty}/edit', [OppositPartyController::class, 'edit'])->name('opposit-party.edit');
        Route::put('opposit-party/{oppositParty}', [OppositPartyController::class, 'update'])->name('opposit-party.update');

        //Inform to party detail
        Route::get('inform-to-party/{cases}', [InformToPartyController::class, 'index'])->name('inform-to-party.index');
        Route::post('inform-to-party', [InformToPartyController::class, 'store'])->name('inform-to-party.store');
        Route::get('inform-to-party/{cases}/create', [InformToPartyController::class, 'create'])->name('inform-to-party.create');
        Route::delete('inform-to-party/{informToParty}', [InformToPartyController::class, 'destroy'])->name('inform-to-party.destroy');
        Route::get('inform-to-party/{informToParty}/edit', [InformToPartyController::class, 'edit'])->name('inform-to-party.edit');
        Route::put('inform-to-party/{informToParty}', [InformToPartyController::class, 'update'])->name('inform-to-party.update');


        // 
        Route::get('facilation/{cases}', [FacilitationController::class, 'index'])->name('facilation.index');
        Route::post('facilation', [FacilitationController::class, 'store'])->name('facilation.store');
        Route::get('facilation/{cases}/create', [FacilitationController::class, 'create'])->name('facilation.create');
        Route::delete('facilation/{consultation}', [FacilitationController::class, 'destroy'])->name('facilation.destroy');
        Route::get('facilation/{consultation}/edit', [FacilitationController::class, 'edit'])->name('facilation.edit');
        Route::put('facilation/{consultation}', [FacilitationController::class, 'update'])->name('facilation.update');

        // 
        Route::get('draft/{cases}', [DraftController::class, 'index'])->name('draft.index');
        Route::post('draft', [DraftController::class, 'store'])->name('draft.store');
        Route::get('draft/{cases}/create', [DraftController::class, 'create'])->name('draft.create');
        Route::delete('draft/{consultation}', [DraftController::class, 'destroy'])->name('draft.destroy');
        Route::get('draft/{consultation}/edit', [DraftController::class, 'edit'])->name('draft.edit');
        Route::put('draft/{consultation}', [DraftController::class, 'update'])->name('draft.update');



        // reconcilation
        Route::get('reconcilation/{cases}', [ReconcilationController::class, 'index'])->name('reconcilation.index');
        Route::post('reconcilation', [ReconcilationController::class, 'store'])->name('reconcilation.store');
        Route::get('reconcilation/{cases}/create', [ReconcilationController::class, 'create'])->name('reconcilation.create');
        Route::delete('reconcilation/{consultation}', [ReconcilationController::class, 'destroy'])->name('reconcilation.destroy');
        Route::get('reconcilation/{consultation}/edit', [ReconcilationController::class, 'edit'])->name('reconcilation.edit');
        Route::put('reconcilation/{consultation}', [ReconcilationController::class, 'update'])->name('reconcilation.update');

        // reconcilation
        Route::get('judgement/{cases}', [JudgementController::class, 'index'])->name('judgement.index');
        Route::post('judgement', [JudgementController::class, 'store'])->name('judgement.store');
        Route::get('judgement/{cases}/create', [JudgementController::class, 'create'])->name('judgement.create');
        Route::delete('judgement/{consultation}', [JudgementController::class, 'destroy'])->name('judgement.destroy');
        Route::get('judgement/{consultation}/edit', [JudgementController::class, 'edit'])->name('judgement.edit');
        Route::put('judgement/{consultation}', [JudgementController::class, 'update'])->name('judgement.update');

        // PoliceStationController
        Route::get('police-station/{cases}', [PoliceStationController::class, 'index'])->name('police-station.index');
        Route::post('police-station', [PoliceStationController::class, 'store'])->name('police-station.store');
        Route::get('police-station/{cases}/create', [PoliceStationController::class, 'create'])->name('police-station.create');
        Route::delete('police-station/{consultation}', [PoliceStationController::class, 'destroy'])->name('police-station.destroy');
        Route::get('police-station/{consultation}/edit', [PoliceStationController::class, 'edit'])->name('police-station.edit');
        Route::put('police-station/{consultation}', [PoliceStationController::class, 'update'])->name('police-station.update');

        // DistrictCourtController
        Route::get('district-court/{cases}', [DistrictCourtController::class, 'index'])->name('district-court.index');
        Route::post('district-court', [DistrictCourtController::class, 'store'])->name('district-court.store');
        Route::get('district-court/{cases}/create', [DistrictCourtController::class, 'create'])->name('district-court.create');
        Route::delete('district-court/{consultation}', [DistrictCourtController::class, 'destroy'])->name('district-court.destroy');
        Route::get('district-court/{consultation}/edit', [DistrictCourtController::class, 'edit'])->name('district-court.edit');
        Route::put('district-court/{consultation}', [DistrictCourtController::class, 'update'])->name('district-court.update');

        // HighCourtController
        Route::get('high-court/{cases}', [HighCourtController::class, 'index'])->name('high-court.index');
        Route::post('high-court', [HighCourtController::class, 'store'])->name('high-court.store');
        Route::get('high-court/{cases}/create', [HighCourtController::class, 'create'])->name('high-court.create');
        Route::delete('high-court/{consultation}', [HighCourtController::class, 'destroy'])->name('high-court.destroy');
        Route::get('high-court/{consultation}/edit', [HighCourtController::class, 'edit'])->name('high-court.edit');
        Route::put('high-court/{consultation}', [HighCourtController::class, 'update'])->name('high-court.update');

        // SupremeCourtController
        Route::get('supreme-court/{cases}', [SupremeCourtController::class, 'index'])->name('supreme-court.index');
        Route::post('supreme-court', [SupremeCourtController::class, 'store'])->name('supreme-court.store');
        Route::get('supreme-court/{cases}/create', [SupremeCourtController::class, 'create'])->name('supreme-court.create');
        Route::delete('supreme-court/{consultation}', [SupremeCourtController::class, 'destroy'])->name('supreme-court.destroy');
        Route::get('supreme-court/{consultation}/edit', [SupremeCourtController::class, 'edit'])->name('supreme-court.edit');
        Route::put('supreme-court/{consultation}', [SupremeCourtController::class, 'update'])->name('supreme-court.update');

        // OtherCourtController
        Route::get('other-court/{cases}', [OtherCourtController::class, 'index'])->name('other-court.index');
        Route::post('other-court', [OtherCourtController::class, 'store'])->name('other-court.store');
        Route::get('other-court/{cases}/create', [OtherCourtController::class, 'create'])->name('other-court.create');
        Route::delete('other-court/{consultation}', [OtherCourtController::class, 'destroy'])->name('other-court.destroy');
        Route::get('other-court/{consultation}/edit', [OtherCourtController::class, 'edit'])->name('other-court.edit');
        Route::put('other-court/{consultation}', [OtherCourtController::class, 'update'])->name('other-court.update');

        // LocalLevelController
        Route::get('local-level/{cases}', [LocalLevelController::class, 'index'])->name('local-level.index');
        Route::post('local-level', [LocalLevelController::class, 'store'])->name('local-level.store');
        Route::get('local-level/{cases}/create', [LocalLevelController::class, 'create'])->name('local-level.create');
        Route::delete('local-level/{consultation}', [LocalLevelController::class, 'destroy'])->name('local-level.destroy');
        Route::get('local-level/{consultation}/edit', [LocalLevelController::class, 'edit'])->name('local-level.edit');
        Route::put('local-level/{consultation}', [LocalLevelController::class, 'update'])->name('local-level.update');

        // DecisionController
        Route::get('decision/{cases}', [DecisionController::class, 'index'])->name('decision.index');
        Route::post('decision', [DecisionController::class, 'store'])->name('decision.store');
        Route::get('decision/{cases}/create', [DecisionController::class, 'create'])->name('decision.create');
        Route::delete('decision/{consultation}', [DecisionController::class, 'destroy'])->name('decision.destroy');
        Route::get('decision/{consultation}/edit', [DecisionController::class, 'edit'])->name('decision.edit');
        Route::put('decision/{consultation}', [DecisionController::class, 'update'])->name('decision.update');

        // RejectedController
        Route::get('rejected/{cases}', [RejectedController::class, 'index'])->name('rejected.index');
        Route::post('rejected', [RejectedController::class, 'store'])->name('rejected.store');
        Route::get('rejected/{cases}/create', [RejectedController::class, 'create'])->name('rejected.create');
        Route::delete('rejected/{consultation}', [RejectedController::class, 'destroy'])->name('rejected.destroy');
        Route::get('rejected/{consultation}/edit', [RejectedController::class, 'edit'])->name('rejected.edit');
        Route::put('rejected/{consultation}', [RejectedController::class, 'update'])->name('rejected.update');

        // 
        Route::get('debate/{cases}', [DebateController::class, 'index'])->name('debate.index');
        Route::post('debate', [DebateController::class, 'store'])->name('debate.store');
        Route::get('debate/{cases}/create', [DebateController::class, 'create'])->name('debate.create');
        Route::delete('debate/{consultation}', [DebateController::class, 'destroy'])->name('debate.destroy');
        Route::get('debate/{consultation}/edit', [DebateController::class, 'edit'])->name('debate.edit');
        Route::put('debate/{consultation}', [DebateController::class, 'update'])->name('debate.update');


        //Case type
        Route::get('case-type/{cases}', [CaseTypeController::class, 'index'])->name('case-type.index');
        Route::post('case-type', [CaseTypeController::class, 'store'])->name('case-type.store');
        Route::get('case-type/{cases}/create', [CaseTypeController::class, 'create'])->name('case-type.create');
        Route::delete('case-type/{caseType}', [CaseTypeController::class, 'destroy'])->name('case-type.destroy');
        Route::get('case-type/{caseType}/edit', [CaseTypeController::class, 'edit'])->name('case-type.edit');
        Route::put('case-type/{caseType}', [CaseTypeController::class, 'update'])->name('case-type.update');


        //Case type
        Route::get('consultation/{cases}', [ConsultationController::class, 'index'])->name('consultation.index');
        Route::post('consultation', [ConsultationController::class, 'store'])->name('consultation.store');
        Route::get('consultation/{cases}/create', [ConsultationController::class, 'create'])->name('consultation.create');
        Route::delete('consultation/{consultation}', [ConsultationController::class, 'destroy'])->name('consultation.destroy');
        Route::get('consultation/{consultation}/edit', [ConsultationController::class, 'edit'])->name('consultation.edit');
        Route::put('consultation/{consultation}', [ConsultationController::class, 'update'])->name('consultation.update');

        // document
        Route::get('document/{consultation}', [DocumentController::class, 'index'])->name('document.index');
        // Route::post('documents', [DocumentController::class, 'store'])->name('documents.store');
        Route::post('document/store', 'DocumentController@store')->name('document.store');
        Route::get('document/{cases}/create', [DocumentController::class, 'create'])->name('document.create');
        Route::delete('document/{document}', [DocumentController::class, 'destroy'])->name('document.destroy');

        // versp 
        Route::get('versp', [VerspController::class, 'index'])->name('versp.index');
        Route::get('versp/create', [VerspController::class, 'create'])->name('versp.create');
        Route::post('vresp/store', [VerspController::class, 'store'])->name('versp.store');
        Route::post('vresp/dateFilter', [VerspController::class, 'dateFilter'])->name('versp.dateFilter');
        Route::post('vresp/search', [VerspController::class, 'search'])->name('versp.search');
        Route::delete('versp/{versp}', [VerspController::class, 'destroy'])->name('versp.destroy');
        Route::get('versp/{versp}/edit', [VerspController::class, 'edit'])->name('versp.edit');
        Route::put('versp/{versp}', [VerspController::class, 'update'])->name('versp.update');

        // PersonalDetailController
        Route::get('personal-detail/{versp}', [PersonalDetailController::class, 'index'])->name('personal-detail.index');
        Route::get('personal-detail/{versp}/create', [PersonalDetailController::class, 'create'])->name('personal-detail.create');
        Route::post('personal-detail/store', [PersonalDetailController::class, 'store'])->name('personal-detail.store');
        Route::delete('personal-detail/{personalDetail}', [PersonalDetailController::class, 'destroy'])->name('personal-detail.destroy');
        Route::get('personal-detail/{personalDetail}/edit', [PersonalDetailController::class, 'edit'])->name('personal-detail.edit');
        Route::put('personal-detail/{personalDetail}', [PersonalDetailController::class, 'update'])->name('personal-detail.update');


        Route::get('change-password/{user}', 'UserPasswordController@form')->name('password.change.form');
        Route::put('change-password/{user}', 'UserPasswordController@change')->name('password.change');

        // Route::get('mysettings', 'UserSettingsController@index')->name('user.settings.index');
        // Route::post('mysettings', 'UserSettingsController@sync')->name('user.settings.sync');

        Route::get('settings', 'SettingsController@index')->name('settings.index');
        Route::post('settings', 'SettingsController@sync')->name('settings.sync');

        Route::get('configuration-checklist', 'ConfigurationChecklistController@index')->name('configuration-checklist.index');
    }
);

// Route::any('/{all}', function () {
//     return view('app');
// })->where(['all' => '.*']);
