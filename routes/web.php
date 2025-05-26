<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;


use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\BranchOrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\DesignMaterialController;
use App\Http\Controllers\DesignSampleController;

use App\Http\Controllers\EditSessionController;
use App\Http\Controllers\FactoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductKnowledgeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\ShootingProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WayOfShootingController;
use App\Http\Livewire\About;
use App\Http\Livewire\Accordion;
use App\Http\Livewire\AddProduct;
use App\Http\Livewire\Alerts;
use App\Http\Livewire\AvatarRadius;
use App\Http\Livewire\AvatarRound;
use App\Http\Livewire\AvatarSquare;
use App\Http\Livewire\Badge;
use App\Http\Livewire\Blog;
use App\Http\Livewire\BlogDetails;
use App\Http\Livewire\BlogPost;
use App\Http\Livewire\Breadcrumbs;
use App\Http\Livewire\Buttons;
use App\Http\Livewire\Calendar2;
use App\Http\Livewire\Calendar;
use App\Http\Livewire\Cards;
use App\Http\Livewire\Carousel;
use App\Http\Livewire\Cart;
use App\Http\Livewire\ChartChartist;
use App\Http\Livewire\ChartEchart;
use App\Http\Livewire\ChartFlot;
use App\Http\Livewire\ChartMorris;
use App\Http\Livewire\ChartNvd3;
use App\Http\Livewire\Chat;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Colors;
use App\Http\Livewire\Construction;
use App\Http\Livewire\Counters;
use App\Http\Livewire\CryptoCurrencies;
use App\Http\Livewire\Datatable;
use App\Http\Livewire\Dropdown;
use App\Http\Livewire\EmailCompose;
use App\Http\Livewire\EmailInbox;
use App\Http\Livewire\EmailRead;
use App\Http\Livewire\EmptyPage;
use App\Http\Livewire\Error400;
use App\Http\Livewire\Error401;
use App\Http\Livewire\Error403;
use App\Http\Livewire\Error404;
use App\Http\Livewire\Error500;
use App\Http\Livewire\Error503;
use App\Http\Livewire\Faq;
use App\Http\Livewire\FileAttachments;
use App\Http\Livewire\Filemanager;
use App\Http\Livewire\FilemanagerDetails;
use App\Http\Livewire\FilemanagerList;
use App\Http\Livewire\Footers;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\FormAdvanced;
use App\Http\Livewire\FormEditor;
use App\Http\Livewire\FormElements;
use App\Http\Livewire\FormLayouts;
use App\Http\Livewire\FormValidation;
use App\Http\Livewire\FormWizard;
use App\Http\Livewire\Gallery;
use App\Http\Livewire\Icons10;
use App\Http\Livewire\Icons11;
use App\Http\Livewire\Icons2;
use App\Http\Livewire\Icons3;
use App\Http\Livewire\Icons4;
use App\Http\Livewire\Icons5;
use App\Http\Livewire\Icons6;
use App\Http\Livewire\Icons7;
use App\Http\Livewire\Icons8;
use App\Http\Livewire\Icons9;
use App\Http\Livewire\Icons;
use App\Http\Livewire\Index2;
use App\Http\Livewire\Index3;
use App\Http\Livewire\Index4;
use App\Http\Livewire\Index5;
use App\Http\Livewire\Index;
use App\Http\Livewire\Invoice;
use App\Http\Livewire\Listgroup;
use App\Http\Livewire\Loaders;
use App\Http\Livewire\Lockscreen;
use App\Http\Livewire\Login;
use App\Http\Livewire\Maps1;
use App\Http\Livewire\Maps2;
use App\Http\Livewire\Maps;
use App\Http\Livewire\Mediaobject;
use App\Http\Livewire\Modal;
use App\Http\Livewire\Navigation;
use App\Http\Livewire\Notify;
use App\Http\Livewire\NotifyList;
use App\Http\Livewire\Offcanvas;
use App\Http\Livewire\Pagination;
use App\Http\Livewire\Pricing;
use App\Http\Livewire\ProductDetails;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Progress;
use App\Http\Livewire\Rangeslider;
use App\Http\Livewire\Rating;
use App\Http\Livewire\Register;
use App\Http\Livewire\Scroll;
use App\Http\Livewire\Scrollspy;
use App\Http\Livewire\Search;
use App\Http\Livewire\Services;
use App\Http\Livewire\Settings;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Sweetalert;
use App\Http\Livewire\Switcher;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Tabs;
use App\Http\Livewire\Tags;
use App\Http\Livewire\Terms;
use App\Http\Livewire\Thumbnails;
use App\Http\Livewire\TimeLine;
use App\Http\Livewire\Toast;
use App\Http\Livewire\Tooltipandpopover;
use App\Http\Livewire\Treeview;
use App\Http\Livewire\Typography;
use App\Http\Livewire\UsersList;
use App\Http\Livewire\Widgets;
use App\Http\Livewire\Wishlist;
use App\Models\ProductColorVariantMaterial;
use App\Models\User;
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

