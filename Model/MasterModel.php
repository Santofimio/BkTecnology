<?php

include_once '../Lib/configuration/Connection.php';

class MasterModel extends Connection{

    public function ejecutar($sql){

        $ejecutar = mysqli_query($this->getConnect(),$sql);

        if($ejecutar){
            return $ejecutar;

        }else{
            die(mysqli_error($this->getConnect()));

        }
    }

    public function create($table,$fields=false,$values){

		if($fields!=false){
			$fields="($fields)";
		}

	  	$sql="insert into $table $fields values($values)";

		$ejecutar=mysqli_query($this->getConnect(),$sql);
		if(!$ejecutar){
			echo mysqli_error($this->getConnect());
		}
	}

	public function update($table,$condicion=false,$campos){

		if($condicion!=false){
			$condicion= "where ". $condicion;
		}
		$actualizar="";
		foreach($campos as $campo=>$valor){
			$actualizar.="$campo=$valor,";
		}
		$campos=substr($actualizar,0,-1);

		$sql="update $table set $campos  $condicion";
		$ejecutar=mysqli_query($this->getConnect(),$sql);
		if(!$ejecutar){
			echo mysqli_error($this->getConnect());
		}
	}



	public function consult($campos,$tabla,$condicion=false){

		if($condicion!=false){
			$condicion="where $condicion";
		}
		$sql="select $campos from $tabla $condicion";
		$ejecutar=mysqli_query($this->getConnect(),$sql);
		if($ejecutar){
			return $ejecutar;
		}
		else{
			echo mysqli_error($this->getConnect());
		}
	}

	public function delete($table,$condicion){

		$sql="delete from $table where $condicion";

		$ejecutar=mysqli_query($this->getConnect(),$sql);
		if(!$ejecutar){
			echo mysqli_error($this->getConnect());
		}
	}

	function autoIncrement($id,$tabla)
	{
		$sql = "select max($id) from $tabla";
		$resultado = mysqli_query($this->getConnect(), $sql);
		$contador = mysqli_fetch_row($resultado);
		return end($contador) + 1;
	}
}
