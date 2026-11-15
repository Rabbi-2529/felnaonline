<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CorporatePackageController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePackageController;
use App\Http\Controllers\OrderHomePackageController;
use App\Http\Controllers\OrderCorporatePackageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SeoController;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('why-choice-us-des/{id}', [HomeController::class, 'readFullDescription'])->name('why-choice-us-des');

Route::get('/about-us', [PagesController::class,'about'])->name('about-us');
Route::get('/contact', [PagesController::class,'contact'])->name('contact');
Route::get('/services-our', [PagesController::class,'services'])->name('services-our');


Route::get('/services/category/{categoryId}', [PagesController::class, 'showCategoryServices'])->name('category.services');Route::get('/products', [PagesController::class,'products'])->name('products');
Route::get('/home-package', [PagesController::class,'homePackage'])->name('home-package');
Route::get('/corporate-package', [PagesController::class,'corporatePackage'])->name('corporate-package');
Route::post('/home-package/orderHomePackage', [OrderHomePackageController::class,'store'])->name('home-package.orderHomePackage');
Route::post('/corporate-package/orderCorporatePackage', [OrderCorporatePackageController::class,'store'])->name('corporate-package.orderCorporatePackage');
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('home_package', HomePackageController::class);
    Route::resource('corporate_package', CorporatePackageController::class);
    Route::resource('product', ProductController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('feature', FeatureController::class);
    Route::resource('team', TeamController::class);
    Route::resource('about', AboutController::class);
    
    
        // Service Categories Routes
    Route::get('/service-categories', [ServiceController::class, 'serviceCategories'])->name('service_categories.index');
    Route::get('/service-categories/create', [ServiceController::class, 'createServiceCategory'])->name('service_categories.create');
    Route::post('/service-categories/store', [ServiceController::class, 'storeServiceCategory'])->name('service_categories.store');
    Route::get('/service-categories/edit/{id}', [ServiceController::class, 'editServiceCategory'])->name('service_categories.edit');
    Route::post('/service-categories/update/{id}', [ServiceController::class, 'updateServiceCategory'])->name('service_categories.update');
    Route::delete('/service-categories/delete/{id}', [ServiceController::class, 'destroyServiceCategory'])->name('service_categories.destroy');

    // Services Routes
    Route::get('/services', [ServiceController::class, 'services'])->name('services.index');
    Route::get('/services/create', [ServiceController::class, 'createService'])->name('services.create');
    Route::post('/services/store', [ServiceController::class, 'storeService'])->name('services.store');
    Route::get('/services/edit/{id}', [ServiceController::class, 'editService'])->name('services.edit');
    Route::PUT('/services/update/{id}', [ServiceController::class, 'updateService'])->name('services.update');
    Route::delete('/services/delete/{id}', [ServiceController::class, 'destroyService'])->name('services.destroy');
    
    Route::get('why-choose-us/', [HomepageController::class, 'index'])->name('homepage.index');
    Route::get('create-why-choose-us', [HomepageController::class, 'createWhyChooseUs'])->name('homepage.create-why-choose-us');
    Route::post('store-why-choose-us', [HomepageController::class, 'storeWhyChooseUs'])->name('homepage.store-why-choose-us');
    Route::get('edit-why-choose-us/{id}', [HomepageController::class, 'editWhyChooseUs'])->name('homepage.edit-why-choose-us');
    Route::put('update-why-choose-us/{id}', [HomepageController::class, 'updateWhyChooseUs'])->name('homepage.update-why-choose-us');
    Route::delete('delete-why-choose-us/{id}', [HomepageController::class, 'deleteWhyChooseUs'])->name('homepage.delete-why-choose-us');

    Route::get('create-key-point', [HomepageController::class, 'createKeyPoint'])->name('homepage.create-key-point');
    Route::post('store-key-point', [HomepageController::class, 'storeKeyPoint'])->name('homepage.store-key-point');
    Route::get('edit-key-point/{id}', [HomepageController::class, 'editKeyPoint'])->name('homepage.edit-key-point');
    Route::put('update-key-point/{id}', [HomepageController::class, 'updateKeyPoint'])->name('homepage.update-key-point');
    Route::delete('delete-key-point/{id}', [HomepageController::class, 'deleteKeyPoint'])->name('homepage.delete-key-point');
        Route::resource('clients', ClientController::class);
        
            Route::get('seo', [SeoController::class, 'index'])->name('seo'); // List all SEO data
    Route::get('seo/create', [SeoController::class, 'create'])->name('seo.create'); // Show create SEO form
Route::post('seo/store', [SeoController::class, 'store'])->name('seo.store');   // Store SEO data

    Route::get('seo/edit/{page}', [SeoController::class, 'edit'])->name('seo.edit'); // Edit SEO data for a specific page
    Route::put('seo/update/{page}', [SeoController::class, 'update'])->name('seo.update'); // Update SEO data for a specific page
    Route::delete('seo/delete/{page}', [SeoController::class, 'destroy'])->name('seo.delete'); // Delete SEO data for a specific page
});


require __DIR__.'/auth.php';
