<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticated;
use App\Http\Middleware\Guest;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Auth::routes();

Route::get('/test', function (Request $request) {
	return Storage::drive('s3')->put('test.txt', 'Hello World') ? 'Success' : 'Failure';
});

// Index Page
Route::view('/', 'index')->name('homepage');
Route::view('/whats-new', 'whats-new')->name('whats-new');


// Auth
Route::prefix('auth')->middleware([Guest::class])->group(function () {
	Route::view('/login', 'auth.login')->name('login');
	Route::view('/register', 'auth.register')->name('register');

});

Route::prefix('auth')->middleware([Authenticated::class])->group(function () {
	Route::get('/auth/logout', [UserController::class, 'logout'])->name('logout');
	Route::post('/verification/send', [UserController::class, 'sendVerificationEmail'])
		->name('verification.send');
});

Route::prefix('/admin')->group(function () {
	Route::get('/', [AdminController::class, 'index'])->name('admin-home');
});

Route::prefix('/forms')->middleware([Authenticated::class])->group(function () {
	Route::get('/', [FormController::class, 'index'])
		->name('forms.index');
	Route::view('/new', 'forms.new')->name('forms.new');

	Route::prefix('/{slug}')->group(function () {
		// Pages
		Route::get('/', [FormController::class, 'inbox'])
			->name('forms.id.index');

		Route::get('/archive', [FormController::class, 'archive'])
			->name('forms.id.archive');

		Route::get('/spam', [FormController::class, 'spam'])
			->name('forms.id.spam');

		Route::get('/configuration', [FormController::class, 'configuration'])
			->name('forms.id.configuration');

		Route::get('/analytics', [FormController::class, 'analytics'])
			->name('forms.id.analytics');

		Route::get('/logs', [FormController::class, 'logs'])
			->name('forms.id.logs');

		// Actions
		Route::delete('/delete', [FormController::class, 'delete'])
			->name('forms.id.delete');

		Route::post('/s3', [FormController::class, 'updateS3Config'])
			->name('forms.id.s3');

        // form custom branded thank you preview
		Route::get('/preview/thank-you', [FormController::class, 'previewCustomBrandedThankYou'])
			->name('forms.id.preview-thank-you');
	});
});

// Account
Route::prefix('account')->middleware([Authenticated::class])->group(function () {
	Route::get('/', [AccountController::class, 'index'])
		->name('account.index');
	Route::get('/billing', [AccountController::class, 'billing'])
		->name('account.billing');
	Route::post('/checkout', [AccountController::class, 'checkout'])
		->name('account.checkout');
    Route::post('/swap', [AccountController::class, 'swapSubscription'])
        ->name('account.swap');
    Route::post('/subscription/cancel', [AccountController::class, 'cancelSubscription'])
        ->name('account.subscription.cancel');
    Route::post('/subscription/pause', [AccountController::class, 'pauseSubscription'])
        ->name('account.subscription.pause');
    Route::post('/subscription/unpause', [AccountController::class, 'unpauseSubscription'])
        ->name('account.subscription.unpause');

	Route::delete('/delete', [UserController::class, 'delete'])
		->name('account.delete');

	Route::post('/update-email', [UserController::class, 'updateEmail'])
		->name('account.update-email');

	Route::post('/update-password', [UserController::class, 'updatePassword'])
		->name('account.update-password');
});

// Docs
Route::prefix('docs')->group(function () {
	Route::view('/', 'docs.index')->name('docs.index');
	Route::view('/faqs', 'docs.faqs')->name('docs.faqs');
	Route::view('/integrate', 'docs.integrate')->name('docs.integrate');
	Route::view('/new-form', 'docs.new-form')->name('docs.new-form');
	Route::view('/recaptcha', 'docs.recaptcha')->name('docs.recaptcha');
	Route::view('/upload', 'docs.upload')->name('docs.upload');
});

// Form post
Route::post('/f/{slug}', [SubmissionController::class, 'submit'])
	->withoutMiddleware([VerifyCsrfToken::class])
	->name('form.submit');

// Email verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
	$request->fulfill();
	return redirect()->route('forms.index');
})->middleware(['auth', 'signed'])->name('verification.verify');

// thank you page after submission
Route::get('/{slug}/thank-you', [FormController::class, 'thankYou'])
    ->name('form.thank-you');
Route::get('/{slug}/error', [FormController::class, 'error'])
    ->name('form.error');


Route::get('/d/subscribe', function (Request $request) {
    $payLink = auth()->user()->newSubscription('default', $premium = 34567)
        ->returnTo(route('homepage'))
        ->create();

    dd($payLink);
//    return view('billing', ['payLink' => $payLink]);
});


Route::post('paddle/webhook', [\App\Http\Controllers\WebhookController::class, 'webhook'])
    ->withoutMiddleware([\Laravel\Paddle\Http\Middleware\VerifyWebhookSignature::class]);
