<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\PickupController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SeoToolController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderTrackController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\PageSettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\VerificationController;
use App\Http\Controllers\Admin\AdminLanguageController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\SocialSettingController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Admin\SubChildCategoryController;
use App\Http\Controllers\Front\Vendor\Auth\LoginController as VendorLoginController;
use App\Http\Controllers\Front\Vendor\Auth\RegistrationController as VendorRegistrationController;
use App\Http\Controllers\Front\User\Auth\RegistrationController;
use App\Http\Controllers\Front\CatalogController;
use App\Http\Controllers\Front\FrontendController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\Front\User\Auth\UserLoginController;
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

Route::get('/', function () {
    return view('welcome');
});

// ************************************ ADMIN SECTION START**********************************************

Route::prefix('admin')->group(function () {
    //------------ ADMIN LOGIN SECTION ------------
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/forgot', [LoginController::class, 'showForgotForm'])->name('admin.forgot');
    Route::post('/forgot', [LoginController::class, 'forgot'])->name('admin.forgot.submit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    //------------ ADMIN LOGIN SECTION ENDS ------------


    //------------ ADMIN NOTIFICATION SECTION ------------

    // User Notification
    Route::get('/user/notf/show', [NotificationController::class, 'user_notf_show'])->name('user-notf-show');
    Route::get('/user/notf/count', [NotificationController::class, 'user_notf_count'])->name('user-notf-count');
    Route::get('/user/notf/clear', [NotificationController::class, 'user_notf_clear'])->name('user-notf-clear');
    // User Notification Ends

    // Order Notification
    Route::get('/order/notf/show', [NotificationController::class, 'order_notf_show'])->name('order-notf-show');
    Route::get('/order/notf/count', [NotificationController::class, 'order_notf_count'])->name('order-notf-count');
    Route::get('/order/notf/clear', [NotificationController::class, 'order_notf_clear'])->name('order-notf-clear');
    // Order Notification Ends

    // Product Notification
    Route::get('/product/notf/show', [NotificationController::class, 'product_notf_show'])->name('product-notf-show');
    Route::get('/product/notf/count', [NotificationController::class, 'product_notf_count'])->name('product-notf-count');
    Route::get('/product/notf/clear', [NotificationController::class, 'product_notf_clear'])->name('product-notf-clear');
    // Product Notification Ends

    // Conversation Notification
    Route::get('/conv/notf/show', [NotificationController::class, 'conv_notf_show'])->name('conv-notf-show');
    Route::get('/conv/notf/count', [NotificationController::class, 'conv_notf_count'])->name('conv-notf-count');
    Route::get('/conv/notf/clear', [NotificationController::class, 'conv_notf_clear'])->name('conv-notf-clear');
    // Conversation Notification Ends

    //------------ ADMIN NOTIFICATION SECTION ENDS ------------

    //------------ ADMIN DASHBOARD & PROFILE SECTION ------------
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [DashboardController::class, 'profileupdate'])->name('profile.update');
        Route::get('/password', [DashboardController::class, 'passwordreset'])->name('password');
        Route::post('/password/update', [DashboardController::class, 'changepass'])->name('password.update');
    });
    //------------ ADMIN DASHBOARD & PROFILE SECTION ENDS ------------

    //------------ ADMIN ORDER SECTION ------------
    Route::middleware(['permissions:orders'])->group(function () {

        Route::get('/orders/datatables/{slug}', [OrderController::class, 'datatables'])->name('admin-order-datatables'); //JSON REQUEST
        Route::get('/orders', [OrderController::class, 'index'])->name('admin-order-index');
        Route::get('/order/edit/{id}', [OrderController::class, 'edit'])->name('admin-order-edit');
        Route::post('/order/update/{id}', [OrderController::class, 'update'])->name('admin-order-update');
        Route::get('/orders/pending', [OrderController::class, 'pending'])->name('admin-order-pending');
        Route::get('/orders/processing', [OrderController::class, 'processing'])->name('admin-order-processing');
        Route::get('/orders/completed', [OrderController::class, 'completed'])->name('admin-order-completed');
        Route::get('/orders/declined', [OrderController::class, 'declined'])->name('admin-order-declined');
        Route::get('/order/{id}/show', [OrderController::class, 'show'])->name('admin-order-show');
        Route::get('/order/{id}/invoice', [OrderController::class, 'invoice'])->name('admin-order-invoice');
        Route::get('/order/{id}/print', [OrderController::class, 'printpage'])->name('admin-order-print');
        Route::get('/order/{id1}/status/{status}', [OrderController::class, 'status'])->name('admin-order-status');
        Route::post('/order/email/', [OrderController::class, 'emailsub'])->name('admin-order-emailsub');
        Route::post('/order/{id}/license', [OrderController::class, 'license'])->name('admin-order-license');

        // Order Tracking
        Route::get('/order/{id}/track', [OrderTrackController::class, 'index'])->name('admin-order-track');
        Route::get('/order/{id}/trackload', [OrderTrackController::class, 'load'])->name('admin-order-track-load');
        Route::post('/order/track/store', [OrderTrackController::class, 'store'])->name('admin-order-track-store');
        Route::get('/order/track/add', [OrderTrackController::class, 'add'])->name('admin-order-track-add');
        Route::get('/order/track/edit/{id}', [OrderTrackController::class, 'edit'])->name('admin-order-track-edit');
        Route::post('/order/track/update/{id}', [OrderTrackController::class, 'update'])->name('admin-order-track-update');
        Route::get('/order/track/delete/{id}', [OrderTrackController::class, 'delete'])->name('admin-order-track-delete');
        // Order Tracking Ends

    });
    //------------ ADMIN ORDER SECTION ENDS------------

    Route::middleware('permissions:products')->group(function () {
        Route::get('/products/datatables', [ProductController::class, 'datatables'])->name('admin-prod-datatables'); // JSON REQUEST
        Route::get('/products', [ProductController::class, 'index'])->name('admin-prod-index');

        Route::post('/products/upload/update/{id}', [ProductController::class, 'uploadUpdate'])->name('admin-prod-upload-update');

        Route::get('/products/deactive/datatables', [ProductController::class, 'deactivedatatables'])->name('admin-prod-deactive-datatables'); // JSON REQUEST
        Route::get('/products/deactive', [ProductController::class, 'deactive'])->name('admin-prod-deactive');

        Route::get('/products/catalogs/datatables', [ProductController::class, 'catalogdatatables'])->name('admin-prod-catalog-datatables'); // JSON REQUEST
        Route::get('/products/catalogs', [ProductController::class, 'catalogs'])->name('admin-prod-catalog-index');

        // CREATE SECTION
        Route::get('/products/types', [ProductController::class, 'types'])->name('admin-prod-types');
        Route::get('/products/physical/create', [ProductController::class, 'createPhysical'])->name('admin-prod-physical-create');
        Route::get('/products/digital/create', [ProductController::class, 'createDigital'])->name('admin-prod-digital-create');
        Route::get('/products/license/create', [ProductController::class, 'createLicense'])->name('admin-prod-license-create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('admin-prod-store');
        Route::get('/getattributes', [ProductController::class, 'getAttributes'])->name('admin-prod-getattributes');
        // CREATE SECTION

        // EDIT SECTION
        Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin-prod-edit');
        Route::post('/products/edit/{id}', [ProductController::class, 'update'])->name('admin-prod-update');
        // EDIT SECTION ENDS

        // DELETE SECTION
        Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('admin-prod-delete');
        // DELETE SECTION ENDS

        Route::get('/products/catalog/{id1}/{id2}', [ProductController::class, 'catalog'])->name('admin-prod-catalog');
    });

    //------------ ADMIN PRODUCT SECTION ENDS------------

    Route::middleware('permissions:affiliate_products')->group(function () {

        Route::get('/products/import/create', [ImportController::class, 'createImport'])->name('admin-import-create');
        Route::get('/products/import/edit/{id}', [ImportController::class, 'edit'])->name('admin-import-edit');

        Route::get('/products/import/datatables', [ImportController::class, 'datatables'])->name('admin-import-datatables'); // JSON REQUEST
        Route::get('/products/import/index', [ImportController::class, 'index'])->name('admin-import-index');

        Route::post('/products/import/store', [ImportController::class, 'store'])->name('admin-import-store');
        Route::post('/products/import/update/{id}', [ImportController::class, 'update'])->name('admin-import-update');

        // DELETE SECTION
        Route::get('/affiliate/products/delete/{id}', [ProductController::class, 'destroy'])->name('admin-affiliate-prod-delete');
        // DELETE SECTION ENDS

    });

    Route::middleware('permissions:customers')->group(function () {

        Route::get('/users/datatables', [UserController::class, 'datatables'])->name('admin-user-datatables'); // JSON REQUEST
        Route::get('/users', [UserController::class, 'index'])->name('admin-user-index');
        Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin-user-edit');
        Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('admin-user-update');
        Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('admin-user-delete');
        Route::get('/user/{id}/show', [UserController::class, 'show'])->name('admin-user-show');
        Route::get('/users/ban/{id1}/{id2}', [UserController::class, 'ban'])->name('admin-user-ban');
        Route::get('/user/default/image', [UserController::class, 'image'])->name('admin-user-image');

        // WITHDRAW SECTION
        Route::get('/users/withdraws/datatables', [UserController::class, 'withdrawdatatables'])->name('admin-withdraw-datatables'); // JSON REQUEST
        Route::get('/users/withdraws', [UserController::class, 'withdraws'])->name('admin-withdraw-index');
        Route::get('/user/withdraw/{id}/show', [UserController::class, 'withdrawdetails'])->name('admin-withdraw-show');
        Route::get('/users/withdraws/accept/{id}', [UserController::class, 'accept'])->name('admin-withdraw-accept');
        Route::get('/user/withdraws/reject/{id}', [UserController::class, 'reject'])->name('admin-withdraw-reject');
        // WITHDRAW SECTION ENDS

    });

    Route::middleware('permissions:vendors')->group(function () {

        Route::get('/vendors/datatables', [VendorController::class, 'datatables'])->name('admin-vendor-datatables');
        Route::get('/vendors', [VendorController::class, 'index'])->name('admin-vendor-index');

        Route::get('/vendors/{id}/show', [VendorController::class, 'show'])->name('admin-vendor-show');
        Route::get('/vendors/secret/login/{id}', [VendorController::class, 'secret'])->name('admin-vendor-secret');
        Route::get('/vendor/edit/{id}', [VendorController::class, 'edit'])->name('admin-vendor-edit');
        Route::post('/vendor/edit/{id}', [VendorController::class, 'update'])->name('admin-vendor-update');

        Route::get('/vendor/verify/{id}', [VendorController::class, 'verify'])->name('admin-vendor-verify');
        Route::post('/vendor/verify/{id}', [VendorController::class, 'verifySubmit'])->name('admin-vendor-verify-submit');

        Route::get('/vendor/color', [VendorController::class, 'color'])->name('admin-vendor-color');
        Route::get('/vendors/status/{id1}/{id2}', [VendorController::class, 'status'])->name('admin-vendor-st');
        Route::get('/vendors/delete/{id}', [VendorController::class, 'destroy'])->name('admin-vendor-delete');

        Route::get('/vendors/withdraws/datatables', [VendorController::class, 'withdrawdatatables'])->name('admin-vendor-withdraw-datatables'); // JSON REQUEST
        Route::get('/vendors/withdraws', [VendorController::class, 'withdraws'])->name('admin-vendor-withdraw-index');
        Route::get('/vendors/withdraw/{id}/show', [VendorController::class, 'withdrawdetails'])->name('admin-vendor-withdraw-show');
        Route::get('/vendors/withdraws/accept/{id}', [VendorController::class, 'accept'])->name('admin-vendor-withdraw-accept');
        Route::get('/vendors/withdraws/reject/{id}', [VendorController::class, 'reject'])->name('admin-vendor-withdraw-reject');

        // Vendor Registration Section
        Route::get('/general-settings/vendor-registration/{status}', [GeneralSettingController::class, 'regvendor'])->name('admin-gs-regvendor');
        // Vendor Registration Section Ends

        // Verification Section
        Route::get('/verifications/datatables/{status}', [VerificationController::class, 'datatables'])->name('admin-vr-datatables');
        Route::get('/verifications', [VerificationController::class, 'index'])->name('admin-vr-index');
        Route::get('/verifications/pendings', [VerificationController::class, 'pending'])->name('admin-vr-pending');

        Route::get('/verifications/show', [VerificationController::class, 'show'])->name('admin-vr-show');
        Route::get('/verifications/edit/{id}', [VerificationController::class, 'edit'])->name('admin-vr-edit');
        Route::post('/verifications/edit/{id}', [VerificationController::class, 'update'])->name('admin-vr-update');
        Route::get('/verifications/status/{id1}/{id2}', [VerificationController::class, 'status'])->name('admin-vr-st');
        Route::get('/verifications/delete/{id}', [VerificationController::class, 'destroy'])->name('admin-vr-delete');
        // Verification Section Ends

    });

    Route::middleware('permissions:vendor_subscription_plans')->group(function () {

        Route::get('/subscription/datatables', [SubscriptionController::class, 'datatables'])->name('admin-subscription-datatables');
        Route::get('/subscription', [SubscriptionController::class, 'index'])->name('admin-subscription-index');
        Route::get('/subscription/create', [SubscriptionController::class, 'create'])->name('admin-subscription-create');
        Route::post('/subscription/create', [SubscriptionController::class, 'store'])->name('admin-subscription-store');
        Route::get('/subscription/edit/{id}', [SubscriptionController::class, 'edit'])->name('admin-subscription-edit');
        Route::post('/subscription/edit/{id}', [SubscriptionController::class, 'update'])->name('admin-subscription-update');
        Route::get('/subscription/delete/{id}', [SubscriptionController::class, 'destroy'])->name('admin-subscription-delete');

        Route::get('/vendors/subs/datatables', [VendorController::class, 'subsdatatables'])->name('admin-vendor-subs-datatables');
        Route::get('/vendors/subs', [VendorController::class, 'subs'])->name('admin-vendor-subs');
        Route::get('/vendors/sub/{id}', [VendorController::class, 'sub'])->name('admin-vendor-sub');
    });

    Route::middleware('permissions:categories')->group(function () {

        // Category Section
        Route::get('/category/datatables', [CategoryController::class, 'datatables'])->name('admin-cat-datatables'); // JSON REQUEST
        Route::get('/category', [CategoryController::class, 'index'])->name('admin-cat-index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('admin-cat-create');
        Route::post('/category/create', [CategoryController::class, 'store'])->name('admin-cat-store');
        Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin-cat-edit');
        Route::post('/category/edit/{id}', [CategoryController::class, 'update'])->name('admin-cat-update');
        Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin-cat-delete');
        Route::get('/category/status/{id1}/{id2}', [CategoryController::class, 'status'])->name('admin-cat-status');

        // Attribute Section
        Route::get('/attribute/datatables', [AttributeController::class, 'datatables'])->name('admin-attr-datatables'); // JSON REQUEST
        Route::get('/attribute', [AttributeController::class, 'index'])->name('admin-attr-index');
        Route::get('/attribute/{catid}/attrCreateForCategory', [AttributeController::class, 'attrCreateForCategory'])->name('admin-attr-createForCategory');
        Route::get('/attribute/{subcatid}/attrCreateForSubcategory', [AttributeController::class, 'attrCreateForSubcategory'])->name('admin-attr-createForSubcategory');
        Route::get('/attribute/{childcatid}/attrCreateForChildcategory', [AttributeController::class, 'attrCreateForChildcategory'])->name('admin-attr-createForChildcategory');
        Route::post('/attribute/store', [AttributeController::class, 'store'])->name('admin-attr-store');
        Route::get('/attribute/{id}/manage', [AttributeController::class, 'manage'])->name('admin-attr-manage');
        Route::get('/attribute/{attrid}/edit', [AttributeController::class, 'edit'])->name('admin-attr-edit');
        Route::post('/attribute/edit/{id}', [AttributeController::class, 'update'])->name('admin-attr-update');
        Route::get('/attribute/{id}/options', [AttributeController::class, 'options'])->name('admin-attr-options');
        Route::get('/attribute/delete/{id}', [AttributeController::class, 'destroy'])->name('admin-attr-delete');

        // Subcategory Section
        Route::get('/subcategory/datatables', [SubCategoryController::class, 'datatables'])->name('admin-subcat-datatables'); // JSON REQUEST
        Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('admin-subcat-index');
        Route::get('/subcategory/create', [SubCategoryController::class, 'create'])->name('admin-subcat-create');
        Route::post('/subcategory/create', [SubCategoryController::class, 'store'])->name('admin-subcat-store');
        Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin-subcat-edit');
        Route::post('/subcategory/edit/{id}', [SubCategoryController::class, 'update'])->name('admin-subcat-update');
        Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'destroy'])->name('admin-subcat-delete');
        Route::get('/subcategory/status/{id1}/{id2}', [SubCategoryController::class, 'status'])->name('admin-subcat-status');
        Route::get('/load/subcategories/{id}/', [SubCategoryController::class, 'load'])->name('admin-subcat-load'); // JSON REQUEST

        // Childcategory Section
        Route::get('/childcategory/datatables', [ChildCategoryController::class, 'datatables'])->name('admin-childcat-datatables'); // JSON REQUEST
        Route::get('/childcategory', [ChildCategoryController::class, 'index'])->name('admin-childcat-index');
        Route::get('/childcategory/create', [ChildCategoryController::class, 'create'])->name('admin-childcat-create');
        Route::post('/childcategory/create', [ChildCategoryController::class, 'store'])->name('admin-childcat-store');
        Route::get('/childcategory/edit/{id}', [ChildCategoryController::class, 'edit'])->name('admin-childcat-edit');
        Route::post('/childcategory/edit/{id}', [ChildCategoryController::class, 'update'])->name('admin-childcat-update');
        Route::get('/childcategory/delete/{id}', [ChildCategoryController::class, 'destroy'])->name('admin-childcat-delete');
        Route::get('/childcategory/status/{id1}/{id2}', [ChildCategoryController::class, 'status'])->name('admin-childcat-status');
        Route::get('/load/childcategories/{id}/', [ChildCategoryController::class, 'load'])->name('admin-childcat-load'); // JSON REQUEST

        // SubChildcategory Section
        // Route::get('/subchildcategory/datatables', [SubChildCategoryController::class, 'datatables'])->name('admin-sub-childcat-datatables'); // JSON REQUEST
        // Route::get('/subchildcategory', [SubChildCategoryController::class, 'index'])->name('admin-sub-childcat-index');
        // Route::get('/subchildcategory/create', [SubChildCategoryController::class, 'create'])->name('admin-sub-childcat-create');
        // Route::post('/subchildcategory/create', [SubChildCategoryController::class, 'store'])->name('admin-sub-childcat-store');
        // Route::get('/subchildcategory/edit/{id}', [SubChildCategoryController::class, 'edit'])->name('admin-sub-childcat-edit');
        // Route::post('/subchildcategory/edit/{id}', [SubChildCategoryController::class, 'update'])->name('admin-sub-childcat-update');
        // Route::get('/subchildcategory/delete/{id}', [SubChildCategoryController::class, 'destroy'])->name('admin-sub-childcat-delete');
        // Route::get('/subchildcategory/status/{id1}/{id2}', [SubChildCategoryController::class, 'status'])->name('admin-sub-childcat-status');
        // Route::get('/load/childcategories/{id}/', [SubChildCategoryController::class, 'load'])->name('admin-sub-childcat-load'); // JSON REQUEST

    });

    // ADMIN CSV IMPORT SECTION
    Route::middleware('permissions:bulk_product_upload')->group(function () {
        Route::get('/products/import', [ProductController::class, 'import'])->name('admin-prod-import');
        Route::post('/products/import-submit', [ProductController::class, 'importSubmit'])->name('admin-prod-importsubmit');
        Route::get('/products/image-import', [ProductController::class, 'importImage'])->name('admin-prod-imgae-import');
        Route::post('/products/image-import-submit', [ProductController::class, 'importImageSubmit'])->name('admin-prod-image-importsubmit');
        Route::get('/products/image-gallery-import', [ProductController::class, 'importgalleryImage'])->name('admin-prod-gallery-image-import');
        Route::post('/products/image-galleryimport-submit', [ProductController::class, 'importgalleryImageSubmit'])->name('admin-prod-gallery-image-importsubmit');
    });
    // ADMIN CSV IMPORT SECTION ENDS

    // ADMIN PRODUCT DISCUSSION SECTION
    Route::middleware('permissions:product_discussion')->group(function () {
        // RATING SECTION
        Route::get('/ratings/datatables', [RatingController::class, 'datatables'])->name('admin-rating-datatables'); // JSON REQUEST
        Route::get('/ratings', [RatingController::class, 'index'])->name('admin-rating-index');
        Route::get('/ratings/delete/{id}', [RatingController::class, 'destroy'])->name('admin-rating-delete');
        Route::get('/ratings/show/{id}', [RatingController::class, 'show'])->name('admin-rating-show');
        // RATING SECTION ENDS
    });
    // ADMIN PRODUCT DISCUSSION SECTION ENDS

    Route::middleware('permissions:product_discussion')->group(function () {

        // COMMENT SECTION
        Route::get('/comments/datatables', [CommentController::class, 'datatables'])->name('admin-comment-datatables'); // JSON REQUEST
        Route::get('/comments', [CommentController::class, 'index'])->name('admin-comment-index');
        Route::get('/comments/delete/{id}', [CommentController::class, 'destroy'])->name('admin-comment-delete');
        Route::get('/comments/show/{id}', [CommentController::class, 'show'])->name('admin-comment-show');

        // COMMENT CHECK
        Route::get('/general-settings/comment/{status}', [GeneralSettingController::class, 'comment'])->name('admin-gs-iscomment');
        // COMMENT CHECK ENDS

        // COMMENT SECTION ENDS

        // REPORT SECTION
        Route::get('/reports/datatables', [ReportController::class, 'datatables'])->name('admin-report-datatables'); // JSON REQUEST
        Route::get('/reports', [ReportController::class, 'index'])->name('admin-report-index');
        Route::get('/reports/delete/{id}', [ReportController::class, 'destroy'])->name('admin-report-delete');
        Route::get('/reports/show/{id}', [ReportController::class, 'show'])->name('admin-report-show');

        // REPORT CHECK
        Route::get('/general-settings/report/{status}', [GeneralSettingController::class, 'isreport'])->name('admin-gs-isreport');
        // REPORT CHECK ENDS

        // REPORT SECTION ENDS

    });

    Route::middleware('permissions:set_coupons')->group(function () {

        // COUPON SECTION
        Route::get('/coupon/datatables', [CouponController::class, 'datatables'])->name('admin-coupon-datatables'); // JSON REQUEST
        Route::get('/coupon', [CouponController::class, 'index'])->name('admin-coupon-index');
        Route::get('/coupon/create', [CouponController::class, 'create'])->name('admin-coupon-create');
        Route::post('/coupon/create', [CouponController::class, 'store'])->name('admin-coupon-store');
        Route::get('/coupon/edit/{id}', [CouponController::class, 'edit'])->name('admin-coupon-edit');
        Route::post('/coupon/edit/{id}', [CouponController::class, 'update'])->name('admin-coupon-update');
        Route::get('/coupon/delete/{id}', [CouponController::class, 'destroy'])->name('admin-coupon-delete');
        Route::get('/coupon/status/{id1}/{id2}', [CouponController::class, 'status'])->name('admin-coupon-status');

        // COUPON SECTION ENDS

    });

    // ADMIN BLOG SECTION
    Route::middleware('permissions:blog')->group(function () {
        Route::get('/blog/datatables', [BlogController::class, 'datatables'])->name('admin-blog-datatables'); // JSON REQUEST
        Route::get('/blog', [BlogController::class, 'index'])->name('admin-blog-index');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('admin-blog-create');
        Route::post('/blog/create', [BlogController::class, 'store'])->name('admin-blog-store');
        Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin-blog-edit');
        Route::post('/blog/edit/{id}', [BlogController::class, 'update'])->name('admin-blog-update');
        Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('admin-blog-delete');

        Route::get('/blog/category/datatables', [BlogCategoryController::class, 'datatables'])->name('admin-cblog-datatables'); // JSON REQUEST
        Route::get('/blog/category', [BlogCategoryController::class, 'index'])->name('admin-cblog-index');
        Route::get('/blog/category/create', [BlogCategoryController::class, 'create'])->name('admin-cblog-create');
        Route::post('/blog/category/create', [BlogCategoryController::class, 'store'])->name('admin-cblog-store');
        Route::get('/blog/category/edit/{id}', [BlogCategoryController::class, 'edit'])->name('admin-cblog-edit');
        Route::post('/blog/category/edit/{id}', [BlogCategoryController::class, 'update'])->name('admin-cblog-update');
        Route::get('/blog/category/delete/{id}', [BlogCategoryController::class, 'destroy'])->name('admin-cblog-delete');
    });

    // ADMIN USER MESSAGE SECTION
    Route::middleware('permissions:messages')->group(function () {
        Route::get('/messages/datatables/{type}', [MessageController::class, 'datatables'])->name('admin-message-datatables');
        Route::get('/tickets', [MessageController::class, 'index'])->name('admin-message-index');
        Route::get('/disputes', [MessageController::class, 'disputes'])->name('admin-message-dispute');
        Route::get('/message/{id}', [MessageController::class, 'message'])->name('admin-message-show');
        Route::get('/message/load/{id}', [MessageController::class, 'messageshow'])->name('admin-message-load');
        Route::post('/message/post', [MessageController::class, 'postmessage'])->name('admin-message-store');
        Route::get('/message/{id}/delete', [MessageController::class, 'messagedelete'])->name('admin-message-delete');
        Route::post('/user/send/message', [MessageController::class, 'usercontact'])->name('admin-send-message');
    });

    // ADMIN GENERAL SETTINGS SECTION
    Route::middleware('permissions:general_settings')->group(function () {
        Route::get('/general-settings/logo', [GeneralSettingController::class, 'logo'])->name('admin-gs-logo');
        Route::get('/general-settings/favicon', [GeneralSettingController::class, 'fav'])->name('admin-gs-fav');
        Route::get('/general-settings/loader', [GeneralSettingController::class, 'load'])->name('admin-gs-load');
        Route::get('/general-settings/contents', [GeneralSettingController::class, 'contents'])->name('admin-gs-contents');
        Route::get('/general-settings/footer', [GeneralSettingController::class, 'footer'])->name('admin-gs-footer');
        Route::get('/general-settings/affilate', [GeneralSettingController::class, 'affilate'])->name('admin-gs-affilate');
        Route::get('/general-settings/error-banner', [GeneralSettingController::class, 'errorbanner'])->name('admin-gs-error-banner');
        Route::get('/general-settings/popup', [GeneralSettingController::class, 'popup'])->name('admin-gs-popup');
        Route::get('/general-settings/maintenance', [GeneralSettingController::class, 'maintain'])->name('admin-gs-maintenance');
    });

    // ADMIN PICKUP LOCATION
    Route::middleware('permissions:general_settings')->group(function () {
        Route::get('/pickup/datatables', [PickupController::class, 'datatables'])->name('admin-pick-datatables'); // JSON REQUEST
        Route::get('/pickup', [PickupController::class, 'index'])->name('admin-pick-index');
        Route::get('/pickup/create', [PickupController::class, 'create'])->name('admin-pick-create');
        Route::post('/pickup/create', [PickupController::class, 'store'])->name('admin-pick-store');
        Route::get('/pickup/edit/{id}', [PickupController::class, 'edit'])->name('admin-pick-edit');
        Route::post('/pickup/edit/{id}', [PickupController::class, 'update'])->name('admin-pick-update');
        Route::get('/pickup/delete/{id}', [PickupController::class, 'destroy'])->name('admin-pick-delete');
    });

    // ADMIN SHIPPING
    Route::middleware('permissions:general_settings')->group(function () {
        Route::get('/shipping/datatables', [ShippingController::class, 'datatables'])->name('admin-shipping-datatables');
        Route::get('/shipping', [ShippingController::class, 'index'])->name('admin-shipping-index');
        Route::get('/shipping/create', [ShippingController::class, 'create'])->name('admin-shipping-create');
        Route::post('/shipping/create', [ShippingController::class, 'store'])->name('admin-shipping-store');
        Route::get('/shipping/edit/{id}', [ShippingController::class, 'edit'])->name('admin-shipping-edit');
        Route::post('/shipping/edit/{id}', [ShippingController::class, 'update'])->name('admin-shipping-update');
        Route::get('/shipping/delete/{id}', [ShippingController::class, 'destroy'])->name('admin-shipping-delete');
    });

    Route::middleware('permissions:packages')->group(function () {
        Route::get('/package/datatables', [PackageController::class, 'datatables'])->name('admin-package-datatables');
        Route::get('/package', [PackageController::class, 'index'])->name('admin-package-index');
        Route::get('/package/create', [PackageController::class, 'create'])->name('admin-package-create');
        Route::post('/package/create', [PackageController::class, 'store'])->name('admin-package-store');
        Route::get('/package/edit/{id}', [PackageController::class, 'edit'])->name('admin-package-edit');
        Route::post('/package/edit/{id}', [PackageController::class, 'update'])->name('admin-package-update');
        Route::get('/package/delete/{id}', [PackageController::class, 'destroy'])->name('admin-package-delete');
    });

    Route::middleware('permissions:general_settings')->group(function () {
        // General Setting Section
        Route::get('/general-settings/home/{status}', [GeneralSettingController::class, 'ishome'])->name('admin-gs-ishome');
        Route::get('/general-settings/disqus/{status}', [GeneralSettingController::class, 'isdisqus'])->name('admin-gs-isdisqus');
        Route::get('/general-settings/loader/{status}', [GeneralSettingController::class, 'isloader'])->name('admin-gs-isloader');
        Route::get('/general-settings/email-verify/{status}', [GeneralSettingController::class, 'isemailverify'])->name('admin-gs-is-email-verify');
        Route::get('/general-settings/popup/{status}', [GeneralSettingController::class, 'ispopup'])->name('admin-gs-ispopup');

        Route::get('/general-settings/admin/loader/{status}', [GeneralSettingController::class, 'isadminloader'])->name('admin-gs-is-admin-loader');
        Route::get('/general-settings/talkto/{status}', [GeneralSettingController::class, 'talkto'])->name('admin-gs-talkto');

        Route::get('/general-settings/multiple/shipping/{status}', [GeneralSettingController::class, 'mship'])->name('admin-gs-mship');
        Route::get('/general-settings/multiple/packaging/{status}', [GeneralSettingController::class, 'mpackage'])->name('admin-gs-mpackage');
        Route::get('/general-settings/security/{status}', [GeneralSettingController::class, 'issecure'])->name('admin-gs-secure');
        Route::get('/general-settings/stock/{status}', [GeneralSettingController::class, 'stock'])->name('admin-gs-stock');
        Route::get('/general-settings/maintain/{status}', [GeneralSettingController::class, 'ismaintain'])->name('admin-gs-maintain');

        //  Affilte Section
        Route::get('/general-settings/affilate/{status}', [GeneralSettingController::class, 'isaffilate'])->name('admin-gs-isaffilate');

        //  Capcha Section
        Route::get('/general-settings/capcha/{status}', [GeneralSettingController::class, 'iscapcha'])->name('admin-gs-iscapcha');
    });

    Route::middleware('permissions:home_page_settings')->group(function () {
        //------------ ADMIN SLIDER SECTION ------------
        Route::get('/slider/datatables', [SliderController::class, 'datatables'])->name('admin-sl-datatables'); // JSON REQUEST
        Route::get('/slider', [SliderController::class, 'index'])->name('admin-sl-index');
        Route::get('/slider/create', [SliderController::class, 'create'])->name('admin-sl-create');
        Route::post('/slider/create', [SliderController::class, 'store'])->name('admin-sl-store');
        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('admin-sl-edit');
        Route::post('/slider/edit/{id}', [SliderController::class, 'update'])->name('admin-sl-update');
        Route::get('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('admin-sl-delete');
        //------------ ADMIN SLIDER SECTION ENDS ------------

        //------------ ADMIN SERVICE SECTION ------------
        Route::get('/service/datatables', [ServiceController::class, 'datatables'])->name('admin-service-datatables'); // JSON REQUEST
        Route::get('/service', [ServiceController::class, 'index'])->name('admin-service-index');
        Route::get('/service/create', [ServiceController::class, 'create'])->name('admin-service-create');
        Route::post('/service/create', [ServiceController::class, 'store'])->name('admin-service-store');
        Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin-service-edit');
        Route::post('/service/edit/{id}', [ServiceController::class, 'update'])->name('admin-service-update');
        Route::get('/service/delete/{id}', [ServiceController::class, 'destroy'])->name('admin-service-delete');
        //------------ ADMIN SERVICE SECTION ENDS ------------

        //------------ ADMIN BANNER SECTION ------------
        Route::get('/banner/datatables/{type}', [BannerController::class, 'datatables'])->name('admin-sb-datatables'); // JSON REQUEST
        Route::get('top/small/banner/', [BannerController::class, 'index'])->name('admin-sb-index');
        Route::get('large/banner/', [BannerController::class, 'large'])->name('admin-sb-large');
        Route::get('bottom/small/banner/', [BannerController::class, 'bottom'])->name('admin-sb-bottom');
        Route::get('top/small/banner/create', [BannerController::class, 'create'])->name('admin-sb-create');
        Route::get('large/banner/create', [BannerController::class, 'largecreate'])->name('admin-sb-create-large');
        Route::get('bottom/small/banner/create', [BannerController::class, 'bottomcreate'])->name('admin-sb-create-bottom');
        Route::post('/banner/create', [BannerController::class, 'store'])->name('admin-sb-store');
        Route::get('/banner/edit/{id}', [BannerController::class, 'edit'])->name('admin-sb-edit');
        Route::post('/banner/edit/{id}', [BannerController::class, 'update'])->name('admin-sb-update');
        Route::get('/banner/delete/{id}', [BannerController::class, 'destroy'])->name('admin-sb-delete');
        //------------ ADMIN BANNER SECTION ENDS ------------

        //------------ ADMIN REVIEW SECTION ------------
        Route::get('/review/datatables', [ReviewController::class, 'datatables'])->name('admin-review-datatables'); // JSON REQUEST
        Route::get('/review', [ReviewController::class, 'index'])->name('admin-review-index');
        Route::get('/review/create', [ReviewController::class, 'create'])->name('admin-review-create');
        Route::post('/review/create', [ReviewController::class, 'store'])->name('admin-review-store');
        Route::get('/review/edit/{id}', [ReviewController::class, 'edit'])->name('admin-review-edit');
        Route::post('/review/edit/{id}', [ReviewController::class, 'update'])->name('admin-review-update');
        Route::get('/review/delete/{id}', [ReviewController::class, 'destroy'])->name('admin-review-delete');
        //------------ ADMIN REVIEW SECTION ENDS ------------

        //------------ ADMIN PARTNER SECTION ------------
        Route::get('/partner/datatables', [PartnerController::class, 'datatables'])->name('admin-partner-datatables');
        Route::get('/partner', [PartnerController::class, 'index'])->name('admin-partner-index');
        Route::get('/partner/create', [PartnerController::class, 'create'])->name('admin-partner-create');
        Route::post('/partner/create', [PartnerController::class, 'store'])->name('admin-partner-store');
        Route::get('/partner/edit/{id}', [PartnerController::class, 'edit'])->name('admin-partner-edit');
        Route::post('/partner/edit/{id}', [PartnerController::class, 'update'])->name('admin-partner-update');
        Route::get('/partner/delete/{id}', [PartnerController::class, 'destroy'])->name('admin-partner-delete');
        //------------ ADMIN PARTNER SECTION ENDS ------------

        //------------ ADMIN PAGE SETTINGS SECTION ------------
        Route::get('/page-settings/customize', [PageSettingController::class, 'customize'])->name('admin-ps-customize');
        Route::get('/page-settings/big-save', [PageSettingController::class, 'big_save'])->name('admin-ps-big-save');
        Route::get('/page-settings/best-seller', [PageSettingController::class, 'best_seller'])->name('admin-ps-best-seller');
    });

    Route::middleware('permissions:menu_page_settings')->group(function () {
        //------------ ADMIN FAQ SECTION ------------
        Route::get('/faq/datatables', [FaqController::class, 'datatables'])->name('admin-faq-datatables'); // JSON REQUEST
        Route::get('/faq', [FaqController::class, 'index'])->name('admin-faq-index');
        Route::get('/faq/create', [FaqController::class, 'create'])->name('admin-faq-create');
        Route::post('/faq/create', [FaqController::class, 'store'])->name('admin-faq-store');
        Route::get('/faq/edit/{id}', [FaqController::class, 'edit'])->name('admin-faq-edit');
        Route::post('/faq/update/{id}', [FaqController::class, 'update'])->name('admin-faq-update');
        Route::get('/faq/delete/{id}', [FaqController::class, 'destroy'])->name('admin-faq-delete');
        //------------ ADMIN FAQ SECTION ENDS ------------

        //------------ ADMIN PAGE SECTION ------------
        Route::get('/page/datatables', [PageController::class, 'datatables'])->name('admin-page-datatables'); // JSON REQUEST
        Route::get('/page', [PageController::class, 'index'])->name('admin-page-index');
        Route::get('/page/create', [PageController::class, 'create'])->name('admin-page-create');
        Route::post('/page/create', [PageController::class, 'store'])->name('admin-page-store');
        Route::get('/page/edit/{id}', [PageController::class, 'edit'])->name('admin-page-edit');
        Route::post('/page/update/{id}', [PageController::class, 'update'])->name('admin-page-update');
        Route::get('/page/delete/{id}', [PageController::class, 'destroy'])->name('admin-page-delete');
        Route::get('/page/header/{id1}/{id2}', [PageController::class, 'header'])->name('admin-page-header');
        Route::get('/page/footer/{id1}/{id2}', [PageController::class, 'footer'])->name('admin-page-footer');
        //------------ ADMIN PAGE SECTION ENDS------------

        Route::get('/general-settings/contact/{status}', [GeneralSettingController::class, 'iscontact'])->name('admin-gs-iscontact');
        Route::get('/general-settings/faq/{status}', [GeneralSettingController::class, 'isfaq'])->name('admin-gs-isfaq');
        Route::get('/page-settings/contact', [PageSettingController::class, 'contact'])->name('admin-ps-contact');
        Route::post('/page-settings/update/all', [PageSettingController::class, 'update'])->name('admin-ps-update');
    });

    //------------ ADMIN MENU PAGE SETTINGS SECTION ENDS ------------

    // ADMIN EMAIL SETTINGS SECTION
    Route::middleware('permissions:emails_settings')->group(function () {
        Route::get('/email-templates/datatables', [EmailController::class, 'datatables'])->name('admin-mail-datatables');
        Route::get('/email-templates', [EmailController::class, 'index'])->name('admin-mail-index');
        Route::get('/email-templates/{id}', [EmailController::class, 'edit'])->name('admin-mail-edit');
        Route::post('/email-templates/{id}', [EmailController::class, 'update'])->name('admin-mail-update');
        Route::get('/email-config', [EmailController::class, 'config'])->name('admin-mail-config');
        Route::get('/groupemail', [EmailController::class, 'groupemail'])->name('admin-group-show');
        Route::post('/groupemailpost', [EmailController::class, 'groupemailpost'])->name('admin-group-submit');
        Route::get('/issmtp/{status}', [GeneralSettingController::class, 'issmtp'])->name('admin-gs-issmtp');
    });

    // ADMIN PAYMENT SETTINGS SECTION
    Route::middleware('permissions:payment_settings')->group(function () {
        // Payment Informations
        Route::get('/payment-informations', [GeneralSettingController::class, 'paymentsinfo'])->name('admin-gs-payments');
        Route::get('/general-settings/guest/{status}', [GeneralSettingController::class, 'guest'])->name('admin-gs-guest');
        Route::get('/general-settings/paypal/{status}', [GeneralSettingController::class, 'paypal'])->name('admin-gs-paypal');
        Route::get('/general-settings/instamojo/{status}', [GeneralSettingController::class, 'instamojo'])->name('admin-gs-instamojo');
        Route::get('/general-settings/paystack/{status}', [GeneralSettingController::class, 'paystack'])->name('admin-gs-paystack');
        Route::get('/general-settings/stripe/{status}', [GeneralSettingController::class, 'stripe'])->name('admin-gs-stripe');
        Route::get('/general-settings/cod/{status}', [GeneralSettingController::class, 'cod'])->name('admin-gs-cod');
        Route::get('/general-settings/paytm/{status}', [GeneralSettingController::class, 'paytm'])->name('admin-gs-paytm');
        Route::get('/general-settings/molly/{status}', [GeneralSettingController::class, 'molly'])->name('admin-gs-molly');
        Route::get('/general-settings/razor/{status}', [GeneralSettingController::class, 'razor'])->name('admin-gs-razor');

        // Payment Gateways
        Route::get('/paymentgateway/datatables', [PaymentGatewayController::class, 'datatables'])->name('admin-payment-datatables'); // JSON REQUEST
        Route::get('/paymentgateway', [PaymentGatewayController::class, 'index'])->name('admin-payment-index');
        Route::get('/paymentgateway/create', [PaymentGatewayController::class, 'create'])->name('admin-payment-create');
        Route::post('/paymentgateway/create', [PaymentGatewayController::class, 'store'])->name('admin-payment-store');
        Route::get('/paymentgateway/edit/{id}', [PaymentGatewayController::class, 'edit'])->name('admin-payment-edit');
        Route::post('/paymentgateway/update/{id}', [PaymentGatewayController::class, 'update'])->name('admin-payment-update');
        Route::get('/paymentgateway/delete/{id}', [PaymentGatewayController::class, 'destroy'])->name('admin-payment-delete');
        Route::get('/paymentgateway/status/{id1}/{id2}', [PaymentGatewayController::class, 'status'])->name('admin-payment-status');

        // Currency Settings
        Route::get('/general-settings/currency/{status}', [GeneralSettingController::class, 'currency'])->name('admin-gs-iscurrency');
        Route::get('/currency/datatables', [CurrencyController::class, 'datatables'])->name('admin-currency-datatables'); // JSON REQUEST
        Route::get('/currency', [CurrencyController::class, 'index'])->name('admin-currency-index');
        Route::get('/currency/create', [CurrencyController::class, 'create'])->name('admin-currency-create');
        Route::post('/currency/create', [CurrencyController::class, 'store'])->name('admin-currency-store');
        Route::get('/currency/edit/{id}', [CurrencyController::class, 'edit'])->name('admin-currency-edit');
        Route::post('/currency/update/{id}', [CurrencyController::class, 'update'])->name('admin-currency-update');
        Route::get('/currency/delete/{id}', [CurrencyController::class, 'destroy'])->name('admin-currency-delete');
        Route::get('/currency/status/{id1}/{id2}', [CurrencyController::class, 'status'])->name('admin-currency-status');
    });

    Route::middleware(['permissions:social_settings'])->group(function () {
        Route::get('/social', [SocialSettingController::class, 'index'])->name('admin-social-index');
        Route::post('/social/update', [SocialSettingController::class, 'socialupdate'])->name('admin-social-update');
        Route::post('/social/update/all', [SocialSettingController::class, 'socialupdateall'])->name('admin-social-update-all');
        Route::get('/social/facebook', [SocialSettingController::class, 'facebook'])->name('admin-social-facebook');
        Route::get('/social/google', [SocialSettingController::class, 'google'])->name('admin-social-google');
        Route::get('/social/facebook/{status}', [SocialSettingController::class, 'facebookup'])->name('admin-social-facebookup');
        Route::get('/social/google/{status}', [SocialSettingController::class, 'googleup'])->name('admin-social-googleup');
    });
    //------------ ADMIN SOCIAL SETTINGS SECTION ENDS ------------

    Route::middleware(['permissions:language_settings'])->group(function () {

        // Multiple Language Section
        Route::get('/general-settings/language/{status}', [GeneralSettingController::class, 'language'])->name('admin-gs-islanguage');
        // Multiple Language Section Ends

        Route::get('/languages/datatables', [LanguageController::class, 'datatables'])->name('admin-lang-datatables'); // JSON REQUEST
        Route::get('/languages', [LanguageController::class, 'index'])->name('admin-lang-index');
        Route::get('/languages/create', [LanguageController::class, 'create'])->name('admin-lang-create');
        Route::get('/languages/edit/{id}', [LanguageController::class, 'edit'])->name('admin-lang-edit');
        Route::post('/languages/create', [LanguageController::class, 'store'])->name('admin-lang-store');
        Route::post('/languages/edit/{id}', [LanguageController::class, 'update'])->name('admin-lang-update');
        Route::get('/languages/status/{id1}/{id2}', [LanguageController::class, 'status'])->name('admin-lang-st');
        Route::get('/languages/delete/{id}', [LanguageController::class, 'destroy'])->name('admin-lang-delete');

        //------------ ADMIN PANEL LANGUAGE SETTINGS SECTION ------------
        Route::get('/adminlanguages/datatables', [AdminLanguageController::class, 'datatables'])->name('admin-tlang-datatables'); // JSON REQUEST
        Route::get('/adminlanguages', [AdminLanguageController::class, 'index'])->name('admin-tlang-index');
        Route::get('/adminlanguages/create', [AdminLanguageController::class, 'create'])->name('admin-tlang-create');
        Route::get('/adminlanguages/edit/{id}', [AdminLanguageController::class, 'edit'])->name('admin-tlang-edit');
        Route::post('/adminlanguages/create', [AdminLanguageController::class, 'store'])->name('admin-tlang-store');
        Route::post('/adminlanguages/edit/{id}', [AdminLanguageController::class, 'update'])->name('admin-tlang-update');
        Route::get('/adminlanguages/status/{id1}/{id2}', [AdminLanguageController::class, 'status'])->name('admin-tlang-st');
        Route::get('/adminlanguages/delete/{id}', [AdminLanguageController::class, 'destroy'])->name('admin-tlang-delete');

        //------------ ADMIN PANEL LANGUAGE SETTINGS SECTION ENDS ------------
    });

    //------------ ADMIN LANGUAGE SETTINGS SECTION ENDS ------------
    // ADMIN SEOTOOL SETTINGS SECTION
    Route::middleware('permissions:seo_tools')->group(function () {
        Route::get('/seotools/analytics', [SeoToolController::class, 'analytics'])->name('admin-seotool-analytics');
        Route::post('/seotools/analytics/update', [SeoToolController::class, 'analyticsupdate'])->name('admin-seotool-analytics-update');
        Route::get('/seotools/keywords', [SeoToolController::class, 'keywords'])->name('admin-seotool-keywords');
        Route::post('/seotools/keywords/update', [SeoToolController::class, 'keywordsupdate'])->name('admin-seotool-keywords-update');
        Route::get('/products/popular/{id}', [SeoToolController::class, 'popular'])->name('admin-prod-popular');
    });
    // ADMIN STAFF SECTION
    Route::middleware('permissions:manage_staffs')->group(function () {
        Route::get('/staff/datatables', [StaffController::class, 'datatables'])->name('admin-staff-datatables');
        Route::get('/staff', [StaffController::class, 'index'])->name('admin-staff-index');
        Route::get('/staff/create', [StaffController::class, 'create'])->name('admin-staff-create');
        Route::post('/staff/create', [StaffController::class, 'store'])->name('admin-staff-store');
        Route::get('/staff/edit/{id}', [StaffController::class, 'edit'])->name('admin-staff-edit');
        Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('admin-staff-update');
        Route::get('/staff/show/{id}', [StaffController::class, 'show'])->name('admin-staff-show');
        Route::get('/staff/delete/{id}', [StaffController::class, 'destroy'])->name('admin-staff-delete');
    });

    // ADMIN SUBSCRIBERS SECTION
    Route::middleware('permissions:subscribers')->group(function () {
        Route::get('/subscribers/datatables', [SubscriberController::class, 'datatables'])->name('admin-subs-datatables');
        Route::get('/subscribers', [SubscriberController::class, 'index'])->name('admin-subs-index');
        Route::get('/subscribers/download', [SubscriberController::class, 'download'])->name('admin-subs-download');
    });

    // GLOBAL ROUTES
    Route::post('/general-settings/update/all', [GeneralSettingController::class, 'generalupdate'])->name('admin-gs-update');
    Route::post('/general-settings/update/payment', [GeneralSettingController::class, 'generalupdatepayment'])->name('admin-gs-update-payment');

    // STATUS SECTION
    Route::get('/products/status/{id1}/{id2}', [ProductController::class, 'status'])->name('admin-prod-status');

    // FEATURE SECTION
    Route::get('/products/feature/{id}', [ProductController::class, 'feature'])->name('admin-prod-feature');
    Route::post('/products/feature/{id}', [ProductController::class, 'featuresubmit'])->name('admin-prod-feature');

    // GALLERY SECTION
    Route::get('/gallery/show', [GalleryController::class, 'show'])->name('admin-gallery-show');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('admin-gallery-store');
    Route::get('/gallery/delete', [GalleryController::class, 'destroy'])->name('admin-gallery-delete');

    // PAGE SETTINGS SECTION
    Route::post('/page-settings/update/all', [PageSettingController::class, 'update'])->name('admin-ps-update');
    Route::post('/page-settings/update/home', [PageSettingController::class, 'homeupdate'])->name('admin-ps-homeupdate');


    Route::group(['middleware' => ['permissions:super']], function () {

        Route::get('/cache/clear', function () {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            return redirect()->route('admin.dashboard')->with('cache', 'System Cache Has Been Removed.');
        })->name('admin-cache-clear');

        Route::get('/check/movescript', [DashboardController::class, 'movescript'])->name('admin-move-script');
        Route::get('/generate/backup', [DashboardController::class, 'generate_bkup'])->name('admin-generate-backup');
        Route::get('/activation', [DashboardController::class, 'activation'])->name('admin-activation-form');
        Route::post('/activation', [DashboardController::class, 'activation_submit'])->name('admin-activate-purchase');
        Route::get('/clear/backup', [DashboardController::class, 'clear_bkup'])->name('admin-clear-backup');

        // ------------ ROLE SECTION ----------------------

        Route::get('/role/datatables', [RoleController::class, 'datatables'])->name('admin-role-datatables');
        Route::get('/role', [RoleController::class, 'index'])->name('admin-role-index');
        Route::get('/role/create', [RoleController::class, 'create'])->name('admin-role-create');
        Route::post('/role/create', [RoleController::class, 'store'])->name('admin-role-store');
        Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('admin-role-edit');
        Route::post('/role/edit/{id}', [RoleController::class, 'update'])->name('admin-role-update');
        Route::get('/role/delete/{id}', [RoleController::class, 'destroy'])->name('admin-role-delete');

        // ------------ ROLE SECTION ENDS ----------------------

    });
});

