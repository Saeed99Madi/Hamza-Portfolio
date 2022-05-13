<?php

use App\Http\Controllers\admin\MemberController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

use App\Http\Controllers\ExportExcelController;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\ClientHomeController;

use App\Http\Controllers\AuthClient\AuthClientController;

use App\Http\Controllers\Client\ProfileController;

use App\Http\Controllers\Client\ApplicationController;

use App\Http\Controllers\Client\BeneficiaryController;

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\ArticleController;

use App\Http\Controllers\Admin\StaticPageController;

use App\Http\Controllers\Admin\MenuController;

use App\Http\Controllers\Admin\ProjectTypeController;

use App\Http\Controllers\Admin\ProjectController;

use App\Http\Controllers\SiteController;

use App\Http\Controllers\Admin\ContactController;

use App\Http\Controllers\Admin\SettingController;

use App\Http\Controllers\Admin\OrderController;

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

//Route::get('/', [AuthClientController::class, 'index'])->name('client.login');

//said

Route::get('/checkout',[CheckoutController::class, 'index'])->name('checkout');

Route::put('/checkout',[CheckoutController::class,'placeOrder'])->name('checkout.post');


//endSaid
Route::get('/', [SiteController::class, 'index'])->name('home.index');

Route::get('/getimg/{id?}/{type?}', [SiteController::class, 'getimg'])->name('home.index.project.getimg');
Route::get('/project/{id?}', [SiteController::class, 'project'])->name('home.project');
Route::get('/type/{id?}', [SiteController::class, 'type'])->name('home.type');
Route::get('/page/{id?}', [SiteController::class, 'page'])->name('home.page');
Route::post('/contact', [SiteController::class, 'contact'])->name('home.contact');
Route::get('/search', [SiteController::class, 'search'])->name('home.search');
Route::get('/logo/{type?}', [SiteController::class, 'logo'])->name('home.logo');

Route::post('/loadImage', [SiteController::class, 'loadImage'])->name('home.loadImage');


Auth::routes();

Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');


Route::get('/user/create', [UserController::class, 'create'])->name('user-create');

Route::post('/user/create', [UserController::class, 'store'])->name('user-store');

Route::get('/user/view', [UserController::class, 'view'])->name('user-view');

Route::get('/user/get-data', [UserController::class, 'user_get_data'])->name('user-get-data');

Route::get('/user/permission/{id?}', [UserController::class, 'user_permission'])->name('user-permission');

Route::post('/user/permission', [UserController::class, 'user_permission_store'])->name('user-permission-store');

Route::post('/user/active', [UserController::class, 'user_active'])->name('user-active');

Route::get('/user/update/{id?}', [UserController::class, 'user_update'])->name('user-update');

Route::post('/user/update', [UserController::class, 'user_update_store'])->name('user-update-store');

Route::get('/user/role/{id?}', [UserController::class, 'user_role_view'])->name('user_role_view');

Route::post('/user/role', [UserController::class, 'user_role_store'])->name('user-role-store');

Route::get('/user/changepassword', [UserController::class, 'changepassword'])->name('changepassword');
Route::post('/user/changepassword', [UserController::class, 'changepasswordFun'])->name('changepassword');

Route::get('/role/view', [RoleController::class, 'view'])->name('role-view');

Route::get('/role/get-data', [RoleController::class, 'role_get_data'])->name('role-get-data');

Route::get('/role/permission/{id?}', [RoleController::class, 'role_permission'])->name('role-permission');

Route::post('/role/permission', [RoleController::class, 'role_permission_store'])->name('role-permission-store');



