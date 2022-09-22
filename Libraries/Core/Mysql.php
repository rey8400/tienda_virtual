<?php

class Mysql extends Conexion{

 
    public  $conexion;
    private $strquery;
    private $arrValues;

    function __construct()
    {
        
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    //Metodo para insertar un registro
    public function insert(string $query, array $arrValues){
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $insert = $this->conexion->prepare($this->strquery);
        $reInsert = $insert->execute($this->arrValues);

        if($reInsert){

            $lastInsert = $this->conexion->lastInsertId(); //retorna el ultimo id registrado

        }else{

            $lastInsert = 0;

        }

        return $lastInsert;

    }


    //Buscar un registro
    public function select(string $query){

        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;


    }

    //Devuelve todos los registros de una tabla
    public function select_all(string $query){

        $this->strquery  = $query;
        $result  = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }

    //Actualizar un registro
    public function update(string $query, array $arrValues){
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $update = $this->conexion->prepare($this->strquery);
        $resExecute = $update->execute($this->arrValues);

        return $resExecute;

    }

    //Eliminar un registro de la tabla

    public function delete(string $query){

        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $del = $result->execute();
        return $del;
    }



}




?>