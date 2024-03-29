<?php

use App\Http\Controllers\HtmlParser;
use App\Http\Controllers\SearchText;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/html-tree', [HtmlParser::class, 'showHtmlTree']);
Route::post('/html-tree', [HtmlParser::class, 'showHtmlTree'])->name('htmltotree');

//fulltext search

Route::get('/show', [SearchText::class, 'showForm']);
Route::post('/search', [SearchText::class, 'search'])->name('search');
