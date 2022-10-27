<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club_master;
use App\Sports_master;
use App\Registation_details;
use DB;
class Club extends Controller
{
    public function index() {
        $clubs = Club_master::all();
        $registations = Registation_details::all();
        return view('club.register', compact('clubs', 'registations'));
    }

    public function sports(Request $request) {
        $club_id = $request->club_id;
        $list_sports = Sports_master::where('club_id', $club_id)->get();
        return response()->json(['sports'=> $list_sports]);
    }

    public function getfee(Request $request) {
        $sport_id = $request->sport_id;
        $sport_price = Sports_master::where('sports_id', $sport_id)->get();
        return response()->json(['fees'=> $sport_price]);
    }

    public function saveclub(Request $request) {
        $club['applicant_name'] = $request->applicant_name;
        $club['email_id'] = $request->email;
        $club['mobile_no'] = $request->mobile;
        $club['gender'] = $request->gender;
        $club['dob'] = $request->dob;


        if($request->hasFile('file')){
             $image = $request->file('file');
             $imageName = $image->getClientOriginalName();
             $club['image_path'] = $imageName;
             $request->file('file')->storeAs('clubmembers', $imageName, 'public');
         }
        
        $club['club_id'] = $request->club_id;
        $club['sports_id'] = $request->sports_id;
    
         $addclubmaster = Registation_details::create($club);

         return response()->json(['clubinfo' => $addclubmaster]);

    }

    public function getusesbyclub(Request $request) {
        $club_id = $request->club_id;
  
        $clubname = Club_master::where('club_id', $club_id)->get();
        $clubdetails = DB::select("SELECT sports_masters.sports_name,sports_masters.fees, COUNT(registation_details.registation_id) as members FROM
        registation_details
        INNER JOIN sports_masters ON registation_details.sports_id = sports_masters.sports_id WHERE registation_details.club_id='".$club_id."' GROUP BY sports_masters.sports_name");

        return response()->json(['clubdetails' => $clubdetails]);

    }
}
