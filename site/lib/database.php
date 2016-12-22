<?php


	class database{
		private $conn;
		public $table_schema;
			public function  __construct(){
				$this->openConnection();

		}



		public function openConnection(){

			$this->conn=mysqli_connect(DB_HOST, DB_USER, DB_PASS);

			if (!$this->conn) {
				die("Database Connection failed ".mysqli_connect_error());
			}

			else{
				$select_db=mysqli_select_db($this->conn, DB_NAME);

				if (!$select_db) {
					die("Database Selection Problem ". mysqli_error());
				}
			}
		}

		public function closeConnection(){
			if (isset($this->conn)) {
				mysqli_close($this->conn);
				unset($this->conn);
			}
		}

		public function poof($str){

			return mysqli_real_escape_string($this->conn, $str);

		}
		public function perform_query($q){

			$result=mysqli_query($this->conn, $q);

				if (!$result) {
				die("There was an error With The Result ".mysqli_error());
				}

					return $result;
			}


		public function fetch_result($res){

			return mysqli_fetch_assoc($res);

		}


		public function fetch_multiple_result($sql){

			$result1=mysqli_query($this->conn, $sql);

			$k=array_keys(self::fetch_result($result1));
			mysqli_free_result($result1);

				$result=mysqli_query($this->conn, $sql);

			$arr=array();
			$count=0;

			while($row=mysqli_fetch_assoc($result)) {


				for ($i=0; $i <sizeof($k); $i++) {

					$arr[$k[$i]][$count]=$row[$k[$i]];
				}
				$count++;
			}

			return $arr;
		}// End of fetch_multiple_result


		public function last_insertedid(){

			return mysqli_insert_id($this->conn);

		}

		public function num_rows($result){

			return mysqli_num_rows($result);

		}


		private function table_schema(){
			$table_schema;

			$res=$this->fetch_multiple_result($this->perform_query("SHOW TABLES"));

			for ($i=0; $i <sizeof($res['Tables_in_'.DB_NAME]) ; $i++) {

				$sql="DESCRIBE {$res["Tables_in_".DB_NAME][$i]}";

				$table_description=self::fetch_multiple_result(self::perform_query($sql));


				for ($k=0; $k <sizeof($table_description['Field']) ; $k++) {
					$table_schema[$res["Tables_in_".DB_NAME][$i]][$k]=$table_description["Field"][$k];
				}

			}

			return $table_schema;
		}

		public function update($arr, $conditions){

		    $table_names=array_keys($arr);
		    $condition_names=array_keys($conditions);

		    for ($i=0; $i <sizeof($table_names) ; $i++) {
		        $table_info=self::fetch_result(self::perform_query("DESCRIBE '{$table_names[i]}'"));

		        // The below for loop is for query building

		        $sql="UPDATE '{$arr[$table_names[$i]]}' SET ";
		        for ($j=0; $j <sizeof($table_info['Field']) ; $j++) {

		          $sql.="{$table_info['Field'][$j]} = '{$arr[$i][$j]}' ";

		        }
		        $sql.=" where";
		        for ($k=0; $k <sizeof($conditions) ; $k++) {
		          if ($k+1==sizeof($conditions)) {

		            $sql.="' {$condition_names[$k]}' = '{$conditions[$condition_names[$k]]}'";

		          }else{

		            $sql.="' {$condition_names[$k]}' = '{$conditions[$condition_names[$k]]}' AND";

		          }
		        }

		        self::perform_query($sql);
		    }
	  }



	}//END OF WHOLE CLASS


 ?>
