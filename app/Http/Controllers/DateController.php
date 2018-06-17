<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Date;
use Illuminate\Support\Facades\Auth;




class DateController extends Controller
{
    public function postAddSchedule(Request $request){

        $date = new Date();

        $date->start = $request['start'];
        $date->finish = $request['finish'];
        $date->desc = $request['entry_desc'];
        $msg = 'There was an error.';
        if($request->user()->dates()->save($date)){
            $msg = 'Schedule entry successfully created.';
        }
        return redirect()->route('account')->with([
            'message' => $msg
        ]);
    }

    public function getDeleteDate($date_id){
        $msg = 'There was an error.';
        $date = Date::where('id' , $date_id)->first();

        if($date->delete());
        {
            $msg = 'Entry deleted successfully.';
        }
        return redirect()->back()->with(['message' => $msg]);
    }
}
