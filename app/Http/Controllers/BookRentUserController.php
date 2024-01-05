<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookRentUserController extends Controller
{
    public function index($slug){

        $book = Book::where('slug', $slug)->first();
        return view('page.book-rent-user', ['book' => $book]);
    }

    public function store(Request $request)
{
    $user = Auth::user();

    $logCount = RentLogs::where('user_id', $user->id)->whereNull('actual_return_date')->count();
    $bookcheck  = Book::where('id', $request->book_id)->where('status', 'not available')->count();

    

    if ($bookcheck == 1) {
        
        Session::flash('status', 'fail');
        Session::flash('message', 'Buku tidak tersedia');
        return redirect('/profile');
        
    }
    
    if ($logCount >= 3) {
        
        Session::flash('status', 'fail');
        Session::flash('message', 'Sudah mencapai limit pinjam');
        return redirect('/profile');

    }

    $rentLogData = [
        'user_id' => $user->id,
        'book_id' => $request->book_id,
        'rent_date' => Carbon::now()->toDateTimeString(),
        'return_date' => Carbon::now()->addDays(3)->toDateTimeString(),
    ];

   

    try {
        DB::beginTransaction();
        RentLogs::create($rentLogData);

        $book = Book::findOrFail($request->book_id);
            $book->status = 'not available';
            $book->save();
        DB::commit();
 
        Session::flash('status', 'success');
        Session::flash('message', 'Buku berhasil dipinjam');
        return redirect('/profile');
    } catch (\Throwable $th) {
        DB::rollback();
        dd($th);
    }
}

}
