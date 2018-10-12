<?php
namespace App\Http\Controllers\Admin;

use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSubcategoriesRequest;
use App\Http\Requests\Admin\UpdateSubcategoriesRequest;

class NewsController extends Controller
{
    public function index(){
        return view('admin.news.index');
    }
}
