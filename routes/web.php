<?php

use Illuminate\Support\Facades\Route;

$users = collect([
    ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin', 'status' => 'Active', 'joined' => 'Jan 2024', 'color' => 'indigo'],
    ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'Editor', 'status' => 'Active', 'joined' => 'Mar 2024', 'color' => 'emerald'],
    ['name' => 'Bob Johnson', 'email' => 'bob@example.com', 'role' => 'User', 'status' => 'Active', 'joined' => 'Feb 2024', 'color' => 'blue'],
    ['name' => 'Alice Brown', 'email' => 'alice@example.com', 'role' => 'Editor', 'status' => 'Inactive', 'joined' => 'Jun 2024', 'color' => 'purple'],
    ['name' => 'Charlie Wilson', 'email' => 'charlie@example.com', 'role' => 'User', 'status' => 'Active', 'joined' => 'Apr 2024', 'color' => 'pink'],
    ['name' => 'Diana Ross', 'email' => 'diana@example.com', 'role' => 'Admin', 'status' => 'Active', 'joined' => 'Jul 2024', 'color' => 'red'],
    ['name' => 'Edward Stone', 'email' => 'edward@example.com', 'role' => 'User', 'status' => 'Active', 'joined' => 'Aug 2024', 'color' => 'indigo'],
    ['name' => 'Fiona Green', 'email' => 'fiona@example.com', 'role' => 'Editor', 'status' => 'Active', 'joined' => 'Sep 2024', 'color' => 'emerald'],
    ['name' => 'George Black', 'email' => 'george@example.com', 'role' => 'User', 'status' => 'Inactive', 'joined' => 'Oct 2024', 'color' => 'gray'],
    ['name' => 'Hannah White', 'email' => 'hannah@example.com', 'role' => 'User', 'status' => 'Active', 'joined' => 'Nov 2024', 'color' => 'blue'],
]);

Route::get('/', fn () => view('pages.dashboard.analytics'))->name('dashboard');
Route::get('/dashboard/ecommerce', fn () => view('pages.dashboard.ecommerce'));
Route::get('/dashboard/crm', fn () => view('pages.dashboard.crm'));
Route::get('/dashboard/project-management', fn () => view('pages.dashboard.project-management'));
Route::get('/dashboard/minimal', fn () => view('pages.dashboard.minimal'));
Route::get('/login', fn () => view('pages.auth.login'));
Route::get('/register', fn () => view('pages.auth.register'));
Route::get('/forgot-password', fn () => view('pages.auth.forgot-password'));
Route::get('/profile', fn () => view('pages.profile'));
Route::get('/settings', fn () => view('pages.settings'));
Route::get('/users', fn () => view('pages.users', ['users' => $users]));
Route::get('/forms', fn () => view('pages.forms'));
Route::get('/components', fn () => view('pages.components'));
Route::get('/example', fn () => view('pages.example'));
Route::get('/error/403', fn () => view('pages.errors.403'));
Route::get('/error/404', fn () => view('pages.errors.404'));
Route::get('/error/500', fn () => view('pages.errors.500'));
Route::get('/error/503', fn () => view('pages.errors.503'));
