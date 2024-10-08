<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Content;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_Category;
use App\Models\PatientFollowUpSchedule;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $categoriesCount = Category::count();
        $subCategoryCount = Sub_Category::count();
        $patientScheduleCount = PatientFollowUpSchedule::count();
        $subcategoriesCount = Sub_Category::count();
        $lastUsers = User::latest()->take(5)->get();
        $exchangeNumber = Content::getExchangeNumber();
        $lastProducts = Product::latest()->take(5)->get();
        $exchangeNumber  = Content::getExchangeNumber();
        return view('admin.dashboard', compact('productsCount', 'categoriesCount', 'subCategoryCount', 'patientScheduleCount', 'exchangeNumber','subcategoriesCount','lastUsers','lastProducts','exchangeNumber'));
    }
}
