<?php

use App\Http\Controllers\AcademicsessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\PaymentController;

// use App\Http\Controllers\GuardianController;
use App\Http\Controllers\AccountController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudycenterController;
use App\Http\Controllers\FlutterwaveController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClassactivityController;
use App\Http\Controllers\ClassnameController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\LessonnoteController;
use App\Http\Controllers\MainsliderController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PsycomotorController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SchoolfeeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherassignController;
use App\Http\Controllers\TestimonyController;
use App\Http\Controllers\TransactionController;
use App\Models\Academicsession;
use App\Models\Classactivity;
use App\Models\Transaction;

// use App\Models\Team;


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

  

    return view('auth.login');
});


Route::get('/register', function () {

  

    return view('auth.register');
});
Route::get('admissions', [UserController::class, 'admissions'])->name('admissions');
Route::post('/addchildbyparent', [UserController::class, 'addchildbyparent'])->name('addchildbyparent');


Route::post('/createbooking', [BookingController::class, 'createbooking'])->name('createbooking');
Route::post('/createcontact', [ContactController::class, 'createcontact'])->name('createcontact');
Route::get('/search', [BlogController::class, 'search'])->name('search');
Route::get('/results', [BlogController::class, 'results'])->name('results');
// Route::get('/payment', [PaymentController::class, 'initiatePayment']);
// Route::post('/payment/callback', [PaymentController::class, 'handlePaymentCallback']);


Route::get('/printadmissionform/{ref_no}', [UserController::class, 'printadmissionform'])->name('printadmissionform');
Route::put('/addmedicalsdadmmin/{ref_no}', [UserController::class, 'addmedicalsdadmmin'])->name('addmedicalsdadmmin');
Route::put('/updateaddthirdondadmmin/{ref_no}', [UserController::class, 'updateaddthirdondadmmin'])->name('updateaddthirdondadmmin');
Route::post('/addsecondadmmin/{ref_no}', [UserController::class, 'addsecondadmmin'])->name('addsecondadmmin');
Route::get('/admission/medicalreports/{ref_no}', [UserController::class, 'medicalreports'])->name('medicalreports');
Route::get('/admission/secondregistration/{ref_no}', [UserController::class, 'secondregistration'])->name('secondregistration');
Route::get('/admission/thirdregistration/{ref_no}', [UserController::class, 'thirdregistration'])->name('thirdregistration');

Route::post('/createadmission', [UserController::class, 'createadmission'])->name('createadmission');
Route::get('/admission/admissionform/{slug}', [StudycenterController::class, 'admissionform'])->name('admissionform');
Route::post('/createteacher', [UserController::class, 'createteacher'])->name('createteacher');
Route::get('/viewsingleevent/{ref_no}', [EventController::class, 'viewsingleevent'])->name('viewsingleevent');
Route::get('/viewsinglemember/{ref_no}', [TeamController::class, 'viewsinglemember'])->name('viewsinglemember');

Route::get('/singleblog/{slug}', [BlogController::class, 'singleblog'])->name('singleblog');

