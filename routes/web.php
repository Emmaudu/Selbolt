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
Route::get('/forgotpassword', [App\Http\Controllers\v1\ForgotPasswordController::class, 'index']);
Route::post('/forgotpassword', [App\Http\Controllers\v1\ForgotPasswordController::class, 'forgotPassword'])->name('forgotpasword');

Route::get('/resetpassword/{token}', [App\Http\Controllers\v1\ResetPasswordController::class, 'viewResetPasword']);
Route::post('/resetpassword', [App\Http\Controllers\v1\ResetPasswordController::class, 'resetPassword'])->name('resetpassword');

Route::get('/hometest', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/success', [App\Http\Controllers\UserController::class, 'successPage']);

Route::get('/overview/{username}', [App\Http\Controllers\v1\User\MentorController::class, 'overview']);
Route::get('/overview/{username}/pay', [App\Http\Controllers\UserController::class, 'payMentor'])->name('pay-mentor');
Route::post('/overview/pay/approve', [App\Http\Controllers\UserController::class, 'saveAnswers']);

Route::get('/message/{id}', [App\Http\Controllers\ConnectionController::class, 'messageView']);

Route::get('/test', function () {
    return view('test');
});
Route::get('/dp', function(){
    return view('mess');
});

Route::post('/profile-pic', [App\Http\Controllers\UserController::class, 'profilePic'])->name('pic');
Route::post('/profile-pic-mentor', [App\Http\Controllers\v1\User\MentorController::class, 'profilePic'])->name('mentor-pic');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/mentors/delay-mentorship', [App\Http\Controllers\v1\User\MentorController::class, 'delayMentorship'])->name('delay.mentorship');

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register-mentee');
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login-mentee');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('mentee.logout');

Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('/verify-mail', [App\Http\Controllers\Auth\RegisterController::class, 'verifyMailView']);
Route::post('/verify-mail', [App\Http\Controllers\Auth\RegisterController::class, 'verifyMail'])->name('verify-mail');
Route::get('/mentor/dashboard', [App\Http\Controllers\v1\User\MentorController::class, 'dashboard'])->name('mentor.dashboard');

Route::get('/mentor/register', [App\Http\Controllers\Auth\Mentor\RegisterController::class, 'index'])->name('register-mentor');
Route::post('/register/mentor', [App\Http\Controllers\Auth\Mentor\RegisterController::class, 'register'])->name('register.mentor');
Route::get('/mentor/login', [App\Http\Controllers\Auth\Mentor\LoginController::class, 'index'])->name('login-mentor');
Route::post('/mentor/login', [App\Http\Controllers\Auth\Mentor\LoginController::class, 'authenticate'])->name('login.mentor');
Route::get('/mentor/logout', [App\Http\Controllers\Auth\Mentor\LoginController::class, 'logout'])->name('mentor.logout');

Route::get('/mentors', [App\Http\Controllers\v1\User\MentorController::class, 'index'])->name('mentors');
Route::get('/mentors/filter', [App\Http\Controllers\v1\User\MentorController::class, 'filterMentor'])->name('search.mentor');
Route::get('/mentors/{id}/service', [App\Http\Controllers\UserController::class, 'serviceView'])->name('service.mentor');
Route::get('/mentors/profile', [App\Http\Controllers\v1\User\MentorController::class, 'profile'])->name('mentor.profile-page');
Route::post('/mentors/personal-profile', [App\Http\Controllers\v1\User\MentorController::class, 'updateUserPersonalDetails'])->name('update.mentor.profile');
Route::post('/mentors/company-profile', [App\Http\Controllers\v1\User\MentorController::class, 'updateUserCompanyDetails'])->name('update.mentor.company-profile');
Route::post('/mentors/company-service', [App\Http\Controllers\v1\User\MentorController::class, 'updateUserCompanyservice'])->name('update.mentor.company-service');


Route::get('/mentors/mentee', [App\Http\Controllers\v1\User\MentorController::class, 'retriveMentees'])->name('mentor.mentees');
Route::post('/mentors/approve/{id}', [App\Http\Controllers\v1\User\MentorController::class, 'approveMentee'])->name('mentor.approve-mentee');

Route::get('/mentors/task/{id}', [App\Http\Controllers\v1\User\MentorController::class, 'task'])->name('mentor.task');
Route::post('/mentors/task/{id}', [App\Http\Controllers\v1\User\MentorController::class, 'createTask'])->name('mentor.add-task');
Route::post('/mentors/task/update/{id}', [App\Http\Controllers\v1\User\MentorController::class, 'updateTask'])->name('mentor.update-task');
Route::post('/mentors/task/delete/{id}', [App\Http\Controllers\v1\User\MentorController::class, 'deleteTask'])->name('mentor.delete-task');
Route::get('/mentors/mentee/submission/{taskId}/{userId}', [App\Http\Controllers\v1\User\MentorController::class, 'submission'])->name('mentor.delete-task');

Route::get('/mentors/question', [App\Http\Controllers\v1\User\MentorController::class, 'viewQuestions'])->name('mentor.questions');
Route::get('/mentors/new-mentees', [App\Http\Controllers\v1\User\MentorController::class, 'newMentees'])->name('mentor.new-mentees');
Route::post('/mentors/approve/{id}', [App\Http\Controllers\v1\User\MentorController::class, 'approveMentee']);


Route::post('/mentors/question/', [App\Http\Controllers\v1\User\MentorController::class, 'addQuestions'])->name('mentor.add-questions');
Route::post('/mentors/question/update/{id}', [App\Http\Controllers\v1\User\MentorController::class, 'updateQuestions'])->name('mentor.update-questions');
Route::post('/mentors/question/delete/{id}', [App\Http\Controllers\v1\User\MentorController::class, 'deleteQuestions'])->name('mentor.delete-questions');

Route::get('/mentors/create-payment-mode', [App\Http\Controllers\v1\TransactionController::class, 'subaccountView'])->name('mentor.payment-mode');
Route::post('/mentors/create-payment-mode', [App\Http\Controllers\v1\TransactionController::class, 'createSubaccount'])->name('mentor.create-payment-mode');


Route::get('/mentee/dashboard', [App\Http\Controllers\UserController::class, 'index'])->name('mentee.dashboard');
Route::get('/mentee/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('mentee.profile');
Route::post('/mentee/profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('mentee.update-profile');

Route::get('/mentee/tasks', [App\Http\Controllers\UserController::class, 'tasks'])->name('mentee.tasks');
Route::post('/mentee/tasks/submit', [App\Http\Controllers\UserController::class, 'submitTask'])->name('mentee.submit-task');

Route::post('/send-message', [App\Http\Controllers\ConnectionController::class, 'sendMessage']);
Route::get('/mentee/my-mentorship', [App\Http\Controllers\UserController::class, 'mentorship'])->name('mentee.mentorship');
Route::post('/mentee/review', [App\Http\Controllers\UserController::class, 'review']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', function(){
    return view('mess');
});

//admin

Route::get('/admin/login', [App\Http\Controllers\v1\Admin\LoginController::class, 'index'])->name('login-admin');

Route::get('/admin/logout', [App\Http\Controllers\v1\Admin\LoginController::class, 'logout'])->name('logout-admin');

Route::post('/admin/login', [App\Http\Controllers\v1\Admin\LoginController::class, 'authenticate'])->name('admin.login');

Route::get('/admin', [App\Http\Controllers\v1\Admin\AdminUserController::class, 'dashboard']);
Route::get('/admin/dashboard', [App\Http\Controllers\v1\Admin\AdminUserController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/mentees', [App\Http\Controllers\v1\Admin\AdminUserController::class, 'users'])->name('admin.users');
Route::get('/admin/mentors', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'mentors'])->name('admin.mentors');
Route::get('/admin/mentors/details/{id}', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'mentordetails']);
Route::get('/admin/mentees/details/{id}', [App\Http\Controllers\v1\Admin\AdminUserController::class, 'userDetails']);

Route::get('/admin/mentors/deactivated', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'getDeactivatedMentors'])->name('admin.deactivated.mentors');
Route::get('/admin/mentees/deactivated', [App\Http\Controllers\v1\Admin\AdminUserController::class, 'getDeactivatedUsers'])->name('admin.deactivated.users');


Route::get('/admin/mentors/deactivate/{id}', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'deactivateMentor']);
Route::get('/admin/mentees/deactivate/{id}', [App\Http\Controllers\v1\Admin\AdminUserController::class, 'deactivateUser']);

