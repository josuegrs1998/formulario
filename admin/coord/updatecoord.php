<?php
    include('../../conexion.php');
    include('../../Login/iniciar.php');
error_reporting(0);

$_GET['rn']; //idcoordinador
$_GET['sn']; //nombre
$_GET['cl']; //apellido
$_GET['ndos']; //segundo nombre
$_GET['ados']; //segundo apellido
$_GET['sexo']; //sexo
$_GET['telefono']; //telefono
$_GET['correo']; //correo
$nombrecarrera =$_GET['car']; //nombre de la carrera


?>

<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../estilo.css">
    <link rel="stylesheet" type="text/css" href="../../pop-up.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
    </head>
    <body >

 
        <h1 id="h1conf">Actualizar Coordinadores</h1>
        <br>
    <div class="formcontra col" >
    <form action="updatereparacion.php" method="GET" autocomplete="off"  >
    <div class="row">
		<div class="form2 col-6">
		<p>ID</p>
		
        
       <br>
        <input class="idnone" type="text" name="id" placeholder="CIF" maxlength="8" required value="<?php echo $_GET['rn']; ?>">
        <p><?php echo $_GET['rn']; ?></p>
        <br>
        <p>Nombres</p>
		
        <input type="text" name="nombre" placeholder="Primer nombre" maxlength="45" required value="<?php echo $_GET['sn']; ?>">
        <br><br>
        <input type="text" name="segundoNombre" placeholder="Segundo nombre" maxlength="25" pattern="[A-Za-z]+" required required value="<?php echo $_GET['ndos']; ?>">
        <br><br>

		<p>Apellidos</p>
		<input type="text" name="apellido" placeholder="Apellido" maxlength="45" required value="<?php echo $_GET['cl']; ?>">
		<br><br>
        <input type="text" name="segundoapellido" placeholder="Apellido" maxlength="45" required value="<?php echo $_GET['ados']; ?>">
        <br><br>
        </div>

        
		<div class="form2 col-6">
        <p>Telefono</p>
		<input type="text" name="telefono"  maxlength="11" pattern="[0-9]{11}" required value="<?php echo $_GET['telefono']; ?>">
		<br><br>

        <p>Correo</p>
		<input type="email" name="correo"  maxlength="45" required value="<?php echo $_GET['correo']; ?>">
		<br><br>
        

        <p>Carrera</p>
						<select name="carrera" required flex>
                        <option><?php echo $nombrecarrera ?>
						</option>
							<?php 
									$sql="SELECT * from oferta_academica";
									$result=mysqli_query($conexion,$sql);
								
									
									while($ensenar=mysqli_fetch_array($result)){
										echo "
                                        
											<option>".$ensenar['nombre']."</option>
										
									"
											
									?>
									<?php 
								}
								?>	
							</select>
                            </div>
                            </div>


        <div class="pop-up">
			<div >
				<p>¿Esta seguro?</p>
				<input type="submit" name='submit' value="Confirmar"/>
					
				<br>
				<input class= "pop-up-cancel" type="button" value="Cancelar">
			</div>
		</div>
    </form>
    <button class="pop-up-activate">Actualizar</button>
    </div>
    <?php
    /*
        if($_GET['submit'])
        {
            $idcoord = $_GET['id'];
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $segundonombre = $_GET['segundoNombre'];
            $segundoapellido = $_GET['segundoapellido'];
            $telefono = $_GET['telefono'];
            $correo = $_GET['correo'];
            $carrera = $_GET['carrera']; 

        $recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
	    $consulta = mysqli_query($conexion, $recuperarID);
	    $array = mysqli_fetch_array($consulta);
        $idcarrera= $array['idcarrera'];
    
           
            $query ="UPDATE coordinadores SET  nombre= '$nombre', apellido='$apellido', segundoNombre='$segundonombre', segundoApellido='$segundoapellido', correo='$correo', telefono='$telefono', idcarrera='$idcarrera' WHERE idcoordinador='$idcoord'";
           

            if(mysqli_query($conexion, $query))
            {
                header("Location: http://localhost:8080/formulario/admin/coord/coord.php");
            }
            else{
             echo"NEPE"
            }
        }
      */
        ?>
        	<?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
					<p>Hubo Un Error Al Actualizar</p>
                    <input class='pop-up-cancel' type='button' value='Confirmar'>
                </div>
            </div> ";
       }
       ?>
        <style>
        body{
            background-color:rgb(21, 32, 43);
        }
        </style>
       
        
    </body>
    <script src="../../pop-up.js"></script>
</html>

