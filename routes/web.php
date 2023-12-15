<?php


use Illuminate\Support\Facades\Route;

Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/companies', [\TomatoPHP\TomatoBranches\Http\Controllers\CompanyController::class, 'index'])->name('companies.index');
    Route::get('admin/companies/api', [\TomatoPHP\TomatoBranches\Http\Controllers\CompanyController::class, 'api'])->name('companies.api');
    Route::get('admin/companies/create', [\TomatoPHP\TomatoBranches\Http\Controllers\CompanyController::class, 'create'])->name('companies.create');
    Route::post('admin/companies', [\TomatoPHP\TomatoBranches\Http\Controllers\CompanyController::class, 'store'])->name('companies.store');
    Route::get('admin/companies/{model}', [\TomatoPHP\TomatoBranches\Http\Controllers\CompanyController::class, 'show'])->name('companies.show');
    Route::get('admin/companies/{model}/edit', [\TomatoPHP\TomatoBranches\Http\Controllers\CompanyController::class, 'edit'])->name('companies.edit');
    Route::post('admin/companies/{model}', [\TomatoPHP\TomatoBranches\Http\Controllers\CompanyController::class, 'update'])->name('companies.update');
    Route::delete('admin/companies/{model}', [\TomatoPHP\TomatoBranches\Http\Controllers\CompanyController::class, 'destroy'])->name('companies.destroy');
});


Route::middleware(['web','auth', 'splade', 'verified'])->name('admin.')->group(function () {
    Route::get('admin/branches', [\TomatoPHP\TomatoBranches\Http\Controllers\BranchController::class, 'index'])->name('branches.index');
    Route::get('admin/branches/api', [\TomatoPHP\TomatoBranches\Http\Controllers\BranchController::class, 'api'])->name('branches.api');
    Route::get('admin/branches/create', [\TomatoPHP\TomatoBranches\Http\Controllers\BranchController::class, 'create'])->name('branches.create');
    Route::post('admin/branches', [\TomatoPHP\TomatoBranches\Http\Controllers\BranchController::class, 'store'])->name('branches.store');
    Route::get('admin/branches/{model}', [\TomatoPHP\TomatoBranches\Http\Controllers\BranchController::class, 'show'])->name('branches.show');
    Route::get('admin/branches/{model}/edit', [\TomatoPHP\TomatoBranches\Http\Controllers\BranchController::class, 'edit'])->name('branches.edit');
    Route::post('admin/branches/{model}', [\TomatoPHP\TomatoBranches\Http\Controllers\BranchController::class, 'update'])->name('branches.update');
    Route::delete('admin/branches/{model}', [\TomatoPHP\TomatoBranches\Http\Controllers\BranchController::class, 'destroy'])->name('branches.destroy');
});
