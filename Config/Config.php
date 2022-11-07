<?php

//Variables constantes acceder a directorios


//const BASE_URL = "http://localhost/tienda_virtual";

//url en la nube
const BASE_URL = "https://tienda-virtual-pr19004.herokuapp.com";

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
const DB_CHARSET = "charset=utf8";
*/


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


	const  CAT_SLIDER =  "1";




	//Datos Empresa

	//Datos envio de correo
	const NOMBRE_REMITENTE = "Tienda Virtual Kayfa";
	const NOMBRE_EMPESA = "Kayfa Store SV";
	const WEB_EMPRESA = "https://tienda-virtual-pr19004.herokuapp.com";
	const DIRECCION = "Avenida Gavividia zona 7, El Salvador";
	const TELEMPRESA = "+(503)78787845";
	const EMAIL_EMPRESA = "KafaStore@gmail.com";
	


	//Datos para Encriptar /Desencriptar
	const KEY = 'dsi2';
	const METHODENCRIPT = 'AES-128-ECB';

	//Envío
	const COSTOENVIO = 10;

	const EMAIL_PEDIDOS = "info@abelosh.com";

		//Módulos
		const MCLIENTES = 3;
		const MPEDIDOS = 5;
	
		//Roles
		const RADMINISTRADOR = 1;
		const RCLIENTES = 7;

		const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

		//Buscador
	const PROBUSCAR = 4;


?>