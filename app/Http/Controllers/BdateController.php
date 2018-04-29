<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\bdate;

class BdateController extends Controller
{

   //display records
    public function index()
    {
    	$results = bdate::all()->sortByDesc("bdate")->toArray();
        return view('index', compact('results'));
    }

    public function store(Request $request){
    	//validate records
    	 $this->validate(request(), [
          'bdate' => 'required',
        ]);
    	
    	//convert the dates in required format
    	$dtBdate =ConvertDates($request->bdate);

    	//select the record form db
    	$objBdate = new bdate();
    	$objBdateSel=$objBdate->Select();

    	//if record does not exist insert the record
    	if($objBdateSel->Count()==0){
    		$arrResults =\getCurrencyRates($dtBdate);
    		//if success
    		if($arrResults['success']==1){
    			$objBdate->rate=$arrResults['rates'];
				$objBdate->Insert();
				return back()->with('success', 'Rates updated Successfully!!');
			}else{
				$msg =$arrResults['msg'];
				return back()->with('error', $msg);
			}
    	}else{
    		//if record exist update the db
    		$objBdate->id=$objBdateSel[0]->id;
    		$objBdate->count =$objBdateSel[0]->counter +1;
			$objBdate->Updates();
			return back()->with('success', 'Rates updated');
		}

		
    }
}
