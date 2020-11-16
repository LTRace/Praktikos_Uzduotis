<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check()) {

            if ($request->user()->is_leader == 1) {
                return view('pages.main-leader');
            } else {
                return view('pages.main-worker');
            }
        } else {
            return redirect('/login');
        }
    }

    public function createDutyPage()
    {
        return view('pages.create-duty');
    }

    public function editDutyPage()
    {
        $duties = DB::table('duties')->get();

        return view('pages.edit-duty')->with('duties', $duties);
    }

    public function editDutyForm($id)
    {
        $requestedDuty = DB::table('duties')->where('id', $id)->first();

        return view('pages.edit-duty-form')->with('requestedDuty', $requestedDuty);
    }

    public function deleteDutyPage()
    {
        $duties = DB::table('duties')->get();

        return view('pages.delete-duty')->with('duties', $duties);
    }

    public function myDutiesPage(Request $request)
    {
        $myDuties = DB::table('duties')->where('duty_assigned_to', $request->user()->name)->where('duty_status', 'not like', 'Atlikta')->get();

        return view('pages.my-duties')->with('myDuties', $myDuties);
    }
}
