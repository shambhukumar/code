<?php
/*
* Interface is unimplemented structue it  contains only abstract mentod.
* Interface cannot cantain any body or method definition or property except constant variable.
*/

interface pqr{

	const ID =5;
	// only deceleration not definition
	public function get_name();

	/*public function get_firstname(){
		return 'scott';
	}*/
}

// in inheriance we are extending but in interface we are  implementing
// if we implement any interface then we must need to give definition to crosspondance interface.

// 

interface zxc{

}
// with help of interface we can achive the property of multiple inheriance 
class test implements pqr,zxc{

	public function get_name(){
		echo 'test of pqr';
	}
} 

class test2 implements pqr{
	public function get_name(){
		echo 'test2 of pqr';
	}
}

function showname(pqr $obj){
	$obj->get_name();
}



$obj = new test2;
showname($obj);