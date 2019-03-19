<?php
	/*
		 El darkerc(Eder R.C)
	 	 Conexion a una BBDD de mysql usasndo PDO
	 */
	class ConexionBBDD
	{
		//Variable conexion de pdo
		protected $conexion;

		protected $estaConectado;
		
		//Devuelve el numero de filas del la consulta actual
		public $numFilas;
		
		//Conexion a la BBDD
		public function ConexionBBDD($DireccionBBDD,$nombreBBDD,$usuario,$contraseña){

			try{

			$this->conexion=new PDO("mysql:host=$DireccionBBDD; dbname=$nombreBBDD","$usuario","$contraseña");

			//Para poder capturar el error
			$this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

			$this->estaConectado=true;

			}catch(Exception $e){

				$this->estaConectado=false;

				die("Error: ". $e->GetMessage());

			}

		}
		
		//Si la conexion fue exitosa o no
		public function estaConectado(){

			if($this->estaConectado==true){

				echo "Esta Conectado";
			}else{

				echo "No conectado";
			}

		}

		//Codificacion que manejara la BBDD
		public function enviaCodificacion($codificacion){

			$this->conexion->exec("SET CHARACTER SET $codificacion");

		}

		//Devuelve un array de todos los datos de la tabla, se debe indicar forma en que se hara y si seran todos a la vez o separado
		public function datosTodos($tabla,$manejoDeDatos,$formaDatos){

			try{

			$sentenciaSQL="SELECT * FROM $tabla";

			$resultado=$this->conexion->prepare($sentenciaSQL);

			$resultado->execute();
				
			$this->numFilas=$resultado->rowCount();
				
			//Valida si se devuelven todos los datos a la ves de una columna o una por una
			if($formaDatos==true){
				
				//Forma en que se devolveran los datos como array asociativo, de objetos etc
				$datosTabla=$resultado->fetchAll($manejoDeDatos);
				
			}else{
				
				$datosTabla=$resultado->fetch($manejoDeDatos);
				
			}

			

			}catch(Exception $e){

				echo "Error:  " . $e->GetMessage();

				$datosTabla=null;

			}

			return $datosTabla;
		}
		
		//Se debe señalar la sentencia sql directamente, en esta no se realiza con CP (Consulta preparada)
		public function datosTodosSCP($sql,$manejoDeDatos,$formaDatos){

			try{

			//Prepara la sentencia sql
			$resultado=$this->conexion->prepare($sql);

			//La ejecuta
			$resultado->execute();
				
			$this->numFilas=$resultado->rowCount();
				
			if($formaDatos==true){
				
				$datosTabla=$resultado->fetchAll($manejoDeDatos);
				
			}else{
				
				$datosTabla=$resultado->fetch($manejoDeDatos);
				
			}
			

			}catch(Exception $e){

				echo "Error:  " . $e->GetMessage();

				$datosTabla="Error en el registro";

			}

			//Devuelve los datos de la tabla 
			return $datosTabla;
		}
		
		//Recibe el nombre de la tabla y un array asociativo con sus claves ya valores para poder crear la instruccion insert into los valores de texto deven de ir con las comillas dobles o simple y los numeros sin ellas(Por obiedad)
		public function insertaDatos($tabla,$arrayPropiedades){

			//Parte de la sentecia sql
			$elString="(";

			$contador=0;

			//obteniendo los campos donde se insertaran los dtos
			foreach ($arrayPropiedades as $Clave => $Valor) {

				$elString=$elString . $Clave;

				if($contador!=count($arrayPropiedades)-1){

					$elString=$elString . ",";

				}

				$contador++;
			}

			$elString=$elString . ") values (";

			$contador=0;

			//Añadiendo los interrogantes ? para poder realizar la consulta preparada
			for ($i=0; $i < count($arrayPropiedades) ; $i++) { 

				$elString=$elString . "?";

				if($contador!=count($arrayPropiedades)-1){

					$elString=$elString . ",";

				}

				$contador++;
			
			}

			$elString=$elString . ");";

			echo $elString;

			$datosConsulta;

			//Extrallendo los valores de los datos para poder ponerlos en el array de execute
			foreach ($arrayPropiedades as $Clave => $Valor) {
				$datosConsulta[]=htmlentities(addslashes($Valor));
			}

			try{

			//sentencia insert terminada
			$senteciaSQL="INSERT INTO $tabla $elString";

			$resultado=$this->conexion->prepare($senteciaSQL);

			$resultado->execute($datosConsulta);

			}catch(Exception $e){

				die("Error: ". $e->GetMessage());
			}
		}
		
		//Devuelve el objeto conexion PDO usado para la elaboracion de esta clase con ella se puede acceder a los metodos y atributos nativos de un objeto PDO
		public function getConexion(){
			return $this->conexion;
		}
		
		//Recibe un array asociativo que es el que le indica cuales son los criterios de la sentencia sql a crear, devuelve un array asociativo que son los resultados encontrados
		public function datosSeleccionados($tabla,$arrayCriterios,$manejoDeDatos,$formaDatos){
			
			//Preparando la sentencia
			$sentenciaSQL="SELECT * FROM $tabla WHERE";
			
			$contador=0;
			
			$valoresDatos;
					
			//Extrayendo los datos para formar la sentencia sql y ademas el array con
			//los datos de la consulta
			foreach($arrayCriterios as $Clave=>$Valor){
				
				$sentenciaSQL=$sentenciaSQL . "  $Clave = ?";
					
				if($contador!=count($arrayCriterios)-1){

				$sentenciaSQL=$sentenciaSQL . " AND ";

				}

				$contador++;
				
				$valoresDatos[]=htmlentities(addslashes($Valor));
				
			}
	
			//Realizanfo la consulta
			try{
			
			$resultado=$this->conexion->prepare($sentenciaSQL);
			
			$resultado->execute($valoresDatos);
				
			$this->numFilas=$resultado->rowCount();
				
			if($formaDatos==true){
				
				$datosTabla=$resultado->fetchAll($manejoDeDatos);
				
			}else{
				
				$datosTabla=$resultado->fetch($manejoDeDatos);
				
			}
			
			}catch(Exception $e){
				
				echo "Error:  " . $e->GetMessage();

				$datosTabla="Error en el registro";
				
				
			}
			
			return $datosTabla;
		}	
		
		//Cerrando la conexion y liberando memoria
		public function cierraConexion(){
			$this->conexion=null;
		}
		
		public function actualizaDatos($tabla,$arrayCriterios,$arrayDatos){
			
			$sentenciaSQL="UPDATE $tabla SET ";
			
			$contador=0;
			
			$datosAInsertar;
			
			foreach($arrayDatos as $Clave=>$Valor){
				
				$sentenciaSQL=$sentenciaSQL . $Clave . " = ?";
				
				if($contador!=count($arrayDatos)-1){

				$sentenciaSQL=$sentenciaSQL . ", ";

				}

				$contador++;
				
				//$datosAInsertar[]=htmlentities(addslashes($Valor));

				$datosAInsertar[]=$Valor;
				
			}
			
			$contador=0;
			
			$sentenciaSQL=$sentenciaSQL . " WHERE ";
			
			foreach($arrayCriterios as $Clave=>$Valor){
				
				$sentenciaSQL=$sentenciaSQL . $Clave . " = ?";
				
				if($contador!=count($arrayCriterios)-1){

				$sentenciaSQL=$sentenciaSQL . " AND ";

				}

				$contador++;
				
				//$datosAInsertar[]=htmlentities(addslashes($Valor));

				$datosAInsertar[]=$Valor;
				
			}
			
			try{
			
			$resultado=$this->conexion->prepare($sentenciaSQL);
			
			$resultado->execute($datosAInsertar);
			
			}catch(Exception $e){
				
				echo "Error:  " . $e->GetMessage();
				
				die("Error: ". $e->GetMessage());
				
			}
		
		}
	
		public function eliminaDatosSeleccionados($tabla,$arrayCriterios){
			
			$sentenciaSQL="DELETE FROM $tabla WHERE ";
			
			$contador=0;
			
			$datosCriterios;
			
			foreach($arrayCriterios as $Clave=>$Valor){
				
				$sentenciaSQL=$sentenciaSQL . $Clave . " = ?";
				
				if($contador!=count($arrayCriterios)-1){

				$sentenciaSQL=$sentenciaSQL . " AND ";

				}

				$contador++;
				
				$datosCriterios[]=htmlentities(addslashes($Valor));
				
			}
			
			echo $sentenciaSQL;
			
			try{
			
			$resultado=$this->conexion->prepare($sentenciaSQL);
			
			$resultado->execute($datosCriterios);
			
			}catch(Exception $e){
				
				echo "Error:  " . $e->GetMessage();
				
				die("Error: ". $e->GetMessage());
				
			}
			
			
		}
	}
?>