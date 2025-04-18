<?php
class sql{
//////////////////////////////////////////////////////////////////////////////////////////////
	private $cnn;
	private $_datosRegistros;
	private $_registros;
	private $GLOBAL_servidor;
	private $GLOBAL_basededatos;
	private $GLOBAL_userBD;
	private $GLOBAL_claveuserBD;

//////////////////////////////////////////////////////////////////////////////////////////////
	public function __construct()
	{ 	
	$this->GLOBAL_servidor="localhost";
	$this->GLOBAL_basededatos= "salsamentaria_db";
	$this->GLOBAL_userBD= "root";
	$this->GLOBAL_claveuserBD="";
	
	
	$this->cnn = new mysqli($this->GLOBAL_servidor, $this->GLOBAL_userBD, $this->GLOBAL_claveuserBD, $this->GLOBAL_basededatos);
	$this->cnn->set_charset("utf8");

	//$this->cnn=mysql_connect($this->GLOBAL_servidor,$this->GLOBAL_userBD,$this->GLOBAL_claveuserBD); 
	//mysql_select_db($this->GLOBAL_basededatos, $this->cnn); 
	} 

//////////////////////////////////////////////////////////////////////////////////////////////
/*
function consultarBase($sql)
{
$link = mysql_connect($this->GLOBAL_servidor, $this->GLOBAL_userBD,$this->GLOBAL_claveuserBD); 
mysql_select_db($this->GLOBAL_basededatos, $link); 
$result = mysql_query($sql, $link);
return $result;
}
*/
////////////////////////////////////////////////////////////////////////////////////////////// 
	function consultar($sql){
	//$result = mysql_query($sql, $this->cnn);
	$result = $this->cnn->query($sql);

	//$this->_registros = mysql_num_rows($result);
	$this->_registros = $result->num_rows;
	$_SESSION["consultaTotalRegistrosSQL"]=$this->_registros;

	if($this->_registros > 0){
		
		$x = 0;
		$num_fields = mysqli_num_fields($result);
		$this->_datosRegistros = array();
		
		while($row = mysqli_fetch_array($result,MYSQLI_NUM)){	
			for($j = 0; $j < $num_fields; $j ++){
				//$name = mysql_field_name($result, $j);
				$name = mysqli_fetch_field_direct($result, $j)->name;
				$this->_datosRegistros[$x][$name] = $row[$j];
			}
			
			$x++;
			}
	}

	return $this->_datosRegistros;
	}
//////////////////////////////////////////////////////////////////////////////////////////////INSERT, DELETE, UPDATE
	function sentencia($sql){
		//$result = mysql_query($sql, $this->cnn);
		$result = $this->cnn->query($sql);	
	}
	////////////////////////////////////////////////////////////////////////////////////////////// SELECT
	function sentenciaRetorno($sql){
		//return mysql_query($sql, $this->cnn);
		return $this->cnn->query($sql);
	}
	////////////////////////////////////////////////////////////////////////////////////////////// SELECT
	function validarConsulta($sql){
		//$result = mysql_query($sql, $this->cnn);
		//return mysql_num_rows($result);
		$result = $this->cnn->query($sql);	
		$this->_registros = $result->num_rows;
		return $result->num_rows;
	}
	////////////////////////////////////////////////////////////////////////////////////////////// SELECT
	function getConexion(){
		return  $this->cnn;
	}
}
?>