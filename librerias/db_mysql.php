<?php
/**
*	DB MySQL
*
*	Descripción: Librería para realizar las tareas más comunes con una base de datos MySQL
*	Fecha: 20/01/2025
*	Autor: Juan Pablo Barba Muñoz
*/

/**
*	Abre una conexión MySQLi con los datos definidos en las constantes
*
*	@return Devuelve la conexión si se realiza correctamente o false en caso contrario
*/
function db_open()
{
	try{
		return mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
	}catch(Exception $e){
		return false;
	}
}

/**
* Cierra la conexión que se pasa como parámetro
*/
function db_close($conn){
	try{
		return mysqli_close($conn);
	}catch(Exception $e){
		return false;
	}	
}

/**
* Realiza una consulta. Está orientada a consultas SELECT
*
* @return Devuelve un array con los resultados. false en caso contrario
*/
function db_query($conn, $sql, $values=null){

	try{
		$stmt=mysqli_prepare($conn, $sql);
		mysqli_stmt_execute($stmt, $values);
		$res=mysqli_stmt_get_result($stmt);

			// Detectamos si es un SELECT, DELETE, UPDATE o INSERT

		if(gettype($res)=='boolean'){
			return $res;
		}else{
			$data=mysqli_fetch_all($res, MYSQLI_ASSOC);
			mysqli_free_result($res);
			return $data;
		}
	}catch(Exception $e){
		echo $e;
		return false;
	}
}

/** 
* Realiza un INSERT. Le pasamos el nombre de la tabla donde queramos insertar los datos
* y un array asociativo con los datos que queramos insertar. Las claves deben corresponder
* con campos existentes en la tabla.
*
* @param $conn conexión MySQLi que esté abierta
* @param $table nombre de la tabla
* @param $dto array asociativo con los datos a insertar
* @return Devuelve el id del elemento insertato o false en caso contrario.
*/
function db_insert($conn, $table, $dto){
	try{
		unset($dto['id']);
		$fields=implode(', ', array_keys($dto));
		$values=array_values($dto);
		$params=implode(', ', array_fill(0, count($values), '?'));
		$sql="INSERT INTO $table ($fields) VALUES ($params)";
		$stmt=mysqli_prepare($conn, $sql);
		$res=mysqli_stmt_execute($stmt, $values);	
		return mysqli_insert_id($conn);
	}catch(Exception $e){
		return false;
	}
}

/**
* Realiza un UPDATE. Le pasamos el nombre de la tabla que queramos actualizar,
* un array asociativo con los datos. Las claves deben corresponder
* con campos existentes en la tabla. El array debe incluir una clave id y su valor
*
* @param $conn conexión MySQLi que esté abierta
* @param $table nombre de la tabla
* @param $dto array asociativo con los datos a insertar
* @return Devuelve el id del elemento insertato o false en caso contrario.
*/
function db_update($conn, $table, $dto){
	if(isset($dto['id'])){
		$id=$dto['id'];
		unset($dto['id']);
	}else{
		return false;
	}
	try{
		$values=array_values($dto);
		$fields=[];
		foreach($dto as $key=>$value)
		{
			$fields[]="$key=?";
		}
		$sql="UPDATE $table SET ".implode(', ', $fields)." WHERE id=$id";

		$stmt=mysqli_prepare($conn, $sql);
		return mysqli_stmt_execute($stmt, array_values($dto));
	}catch(Exception $e){
		return false;
	}
}

/**
* Borrar la fila de la tabla cuyo id sea igual al que se pasa por parámetro
*
* @param $conn Conexión MySQLi
* @param $table Nombre de la tabla
* @param $id id de la fila
* @return true si se ejecuta corre ctamente
*/
function db_delete_by_id($conn, $table, $id)
{
	try{
		$stmt=mysqli_prepare($conn, "DELETE FROM $table WHERE id=?");
	return mysqli_stmt_execute($stmt, [$id]);
	}catch(Exception $e){
		return false;
	}
}