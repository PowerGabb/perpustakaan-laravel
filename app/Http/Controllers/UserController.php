<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index(){

        $users = User::where('status', 'active')->where('role_id', '!=', 1)->paginate(5);
        return view('page.user', ['users' => $users]);
    }
    public function profile(){

        $user = User::where('slug', Auth::user()->slug)->first();
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->paginate(5);
        return view('page.profile', ['rent_logs' => $rentlogs]);
    }

    public function inactive_list(){

        $users = User::where('status', 'inactive')->paginate(5);
        return view('page.user-register', ['users' => $users]);
    }

    public function activated_user($slug){

        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->update();


        Session::flash('status', 'success');
        Session::flash('message', 'User activated successfully');
        return redirect('/users');
    }

    public function show($slug){

        
        $user = User::where('slug', $slug)->first();
        $rentlogs = RentLogs::with(['user', 'book'])->where('user_id', $user->id)->paginate(5);
        return view('page.user-profile', ['user' => $user, 'rent_logs' => $rentlogs]);
    }

    public function ban($slug){
        
        $user = User::where('slug', $slug)->first();
        return view('page.user-ban', ['user' => $user]);
    }

    public function destroy(Request $request, $slug){
        
        $user = User::where('slug', $slug)->first();
        $user->delete();
        Session::flash('status', 'success');
        Session::flash('message', 'User Ban successfully');
        return redirect('/users');
    }

    public function ban_list(){

        $user = User::onlyTrashed()->paginate(5);
        return view('page.user-ban-list', ['user' => $user]);
    }

    public function un_block($slug){

        $user = User::where('slug', $slug)->restore();
        Session::flash('status', 'success');
        Session::flash('message', 'User Un-Block successfully');
        return redirect('/users');
    }

    public function deactive($slug){

        $user = User::where('slug', $slug)->first();
        $user->status = 'inactive';
        $user->update();
        Session::flash('status', 'success');
        Session::flash('message', 'User Deactivated successfully');
        return redirect('/users');
    }
}
