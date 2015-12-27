<?php
/*
* @ __callstatic	
* @description
*  call static is same as call function. using call function we call object of the functions.
*  but in __callstatic we call context of the function.
*/

class ABC{
	
		private $array = ['abc'=>'ABC variable','xyz'=>'XYZ variable'];

		public static function __callstatic($name,$value){			
			if(function_exists ($name)){
				return  'function exists';
			}else{
				echo 'function not exists';
			}
		}

		public static function getName(){
				return "SCott";
		}
}
var_dump(ABC::getName());
