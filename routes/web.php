<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blade\UserController;
use App\Http\Controllers\Blade\RoleController;
use App\Http\Controllers\Blade\PermissionController;
use App\Http\Controllers\Blade\HomeController;
use App\Http\Controllers\Blade\ApiUserController;
use App\Http\Controllers\BuyerContactController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CriticalController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PurchageOrderController;
use App\Http\Controllers\VendorContactController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\FabricQualityController;
use App\Http\Controllers\FabricContentController;
use Faker\Guesser\Name;

/*
|--------------------------------------------------------------------------
| Blade (front-end) Routes
|--------------------------------------------------------------------------
|
| Here is we write all routes which are related to web pages
| like UserManagement interfaces, Diagrams and others
|
*/

// Default laravel auth routes
Auth::routes();


// Welcome page
Route::get('/', function () {
    return redirect()->route('home');
})->name('welcome');

// Web pages
Route::group(['middleware' => 'auth'], function () {

    // there should be graphics, diagrams about total conditions
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('userIndex');
    Route::get('/user/add', [UserController::class, 'add'])->name('userAdd');
    Route::get('/user/{id}/profile_detail', [UserController::class, 'profile_detail'])->name('profileDetail');
    Route::post('/user/create', [UserController::class, 'create'])->name('userCreate');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('userEdit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('userUpdate');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('userDestroy');
    Route::get('/user/theme-set/{id}', [UserController::class, 'setTheme'])->name('userSetTheme');

    // Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissionIndex');
    Route::get('/permission/add', [PermissionController::class, 'add'])->name('permissionAdd');
    Route::post('/permission/create', [PermissionController::class, 'create'])->name('permissionCreate');
    Route::get('/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permissionEdit');
    Route::post('/permission/update/{id}', [PermissionController::class, 'update'])->name('permissionUpdate');
    Route::delete('/permission/delete/{id}', [PermissionController::class, 'destroy'])->name('permissionDestroy');

    // Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('roleIndex');
    Route::get('/role/add', [RoleController::class, 'add'])->name('roleAdd');
    Route::post('/role/create', [RoleController::class, 'create'])->name('roleCreate');
    Route::get('/role/{role_id}/edit', [RoleController::class, 'edit'])->name('roleEdit');
    Route::post('/role/update/{role_id}', [RoleController::class, 'update'])->name('roleUpdate');
    Route::delete('/role/delete/{id}', [RoleController::class, 'destroy'])->name('roleDestroy');

    // ApiUsers
    Route::get('/api-users', [ApiUserController::class, 'index'])->name('api-userIndex');
    Route::get('/api-user/add', [ApiUserController::class, 'add'])->name('api-userAdd');
    Route::post('/api-user/create', [ApiUserController::class, 'create'])->name('api-userCreate');
    Route::get('/api-user/show/{id}', [ApiUserController::class, 'show'])->name('api-userShow');
    Route::get('/api-user/{id}/edit', [ApiUserController::class, 'edit'])->name('api-userEdit');
    Route::post('/api-user/update/{id}', [ApiUserController::class, 'update'])->name('api-userUpdate');
    Route::delete('/api-user/delete/{id}', [ApiUserController::class, 'destroy'])->name('api-userDestroy');
    Route::delete('/api-user-token/delete/{id}', [ApiUserController::class, 'destroyToken'])->name('api-tokenDestroy');
    // purchage order
    Route::get('/po-management', function () {
        return view('pages.poManagement');
    })->name('po-management');
    Route::get('/po-management-list', [PurchageOrderController::class, 'index'])->name('po-list');
    Route::get('/po-management-create', [PurchageOrderController::class, 'create'])->name('po-create');
    Route::post('/po-management-store', [PurchageOrderController::class, 'store'])->name('po-store');

    Route::get('/po-management-edit/{id}', [PurchageOrderController::class, 'edit'])->name('po-edit');
    Route::post('/po-management-update/{id}', [PurchageOrderController::class, 'update'])->name('po-update');

    Route::delete('/po-management/{id}', [PurchageOrderController::class, 'destroy'])->name('po-delete');

    Route::get('/po-view', [PurchageOrderController::class, 'pdfView'])->name('pdf-view');
    Route::get('/po-view-single/{id}', [PurchageOrderController::class, 'pdfViewSingle'])->name('pdf-view-single');
    Route::post('/upload-pdf', [PdfController::class, 'uploadPdf'])->name('upload-pdf');


    // buyer
    Route::get('buyer-create', function () {
        return view('pages.buyer.create');
    })->name('buyer-create');
    Route::get('buyer-list', [BuyerController::class, 'index'])->name('buyer-list');
    Route::get('buyer-manage', [BuyerController::class, 'manageIndex'])->name('buyer-manage');
    Route::post('/buyer-create', [BuyerController::class, 'store'])->name('save-buyer');
    Route::delete('/buyer-delete/{id}', [BuyerController::class, 'destroy'])->name('delete-buyer');
    Route::put('buyer-manage/{id}', [BuyerController::class, 'update'])->name('update-buyer');

    // departments
    Route::get('department-manage', [DepartmentController::class, 'manageIndex'])->name('department-manage');
    Route::get('department-index/{id}', [DepartmentController::class, 'index'])->name('department-index');
    Route::get('department-interface/{id}', [DepartmentController::class, 'interface'])->name('department-interface');
    Route::post('/department-create', [DepartmentController::class, 'store'])->name('save-department');
    Route::delete('/department-delete/{id}', [DepartmentController::class, 'destroy'])->name('delete-department');
    Route::put('department-manage/{id}', [DepartmentController::class, 'update'])->name('update-department');
    // fabric quality
    // Route::post('/fabric-quality-create', [FabricQualityController::class, 'store'])->name('save-fabric-quality');
    // Route::delete('/fabric-quality-delete/{id}', [FabricQualityController::class, 'destroy'])->name('delete-fabric-quality');
    //febric content
    Route::get('fabric-content-manage', [FabricContentController::class, 'manageIndex'])->name('fabric-content-manage');
    Route::post('/fabric-content-create', [FabricContentController::class, 'store'])->name('save-fabric-content');
    Route::delete('/fabric-content-delete/{id}', [FabricContentController::class, 'destroy'])->name('delete-fabric-content');


    //Buyer Contacts
    Route::get('buyer_contact-manage', [BuyerContactController::class, 'manageIndex'])->name('buyer_contact-manage');
    Route::get('buyer_contact-index/{id}', [BuyerContactController::class, 'index'])->name('buyer_contact_index');
    Route::post('/buyer_contact-create', [BuyerContactController::class, 'store'])->name('save-buyer_contact');
    Route::delete('/buyer_contact-delete/{id}', [BuyerContactController::class, 'destroy'])->name('delete-buyer_contact');
    Route::put('buyer_contact-manage/{id}', [BuyerContactController::class, 'update'])->name('update-buyer_contact');
    Route::get('/get-departments/{id}', [BuyerContactController::class, 'getDepartments'])->name('get-departments-for-contact');

    // vendor
    Route::get('vendor-manage', [VendorController::class, 'manageIndex'])->name('vendor-manage');
    Route::get('vendor-list', [VendorController::class, 'index'])->name('vendor-list');
    Route::post('/vendor-create', [VendorController::class, 'store'])->name('save-vendor');
    Route::delete('/vendor-delete/{id}', [VendorController::class, 'destroy'])->name('delete-vendor');
    Route::put('vendor-manage/{id}', [VendorController::class, 'update'])->name('update-vendor');

    // manufacturers
    Route::get('manufacturer-manage', [ManufacturerController::class, 'manageIndex'])->name('manufacturer-manage');
    Route::get('manufacturer-index/{id}', [ManufacturerController::class, 'index'])->name('manufacturer-index');
    Route::get('manufacturer-interface/{id}', [ManufacturerController::class, 'interface'])->name('manufacturer-interface');
    Route::post('/manufacturer-create', [manufacturerController::class, 'store'])->name('save-manufacturer');
    Route::delete('/manufacturer-delete/{id}', [manufacturerController::class, 'destroy'])->name('delete-manufacturer');
    Route::put('manufacturer-manage/{id}', [manufacturerController::class, 'update'])->name('update-manufacturer');

    Route::get('manufacturer-certificate', [ManufacturerController::class, 'add_certificate'])->name('manufacturer-certificate');
    Route::post('manufacturer-certificate-store', [manufacturerController::class, 'certicicate_store'])->name('manufacturer-certificate-store');
    Route::put('manufacturer-certificate-update/{id}', [manufacturerController::class, 'certificate_update'])->name('update-manufacturer-certificate');
    Route::get('manufecturer_certicicate_index/{id}', [manufacturerController::class, 'certificate_index'])->name('manufecturer_certicicate_index');

    //Vendor Contacts
    Route::get('vendor_contact-manage', [VendorContactController::class, 'manageIndex'])->name('vendor_contact-manage');
    Route::get('vendor_contact-index/{id}', [VendorContactController::class, 'index'])->name('vendor_contact_index');
    Route::post('/vendor_contact-create', [VendorContactController::class, 'store'])->name('save-vendor_contact');
    Route::delete('/vendor_contact-delete/{id}', [VendorContactController::class, 'destroy'])->name('delete-vendor_contact');
    Route::put('vendor_contact-manage/{id}', [VendorContactController::class, 'update'])->name('update-vendor_contact');
    Route::get('/get-manufacturers/{id}', [VendorContactController::class, 'getManufacturers'])->name('get-manufacturers-for-contact');

    //Vendor Certificates
    Route::get('vendor_certificate-manage', [VendorContactController::class, 'manageIndex'])->name('vendor_certificate-manage');
    Route::get('vendor_certificate-index/{id}', [VendorContactController::class, 'index'])->name('vendor_certificate');
    Route::post('/vendor_certificate-create', [VendorContactController::class, 'store'])->name('save-vendor_certificate');
    Route::delete('/vendor_certificate-delete/{id}', [VendorContactController::class, 'destroy'])->name('delete-vendor_certificate');
    Route::put('vendor_certificate-manage/{id}', [VendorContactController::class, 'update'])->name('update-vendor_certificate');
    //Crtical Path
    Route::get('critical-path-manage', [CriticalController::class, 'index'])->name('critical-path');
    Route::get('buyer-critical-path-manage', [CriticalController::class, 'buyerindex'])->name('buyer-critical-path');
    Route::get('add-critical-path', [CriticalController::class, 'create'])->name('add-critical-path');
    Route::get('/critical/edit/{id}', [CriticalController::class, 'edit'])->name('critical.edit');
    Route::post('/critical-update/{id}', [CriticalController::class, 'update'])->name('criticalUpdate');
    Route::post('/process-date', [CriticalController::class, 'processDate'])->name('process.date');
});

// Change language session condition
Route::get('/language/{lang}', function ($lang) {
    $lang = strtolower($lang);
    if ($lang == 'en') {
        session([
            'locale' => $lang
        ]);
    }
    return redirect()->back();
});

/*
|--------------------------------------------------------------------------
| This is the end of Blade (front-end) Routes
|-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\-\
*/
