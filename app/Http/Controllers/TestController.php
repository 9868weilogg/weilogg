<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function print100(){
    	$array = [];
    	$a = '';
    	for($i=1;$i<=100;$i++){
    		
    		$c = $i . ',';
    		if($i%3 == 0 && $i%5 == 0){
    			$c = 'fizzBuzz' .',';
    		}
    		elseif($i%5 == 0){
    			$c = 'buzz' .',' ;
    		}
    		elseif($i%3 == 0){
    			$c = 'Fizz' .',';
    		}

    		echo  $c;
    	}

    	
    }

    public function test2(Request $request){
    	if($request->number < 3){
    		return "number must be at leat 3";
    	}
    	$k = 0;
    	for($k=0;$k<$request->number-2;$k++){
    		$a = $request->number + $k + 2;
    	}

    	$string1 = '';
    	$string2 = '';
    	$string3 = '';
    	$string4 = '';
    	$string5 = '';
    	for($i=0; $i<$a ;$i++){
    		for($j=0; $j<$a; $j++){
    			if($i== 0 ){
    				if($j == $a-3){
		    			$b = '*';
		    		}
		    		else{
		    			$b = "&nbsp;";
		    		}
		    		$string1 .= $b;
		    	}
		    	if($i == 1){
    				if($j == 1 ||$j == 2 || $j == 3){
		    			$c = '*';
		    		}
		    		else{
		    			$c = "&nbsp;";
		    		}
		    		$string2 .= $c;
		    	
    			}
    			if($i == 2){
		    		$c = '*';
		    		
		    		$string3 .= $c;
		    	
    			}
    			if($i == 3){
    				if($j == 1 ||$j == 2 || $j == 3){
		    			$c = '*';
		    		}
		    		else{
		    			$c = "&nbsp;";
		    		}
		    		$string4 .= $c;
		    	
    			}
    			if($i== 4 ){
    				if($j == 2){
		    			$b = '*';
		    		}
		    		else{
		    			$b = "&nbsp;";
		    		}
		    		$string5 .= $b;
		    	}
    		}
    			
    			
    		
    	}
    	echo $string1 . "<br>" . $string2 ."<br>" . $string3 ."<br>" . $string4 ."<br>" . $string5;
    	
    	// if($request->number == 3){
    	// 	echo "<p>&nbsp;&nbsp;*</p>";
    	// 	echo "<p>&nbsp;***</p>";
    	// 	echo "<p>*****</p>";
    	// 	echo "<p>&nbsp;***</p>";
    	// 	echo "<p>&nbsp;&nbsp;*</p>";
    	// }
    	// if($request->number == 4){
    	// 	echo "<p>&nbsp;&nbsp;&nbsp;*</p>";
    	// 	echo "<p>&nbsp;&nbsp***</p>";
    	// 	echo "<p>&nbsp;*****</p>";
    	// 	echo "<p>*******</p>";
    	// }
    }


}
