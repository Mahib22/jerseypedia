<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/products/liga/{id}', 'product-league')->name('products.league');
Route::livewire('/products/{id}', 'product-detail')->name('products.detail');
Route::livewire('/cart', 'cart')->name('cart');
Route::livewire('/checkout', 'checkout')->name('checkout');
Route::livewire('/history', 'history')->name('history');
Route::livewire('/wishlist', 'product-wishlist')->name('wishlist')->middleware('auth');