Route::prefix('admin')->name('admin.')->group(function() {

    Route::middleware(['guest:admin'])->group(function() {

        Route::view('/login', 'dashboard.admin.login')->name('login');
        Route::view('/register','dashboard.admin.register')->name('register');
        Route::view('/subregister','dashboard.admin.subregister')->name('subregister');
        Route::post('/subcreate', [AdminController::class, 'subcreate'])->name('subcreate');
        Route::post('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
        

    });
    
    Route::middleware(['auth:admin'])->group(function() {
        
        Route::get('/approveaccount/{id}', [AccountController::class, 'approveaccount'])->name('approveaccount');
        Route::get('/sackedaccount/{id}', [AccountController::class, 'sackedaccount'])->name('sackedaccount');
        Route::get('/deleteadmin/{id}', [AdminController::class, 'deleteadmin'])->name('deleteadmin');
        Route::get('/approveadmin/{id}', [AdminController::class, 'approveadmin'])->name('approveadmin');
        Route::get('/sackedadmin/{id}', [AdminController::class, 'sackedadmin'])->name('sackedadmin');
        Route::get('/viewadminstrator', [AdminController::class, 'viewadminstrator'])->name('viewadminstrator');
        Route::get('/viewaccountant', [AccountController::class, 'viewaccountant'])->name('viewaccountant');

        Route::get('deleteslessonnote/{slug}', [LessonnoteController::class, 'deleteslessonnote'])->name('deleteslessonnote');
        Route::get('lesonapprove/{slug}', [LessonnoteController::class, 'lesonapprove'])->name('lesonapprove');
        Route::get('suspendlessonnotes/{slug}', [LessonnoteController::class, 'suspendlessonnotes'])->name('suspendlessonnotes');
        Route::get('rejectlessonnote/{slug}', [LessonnoteController::class, 'rejectlessonnote'])->name('rejectlessonnote');
        Route::put('updatelesoonote/{id}', [LessonnoteController::class, 'updatelesoonote'])->name('updatelesoonote');
        Route::get('editsinglenotesad/{slug}', [LessonnoteController::class, 'editsinglenotesad'])->name('editsinglenotesad');
        Route::get('viewsinglelesson/{slug}', [LessonnoteController::class, 'viewsinglelesson'])->name('viewsinglelesson');
        Route::get('viewlessonnotesad', [LessonnoteController::class, 'viewlessonnotesad'])->name('viewlessonnotesad');
        Route::get('viewclassresults/{classname}', [ClassnameController::class, 'viewclassresults'])->name('viewclassresults');
        Route::post('createresultsad', [ResultController::class, 'createresultsad'])->name('createresultsad');
        Route::get('addresultsad1/{ref_no1}', [UserController::class, 'addresultsad1'])->name('addresultsad1');
        Route::get('addresultsad/{classname}', [ClassnameController::class, 'addresultsad'])->name('addresultsad');
        Route::get('addpsychomotorad/{id}', [ResultController::class, 'addpsychomotorad'])->name('addpsychomotorad');
        Route::get('viewapproveresultsbyad', [ResultController::class, 'viewapproveresultsbyad'])->name('viewapproveresultsbyad');
        Route::get('approveresults/{id}', [ResultController::class, 'approveresults'])->name('approveresults');
        Route::get('viewresult/{id}', [ResultController::class, 'viewresult'])->name('viewresult');
        Route::get('viewresults/{user_id}', [ResultController::class, 'viewresults'])->name('viewresults');
        Route::get('viewresultbyadmin', [ResultController::class, 'viewresultbyadmin'])->name('viewresultbyadmin');
        Route::get('viewallfees', [PaymentController::class, 'viewallfees'])->name('viewallfees');
        Route::post('createpartyngads', [PaymentController::class, 'createpartyngads'])->name('createpartyngads');
        Route::get('addpartyfeespaymentad', [PaymentController::class, 'addpartyfeespaymentad'])->name('addpartyfeespaymentad');
        Route::post('createfeedingads', [PaymentController::class, 'createfeedingads'])->name('createfeedingads');
        Route::get('addfeedingfeespaymentad', [PaymentController::class, 'addfeedingfeespaymentad'])->name('addfeedingfeespaymentad');
        Route::post('createbuspaymentads', [PaymentController::class, 'createbuspaymentads'])->name('createbuspaymentads');
        Route::get('addbusfeespaymentad', [PaymentController::class, 'addbusfeespaymentad'])->name('addbusfeespaymentad');
        Route::post('createpaymentsads', [PaymentController::class, 'createpaymentsads'])->name('createpaymentsads');
        Route::get('addschoolfeespaymentad', [PaymentController::class, 'addschoolfeespaymentad'])->name('addschoolfeespaymentad');
        Route::get('deletenoti/{id}', [NotificationController::class, 'deletenoti'])->name('deletenoti');
        Route::put('updatenotification/{id}', [NotificationController::class, 'updatenotification'])->name('updatenotification');
        Route::get('editnotification/{id}', [NotificationController::class, 'editnotification'])->name('editnotification');
        Route::get('viewnotification', [NotificationController::class, 'viewnotification'])->name('viewnotification');
        Route::post('createnotification', [NotificationController::class, 'createnotification'])->name('createnotification');
        Route::get('addnotification', [NotificationController::class, 'addnotification'])->name('addnotification');
        Route::get('classpaymentad/{classname}', [ClassnameController::class, 'classpaymentad'])->name('classpaymentad');
        Route::get('printsinglepaymentspdf/{ref_no}', [TransactionController::class, 'printsinglepaymentspdf'])->name('printsinglepaymentspdf');
        Route::get('viewsinglepaymentsad/{ref_no}', [TransactionController::class, 'viewsinglepaymentsad'])->name('viewsinglepaymentsad');
        Route::get('viewallpaymentsad', [TransactionController::class, 'viewallpaymentsad'])->name('viewallpaymentsad');
        Route::get('subdelte/{id}', [SubjectController::class, 'subdelte'])->name('subdelte');
        Route::get('classactivitydelete/{slug}', [ClassactivityController::class, 'classactivitydelete'])->name('classactivitydelete');
        Route::get('classactivitysuspend/{slug}', [ClassactivityController::class, 'classactivitysuspend'])->name('classactivitysuspend');
        Route::get('classactivityapproved/{slug}', [ClassactivityController::class, 'classactivityapproved'])->name('classactivityapproved');
        Route::put('updateclassactivityad/{slug}', [ClassactivityController::class, 'updateclassactivityad'])->name('updateclassactivityad');
        Route::get('editclassactivity/{slug}', [ClassactivityController::class, 'editclassactivity'])->name('editclassactivity');
        Route::get('viewsingclassactivity/{slug}', [ClassactivityController::class, 'viewsingclassactivity'])->name('viewsingclassactivity');
        Route::post('createclassactivityad', [ClassactivityController::class, 'createclassactivityad'])->name('createclassactivityad');
        Route::get('viewclassactivitiesads', [ClassactivityController::class, 'viewclassactivitiesads'])->name('viewclassactivitiesads');
        Route::get('addclassactivitiesad', [ClassactivityController::class, 'addclassactivitiesad'])->name('addclassactivitiesad');
        Route::get('addparent', [UserController::class, 'addparent'])->name('addparent');
        Route::get('viewcontact', [ContactController::class, 'viewcontact'])->name('viewcontact');
        Route::get('bookingdelete/{id}', [BookingController::class, 'bookingdelete'])->name('bookingdelete');
        Route::get('viewbookings', [BookingController::class, 'viewbookings'])->name('viewbookings');
        Route::put('changgeteacherclass/{id}', [UserController::class, 'changgeteacherclass'])->name('changgeteacherclass');
        Route::get('changeclasses/{ref_no}', [UserController::class, 'changeclasses'])->name('changeclasses');
        Route::get('queriedteachersreply', [QueryController::class, 'queriedteachersreply'])->name('queriedteachersreply');
        Route::get('academedelete/{id}', [AcademicsessionController::class, 'academedelete'])->name('academedelete');
        Route::put('updatesession/{id}', [AcademicsessionController::class, 'updatesession'])->name('updatesession');
        Route::get('academedit/{id}', [AcademicsessionController::class, 'academedit'])->name('academedit');
        Route::get('viewsession', [AcademicsessionController::class, 'viewsession'])->name('viewsession');
        Route::post('createsession', [AcademicsessionController::class, 'createsession'])->name('createsession');
        Route::get('addsession', [AcademicsessionController::class, 'addsession'])->name('addsession');
        
        Route::get('studentsubjects/{ref_no1}', [UserController::class, 'studentsubjects'])->name('studentsubjects');
        Route::get('secondaryteachers', [UserController::class, 'secondaryteachers'])->name('secondaryteachers');
        Route::get('primaryteachers', [UserController::class, 'primaryteachers'])->name('primaryteachers');
        Route::get('viewteachersubjects/{user_id}', [TeacherassignController::class, 'viewteachersubjects'])->name('viewteachersubjects');
        Route::get('teachertosubjects', [TeacherassignController::class, 'teachertosubjects'])->name('teachertosubjects');
        Route::post('assignsubjectstoteacher/{id}', [TeacherassignController::class, 'assignsubjectstoteacher'])->name('assignsubjectstoteacher');
        Route::get('assignsubject/{id}', [SubjectController::class, 'assignsubject'])->name('assignsubject');
        Route::get('deletesubject/{id}', [SubjectController::class, 'deletesubject'])->name('deletesubject');
        Route::put('updatesubject/{id}', [SubjectController::class, 'updatesubject'])->name('updatesubject');
        Route::get('editsubject/{id}', [SubjectController::class, 'editsubject'])->name('editsubject');
        Route::get('viewteacherquery/{id}', [QueryController::class, 'viewteacherquery'])->name('viewteacherquery');
        Route::get('printquery/{id}', [QueryController::class, 'printquery'])->name('printquery');
        Route::put('addquerytoteacher/{ref_no}', [QueryController::class, 'addquerytoteacher'])->name('addquerytoteacher');
        Route::get('allteachers', [UserController::class, 'allteachers'])->name('allteachers');
        Route::get('queriedteachers', [QueryController::class, 'queriedteachers'])->name('queriedteachers');
        Route::get('sackedteachers', [UserController::class, 'sackedteachers'])->name('sackedteachers');
        Route::get('suspendedteachers', [UserController::class, 'suspendedteachers'])->name('suspendedteachers');
        Route::get('preschoolad', [UserController::class, 'preschoolad'])->name('preschoolad');
        
        
        Route::get('preschoolsubjects', [SubjectController::class, 'preschoolsubjects'])->name('preschoolsubjects');
        Route::get('nurserysubjects', [SubjectController::class, 'nurserysubjects'])->name('nurserysubjects');
        Route::get('approveteachers', [UserController::class, 'approveteachers'])->name('approveteachers');
        Route::get('teachersprint', [UserController::class, 'teachersprint'])->name('teachersprint');
        Route::get('teacherquery/{ref_no1}', [UserController::class, 'teacherquery'])->name('teacherquery');
        Route::get('teachersacked/{ref_no1}', [UserController::class, 'teachersacked'])->name('teachersacked');
        Route::get('teachersuspend/{ref_no1}', [UserController::class, 'teachersuspend'])->name('teachersuspend');
        Route::get('teacherapprove/{ref_no1}', [UserController::class, 'teacherapprove'])->name('teacherapprove');
        Route::put('teacherupdated/{ref_no1}', [UserController::class, 'teacherupdated'])->name('teacherupdated');
        Route::get('editteacher/{ref_no1}', [UserController::class, 'editteacher'])->name('editteacher');
        Route::get('viewsingleteacher/{ref_no1}', [UserController::class, 'viewsingleteacher'])->name('viewsingleteacher');
        Route::get('viewteachers', [UserController::class, 'viewteachers'])->name('viewteachers');
        Route::put('assignteachertoclass/{ref_no1}', [UserController::class, 'assignteachertoclass'])->name('assignteachertoclass');
        Route::get('/assignedteacher/{section}', [UserController::class, 'assignedteacher'])->name('assignedteacher');
        Route::post('printclasses', [UserController::class, 'printclasses'])->name('printclasses');
        Route::get('viewsubject', [SubjectController::class, 'viewsubject'])->name('viewsubject');
        Route::post('createsubject', [SubjectController::class, 'createsubject'])->name('createsubject');
        Route::get('addsubject', [SubjectController::class, 'addsubject'])->name('addsubject');
        Route::get('/classrooms/{classname}', [ClassnameController::class, 'classrooms'])->name('classrooms');
        Route::get('/classesdelete/{id}', [ClassnameController::class, 'classesdelete'])->name('classesdelete');
        Route::put('/updateclass/{id}', [ClassnameController::class, 'updateclass'])->name('updateclass');
        Route::get('/editclasses/{id}', [ClassnameController::class, 'editclasses'])->name('editclasses');
        Route::post('/createclasses', [ClassnameController::class, 'createclasses'])->name('createclasses');
        Route::get('/viewclassestables', [ClassnameController::class, 'viewclassestables'])->name('viewclassestables');
        Route::get('/addclass', [ClassnameController::class, 'addclass'])->name('addclass');
    
        Route::get('/studycenter1', [StudycenterController::class, 'studycenter1'])->name('studycenter1');
        Route::post('/createstudycenter', [StudycenterController::class, 'createstudycenter'])->name('createstudycenter');
        Route::get('/studycentertables', [StudycenterController::class, 'studycentertables'])->name('studycentertables');
        Route::get('/studycentapproved/{id}', [StudycenterController::class, 'studycentapproved'])->name('studycentapproved');
        Route::get('/studycentsuspend/{id}', [StudycenterController::class, 'studycentsuspend'])->name('studycentsuspend');
        Route::get('/studycentdelete/{id}', [StudycenterController::class, 'studycentdelete'])->name('studycentdelete');
        Route::post('/createam', [TeamController::class, 'createam'])->name('createam');
        Route::get('/addteam', [TeamController::class, 'addteam'])->name('addteam');
        Route::get('/viewteam', [TeamController::class, 'viewteam'])->name('viewteam');
        Route::get('/viewsingteam/{ref_no}', [TeamController::class, 'viewsingteam'])->name('viewsingteam');
        Route::get('/editteam/{id}', [TeamController::class, 'editteam'])->name('editteam');
        Route::put('/updateteam/{id}', [TeamController::class, 'updateteam'])->name('updateteam');
        Route::get('/teamsuspend/{ref_no}', [TeamController::class, 'teamsuspend'])->name('teamsuspend');
        Route::get('/teamapproved/{ref_no}', [TeamController::class, 'teamapproved'])->name('teamapproved');
        Route::get('/teamsacked/{ref_no}', [TeamController::class, 'teamsacked'])->name('teamsacked');
        Route::get('/staffdelete/{ref_no}', [TeamController::class, 'staffdelete'])->name('staffdelete');
        
        Route::put('/createrol/{id}', [UserController::class, 'createrol'])->name('createrol');
        Route::get('/addrole/{id}', [UserController::class, 'addrole'])->name('addrole');
        Route::get('/viewroles', [UserController::class, 'viewroles'])->name('viewroles');
        Route::get('/addevent', [EventController::class, 'addevent'])->name('addevent');
        Route::get('/createteevent', [EventController::class, 'createteevent'])->name('createteevent');
        Route::get('/viewevents', [EventController::class, 'viewevents'])->name('viewevents');
       
        Route::get('/adminprogress', [UserController::class, 'adminprogress'])->name('adminprogress');
        Route::get('/viewstudents/{ref_no}', [UserController::class, 'viewstudents'])->name('viewstudents');
        Route::get('/editstudent/{ref_no1}', [UserController::class, 'editstudent'])->name('editstudent');
        Route::put('/updateadmission/{ref_no1}', [UserController::class, 'updateadmission'])->name('updateadmission');
        Route::get('/rejectstudent/{ref_no1}', [UserController::class, 'rejectstudent'])->name('rejectstudent');
        
        Route::get('rejectedstudent', [UserController::class, 'rejectedstudent'])->name('rejectedstudent');
        Route::get('studentsapprove/{ref_no1}', [UserController::class, 'studentsapprove'])->name('studentsapprove');
        Route::get('suspendstudent/{ref_no1}', [UserController::class, 'suspendstudent'])->name('suspendstudent');
        Route::get('suspendstudents', [UserController::class, 'suspendstudents'])->name('suspendstudents');
        Route::get('studentsaddmit/{ref_no1}', [UserController::class, 'studentsaddmit'])->name('studentsaddmit');
        Route::get('admittedstudents', [UserController::class, 'admittedstudents'])->name('admittedstudents');
        Route::get('allstudents', [UserController::class, 'allstudents'])->name('allstudents');
        Route::get('deletestudent/{ref_no1}', [UserController::class, 'deletestudent'])->name('deletestudent');
        Route::get('/addregno/{ref_no1}', [UserController::class, 'addregno'])->name('addregno');
        Route::put('/addingregno/{id}', [UserController::class, 'addingregno'])->name('addingregno');
        Route::get('/studentpdf/{ref_no1}', [UserController::class, 'studentpdf'])->name('studentpdf');
        Route::get('/medicalspdf/{ref_no1}', [UserController::class, 'medicalspdf'])->name('medicalspdf');
        Route::get('/allstudentpdf', [UserController::class, 'allstudentpdf'])->name('allstudentpdf');
        Route::get('/allcrechepdf', [UserController::class, 'allcrechepdf'])->name('allcrechepdf');
        Route::get('/allnurserypdf', [UserController::class, 'allnurserypdf'])->name('allnurserypdf');
        Route::get('/allprimarypdf', [UserController::class, 'allprimarypdf'])->name('allprimarypdf');
        Route::get('/allhighschpdf', [UserController::class, 'allhighschpdf'])->name('allhighschpdf');
        Route::get('/viewalluyo', [UserController::class, 'viewalluyo'])->name('viewalluyo');
        Route::get('/alluyocrechepdf', [UserController::class, 'alluyocrechepdf'])->name('alluyocrechepdf');
        Route::get('/alluyopreperatorypdf', [UserController::class, 'alluyopreperatorypdf'])->name('alluyopreperatorypdf');
        Route::get('/allpreschoolpdf', [UserController::class, 'allpreschoolpdf'])->name('allpreschoolpdf');
        Route::get('/alluyonurserypdf', [UserController::class, 'alluyonurserypdf'])->name('alluyonurserypdf');
        Route::get('/alluyoprimarypdf', [UserController::class, 'alluyoprimarypdf'])->name('alluyoprimarypdf');
        Route::get('/alluyohighschpdf', [UserController::class, 'alluyohighschpdf'])->name('alluyohighschpdf');
        Route::get('/alluyocentpdf', [UserController::class, 'alluyocentpdf'])->name('alluyocentpdf');
        Route::get('/viewpreparatory', [UserController::class, 'viewpreparatory'])->name('viewpreparatory');
        Route::get('/viewpreschool', [UserController::class, 'viewpreschool'])->name('viewpreschool');
        Route::get('/viewnursery', [UserController::class, 'viewnursery'])->name('viewnursery');
        Route::get('/viewprimary', [UserController::class, 'viewprimary'])->name('viewprimary');
        Route::get('/viewhighschool', [UserController::class, 'viewhighschool'])->name('viewhighschool');
        Route::get('/viewallabuja', [UserController::class, 'viewallabuja'])->name('viewallabuja');
        Route::get('/allabujacrechepdf', [UserController::class, 'allabujacrechepdf'])->name('allabujacrechepdf');
        Route::get('/allabujapdf', [UserController::class, 'allabujapdf'])->name('allabujapdf');
        Route::get('/allabujapreperatorypdf', [UserController::class, 'allabujapreperatorypdf'])->name('allabujapreperatorypdf');
        Route::get('/allabujapreschoolpdf', [UserController::class, 'allabujapreschoolpdf'])->name('allabujapreschoolpdf');
        Route::get('/allabujanurserypdf', [UserController::class, 'allabujanurserypdf'])->name('allabujanurserypdf');
        Route::get('/allabujaprimarypdf', [UserController::class, 'allabujaprimarypdf'])->name('allabujaprimarypdf');
        Route::get('/allabujahighschpdf', [UserController::class, 'allabujahighschpdf'])->name('allabujahighschpdf');
        Route::get('/viewabujapreparatory', [UserController::class, 'viewabujapreparatory'])->name('viewabujapreparatory');
        Route::get('/abujapreschool', [UserController::class, 'abujapreschool'])->name('abujapreschool');
        Route::get('/viewabujanursery', [UserController::class, 'viewabujanursery'])->name('viewabujanursery');
        Route::get('/viewabujaprimary', [UserController::class, 'viewabujaprimary'])->name('viewabujaprimary');
        Route::get('/viewabjhighschool', [UserController::class, 'viewabjhighschool'])->name('viewabjhighschool');
        // Route::post('/createparent1', [GuardianController::class, 'createparent1'])->name('createparent1');
        
        // Route::get('/parentochild1/{ref_no}', [GuardianController::class, 'parentochild1'])->name('parentochild1');
        // Route::get('/viewparents', [GuardianController::class, 'viewparents'])->name('viewparents');
        // Route::get('/viewparent/{ref_no}', [GuardianController::class, 'viewparent'])->name('viewparent');
        // Route::get('/editparent/{ref_no}', [GuardianController::class, 'editparent'])->name('editparent');
        // Route::put('/updateparent/{ref_no}', [GuardianController::class, 'updateparent'])->name('updateparent');
        // Route::get('/addchild/{id}', [GuardianController::class, 'addchild'])->name('addchild');
        Route::post('/add_childto_parents', [UserController::class, 'add_childto_parents'])->name('add_childto_parents');
        
        
        
        Route::get('/allsubjects', [SubjectController::class, 'allsubjects'])->name('allsubjects');
        Route::get('/setsubjectquestions', [SubjectController::class, 'setsubjectquestions'])->name('setsubjectquestions');
        Route::get('/addquestions/{id}', [SubjectController::class, 'addquestions'])->name('addquestions');
        Route::post('/addquestions', [QuestionController::class, 'addquestions'])->name('addquestions');
        Route::post('/addbyadminquestion', [QuestionController::class, 'addbyadminquestion'])->name('addbyadminquestion');
        Route::get('/questionbyadmin', [QuestionController::class, 'questionbyadmin'])->name('questionbyadmin');
        Route::get('/viewsinglequestionz/{id}', [QuestionController::class, 'viewsinglequestionz'])->name('viewsinglequestionz');
        Route::get('/editquestionzadmin/{id}', [QuestionController::class, 'editquestionzadmin'])->name('editquestionzadmin');
        Route::get('/questionzapprove/{id}', [QuestionController::class, 'questionzapprove'])->name('questionzapprove');
        Route::get('/questionzsunapprove/{id}', [QuestionController::class, 'questionzsunapprove'])->name('questionzsunapprove');
        Route::put('/updateadminquestion/{id}', [QuestionController::class, 'updateadminquestion'])->name('updateadminquestion');
        Route::get('/uyoquestions', [QuestionController::class, 'uyoquestions'])->name('uyoquestions');
        Route::get('/abujaquestions', [QuestionController::class, 'abujaquestions'])->name('abujaquestions');
        Route::get('/teachersquestion/{user_id}', [QuestionController::class, 'teachersquestion'])->name('teachersquestion');
     
        
        
        
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::get('/home', [AdminController::class, 'home'])->name('home');
       
        Route::get('/viewstudent/{ref_no1}', [UserController::class, 'viewstudent'])->name('viewstudent');
        
        Route::put('/settingsupdate/{id}', [AdminController::class, 'settingsupdate'])->name('settingsupdate');
        
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
       
       
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout'); 
        
       
    });
});


// Route::prefix('guardian')->name('guardian.')->group(function() {

//     Route::middleware(['guest:guardian'])->group(function() {

//         Route::view('/login', 'dashboard.guardian.login')->name('login');
//         Route::view('/register','dashboard.guardian.register')->name('register');
//         Route::post('/create', [GuardianController::class, 'create'])->name('create');
//         Route::post('/guardiancheck', [GuardianController::class, 'guardiancheck'])->name('guardiancheck');

//     });
    
//     Route::middleware(['auth:guardian'])->group(function() {
//         Route::get('/paylounge/{ref_no}', [TransactionController::class, 'paylounge'])->name('paylounge');
//         Route::get('/currentresult', [UserController::class, 'currentresult'])->name('currentresult');
//         Route::get('/pdf1', [ResultController::class, 'pdf1'])->name('pdfi');
        
//         Route::view('/home','dashboard.guardian.home')->name('home');
       
       
//         Route::get('/logout', [GuardianController::class, 'logout'])->name('logout'); 
        
       
//     });
// });




Route::prefix('account')->name('account.')->group(function() {
    Route::middleware(['guest:account'])->group(function() {
        Route::view('/login', 'dashboard.account.login')->name('login');
        Route::view('/register','dashboard.account.register')->name('register');
        Route::post('/createaccount', [AccountController::class, 'createaccount'])->name('createaccount');
        Route::post('/checkaccount', [AccountController::class, 'checkaccount'])->name('checkaccount');

    });
    
    Route::middleware(['auth:account'])->group(function() {
        Route::view('/home','dashboard.account.home')->name('home');
        Route::get('/home', [AccountController::class, 'home'])->name('home');
        Route::get('/addpayment', [PaymentController::class, 'addpayment'])->name('addpayment');
        Route::get('/addfeedingpayment', [PaymentController::class, 'addfeedingpayment'])->name('addfeedingpayment');
        Route::post('/createfeeding', [PaymentController::class, 'createfeeding'])->name('createfeeding');
        Route::get('/viewfeedinfees', [PaymentController::class, 'viewfeedinfees'])->name('viewfeedinfees');
        Route::get('/addbuspayment', [PaymentController::class, 'addbuspayment'])->name('addbuspayment');
        Route::get('/viewbusfees', [PaymentController::class, 'viewbusfees'])->name('viewbusfees');
        Route::get('/addpartypayment', [PaymentController::class, 'addpartypayment'])->name('addpartypayment');
        Route::get('/viewpartypayment', [PaymentController::class, 'viewpartypayment'])->name('viewpartypayment');
        Route::get('/viewallpayment', [TransactionController::class, 'viewallpayment'])->name('viewallpayment');
        Route::get('/viewsinglepayment/{ref_no}', [TransactionController::class, 'viewsinglepayment'])->name('viewsinglepayment');
        Route::get('/printsinglepaymentspdfs/{ref_no}', [TransactionController::class, 'printsinglepaymentspdfs'])->name('printsinglepaymentspdfs');
        Route::get('/classpayments/{classname}', [ClassnameController::class, 'classpayments'])->name('classpayments');
        

        Route::post('/createpartypayments', [PaymentController::class, 'createpartypayments'])->name('createpartypayments');
        Route::post('/createbuspayments', [PaymentController::class, 'createbuspayments'])->name('createbuspayments');
        Route::post('/createpayments', [PaymentController::class, 'createpayments'])->name('createpayments');
        Route::get('/viewfees', [PaymentController::class, 'viewfees'])->name('viewfees');
        Route::get('/viewfee/{id}', [PaymentController::class, 'viewfee'])->name('viewfee');
        Route::get('/editfee/{id}', [PaymentController::class, 'editfee'])->name('editfee');
        Route::put('/updatepayments/{id}', [PaymentController::class, 'updatepayments'])->name('updatepayments');
        Route::get('/approvedfee/{id}', [PaymentController::class, 'approvedfee'])->name('approvedfee');
        Route::get('/printfee/{id}', [PaymentController::class, 'printfee'])->name('printfee');
        Route::get('/printfeeall', [PaymentController::class, 'printfeeall'])->name('printfeeall');
        Route::get('/deletefee/{id}', [PaymentController::class, 'deletefee'])->name('deletefee');
        // Route::get('/profile', [GuardianController::class, 'profile'])->name('profile');
        Route::get('/logout', [AccountController::class, 'logout'])->name('logout'); 
       
    });
});


Route::get('/teacherform', [UserController::class, 'teacherform'])->name('teacherform');

Route::prefix('web')->name('web.')->group(function() {

    Route::middleware(['guest:web'])->group(function() {
        
        Route::post('/checkfirst', [UserController::class, 'checkfirst'])->name('checkfirst');
    });
    
    Route::middleware(['auth:web'])->group(function() {

        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::get('/yourchildren', [UserController::class, 'yourchildren'])->name('yourchildren');
        Route::get('/viewclassactivityparespecial', [ClassactivityController::class, 'viewclassactivityparespecial'])->name('viewclassactivityparespecial');
        Route::get('/parentviewsingleactivity/{slug}', [ClassactivityController::class, 'parentviewsingleactivity'])->name('parentviewsingleactivity');
        Route::get('/replyclassactivity/{id}', [ClassactivityController::class, 'replyclassactivity'])->name('replyclassactivity');
        Route::post('/replyclassactivitys/{id}', [ClassactivityController::class, 'replyclassactivitys'])->name('replyclassactivitys');
        
        Route::post('generatePDF', [ResultController::class, 'generatePDF'])->name('generatePDF');

        Route::get('/checkresult', [ResultController::class, 'checkresult'])->name('checkresult');
        Route::get('/partypayment', [UserController::class, 'partypayment'])->name('partypayment');
        Route::get('/feedingpaypayment', [UserController::class, 'feedingpaypayment'])->name('feedingpaypayment');
        Route::get('/buspayment', [UserController::class, 'buspayment'])->name('buspayment');
        Route::get('/viewclassactivitypare', [ClassactivityController::class, 'viewclassactivitypare'])->name('viewclassactivitypare');
        // Route::get('/home', [GuardianController::class, 'home'])->name('home');
        Route::get('/paymenthistory', [TransactionController::class, 'paymenthistory'])->name('paymenthistory');
        Route::get('/viewpayment1/{ref_no}', [TransactionController::class, 'viewpayment1'])->name('viewpayment1');
        Route::get('/paymentspdf1/{ref_no}', [TransactionController::class, 'paymentspdf1'])->name('paymentspdf1');
        
        Route::get('/paypartfee/{ref_no1}', [UserController::class, 'paypartfee'])->name('paypartfee');
        Route::get('/paybuservicefee/{ref_no1}', [UserController::class, 'paybuservicefee'])->name('paybuservicefee');
        Route::get('/payfeeding/{ref_no1}', [UserController::class, 'payfeeding'])->name('payfeeding');
        Route::get('/payschoolfees/{ref_no1}', [UserController::class, 'payschoolfees'])->name('payschoolfees');
        Route::get('/payment', [UserController::class, 'payment'])->name('payment');
        Route::get('/parentviewstudent/{ref_no1}', [UserController::class, 'parentviewstudent'])->name('parentviewstudent');
        Route::get('/printstudents/{ref_no1}', [UserController::class, 'printstudents'])->name('printstudents');
        Route::get('/viewclassactivity', [ClassactivityController::class, 'viewclassactivity'])->name('viewclassactivity');
        
        Route::get('/parenteditstudent/{ref_no1}', [UserController::class, 'parenteditstudent'])->name('parenteditstudent');
        Route::put('/updatebyparent/{ref_no1}', [UserController::class, 'updatebyparent'])->name('updatebyparent');
        Route::get('/addyourchild', [UserController::class, 'addyourchild'])->name('addyourchild');
        Route::post('/addyourchildren', [UserController::class, 'addyourchildren'])->name('addyourchildren');
        // Route::get('/profile/{ref_no}', [GuardianController::class, 'profile'])->name('profile');
        
        Route::get('/viewstudent/{ref_no1}', [UserController::class, 'viewstudent'])->name('viewstudent');
        
        // Route::put('/settingsupdate/{id}', [GuardianController::class, 'settingsupdate'])->name('settingsupdate');
        
        // Route::get('/profile', [GuardianController::class, 'profile'])->name('profile');
       
        Route::put('/updatelessonotesteacher/{id}', [LessonnoteController::class, 'updatelessonotesteacher'])->name('updatelessonotesteacher');
        Route::get('/editlessonteacher/{slug}', [LessonnoteController::class, 'editlessonteacher'])->name('editlessonteacher');
        Route::get('/viewlessonnotesteacher/{slug}', [LessonnoteController::class, 'viewlessonnotesteacher'])->name('viewlessonnotesteacher');
        Route::get('/lessonnoteview', [LessonnoteController::class, 'lessonnoteview'])->name('lessonnoteview');
        Route::post('/createlessonotes', [LessonnoteController::class, 'createlessonotes'])->name('createlessonotes');
        Route::get('/addlessonnotes', [LessonnoteController::class, 'addlessonnotes'])->name('addlessonnotes');
        Route::get('/mysubjectsguestion', [TeacherassignController::class, 'mysubjectsguestion'])->name('mysubjectsguestion');
        Route::get('studentsubjectbyhead/{ref_no1}', [UserController::class, 'studentsubjectbyhead'])->name('studentsubjectbyhead');
        Route::get('studentsubjectsbyheads/{ref_no1}', [UserController::class, 'studentsubjectsbyheads'])->name('studentsubjectsbyheads');
        Route::get('studentsubjectsall/{ref_no1}', [UserController::class, 'studentsubjectsall'])->name('studentsubjectsall');
        Route::get('preschoolshead', [UserController::class, 'preschoolshead'])->name('preschoolshead');
        
        
        Route::get('/viewspecific', [ClassactivityController::class, 'viewspecific'])->name('viewspecific');
        Route::get('/sendspec/{id}', [UserController::class, 'sendspec'])->name('sendspec');
        Route::post('/createclassactivityspec', [ClassactivityController::class, 'createclassactivityspec'])->name('createclassactivityspec');
        Route::get('/sendtospecificparent', [ClassactivityController::class, 'sendtospecificparent'])->name('sendtospecificparent');
        Route::put('/updateclassactivity/{id}', [ClassactivityController::class, 'updateclassactivity'])->name('updateclassactivity');
        Route::get('/editactivies/{slug}', [ClassactivityController::class, 'editactivies'])->name('editactivies');
        Route::get('/viewsingleactivies/{slug}', [ClassactivityController::class, 'viewsingleactivies'])->name('viewsingleactivies');
        Route::get('/viewclassactivities', [ClassactivityController::class, 'viewclassactivities'])->name('viewclassactivities');
        Route::post('/createclassactivity', [ClassactivityController::class, 'createclassactivity'])->name('createclassactivity');
        Route::get('/editquestion/{id}', [QuestionController::class, 'editquestion'])->name('editquestion');
        Route::put('/updatequestion/{id}', [QuestionController::class, 'updatequestion'])->name('updatequestion');
        
        Route::get('/mysquestions', [QuestionController::class, 'mysquestions'])->name('mysquestions');
        Route::post('/createquestion', [QuestionController::class, 'createquestion'])->name('createquestion');
        Route::get('/setquestion/{id}', [QuestionController::class, 'setquestion'])->name('setquestion');
        Route::get('/viewquestion/{id}', [QuestionController::class, 'viewquestion'])->name('viewquestion');
        Route::get('/viewquestion/{id}', [QuestionController::class, 'viewquestion'])->name('viewquestion');
        Route::get('/printresult/{id}', [ResultController::class, 'printresult'])->name('printresult');
        Route::get('/mysubjects', [TeacherassignController::class, 'mysubjects'])->name('mysubjects');
        Route::post('/yourresult', [ResultController::class, 'yourresult'])->name('yourresult');
        Route::get('/checkresult', [ResultController::class, 'checkresult'])->name('checkresult');
        Route::get('/checkresultterminal', [ResultController::class, 'checkresultterminal'])->name('checkresultterminal');
        Route::get('/teacherviewresults3rd/{id}', [ResultController::class, 'teacherviewresults3rd'])->name('teacherviewresults3rd');
        Route::get('/thirdtermresults', [ResultController::class, 'thirdtermresults'])->name('thirdtermresults');
        Route::get('/teacherviewresults2nd/{id}', [ResultController::class, 'teacherviewresults2nd'])->name('teacherviewresults2nd');
        Route::get('/secondtermresults', [ResultController::class, 'secondtermresults'])->name('secondtermresults');
        Route::get('/addpsychomotor/{user_id}', [ResultController::class, 'addpsychomotor'])->name('addpsychomotor');
        Route::put('/createpsychomotoro/{id}', [ResultController::class, 'createpsychomotoro'])->name('createpsychomotoro');
        Route::post('/createresults', [ResultController::class, 'createresults'])->name('createresults');
        Route::put('/assignstudentclass/{ref_no1}', [UserController::class, 'assignstudentclass'])->name('assignstudentclass');
        Route::get('addresults/{ref_no1}', [UserController::class, 'addresults'])->name('addresults');
        // Route::get('payment', [SchoolfeeController::class, 'payment'])->name('payment');
        // Route::get('/generate-report', 'ReportController@generateReport');
        //Route::get('generatePdf', [ResultController::class, 'generatePdf'])->name('generatePdf');
        //Route::get('generatePdf', [ResultController::class, 'generatePdf'])->name('generatePdf');
        Route::get('/promotions', [UserController::class, 'promotions'])->name('promotions');
        Route::get('/nurseryschoolheads', [UserController::class, 'nurseryschoolheads'])->name('nurseryschoolheads');
        
        Route::get('/crecheheads', [UserController::class, 'crecheheads'])->name('crecheheads');
        Route::get('/preschoolheads', [UserController::class, 'preschoolheads'])->name('preschoolheads');
        Route::get('/primaryheads', [UserController::class, 'primaryheads'])->name('primaryheads');
        Route::get('/highschools', [UserController::class, 'highschools'])->name('highschools');
        Route::get('/viewaddresults', [UserController::class, 'viewaddresults'])->name('viewaddresults');
        Route::get('/createsection', [UserController::class, 'createsection'])->name('createsection');
        Route::get('/preschoolsection', [UserController::class, 'preschoolsection'])->name('preschoolsection');
        Route::get('/primarysection', [UserController::class, 'primarysection'])->name('primarysection');
        Route::get('/nurserysection', [UserController::class, 'nurserysection'])->name('nurserysection');
        Route::get('/highschoolsection', [UserController::class, 'highschoolsection'])->name('highschoolsection');
        
        Route::get('/classes/{classname}', [ClassnameController::class, 'classes'])->name('classes');
        Route::get('/queryrepliedview', [QueryController::class, 'queryrepliedview'])->name('queryrepliedview');
        Route::get('/printquery1/{id}', [QueryController::class, 'printquery1'])->name('printquery1');
        Route::put('/replyquery/{id}', [QueryController::class, 'replyquery'])->name('replyquery');
        Route::get('/viewqueryreply/{id}', [QueryController::class, 'viewqueryreply'])->name('viewqueryreply');
        Route::get('/viewquery/{id}', [QueryController::class, 'viewquery'])->name('viewquery');
        Route::get('/checkyourquery', [QueryController::class, 'checkyourquery'])->name('checkyourquery');
        Route::get('/teacherviewresults/{user_id}', [ResultController::class, 'teacherviewresults'])->name('teacherviewresults');
        Route::get('/firstermresults', [ResultController::class, 'firstermresults'])->name('firstermresults');
        Route::get('/thirdterm', [UserController::class, 'thirdterm'])->name('thirdterm');
        Route::get('/firsterm', [UserController::class, 'firsterm'])->name('firsterm');
        Route::get('/secondterm', [UserController::class, 'secondterm'])->name('secondterm');
        Route::get('/profile/{ref_no1}', [UserController::class, 'profile'])->name('profile');
        Route::get('/admisionletter', [UserController::class, 'admisionletter'])->name('classesdelete');
        Route::get('assignedstudent/{ref_no1}', [UserController::class, 'assignedstudent'])->name('assignedstudent');
        Route::get('addaclassctivities', [ClassactivityController::class, 'addaclassctivities'])->name('addaclassctivities');
        
        Route::get('/logout', [UserController::class, 'logout'])->name('logout'); 
        
       
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');



//Route::post('/checkfirst', [UserController::class, 'checkfirst'])->name('checkfirst');

Route::get('/registerteacher', [UserController::class, 'registerteacher'])->name('registerteacher');

Route::post('/createteacher', [UserController::class, 'createteacher'])->name('createteacher');
// Auth::routes();
// Laravel 8 & 9
//Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Laravel 8 & 9
// The route that the button calls to initialize payment
Route::post('/pay', [FlutterwaveController::class, 'initialize'])->name('pay');
// The callback url after a payment
Route::get('/rave/callback', [FlutterwaveController::class, 'callback'])->name('callback');




//require __DIR__.'/auth.php';