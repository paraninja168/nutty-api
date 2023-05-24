<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WhatsappController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//login
Route::post('/login', [LoginController::class, 'userLogin'])->name('login');
Route::post('/logout', [LoginController::class, 'userLogout'])->name('logout');

Route::group(["middleware" => ["authentication"]], function() {
    //worksheet
    Route::post("/worksheet", [WorksheetController::class, "index"]);
    Route::post("/worksheet/call", [WorksheetController::class, "call"]);
    Route::post("/worksheet/result", [WorksheetController::class, "result"]);
    Route::post("/worksheet/result-user", [WorksheetController::class, "resultUser"]);

    //website
    Route::post('/get-websites', [WebsiteController::class, 'getWebsites'])->name('get-websites');
    Route::post('/add-website', [WebsiteController::class, 'addWebsite'])->name('add-website');
    Route::post('/delete-website', [WebsiteController::class, 'deleteWebsite'])->name('delete-website');
    Route::post('/get-website-by-id', [WebsiteController::class, 'getWebsiteById'])->name('get-website-by-id');
    Route::post('/update-website', [WebsiteController::class, 'updateWebsiteById'])->name('update-website');

    //user-group
    Route::post('/get-user-group', [UserGroupController::class, 'getUserGroup'])->name('get-user-group');
    Route::post('/add-user-group', [UserGroupController::class, 'addUserGroup'])->name('add-user-group');
    Route::post('/delete-user-group', [UserGroupController::class, 'deleteUserGroup'])->name('delete-user-group');
    Route::post('/get-user-group-by-id', [UserGroupController::class, 'getUserGroupById'])->name('get-user-group-by-id');
    Route::post('/update-user-group', [UserGroupController::class, 'updateUserGroupById'])->name('update-user-group');

    //user
    Route::post('/get-all-user', [UserController::class, 'getUser'])->name('get-all-user');
    Route::post('/add-user', [UserController::class, 'addUser'])->name('add-user');
    Route::post('/delete-user', [UserController::class, 'deleteUser'])->name('delete-user');
    Route::post('/get-user-by-id', [UserController::class, 'getUserById'])->name('get-user-by-id');
    Route::post('/update-user', [UserController::class, 'updateUserById'])->name('update-user');

    //role
    Route::post('/get-all-role', [RoleController::class, 'getRole'])->name('get-all-role');
    Route::post('/add-role', [RoleController::class, 'addRole'])->name('add-role');
    Route::post('/delete-role', [RoleController::class, 'deleteRole'])->name('delete-role');
    Route::post('/get-role-by-id', [RoleController::class, 'getRoleById'])->name('get-role-by-id');
    Route::post('/update-role', [RoleController::class, 'updateRoleById'])->name('update-role');

    //whatsapp
    Route::group(['prefix' => 'whatsapp'], function(){
        // Route::post('delete-received-chat', [WhatsappController::class, 'deleteReceivedChat'])->name('delete-received-chat');
        // Route::post('delete-sent-chat', [WhatsappController::class, 'deleteSentChat'])->name('delete-sent-chat');
        // Route::post('delete-campaign', [WhatsappController::class, 'deleteCampaign'])->name('delete-campaign');
        // Route::post('get-accounts', [WhatsappController::class, 'getAccounts'])->name('getAccounts');
        // Route::post('get-pending-chats', [WhatsappController::class, 'getPendingChats'])->name('get-pending-chats');
        // Route::post('get-received-chats', [WhatsappController::class, 'getReceivedChats'])->name('get-received-chats');
        // Route::post('get-sent-chats', [WhatsappController::class, 'getSentChats'])->name('get-sent-chats');
        // Route::post('get-campaigns', [WhatsappController::class, 'getCampaigns'])->name('get-campaigns');
        // Route::post('get-qrimage', [WhatsappController::class, 'getQRImage'])->name('get-qrimage');
        // Route::post('start-campaign', [WhatsappController::class, 'startCampaign'])->name('start-campaign');
        // Route::post('stop-campaign', [WhatsappController::class, 'stopCampaign'])->name('stop-campaign');

        Route::post('get-chats', [WhatsappController::class, 'getChats'])->name('get-chats');
        Route::post('delete-chat', [WhatsappController::class, 'deleteChat'])->name('delete-chat');
        Route::post('get-chat-by-id', [WhatsappController::class, 'getChatById'])->name('get-chat-by-id');
        Route::post('send-bulk-chat', [WhatsappController::class, 'sendBulkChat'])->name('send-bulk-chat');
        Route::post('send-single-chat', [WhatsappController::class, 'sendSingleChat'])->name('send-single-chat');

        
    });
});
