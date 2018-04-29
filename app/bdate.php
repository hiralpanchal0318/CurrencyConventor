<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bdate extends Model
{

	var $bdate;
	var $rate;
	var $id;
	var $count;
    
    //insert record
    function Insert(){
    	\DB::table('bdates')->insert([
   			 'bdate' => $this->bdate,
   			 'basecurrency'=>'EUR',
   			 'conventercurrency'=>'INR',
   			 'rate'=>$this->rate, 
   			 'Counter' => 1]
  
			);

    }

    //select the record
    function Select(){
    	$result =\DB::table('bdates')
                     ->where('bdate', '=', $this->bdate)
                     ->get();
                     return $result;
    }

    //update the record
    function Updates(){
    	\DB::table('bdates')
            ->where('id', $this->id)
            ->update(['counter' => $this->count]);
    }

}
