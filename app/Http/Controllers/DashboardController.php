<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){


        $data = Book::count();
        $category = Category::count();
        $user = User::count();

        $rent_log = RentLogs::with(['user', 'book'])->paginate(5);
        return view('page.dashboard', ["book_count" => $data, "category_count" => $category, "user_count" => $user, 'rent_log' => $rent_log]);
    }
}