Route::get('/admin/login', [AuthController::class, 'index'])->name('admin.login');
Route::post('/admin/post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('/admin/no-access', [HomeController::class, 'no_access'])->name('admin-no-access');




Route::get('/client/home2', [ProfileController::class, 'index2'])->name('client.home2');

Route::get('/client/home', [ClientHomeController::class, 'index'])->name('client.home');

Route::get('/client/profile', [ProfileController::class, 'index'])->name('client.profile');
Route::post('/client/profile', [ProfileController::class, 'store'])->name('client.profile');


Route::get('/client/application/add', [ApplicationController::class, 'index'])->name('client.application.add');
Route::post('/client/application/add', [ApplicationController::class, 'store'])->name('client.application.add');

Route::get('/client/application/view', [ApplicationController::class, 'view'])->name('application.view');
Route::get('/client/application/view/ajax', [ApplicationController::class, 'ajax'])->name('application.view.ajax');

Route::get('/client/application/pdf/page4/{id?}', [ApplicationController::class, 'page4'])->name('application.pdf.page4');



Route::get('clientlogin', [AuthClientController::class, 'index'])->name('client.login');
Route::post('clientpostlogin', [AuthClientController::class, 'postLogin'])->name('client.login.post');
Route::get('/client/logout', [AuthClientController::class, 'logout'])->name('client.logout');
Route::get('clientsignup', [AuthClientController::class, 'signup'])->name('client.signup');
Route::post('client-post-signup', [AuthClientController::class, 'postSignup'])->name('client.signup.post');
Route::get('/client/no-access', [ClientHomeController::class, 'no_access'])->name('client-no-access');

Route::get('account/verify/{token}', [AuthClientController::class, 'verifyAccount'])->name('client.verify');




Route::get('/excel', [ExportExcelController::class, 'excel'])->name('excel');


Route::get('/client/beneficiary', [BeneficiaryController::class, 'upload'])->name('client.beneficiary');
Route::post('/beneficiary/upload', [BeneficiaryController::class, 'postUploadCsv'])->name('client.beneficiary.upload');

Route::get('/client/beneficiary/upload/edit', [BeneficiaryController::class, 'uploadEdit'])->name('client.beneficiary.upload.edit');
Route::post('/client/beneficiary/upload/edit', [BeneficiaryController::class, 'postUploadEditCsv'])->name('client.beneficiary.upload.edit');

Route::get('/client/beneficiary/upload/download', [BeneficiaryController::class, 'getDownload'])->name('client.beneficiary.upload.download');
Route::get('/client/beneficiary/upload/download2', [BeneficiaryController::class, 'getDownload2'])->name('client.beneficiary.upload.download2');
Route::get('/client/beneficiary/upload/download3', [BeneficiaryController::class, 'getDownload3'])->name('client.beneficiary.upload.download3');

Route::get('/client/beneficiary/export', [BeneficiaryController::class, 'export'])->name('client.beneficiary.export');

Route::get('/client/beneficiary/view', [BeneficiaryController::class, 'view'])->name('beneficiary.view');
Route::get('/client/beneficiary/view/ajax', [BeneficiaryController::class, 'ajax'])->name('beneficiary.view.ajax');

Route::get('/client/beneficiary/create', [BeneficiaryController::class, 'create'])->name('client.beneficiary.create');
Route::post('/client/beneficiary/create', [BeneficiaryController::class, 'createPost'])->name('client.beneficiary.create');

Route::get('/client/beneficiary/edit/{id?}', [BeneficiaryController::class, 'edit'])->name('client.beneficiary.edit');
Route::post('/client/beneficiary/edit/{id?}', [BeneficiaryController::class, 'editPost'])->name('client.beneficiary.edit');

Route::get('/client/beneficiary/postCheckViewCsv', [BeneficiaryController::class, 'postCheckViewCsv'])->name('client.beneficiary.postCheckViewCsv');
Route::post('/client/beneficiary/postCheckCsv', [BeneficiaryController::class, 'postCheckCsv'])->name('client.beneficiary.postCheckCsv');


Route::get('/client/beneficiary/view/typeahead', [BeneficiaryController::class, 'typeahead'])->name('client.beneficiary.view.typeahead');

Route::get('/report', [ClientHomeController::class, 'report'])->name('report');

Route::get('/pdf', [ClientHomeController::class, 'pdf'])->name('pdf');

Route::get('/pdf2', [ClientHomeController::class, 'pdf2'])->name('pdf');

Route::get('/user/testpdf', [UserController::class, 'test_pdf'])->name('user-test-pdf');

Route::get('/pdf/{id}', [ClientHomeController::class, 'pdf4'])->name('pdf4');




Route::get('/admin/category/add', [CategoryController::class, 'add'])->name('admin.category.add');
Route::post('/admin/category/add', [CategoryController::class, 'addpost'])->name('admin.category.add');

Route::get('/admin/category/edit/{id?}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('/admin/category/edit/{id?}', [CategoryController::class, 'editpost'])->name('admin.category.edit');

Route::get('/admin/category/index', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/category/index/ajax', [CategoryController::class, 'ajax'])->name('admin.category.index.ajax');

Route::post('/admin/category/active', [CategoryController::class, 'cat_active'])->name('cat-active');




Route::get('/admin/article/add', [ArticleController::class, 'add'])->name('admin.article.add');
Route::post('/admin/article/add', [ArticleController::class, 'addpost'])->name('admin.article.add');

Route::get('/admin/article/edit/{id?}', [ArticleController::class, 'edit'])->name('admin.article.edit');
Route::post('/admin/article/edit/{id?}', [ArticleController::class, 'editpost'])->name('admin.article.edit');

Route::get('/admin/article/index', [ArticleController::class, 'index'])->name('admin.article.index');
Route::get('/admin/article/index/ajax', [ArticleController::class, 'ajax'])->name('admin.article.index.ajax');

Route::post('/admin/article/active', [ArticleController::class, 'tbl_active'])->name('art-active');
Route::get('/admin/article/getimg/{id?}', [ArticleController::class, 'getimg'])->name('admin.article.getimg');






Route::get('/admin/staticpage/add', [StaticPageController::class, 'add'])->name('admin.staticpage.add');
Route::post('/admin/staticpage/add', [StaticPageController::class, 'addpost'])->name('admin.staticpage.add');

Route::get('/admin/staticpage/edit/{id?}', [StaticPageController::class, 'edit'])->name('admin.staticpage.edit');
Route::post('/admin/staticpage/edit/{id?}', [StaticPageController::class, 'editpost'])->name('admin.staticpage.edit');

Route::get('/admin/staticpage/index', [StaticPageController::class, 'index'])->name('admin.staticpage.index');
Route::get('/admin/staticpage/index/ajax', [StaticPageController::class, 'ajax'])->name('admin.staticpage.index.ajax');

Route::post('/admin/staticpage/active', [StaticPageController::class, 'tbl_active'])->name('staticpage-active');
Route::get('/admin/staticpage/getimg/{id?}', [StaticPageController::class, 'getimg'])->name('admin.staticpage.getimg');




Route::get('/admin/menu/add', [MenuController::class, 'add'])->name('admin.menu.add');
Route::post('/admin/menu/add', [MenuController::class, 'addpost'])->name('admin.menu.add');

Route::get('/admin/menu/edit/{id?}', [MenuController::class, 'edit'])->name('admin.menu.edit');
Route::post('/admin/menu/edit/{id?}', [MenuController::class, 'editpost'])->name('admin.menu.edit');

Route::get('/admin/menu/index', [MenuController::class, 'index'])->name('admin.menu.index');
Route::get('/admin/menu/index/ajax', [MenuController::class, 'ajax'])->name('admin.menu.index.ajax');

Route::post('/admin/menu/active', [MenuController::class, 'tbl_active'])->name('menu-active');




Route::get('/admin/projecttype/add', [ProjectTypeController::class, 'add'])->name('admin.projecttype.add');
Route::post('/admin/projecttype/add', [ProjectTypeController::class, 'addpost'])->name('admin.projecttype.add');

Route::get('/admin/projecttype/edit/{id?}', [ProjectTypeController::class, 'edit'])->name('admin.projecttype.edit');
Route::post('/admin/projecttype/edit/{id?}', [ProjectTypeController::class, 'editpost'])->name('admin.projecttype.edit');

Route::get('/admin/projecttype/index', [ProjectTypeController::class, 'index'])->name('admin.projecttype.index');
Route::get('/admin/projecttype/index/ajax', [ProjectTypeController::class, 'ajax'])->name('admin.projecttype.index.ajax');

Route::post('/admin/projecttype/active', [ProjectTypeController::class, 'projecttype_active'])->name('projecttype-active');



Route::get('/admin/project/add', [ProjectController::class, 'add'])->name('admin.project.add');
Route::post('/admin/project/add', [ProjectController::class, 'addpost'])->name('admin.project.add');

Route::get('/admin/project/edit/{id?}', [ProjectController::class, 'edit'])->name('admin.project.edit');
Route::post('/admin/project/edit/{id?}', [ProjectController::class, 'editpost'])->name('admin.project.edit');

Route::get('/admin/project/index', [ProjectController::class, 'index'])->name('admin.project.index');
Route::get('/admin/project/index/ajax', [ProjectController::class, 'ajax'])->name('admin.project.index.ajax');

Route::post('/admin/project/active', [ProjectController::class, 'project_active'])->name('project-active');
Route::get('/admin/project/getimg/{id?}/{type?}', [ProjectController::class, 'getimg'])->name('admin.project.getimg');



Route::get('/admin/service/add', [ServiceController::class, 'add'])->name('admin.service.add');
Route::post('/admin/service/add', [ServiceController::class, 'addpost'])->name('admin.service.add');

Route::get('/admin/service/edit/{id?}', [ServiceController::class, 'edit'])->name('admin.service.edit');
Route::post('/admin/service/edit/{id?}', [ServiceController::class, 'editpost'])->name('admin.service.edit');

Route::get('/admin/service/index', [ServiceController::class, 'index'])->name('admin.service.index');
Route::get('/admin/service/index/ajax', [ServiceController::class, 'ajax'])->name('admin.service.index.ajax');

Route::post('/admin/service/active', [ServiceController::class, 'service_active'])->name('service-active');
Route::get('/admin/service/getimg/{id?}/{type?}', [ServiceController::class, 'getimg'])->name('admin.service.getimg');




Route::get('/admin/member/add', [MemberController::class, 'add'])->name('admin.member.add');
Route::post('/admin/member/add', [MemberController::class, 'addpost'])->name('admin.member.add');

Route::get('/admin/member/edit/{id?}', [MemberController::class, 'edit'])->name('admin.member.edit');
Route::post('/admin/member/edit/{id?}', [MemberController::class, 'editpost'])->name('admin.member.edit');

Route::get('/admin/member/index', [MemberController::class, 'index'])->name('admin.member.index');
Route::get('/admin/member/index/ajax', [MemberController::class, 'ajax'])->name('admin.member.index.ajax');

Route::post('/admin/member/active', [MemberController::class, 'member_active'])->name('member-active');
Route::get('/admin/member/getimg/{id?}/{type?}', [MemberController::class, 'getimg'])->name('admin.member.getimg');




Route::get('/admin/contact/index', [ContactController::class, 'index'])->name('admin.contact.index');
Route::get('/admin/contact/index/ajax', [ContactController::class, 'ajax'])->name('admin.contact.index.ajax');

Route::post('/admin/contact/active', [ContactController::class, 'contact_active'])->name('contact-active');



Route::get('/admin/setting/index', [SettingController::class, 'index'])->name('admin.setting.index');
Route::post('/admin/setting/index', [SettingController::class, 'indexpost'])->name('admin.setting.index');

Route::get('/admin/setting/getimg/{type?}', [SettingController::class, 'getimg'])->name('admin.setting.getimg');



Route::get('/admin/order/index', [OrderController::class, 'index'])->name('admin.order.index');
Route::get('/admin/order/index/ajax', [OrderController::class, 'ajax'])->name('admin.order.index.ajax');
Route::get('/admin/order/detail/{id?}', [OrderController::class, 'details'])->name('admin.order.details');
Route::get('/admin/order/export', [OrderController::class, 'export'])->name('admin.order.export');