// ************************************ ADMIN SECTION ENDS**********************************************
// ************************************ FRONT SECTION **********************************************
//Route::get('/', [FrontendController::class, 'index'])->name('front.index');

Route::get('/', function () {
    return view('website.users.registration');
});


Route::post('users/registration', [RegistrationController::class, 'register'])->name('users-registration');

Route::get('users/verification', [RegistrationController::class, 'verificationview']);

Route::get('users/login', [UserLoginController::class, 'usersloginview'])->name('users-login');

Route::post('users/otpverification', [RegistrationController::class, 'verifiedOtp'])->name('user-otpverification');

Route::post('users/otpresend', [RegistrationController::class, 'otpresend'])->name('user-otpresend');

Route::post('users/authlogin', [UserLoginController::class, 'usersauthlogin'])->name('users-auth-login');


Route::get('users/home', [FrontendController::class, 'index'])->name('users-home-view');

Route::get('product/detail/{id}', [FrontendController::class, 'homedetail'])->name('product-detail');

Route::get('product/cart', [CartController::class, 'cartview'])->name('product-cart');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');

Route::post('/cart/remove', [CartController::class, 'cartRemove'])->name('cart.remove');

Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/save-for-later', [CartController::class, 'saveForLater'])->name('cart.saveForLater');

Route::get('product/wishlist', [WishlistController::class, 'wishlistview'])->name('wishlist.view');

