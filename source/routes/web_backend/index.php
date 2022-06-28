<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/Auth')->as('auth.')->group(base_path('routes/web_backend/auth.php'));

Route::middleware(['auth:admins'])->group(function () {
    Route::prefix('/Dashboard')->as('admin.dashboard.')->group(base_path('routes/web_backend/dashboard.php'));
    Route::prefix('/Products')->as('admin.products.')->group(base_path('routes/web_backend/product.php'));
    Route::prefix('/Users')->as('admin.users.')->group(base_path('routes/web_backend/user.php'));
    Route::prefix('/Roles')->as('admin.roles.')->group(base_path('routes/web_backend/role.php'));
    Route::prefix('/Permissions')->as('admin.permissions.')->group(base_path('routes/web_backend/permission.php'));
    Route::prefix('/Brands')->as('admin.brands.')->group(base_path('routes/web_backend/brand.php'));
    Route::prefix('/Category')->as('admin.categories.')->group(base_path('routes/web_backend/category.php'));
});
