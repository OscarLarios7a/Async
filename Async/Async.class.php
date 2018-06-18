<?php
	/**
	 * @author Wearecode
	 * Async PHP Framework
	 * Async V1.0 || (C) Wearecode fundation
	 */
	/* install php*/
	include dirname(__FILE__).'\install.php';
	/* functions */
	include dirname(__FILE__).'\_arch_ert56\_async_45rtg.php';
	/**	 
	 * -------------------------------------------------
	 *				->Consultas Permitidas<-
	 * -------------------------------------------------
	 *
	 * assignar tabla -> to(string)	 
	 * seleccionar cuando (WHERE) -> when(array, condition) 'campo' => 'valor', condition = >, <, <>, <=, >=, = 
	 * seleccionar cuando (WHERE NOT) -> when_no(array) 'campo' => 'valor'
	 * and-> and(array, condition)
	 * or-> or(array, condition)
	 * seleccionar hasta (LIMIT) -> limit(int) 'from, to'
	 * ordenar (ORDER BY) -> order(param,string) 'ASC', 'DESC', 'RAND()''
	 * contiene (LIKE %i%) ->like(array) 'campo' => 'valor'
	 * entre dos (BETWEEN) ->middle(value, value)
	 * insertar (INSERT INTO) -> push(array) 'campo' => 'valor'	 
	 * seleccionar (SELECT * FROM) -> get()
	 * borrar (DELETE FROM) ->clean(array) 'campo' => 'valor'
	 * editar (UPDATE) ->edit(array) 'campo' => 'valor'	 
	 */

	/** 
	 * ---------------------------------------
	 *		vitaDB class
	 * ---------------------------------------
	 */
	abstract class Async{
		
		public $db;
		public $db_url;
		public $db_user;
		public $db_pass;
		public $db_name;
		/**
		 * -----------------------------------
		 *			costruct
		 * -----------------------------------
		 */
		public function __construct(){
			$this->db_url  = DB_URL;
			$this->db_user = DB_USER;
			$this->db_pass = DB_PASS;
			$this->db_name = DB_NAME;
			$this->new_data_base();
		}
		/**
		  * --------------------------------
		  *			new_data_base
		  * --------------------------------
		  */
		public function new_data_base(){
			$this->db = new MySQLi($this->db_url, $this->db_user, $this->db_pass, $this->db_name);
    		if ($this->db-> connect_errno) {
      			die( "ERROR: (" . $this->db->mysqli_connect_errno() . ") " . $this->db->mysqli_connect_error());
    		}
    		else{
    			return $this->db;    			
    		}
		}
	}
	
	/**
	 * @author Wearecode and alien System
	 * -----------------------------------
	 *      query class
	 * -----------------------------------
	 */
	class query extends Async{

		public $async_var_lol45;//contiene el nombre de la tabla a acceder	
		public $async_var_ki567 = '';//contiene campos a acceder
		public $async_var_yj789 = '';//contiene los valores a insertar, modificar, buscar o elimiar
		public $async_var_er56h = null;//
		public $async_var_lowe4 = null;
		public $async_var_dhku9 = null;//
		public $async_var_loky6 = null;
		public $async_var_oprty = null;
		public $async_var_lim70 = null;
		public $async_var_kop56 = null;
		/**
		 * ------------------------------------------
		 *		to asigna el nombre de la tabla
		 * ------------------------------------------
		 * @param strign $snd
		 */
		public function to($snd){
			$this->async_var_lol45 = $snd;
		}
		/**
		 * ----------------------------------------------
		 *                      condition
		 *  asigna la condicion que se desea, y retorna un valor concatenado
		 * ----------------------------------------------
		 * @param string $Array
		 * @param string $condition
		 * @return string
		 */
		public function condition($Array, $condition = '='){
			foreach ($Array as $async_var_23hhj => $async_var_9jgjk){
				if ($condition != '=') {
					$async_var_jkr56 = $async_var_23hhj." ".$condition." '".$async_var_9jgjk."'";
				}				
				else{
					$async_var_jkr56 = $async_var_23hhj." = '".$async_var_9jgjk."'";
				}
				return $async_var_jkr56; 
			}	
		}
		/**
		 * -----------------------------------------
		 *				when
		 * -----------------------------------------
		 * @param string $when
		 */
		public function when($when = '', $condition = '='){			
			if (is_array($when)) {
				$when = $this->condition($when, $condition);
			}
			else{
				$when = $when;
			}
			$this->async_var_er56h = 'WHERE ('.$when.')';
		}
		/**
		 * -------------------------------------------
		 *					middle
		 * -------------------------------------------
		 * @param string $valor_1 
		 * @param string $valor_2
		 */
		public function middle($valor_1, $valor_2){
			$this->async_var_kop56 = 'BETWEEN '.$valor.' AND '.$valor_2;
		}
		/**
		 * -----------------------------------------
		 *				when_not
		 * -----------------------------------------
		 * @param string $when_not
		 */
		public function when_not($when_not = '', $condition = '='){
			if (is_array($when_not)) {
				$when_not = $this->condition($when_not, $condition);
			}
			else{
				$when_not = $when_not;
			}
			$this->async_var_lowe4 = 'WHERE NOT ('.$when_not.')';
		}
		/**
		 * -----------------------------------------
		 *				like
		 * -----------------------------------------		
		 * @param string $like
		 */
		public function like($like = ''){
			foreach ($like as $campo => $valor){
				$like = 'WHERE '.$campo." LIKE '%".$valor."%'";
			}
			$this->async_var_lim70 = $like;
		}
		/**
		 * -----------------------------------------
		 *				and
		 * -----------------------------------------
		 * @param string $and
		 */
		public function and($and = '', $condition = '='){
			$and = $this->condition($and, $condition);
			$this->async_var_oprty.= 'AND ('.$and.')';
		}
		/**
		 * -----------------------------------------
		 *				or
		 * -----------------------------------------
		 * @param string $or
		 */
		public function or($or = '', $condition = ''){
			$or = $this->condition($or, $condition);
			$this->async_var_oprty.= 'or ('.$or.')';
		}
		/**
		 * -----------------------------------------
		 *				order
		 * -----------------------------------------
		 * @param string $order
		 */
		public function order($param, $order = ''){
			$this->async_var_loky6 = 'ORDER BY '.$param.' '.$order;
		}		
		/**
		 * ---------------------------------------
		 *			limit
		 * ---------------------------------------
		 * @param string $limit
		 */
		public function limit($limit = ''){
			$this->async_var_dhku9 = 'LIMIT '.$limit;
		}
		/**
		 * -------------------------------------
		 *			push
		 * -------------------------------------
		 * @param strign $array		 
		 */
		public function push($array = ''){	
			$async_var_yujm9 = count($array);
			$i = 0;
			foreach ($array as $_object => $_value){
				$i++;
				if ($i < $async_var_yujm9) {
					$this->async_var_ki567.= $_object.',';
					$this->async_var_yj789.= "'".$_value."',";
				}				
				else{
					$this->async_var_ki567.= $_object;
					$this->async_var_yj789.= "'".$_value."'";
				}
			}					
			$this->db->query("INSERT INTO $this->async_var_lol45($this->async_var_ki567) VALUES($this->async_var_yj789)") or die(_MESSEGE($this->db->error, 'ERROR_INSERT_001', 'INSERT INTO '.$this->async_var_lol45.'('.$this->async_var_ki567.') VALUES('.$this->async_var_yj789.')', $this->db_name));
		}
		/**
		 * -------------------------------------------
		 *			get
		 * -------------------------------------------		 
		 */
		public function get(){
			$async_var_fgtu7 = $this->db->query("SELECT * FROM $this->async_var_lol45 $this->async_var_lowe4 $this->async_var_er56h $this->async_var_oprty $this->async_var_lim70 $this->async_var_kop56 $this->async_var_dhku9 $this->async_var_loky6") or die(_MESSEGE($this->db->error, 'ERROR_SELECT_002', 'SELECT * FROM '.$this->async_var_lol45.' '.$this->async_var_lowe4.' '.$this->async_var_er56h.' '.$this->async_var_oprty.' '.$this->async_var_lim70.' '.$this->async_var_kop56.' '.$this->async_var_dhku9.' '.$this->async_var_loky6.'', $this->db_name));
			return $async_var_fgtu7;
		}
		/**
		 * -------------------------------------------
		 *				clean
		 * -------------------------------------------
		 */
		public function clean($array = ''){
			$async_var_fgtu7 = $this->db->query("DELETE FROM $this->async_var_lol45 $this->async_var_lowe4 $this->async_var_er56h $this->async_var_oprty $this->async_var_lim70") or die(_MESSEGE($this->db->error, 'ERROR_DELETE_003', 'DELETE FROM '.$this->async_var_lol45.' '.$this->async_var_lowe4.' '.$this->async_var_er56h.' '.$this->async_var_oprty.' '.$this->async_var_lim70.'', $this->db_name));
			return $async_var_fgtu7;
		}
		/**
		 * -------------------------------------
		 *			edit
		 * -------------------------------------
		 * @param strign $array		 
		 */
		public function edit($array = ''){	
			$async_var_yujm9 = count($array);
			$i = 0;
			foreach ($array as $_object => $_value){
				$i++;
				if ($i < $async_var_yujm9) {
					$this->async_var_ki567.= " ".$_object." = '".$_value."',";
				}				
				else{
					$this->async_var_ki567.= " ".$_object." = '".$_value."'";					
				}
			}					
			$this->db->query("UPDATE $this->async_var_lol45 SET $this->async_var_ki567 $this->async_var_er56h") or die(_MESSEGE($this->db->error, 'ERROR_UPDATE_003', 'UPDATE '.$this->async_var_lol45.' SET '.$this->async_var_ki567.' '.$this->async_var_er56h.'', $this->db_name));
		}

		/**
		 * -----------------------------------------
		 *			structure
		 * -----------------------------------------
		 */
		public function structure(){
			_STRUCTURE('Esta es la estructura de tu db...', $this->db_name, $this->db_url, $this->db_user);
		}
	}	
?>