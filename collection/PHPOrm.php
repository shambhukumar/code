<?php
class PHPOrm{
		
		private $ddl;

		public function tableExists($class){
					// check table exist or not else create one
					echo "table not exist create one \n";
					$reflect = new ReflectionClass($class);
					$props   = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
					$table_def ='create table '.$reflect->getName().'{';
					foreach ($props as $prop) {
							$table_def.=$this->ddl->getDefinition($prop->getName()).',';
					}
					$table_def.='primary key(id)}';
					echo $table_def;
					return true;
		}
		public function save($class){
		
			if($this->tableExists($class)){
					echo "\ntable exist insert data \n";
					$reflect = new ReflectionClass($class);
					$table_def ='insert into  '.$reflect->getName().'  (';
					$props   = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
					foreach ($props as $prop) {
							$table_def.=$prop->getName().',';
					}
					$table_def.=') values (';
					
     				$props   = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
					foreach ($props as $prop) {						 
							$table_def.=  (new ReflectionMethod($class,'get'.ucfirst($prop->getName())))->invoke($class);
					}
					$table_def.')';
					echo $table_def;
			}
		}

		public function __construct(){
				$this->ddl = new DDL();
		}
}

class DDL{
		private $fieldList=array(
							"id"=>"id int unsigned not null auto_increment",
							"name"=>"name varchar(45)",
							"address"=>"address varchar(255)"
						  );
		public function getDefinition($field){
			return $this->fieldList[$field];
		}
}