Route::get('/admin/mentors/restore/{id}', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'activateMentor']);
Route::get('/admin/mentees/restore/{id}', [App\Http\Controllers\v1\Admin\AdminUserController::class, 'activateUser']);

Route::get('/admin/mentors/delete/{id}', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'permanentDelete']);
Route::get('/admin/mentees/delete/{id}', [App\Http\Controllers\v1\Admin\AdminUserController::class, 'permanentDelete']);

//admission
Route::get('/admin/mentors/registration/lists', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'registrationList'])->name('admin.mentors-reg');
Route::get('/admin/mentors/registration/{id}', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'viewMentorRegistrationList'])->name('admin.verify-reg');

Route::get('/admin/approve/mentors/{id}', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'approve']);
Route::get('/admin/reject/mentors/{id}', [App\Http\Controllers\v1\Admin\AdminMentorController::class, 'reject']);


// chat endpoint
Route::post('/send-message', [App\Http\Controllers\ConnectionController::class, 'sendMessage']);
Route::get('/messages', [App\Http\Controllers\ConnectionController::class, 'messages']);
Route::get('user', [App\Http\Controllers\ConnectionController::class, 'user']);
//Route::get('/receivers', [App\Http\Controllers\ConnectionController::class, 'receivers']);
Route::get('/receiver', [App\Http\Controllers\ConnectionController::class, 'receiver']);
Route::post('publish/messages', [App\Http\Controllers\ConnectionController::class, 'sendMessage']);

Route::post('/pending-transaction/flutterwave', [App\Http\Controllers\HomeController::class, 'saveTransaction']);