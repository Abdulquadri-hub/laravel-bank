<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\VerificationController;
use App\Http\Controllers\customer\AccountController;
use App\Http\Controllers\customer\DashboardController;
use App\Http\Controllers\customer\DepositController;
use App\Http\Controllers\customer\TransferController;
use App\Http\Controllers\KycController;

Route::group([
    "prefix" => "auth"
], function(){
    
    Route::get("/register", [RegisterController::class, "index"])->name("auth.register");
    Route::post("/register", [RegisterController::class, "save"]);
    Route::get("/login", [LoginController::class, "index"])->name("auth.login");
    Route::post("/login", [LoginController::class, "login"]);
    Route::get("/forgotpassword", [ForgotPasswordController::class, "index"])->name("auth.forgotpassword");
    Route::post("/forgotpassword", [ForgotPasswordController::class, "save"]);
    Route::get("/verify-email/", [VerificationController::class, "index"])->name("auth.verify-email");
    Route::post("/verify-email/", [VerificationController::class, "verify"]);
    
});


Route::group([], function(){

    Route::group([
        "prefix" => "c"
    ], function(){
    
        #dashboard
        Route::get("/", [DashboardController::class, "index"])->name("customer.dashboard");

        #transfer
        Route::get("/transfer", [TransferController::class, "index"])->name("customer.transfer");
        Route::post("/transfer", [TransferController::class, "internalTransfer"]);

        #deposit
        Route::get("/deposit", [DepositController::class, "index"])->name("customer.deposit");
        Route::post("/deposit", [DepositController::class, "save"])->name("customer.deposit");

        #loan
        Route::get("/loan", [DashboardController::class, "index"])->name("customer.loan");

        #airtimetopup
        Route::get("/airtimetopup", [DashboardController::class, "index"])->name("customer.airtimetopup");

        #datatopup
        Route::get("/datatopup", [DashboardController::class, "index"])->name("customer.datatopup");

        #bills
        Route::get("/bills", [DashboardController::class, "index"])->name("customer.bills");

        #account
        Route::get("/account", [AccountController::class, "index"])->name("customer.account.index");
        Route::get("/account/create", [AccountController::class, "create"])->name("customer.account.create");
        Route::post("/account/create", [AccountController::class, "create"]);
        Route::get("/account/overview", [AccountController::class, "overview"])->name("customer.account.overview");
        Route::get("/account/edit", [AccountController::class, "edit"])->name("customer.account.edit");
        Route::post("/account/edit", [AccountController::class, "edit"]);
        Route::get("/account/change-password", [AccountController::class, "changePassword"])->name("customer.account.change-password");
        Route::post("/account/change-password", [AccountController::class, "changePassword"]);

        #kyc
        Route::get("/kyc", [KycController::class, "index"])->name("customer.kyc.index");
        Route::post("/kyc", [KycController::class, "submitIdVerification"]);

    });

    Route::group([
        "prefix" => "admin"
    ], function(){
    
        //
        Route::get("/", [DashboardController::class, "index"])->name("admin.dashboard");
    });

});



