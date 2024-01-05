<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookRentController extends Controller
{
    public function index(){

        $users = User::where('id', '!=', 1)->where('status', '=', 'active')->get();
        $books = Book::all();
        return view('page.book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request){
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDays(3)->toDateString();
        
        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            
            Session::flash('status', 'failed');
            Session::flash('message', 'Gagal Pinjam. Buku Tidak Tersedia');
            return redirect('/book-rent');
        }
        else{

            $limitrent = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)->count();
            
            if ($limitrent >= 3) {
                Session::flash('status', 'failed');
                Session::flash('message', 'Gagal Pinjam. Limit Pinjam Telah Habis');
                return redirect('/book-rent');
            }


            try {
            DB::beginTransaction();
            RentLogs::create($request->all());

            $book = Book::findOrFail($request->book_id);
            $book->status = 'not available';
            $book->save();
            DB::commit();

            Session::flash('status', 'failed');
            Session::flash('message', 'Buku berhasil di pinjam');
            return redirect('/book-rent');
            } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            }
        }

        
    }

    public function returnBook(){
        $users = User::where('id', '!=', 1)->where('status', '=', 'active')->get();
        $books = Book::all();
        return view('page.book-return', ['users' => $users, 'books' => $books]);
    }

    public function saveReturnBook(Request $request){

        
        $rent = RentLogs::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        

        if ($countData == 1) {
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            $bookRollBackToInStock = Book::findOrFail($request->book_id)->update(['status' => 'in stock']);

            Session::flash('status', 'failed');
            Session::flash('message', 'Buku Berhasil Di Kembalikan');
            return redirect('/book-return-form');
        }else{
            Session::flash('status', 'failed');
            Session::flash('message', 'Buku Tidak di pinjam');
            return redirect('/book-return-form');
        }
    }
}
