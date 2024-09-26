<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\ScientificNameController;

use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PatientFollowUpScheduleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Content;
use App\Models\Slide;


/* Front Routes */
Route::get('/', function () {

     // Fetching data from the models
    $users = User::all();
    $products = Product::limit(4)->get();
    $categories = Category::limit(4)->get();
    $brands = Brand::all();
    $slides = Slide::all();
     // Passing data to the view using compact
     return view('front/home', compact('users',  'products', 'categories', 'brands', 'slides'));

});
// In your web.php
Route::get('/search-products', [ProductController::class, 'searchProducts'])->name('search.products');

Route::get('/categories', [CategoryController::class, 'showAllCategories'])->name('categories.index');


Route::get('/category/products/{id}', [CategoryController::class, 'showProducts'])->name('category.products');
Route::get('/subcategory/products/{id}', [SubCategoryController::class, 'showProducts'])->name('subcategory.products');

Route::get('/brand/products/{id}', [BrandController::class, 'showProducts'])->name('brand.products');
Route::get('/ScientificName/products/{id}', [ScientificNameController::class, 'showProducts'])->name('scientificName.products');



Route::get('/cart', function () {
    return view('front.cart');
})->name('cart');

Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');


Route::get('/product', function () {
    $products = Product::paginate(25);
    $categories = Category::all();
    $brands = Brand::all();
    return view('front.product',compact('products', 'categories', 'brands'));

    })->name('product');


Route::get('/prescription', function () {

    return view('front.prescription');

})->name('prescription');

Route::get('/about', function () {
    $contents = Content::first();
    return view('front.about',compact('contents'));

})->name('about');


Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::get('/product/{id}', [UserProductController::class, 'show'])->name('product.show');


Route::get('/prescription', [PrescriptionController::class, 'create'])->name('prescription.create');
Route::post('/prescription/add', [PrescriptionController::class, 'store'])->name('prescription.store');
/* End Front Routes */








Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/item-count', [CartController::class, 'getItemCount'])->name('cart.item.count');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//user routes
Route::middleware(['auth', 'UserMiddleware'])->group(function() {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

//admin routes
Route::middleware(['auth', 'AdminMiddleware'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //users routes
    Route::get('/admin/users', function(){
        $users = \App\Models\User::all(); // Assuming you're fetching all users from the User model
        return view('admin.users.index', compact('users'));
    })->name('admin.users.index');

    // Patient Follow-Up Schedules routes
    Route::get('/admin/patient_follow_up_schedules', [PatientFollowUpScheduleController::class, 'index'])->name('admin.patient_follow_up_schedules.index');
    Route::post('/admin/patient_follow_up_schedules/store', [PatientFollowUpScheduleController::class, 'store'])->name('admin.patient_follow_up_schedules.store');
    Route::get('/admin/patient_follow_up_schedules/create', [PatientFollowUpScheduleController::class, 'create'])->name('admin.patient_follow_up_schedules.create');
    Route::get('/admin/patient_follow_up_schedules/{id}', [PatientFollowUpScheduleController::class, 'show'])->name('admin.patient_follow_up_schedules.show');
    Route::get('/admin/patient_follow_up_schedules/{id}/edit', [PatientFollowUpScheduleController::class, 'edit'])->name('admin.patient_follow_up_schedules.edit');
    Route::put('/admin/patient_follow_up_schedules/{id}', [PatientFollowUpScheduleController::class, 'update'])->name('admin.patient_follow_up_schedules.update');
    Route::delete('/admin/patient_follow_up_schedules/{id}', [PatientFollowUpScheduleController::class, 'destroy'])->name('admin.patient_follow_up_schedules.destroy');

    //profile routes
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');


    //products routes
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::get('/admin/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');





    //categories routes
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/admin/categories/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

    // Scientific name
   Route::prefix('admin')->name('admin.')->group(function () {
    // Scientific Names routes
    Route::get('/scientific_names', [ScientificNameController::class, 'index'])->name('scientific_names.index');
    Route::get('/scientific_names/create', [ScientificNameController::class, 'create'])->name('scientific_names.create');
    Route::post('/scientific_names', [ScientificNameController::class, 'store'])->name('scientific_names.store');
    Route::get('/scientific_names/{id}', [ScientificNameController::class, 'show'])->name('scientific_names.show');
    Route::get('/scientific_names/{id}/edit', [ScientificNameController::class, 'edit'])->name('scientific_names.edit');
    Route::put('/scientific_names/{id}', [ScientificNameController::class, 'update'])->name('scientific_names.update');
    Route::delete('/scientific_names/{id}', [ScientificNameController::class, 'destroy'])->name('scientific_names.destroy');
});

    //sub categories
     Route::get('/admin/SubCategory', [SubCategoryController::class, 'index'])->name('admin.subcategories.index');
    Route::get('/admin/SubCategory/create', [SubCategoryController::class, 'create'])->name('admin.subcategories.create');
    Route::post('/admin/SubCategory', [SubCategoryController::class, 'store'])->name('admin.subcategories.store');
    Route::get('/admin/SubCategory/{Sub_Category}', [SubCategoryController::class, 'show'])->name('admin.subcategories.show');
    Route::get('/admin/SubCategory/{Sub_Category}/edit', [SubCategoryController::class, 'edit'])->name('admin.subcategories.edit');
    Route::put('/admin/SubCategory/{Sub_Category}', [SubCategoryController::class, 'update'])->name('admin.subcategories.update');
    Route::delete('/admin/SubCategory/{Sub_Category}', [SubCategoryController::class, 'destroy'])->name('admin.subcategories.destroy');

    //brands routes
    Route::get('/admin/brands', [BrandController::class, 'index'])->name('admin.brands.index');
    Route::get('/admin/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');
    Route::post('/admin/brands', [BrandController::class, 'store'])->name('admin.brands.store');
    Route::get('/admin/brands/{id}', [BrandController::class, 'show'])->name('admin.brands.show');
    Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit'])->name('admin.brands.edit');
    Route::put('/admin/brands/{id}', [BrandController::class, 'update'])->name('admin.brands.update');
    Route::delete('/admin/brands/{id}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');

    //Content routes
    Route::get('/admin/contents', [ContentController::class, 'index'])->name('contents.index');
    Route::get('/admin/contents/create', [ContentController::class, 'create'])->name('contents.create');
    Route::post('/admin/contents/store', [ContentController::class, 'store'])->name('contents.store');
    Route::get('/admin/contents/{id}/edit', [ContentController::class, 'edit'])->name('contents.edit');
    Route::put('/admin/contents/{id}', [ContentController::class, 'update'])->name('contents.update');
    Route::delete('/admin/contents/{id}', [ContentController::class, 'destroy'])->name('contents.destroy');

    //prescription routes
    Route::get('/admin/prescription', [PrescriptionController::class, 'index'])->name('admin.prescription.index');

    //Slide route
    Route::get('/admin/slides', [SlideController::class, 'index'])->name('admin.slides.index');
Route::get('/admin/slides/create', [SlideController::class, 'create'])->name('admin.slides.create');
Route::post('/admin/slides', [SlideController::class, 'store'])->name('admin.slides.store');
Route::get('/admin/slides/{slide}', [SlideController::class, 'show'])->name('admin.slides.show');
Route::get('/admin/slides/{slide}/edit', [SlideController::class, 'edit'])->name('admin.slides.edit');
Route::put('/admin/slides/{slide}', [SlideController::class, 'update'])->name('admin.slides.update');
Route::delete('/admin/slides/{slide}', [SlideController::class, 'destroy'])->name('admin.slides.destroy');

});
