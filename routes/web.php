<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageActivityController;
use App\Http\Controllers\Admin\ManageMeetingController;
use App\Http\Controllers\Admin\ManageMemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\MainController as ControllersMainController;
use App\Http\Controllers\MeetingListController;
use App\Http\Controllers\RegisterListController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);
Route::post('admin/users/login/logout', [LoginController::class, 'logout'])->name('logout');


// Route::middleware('auth')->group(function () {
    
// });

Route::middleware('auth', 'role:0')->group(function () {
    
    Route::prefix('admin')->group(function () {
        Route::get('/main', [MainController::class, 'index']);
        Route::get('/infoadmin', [MainController::class, 'infoadmin']);
        Route::post('/upload_imgadmin', [MainController::class, 'upload_imgadmin']);
        Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('admin');
        Route::get('/manageactivity/index', [ManageActivityController::class, 'index']);
        Route::get('/managemeeting/index', [ManageMeetingController::class, 'index']);

        //ManageMember
        Route::prefix('managemember')->group(function () {
            Route::get('/list', [ManageMemberController::class, 'index']);
            Route::get('/add', [ManageMemberController::class, 'create']);
            Route::get('/edit/{user}', [ManageMemberController::class, 'edit']);
            Route::post('/add', [ManageMemberController::class, 'store']);
            Route::post('/edit/{user}', [ManageMemberController::class, 'update']);
            Route::DELETE('/destroy', [ManageMemberController::class, 'destroy']);
            Route::get('/view/{user}', [ManageMemberController::class, 'view']);
        });
        //ManageActivity
        Route::prefix('manageactivity')->group(function () {
            Route::get('/list', [ManageActivityController::class, 'index']);
            Route::get('/add', [ManageActivityController::class, 'create']);
            Route::get('/edit/{activity}', [ManageActivityController::class, 'edit']);
            Route::post('/add', [ManageActivityController::class, 'store']);
            Route::post('/confirm', [RegisterListController::class, 'confirm']);
            Route::post('/activeattend', [ManageActivityController::class, 'activeattend']);
            Route::post('/closeactiveattend', [ManageActivityController::class, 'closeactiveattend']);
            Route::post('/activeregister', [ManageActivityController::class, 'activeregister']);
            Route::post('/closeactiveregister', [ManageActivityController::class, 'closeactiveregister']);
            Route::post('/edit/{activity}', [ManageActivityController::class, 'update']);
            Route::DELETE('/destroy', [ManageActivityController::class, 'destroy']);
            Route::get('/view/{activity}', [ManageActivityController::class, 'view']);

        });
        //ManageMeeting
        Route::prefix('managemeeting')->group(function () {
            Route::get('/list', [ManageMeetingController::class, 'index']);
            Route::get('/add', [ManageMeetingController::class, 'create']);
            Route::get('/edit/{meeting}', [ManageMeetingController::class, 'edit']);
            Route::post('/add', [ManageMeetingController::class, 'store']);
            Route::post('/edit/{meeting}', [ManageMeetingController::class, 'update']);
            Route::DELETE('/destroy', [ManageMeetingController::class, 'destroy']);
            Route::get('/view/{meeting}', [ManageMeetingController::class, 'view']);
            Route::post('/activeattend', [ManageMeetingController::class, 'activeattend']);
            Route::post('/closeactiveattend', [ManageMeetingController::class, 'closeactiveattend']);
            Route::post('/activepayment', [ManageMeetingController::class, 'activepayment']);
            Route::post('/closeactivepayment', [ManageMeetingController::class, 'closeactivepayment']);
            Route::post('/confirm', [MeetingListController::class, 'confirm']);
            Route::post('/confirmpayment', [MeetingListController::class, 'confirmpayment']);
            Route::post('/registermeeting', [ManageMeetingController::class, 'registermeeting']);
            Route::post('/closeregistermeeting', [ManageMeetingController::class, 'closeregistermeeting']);

        });
        
    });
    
});

Route::middleware('auth', 'role:2')->group(function () {
    Route::prefix('pages')->group(function () {

        Route::prefix('registeractivities')->group(function () {
            Route::get('list', [ManageActivityController::class, 'indexuser']);
            Route::post('list', [ManageActivityController::class, 'getActivities']);
            Route::get('view/{activity}', [ManageActivityController::class, 'viewuser']);
            Route::post('view/{activity}', [RegisterListController::class, 'store']);
            Route::DELETE('destroy', [RegisterListController::class, 'destroy']);
            Route::post('attend', [RegisterListController::class, 'attend']);
            Route::post('addnote', [RegisterListController::class, 'addnote']);
        });


        Route::prefix('meeting')->group(function () {
            Route::get('list', [ManageMeetingController::class, 'indexuser']);
            Route::get('/view/{meeting}', [ManageMeetingController::class, 'viewuser']);
            Route::post('/view/{meeting}', [MeetingListController::class, 'store']);
            Route::DELETE('destroy', [MeetingListController::class, 'destroy']);
            Route::post('attend', [MeetingListController::class, 'attend']);
            Route::post('payment', [MeetingListController::class, 'payment']);

        });

        Route::prefix('activityhasgone')->group(function () {
            Route::get('list', [ManageActivityController::class, 'activitieshasgone']);
        });

        Route::prefix('users')->group(function () {
            Route::get('detailsinfo', [ManageMemberController::class, 'detailsinfo']);
            Route::get('changepassword', [ManageMemberController::class, 'changepassword']);
            Route::post('upload_image', [ManageMemberController::class, 'upload_image'])->name('upload_image');
        });
    });
});

Route::get('/', [ControllersMainController::class, 'index'])->name('main');
