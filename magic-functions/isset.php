<?php
/*
	@ __isset
	@ description
	__isset function is automatically called when global isset function calling.
	# __isset is triggered by calling isset() or empty() on inaccessible properties.
*/

/*
	isset() is a function used to check	 variable have any value or not.
	isset() is a global function
*/

class ABC{
		private $array = ['abc'=>'ABC variable','xyz'=>'XYZ variable'];
	
		public function __isset($name){
			if($this->array[$name]){
				return TRUE;
			}else{
				return FALSE;	
			}
		}
}

$obj = new ABC();
/* it will give bool(false) becouse ABC class don't have any name instance variable */
echo  isset($obj->abc);