Route::post('/add-to-wishlist', [WishlistController::class, 'addToWishlist'])->name('add.to.wishlist');

Route::delete('/wishlist/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');



Route::get('product/checkout',[UserLoginController::class,'checkout'])->name('product-checkout');

Route::get('/product/list/{id}', [FrontendController::class, 'productlist'])->name('product-list');

Route::get('/products/sort', [FrontendController::class, 'sort'])->name('products.sort');

Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');





Route::get('/extras', [FrontendController::class, 'extraIndex'])->name('front.extraIndex');
Route::get('/currency/{id}', [FrontendController::class, 'currency'])->name('front.currency');
Route::get('/language/{id}', [FrontendController::class, 'language'])->name('front.language');


// FAQ SECTION
Route::get('/faq', [FrontendController::class, 'faq'])->name('front.faq');
// FAQ SECTION ENDS

// CONTACT SECTION
Route::get('/contact', [FrontendController::class, 'contact'])->name('front.contact');
Route::post('/contact', [FrontendController::class, 'contactemail'])->name('front.contact.submit');
Route::get('/contact/refresh_code', [FrontendController::class, 'refresh_code']);
// CONTACT SECTION  ENDS

// PRODCT AUTO SEARCH SECTION
Route::get('/autosearch/product/{slug}', [FrontendController::class, 'autosearch']);
// PRODCT AUTO SEARCH SECTION ENDS

