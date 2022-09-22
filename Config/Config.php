<?php

//Variables constantes acceder a directorios

//define("BASE_URL", "http://localhost/tienda_virtual/");
const BASE_URL = "http://localhost/tienda_virtual";

//Zona horaria
date_default_timezone_set('America/El_Salvador');


const LIBS = "Libraries/";
const VIEWS = "Views/";
/*
//Datos para la conexion a base de datos

const DB_HOST = "localhost";
const DB_NAME = "db_tiendavirtual";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "charset=utf8";*/

//Datos para la conexion a base de datos externa

const DB_HOST = "us-cdbr-east-06.cleardb.net";
const DB_NAME = "heroku_79fb5a24eba3054";
const DB_USER = "b851d76bdd4c24";
const DB_PASSWORD = "da646ecc";
const DB_CHARSET = "charset=utf8";



	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

    	//Simbolo de moneda
	const SMONEY = "$";


?>