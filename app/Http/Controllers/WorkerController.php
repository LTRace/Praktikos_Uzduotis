<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerController extends Controller
{
    public function completeDuty($id)
    {
        $completeDuty = DB::table('duties')->where('id', $id)->update([
            'duty_status' => 'Atlikta'
        ]);

        return redirect()->back();
    }
}