Route::get('login', Login::class);
Route::post('login', [AuthenticatedSessionController::class, 'store']);


Route::middleware('auth')->group(function () {
    // Route::get('/', function () {
    //     return view('livewire.index');
    // })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');





    Route::get('/product-knowledge/upload-master-sheet', [ProductKnowledgeController::class, 'uploadForm'])
        ->name('product-knowledge.upload');

    Route::post('/product-knowledge/upload-master-sheet', [ProductKnowledgeController::class, 'uploadSave'])
        ->name('product-knowledge.upload.save');

    Route::get('/product-knowledge/upload/report', function () {
        return view('product_knowledge.upload-report');
    })->name('product-knowledge.upload.report');


    Route::get('/product-knowledge/lists', [ProductKnowledgeController::class, 'productList'])->name('product-knowledge.lists');
    Route::post('/product-knowledge/update-quantity/{id}', [ProductKnowledgeController::class, 'updateQuantity']);

    Route::get('product-knowledge/stock/upload', [ProductKnowledgeController::class, 'showStockUpload'])->name('product-knowledge.stock.upload');
    Route::post('product-knowledge/stock/upload', [ProductKnowledgeController::class, 'handleStockUpload'])->name('product-knowledge.stock.upload.save');


    Route::get('/product-knowledge', [ProductKnowledgeController::class, 'index'])->name('product-knowledge.index');
    Route::get('/product-knowledge/{category}', [ProductKnowledgeController::class, 'subcategories'])->name('product-knowledge.subcategories');
    Route::get('/product-knowledge/subcategory/{subcategory}', [ProductKnowledgeController::class, 'products'])->name('product-knowledge.products');
    Route::post('/product-knowledge/upload-missing-images', [ProductKnowledgeController::class, 'uploadMissingImages'])
        ->name('product-knowledge.upload-missing-images');


    Route::get('/branch-orders', [BranchOrderController::class, 'index'])->name('branch.orders.index');
    Route::post('/branch-orders/create', [BranchOrderController::class, 'create'])->name('branch.orders.create');
    Route::post('/branch-orders/close', [BranchOrderController::class, 'close'])->name('branch.orders.close');
    Route::get('/branch-orders/products/{subcategoryId}', [BranchOrderController::class, 'products'])->name('branch.order.products');
    Route::get('/branch-orders/categories', [BranchOrderController::class, 'categories'])->name('branch.order.categories');
    Route::get('/branch-orders/categories/{category}/subcategories', [BranchOrderController::class, 'subcategories'])->name('branch.order.subcategories');
    Route::post('/branch-orders/save-items', [BranchOrderController::class, 'saveItems'])->name('branch.orders.save.items');
    Route::get('/branch-orders/admin', [BranchOrderController::class, 'adminOrders'])->name('branch.orders.admin');
    Route::get('/branch-orders/my', [BranchOrderController::class, 'myOrders'])->name('branch.orders.my');
    Route::post('/branch-orders/prepare/{order}', [BranchOrderController::class, 'prepareOrder'])->name('branch.orders.prepare');
    Route::get('/orders/close/{order}', [BranchOrderController::class, 'closePage'])->name('branch.orders.close.page');
    Route::post('/orders/close/submit', [BranchOrderController::class, 'closeWithNote'])->name('branch.orders.close.with.note');
    Route::get('/branch/orders/{order}', [BranchOrderController::class, 'showOrder'])->name('branch.orders.show');


    Route::resource('design-materials', DesignMaterialController::class);
    // حذف لون مفرد من الخامة أثناء التعديل (AJAX)
    Route::delete('design-materials/colors/{id}', [DesignMaterialController::class, 'deleteColor'])->name('design-materials.colors.destroy');
    Route::resource('design-sample-products', DesignSampleController::class);
    Route::post('design-sample-products/{id}/attach-materials', [DesignSampleController::class, 'attachMaterials'])->name('design-sample-products.attach-materials');
    Route::post('design-sample-products/{id}/assign-patternest', [DesignSampleController::class, 'assignPatternest'])->name('design-sample-products.assign-patternest');
    Route::post('design-sample-products/{id}/add-marker', [DesignSampleController::class, 'addMarker'])->name('design-sample-products.add-marker');
    Route::post('design-sample-products/{id}/review', [DesignSampleController::class, 'reviewSample'])->name('design-sample-products.review');
    Route::post('design-sample-products/{id}/add-technical-sheet', [DesignSampleController::class, 'addTechnicalSheet'])->name('design-sample-products.add-technical-sheet');

    Route::post('/design-sample-products/{sample}/comments', [DesignSampleController::class, 'addComment'])
        ->name('design-sample-products.add-comment');


    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('seasons', SeasonController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('factories', FactoryController::class);
    Route::delete('/product-color/{id}', [ProductController::class, 'deleteProductColor'])->name('product-color.delete');
    Route::get('/products/{product}/receive', [ProductController::class, 'receive'])->name('products.receive');
    Route::get('/products/{id}/manufacture', [ProductController::class, 'manufacture'])->name('products.manufacture');
    Route::post('/products/{product}/manufacture', [ProductController::class, 'update_manufacture'])->name('products.update.manufacture');
    Route::post('/products/variants/update-status', [ProductController::class, 'updateStatus']);

    Route::post('/products/{product}/receive', [ProductController::class, 'submitReceive'])->name('products.submitReceive');
    Route::post('/products/{product}/cancel', [ProductController::class, 'cancel'])->name('products.cancel');
    Route::post('/products/{product}/renew', [ProductController::class, 'renew'])->name('products.renew');
    Route::get('/products/{product}/complete-data', [ProductController::class, 'completeData'])->name('products.completeData');
    Route::post('/products/{product}/submit-complete-data', [ProductController::class, 'submitCompleteData'])->name('products.submitCompleteData');
    Route::post('/products/variants/reschedule', [ProductController::class, 'reschedule'])->name('products.reschedule');
    Route::post('/products/variants/update-receiving', [ProductController::class, 'updateReceivingQuantity'])->name('products.variants.updateReceiving');
    Route::post('/products/variants/mark-received', [ProductController::class, 'markReceived'])->name('variants.markReceived');
    Route::get('/receiving-report', [ReportController::class, 'index'])->name('reports.receive');
    Route::get('/reports/products-status', [ReportController::class, 'productStatusReportForSeason'])->name('reports.productStatusForSeason');
    Route::get('/reports/categories-status', [ReportController::class, 'categoryStatusReport'])->name('reports.categoryStatus');

    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('materials', MaterialController::class);

    Route::get('roles/{role}/permissions', [RoleController::class, 'editPermissions'])->name('roles.permissions');
    Route::post('roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.updatePermissions');

    Route::get('/products/{id}/history', [ProductController::class, 'history'])->name('products.history');

    Route::post('/products/{product}/bulk-manufacture', [ProductController::class, 'bulkManufacture'])
        ->name('products.update.bulk-manufacture');

    Route::post('/products/assign-materials', [ProductController::class, 'assignMaterials'])->name('products.assign.materials');
    Route::get('/products/get-materials/{variant_id}', [ProductController::class, 'getMaterials']);
    Route::delete('/delete-material/{id}', [ProductController::class, 'deleteMaterial']);


    Route::resource('shooting-products', ShootingProductController::class);
    Route::post('/shooting-products/start', [ShootingProductController::class, 'startShooting'])
        ->name('shooting-products.start');
    Route::post('/shooting-sessions/update-drive-link', [ShootingProductController::class, 'updateDriveLink'])
        ->name('shooting-sessions.updateDriveLink');
    Route::get('/shooting-product/manual', [ShootingProductController::class, 'manual'])->name('shooting-products.manual');
    Route::post('/shooting-product/manual/save', [ShootingProductController::class, 'manualSave'])->name('shooting-products.manual.save');
    Route::post('/shooting-products/manual/find-color', [ShootingProductController::class, 'findColorByCode'])->name('shooting-products.manual.findColor');
    Route::post('/shooting-products/save-size-weight', [ShootingProductController::class, 'saveSizeWeight'])
        ->name('shooting-products.save-size-weight');



    Route::get('shooting-products/{id}/complete', [ShootingProductController::class, 'completePage'])->name('shooting-products.complete.page');
    Route::post('shooting-products/{id}/complete', [ShootingProductController::class, 'saveCompleteData'])->name('shooting-products.complete.save');
    Route::post('/shooting-gallery/delete', [ShootingProductController::class, 'deleteGallery'])->name('gallery.delete');
    Route::get('/shooting-deliveries', [ShootingProductController::class, 'deliveryIndex'])->name('shooting-deliveries.index');
    Route::get('/shooting-deliveries/{id}', [ShootingProductController::class, 'showDelivery'])->name('shooting-deliveries.show');
    Route::get('/shooting-deliveries/upload/create', [ShootingProductController::class, 'deliveryUploadForm'])->name('shooting-deliveries.upload.create');
    Route::post('/shooting-deliveries/upload', [ShootingProductController::class, 'deliveryUpload'])->name('shooting-deliveries.upload.save');
    Route::get('/shooting-deliveries/send/{id}', [ShootingProductController::class, 'sendPage'])->name('shooting-deliveries.send.page');
    Route::post('/shooting-deliveries/send/{id}', [ShootingProductController::class, 'sendSave'])->name('shooting-deliveries.send.save');
    Route::post('/shooting-products/multi-start/page', [ShootingProductController::class, 'multiStartPage'])
        ->name('shooting-products.multi.start.page');
    Route::post('/shooting-products/multi-start/save', [ShootingProductController::class, 'multiStartSave'])
        ->name('shooting-products.multi.start.save');
    Route::post('/ready-to-shoot/refresh-variants', [ShootingProductController::class, 'refreshVariants'])->name('ready-to-shoot.refresh-variants');

    Route::get('/ready-to-shoot', [ShootingProductController::class, 'readyToShootIndex'])->name('ready-to-shoot.index');
    Route::post('/ready-to-shoot/assign-type', [ShootingProductController::class, 'assignType'])->name('ready-to-shoot.assign-type');
    Route::post('/ready-to-shoot/bulk-assign-type', [ShootingProductController::class, 'bulkAssignType'])->name('ready-to-shoot.bulk-assign-type');
    Route::get('/ways-of-shooting', [WayOfShootingController::class, 'index'])->name('ways-of-shooting.index');
    Route::post('/ways-of-shooting', [WayOfShootingController::class, 'store'])->name('ways-of-shooting.store');
    Route::put('/ways-of-shooting/{id}', [WayOfShootingController::class, 'update'])->name('ways-of-shooting.update');
    Route::delete('/ways-of-shooting/{id}', [WayOfShootingController::class, 'destroy'])->name('ways-of-shooting.destroy');



    Route::get('/shooting-sessions', [ShootingProductController::class, 'shootingSessions'])->name('shooting-sessions.index');
    Route::get('/shooting-sessions/{reference}', [ShootingProductController::class, 'showShootingSession'])->name('shooting-sessions.show');
    Route::post('/shooting-products/review', [ShootingProductController::class, 'markReviewed'])->name('shooting-products.review');
    Route::delete('shooting-sessions/{session}/remove-color', [ShootingProductController::class, 'removeColor'])->name('shooting-sessions.remove-color');

    Route::get('/edit-sessions', [EditSessionController::class, 'index'])->name('edit-sessions.index');
    Route::post('/edit-sessions/assign-editor', [EditSessionController::class, 'assignEditor'])->name('edit-sessions.assign-editor');
    Route::post('/edit-sessions/upload-drive-link', [EditSessionController::class, 'uploadDriveLink'])->name('edit-sessions.upload-drive-link');
    // Route::post('/edit-sessions/review', [EditSessionController::class, 'markReviewed'])->name('edit-sessions.review');
    Route::post('/edit-sessions/bulk-assign', [EditSessionController::class, 'bulkAssign'])->name('edit-sessions.bulk-assign');



    Route::get('website-admin', [ShootingProductController::class, 'indexWebsite'])->name('website-admin.index');
    Route::post('website-admin/update-status', [ShootingProductController::class, 'updateWebsiteStatus'])->name('website-admin.update-status');
    Route::post('website-admin/reopen', [ShootingProductController::class, 'reopenWebsiteProduct'])->name('website-admin.reopen');

    Route::get('social-media', [ShootingProductController::class, 'indexSocial'])->name('social-media.index');
    Route::post('social-media/publish', [ShootingProductController::class, 'publishSocial'])->name('social-media.publish');
    Route::post('social-media/reopen', [ShootingProductController::class, 'reopenSocial'])->name('social-media.reopen');
    Route::post('social-media/reopen', [ShootingProductController::class, 'reopenSocial'])->name('social-media.reopen');
    Route::get('/social-media/calendar', [ShootingProductController::class, 'calendar'])->name('social-media.calendar');




    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::get('/', Index::class)->name('dashboard');
    Route::get('index2', Index2::class);
    Route::get('index3', Index3::class);
    Route::get('index4', Index4::class);
    Route::get('index5', Index5::class);
    Route::get('about', About::class);
    Route::get('accordion', Accordion::class);
    Route::get('add-product', AddProduct::class);
    Route::get('alerts', Alerts::class);
    Route::get('avatar-radius', AvatarRadius::class);
    Route::get('avatar-round', AvatarRound::class);
    Route::get('avatar-square', AvatarSquare::class);
    Route::get('badge', Badge::class);
    Route::get('blog', Blog::class);
    Route::get('blog-details', BlogDetails::class);
    Route::get('blog-post', BlogPost::class);
    Route::get('breadcrumbs', Breadcrumbs::class);
    Route::get('buttons', Buttons::class);
    Route::get('calendar', Calendar::class);
    Route::get('calendar2', Calendar2::class);
    Route::get('cards', Cards::class);
    Route::get('carousel', Carousel::class);
    Route::get('cart', Cart::class);
    Route::get('chart-chartist', ChartChartist::class);
    Route::get('chart-echart', ChartEchart::class);
    Route::get('chart-flot', ChartFlot::class);
    Route::get('chart-morris', ChartMorris::class);
    Route::get('chart-nvd3', ChartNvd3::class);
    Route::get('chat', Chat::class);
    Route::get('checkout', Checkout::class);
    // Route::get('colors', Colors::class);
    Route::get('construction', Construction::class);
    Route::get('counters', Counters::class);
    Route::get('crypto-currencies', CryptoCurrencies::class);
    Route::get('datatable', Datatable::class);
    Route::get('dropdown', Dropdown::class);
    Route::get('email-compose', EmailCompose::class);
    Route::get('email-inbox', EmailInbox::class);
    Route::get('email-read', EmailRead::class);
    Route::get('empty-page', EmptyPage::class);
    Route::get('error400', Error400::class);
    Route::get('error401', Error401::class);
    Route::get('error403', Error403::class);
    Route::get('error404', Error404::class);
    Route::get('error500', Error500::class);
    Route::get('error503', Error503::class);
    Route::get('faq', Faq::class);
    Route::get('file-attachments', FileAttachments::class);
    Route::get('filemanager-details', FilemanagerDetails::class);
    Route::get('filemanager-list', FilemanagerList::class);
    Route::get('filemanager', Filemanager::class);
    Route::get('footers', Footers::class);
    Route::get('form-advanced', FormAdvanced::class);
    Route::get('form-editor', FormEditor::class);
    Route::get('form-elements', FormElements::class);
    Route::get('form-layouts', FormLayouts::class);
    Route::get('form-validation', FormValidation::class);
    Route::get('form-wizard', FormWizard::class);
    Route::get('gallery', Gallery::class);
    Route::get('icons', Icons::class);
    Route::get('icons2', Icons2::class);
    Route::get('icons3', Icons3::class);
    Route::get('icons4', Icons4::class);
    Route::get('icons5', Icons5::class);
    Route::get('icons6', Icons6::class);
    Route::get('icons7', Icons7::class);
    Route::get('icons8', Icons8::class);
    Route::get('icons9', Icons9::class);
    Route::get('icons10', Icons10::class);
    Route::get('icons11', Icons11::class);
    Route::get('invoice', Invoice::class);
    Route::get('listgroup', Listgroup::class);
    Route::get('loaders', Loaders::class);
    Route::get('lockscreen', Lockscreen::class);
    Route::get('maps', Maps::class);
    Route::get('maps1', Maps1::class);
    Route::get('maps2', Maps2::class);
    Route::get('mediaobject', Mediaobject::class);
    Route::get('modal', Modal::class);
    Route::get('navigation', Navigation::class);
    Route::get('notify', Notify::class);
    Route::get('notify-list', NotifyList::class);
    Route::get('offcanvas', Offcanvas::class);
    Route::get('pagination', Pagination::class);
    Route::get('pricing', Pricing::class);
    Route::get('product-details', ProductDetails::class);
    /* Route::get('profile', Profile::class); */
    Route::get('progress', Progress::class);
    Route::get('rangeslider', Rangeslider::class);
    Route::get('rating', Rating::class);
    Route::get('scroll', Scroll::class);
    Route::get('scrollspy', Scrollspy::class);
    Route::get('search', Search::class);
    Route::get('services', Services::class);
    Route::get('settings', Settings::class);
    Route::get('shop', Shop::class);
    Route::get('sweetalert', Sweetalert::class);
    Route::get('switcher', Switcher::class);
    Route::get('tables', Tables::class);
    Route::get('tabs', Tabs::class);
    /* Route::get('tags', Tags::class); */
    Route::get('terms', Terms::class);
    Route::get('thumbnails', Thumbnails::class);
    Route::get('time-line', TimeLine::class);
    Route::get('toast', Toast::class);
    Route::get('tooltipandpopover', Tooltipandpopover::class);
    Route::get('treeview', Treeview::class);
    Route::get('typography', Typography::class);
    Route::get('users-list', UsersList::class);
    Route::get('widgets', Widgets::class);
    Route::get('wishlist', Wishlist::class);
});