// CATEGORY SECTION
Route::get('/category/{category?}/{subcategory?}/{childcategory?}', [CatalogController::class, 'category'])->name('front.category');
Route::get('/category/{slug1}/{slug2}', [CatalogController::class, 'subcategory'])->name('front.subcat');
Route::get('/category/{slug1}/{slug2}/{slug3}', [CatalogController::class, 'childcategory'])->name('front.childcat');
Route::get('/categories', [CatalogController::class, 'categories'])->name('front.categories');
Route::get('/childcategories/{slug}', [CatalogController::class, 'childcategories'])->name('front.childcategories');
// CATEGORY SECTION ENDS

// TAG SECTION
Route::get('/tag/{slug}', [CatalogController::class, 'tag'])->name('front.tag');
// TAG SECTION ENDS

// SEARCH SECTION
Route::get('/search', [CatalogController::class, 'search'])->name('front.search');
// SEARCH SECTION ENDS
// PRODUCT SECTION
Route::get('/item/{slug}', [CatalogController::class, 'product'])->name('front.product');
Route::get('/afbuy/{slug}', [CatalogController::class, 'affProductRedirect'])->name('affiliate.product');
Route::get('/item/quick/view/{id}', [CatalogController::class, 'quick'])->name('product.quick');
Route::post('/item/review', [CatalogController::class, 'reviewsubmit'])->name('front.review.submit');
Route::get('/item/view/review/{id}', [CatalogController::class, 'reviews'])->name('front.reviews');
// PRODUCT SECTION ENDS

