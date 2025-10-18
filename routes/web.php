<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\PageController as FrontPageController;
use App\Http\Controllers\Admin\BankController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController as FrontPackageController;
use App\Http\Controllers\PackageQueryController;
use App\Http\Controllers\Admin\PackageQueryController as AdminPackageQueryController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\CareerController as FrontCareerController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\ContactController as FrontContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\Admin\VisaAdminController;
use App\Http\Controllers\Admin\ClientAdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Config cleared';
});


// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Packages Routes
Route::get('/packages/search', [FrontPackageController::class, 'search'])->name('packages.search');
Route::get('/packages/{slug}', [FrontPackageController::class, 'category'])->name('packages.category');
Route::get('/package/{slug}', [FrontPackageController::class, 'showBySlug'])->name('package.details');



Route::post('/package-inquiry/store', [PackageQueryController::class, 'storeInquiry'])->name('package.inquiry.store');

Route::get('/career', [FrontCareerController::class, 'create'])->name('career.index');
Route::post('/career/submit', [FrontCareerController::class, 'store'])->name('career.store');

Route::get('/contact', [FrontContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [FrontContactController::class, 'store'])->name('contact.store');

Route::get('/page/{slug}', [FrontPageController::class, 'show'])->name('page');

Route::get('/visas', [VisaController::class, 'index'])->name('visas.index');
Route::get('/visa/{visa}', [VisaController::class, 'show'])->name('visas.show');

// Admin login
Route::get('admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

// Admin protected routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/newsletter', [NewsletterController::class, 'index'])->name('admin.newsletter.index');

    Route::resource('banks', BankController::class)->names('admin.banks');
    Route::resource('pages', AdminPageController::class)->names('admin.pages');
    Route::resource('categories', CategoryController::class)->names('admin.categories');
    Route::post('/admin/categories/sort', [CategoryController::class, 'sort'])->name('admin.categories.sort');

    Route::resource('packages', AdminPackageController::class)->names('admin.packages');
    
    Route::get('package-queries', [AdminPackageQueryController::class, 'index'])->name('admin.package_queries.index');
    Route::get('package-queries/{id}', [AdminPackageQueryController::class, 'show'])->name('admin.package_queries.show');
    Route::post('package-queries/update-status/{id}', [AdminPackageQueryController::class, 'updateStatus'])->name('admin.package_queries.update_status');
    
    Route::resource('visas', VisaAdminController::class)->names('admin.visas');
    Route::resource('clients', ClientAdminController::class)->names('admin.clients');
    Route::resource('banners', BannerController::class)->names('admin.banners');

    Route::get('/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{id}', [AdminContactController::class, 'show'])->name('admin.contacts.show');

    Route::get('/careers', [AdminCareerController::class, 'index'])->name('admin.careers.index');
    Route::get('/careers/{id}', [AdminCareerController::class, 'show'])->name('admin.careers.show');
    
    // Admin Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('admin.settings.update');

});


