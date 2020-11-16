<?php

namespace App\Http\Controllers;

use App\Models\Duty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaderController extends Controller
{
    public function storeDuty(Request $request)
    {
        $request->validate([
            'duty_title' => 'required',
            'duty_assigned_to' => 'required',
            'duty_description' => 'required'
        ]);

        $newTask = new Duty([
            'duty_title' => $request->duty_title,
            'duty_assigned_to' => $request->duty_assigned_to,
            'duty_created_by' => $request->user()->name,
            'duty_description' => $request->duty_description
        ]);

        $newTask->save();

        return redirect('/');
    }

    public function editDuty(Request $request, $id)
    {
        $request->validate([
            'duty_title' => 'required',
            'duty_assigned_to' => 'required',
            'duty_description' => 'required'
        ]);

        $updateDate = date('Y-m-d H:i:s');

        $editTask = DB::table('duties')->where('id', $id)->update([
            'duty_title' => $request->duty_title,
            'duty_assigned_to' => $request->duty_assigned_to,
            'duty_description' => $request->duty_description,
            'updated_at' => $updateDate
        ]);

        return redirect()->back();
    }

    public function destroyDuty($id)
    {
        $toDestroy = DB::table('duties')->where('id', $id)->delete();

        return redirect()->back();
    }
}