// COMMENT SECTION
Route::post('/item/comment/store', [CatalogController::class, 'comment'])->name('product.comment');
Route::post('/item/comment/edit/{id}', [CatalogController::class, 'commentedit'])->name('product.comment.edit');
Route::get('/item/comment/delete/{id}', [CatalogController::class, 'commentdelete'])->name('product.comment.delete');
// COMMENT SECTION ENDS

// REPORT SECTION
Route::post('/item/report', [CatalogController::class, 'report'])->name('product.report');
// REPORT SECTION ENDS

// REPLY SECTION
Route::post('/item/reply/{id}', [CatalogController::class, 'reply'])->name('product.reply');
Route::post('/item/reply/edit/{id}', [CatalogController::class, 'replyedit'])->name('product.reply.edit');
Route::get('/item/reply/delete/{id}', [CatalogController::class, 'replydelete'])->name('product.reply.delete');
// REPLY SECTION ENDS



// TAG SECTION
Route::get('/search', [CatalogController::class, 'search'])->name('front.search');
// TAG SECTION ENDS

// VENDOR SECTION
Route::get('/store/{slug}', [VendorController::class, 'index'])->name('front.vendor');
Route::post('/vendor/contact', [VendorController::class, 'vendorcontact']);
// VENDOR SECTION ENDS

// CRONJOB
Route::get('/vendor/subscription/check', [FrontendController::class, 'subcheck']);
// CRONJOB ENDS

// PAGE SECTION
Route::get('/{slug}', [FrontendController::class, 'page'])->name('front.page');
// PAGE SECTION ENDS


Route::get('/my-profile', [NarendraController::class, 'narendraController'])->name('front.narendraController');
