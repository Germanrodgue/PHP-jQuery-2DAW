<p align="center">Introduzca sus datos personales:</p>

 <div align="center" >

  <form method="post" name="formusers" id="formusers" class="topBefore" onsubmit="return validate_user();" action="index.php?page=controller_users&op=create">
   
	<?php
		if(isset($error)){
			print ("<BR><span CLASS='styerror'>" . "* ".$error . "</span><br/>");
		}?>
 <span id="e_nombre" class="styerror"></span>
     <input  type="text" name="nombre" id="nombre"  placeholder="nombre" value="<?php echo $_POST?$_POST['nombre']:""; ?>" />
     
      <br>
      <span id="e_email" class="styerror"></span>
     <input name="correo" type="text" id="correo" class="correo" placeholder="email" paceholder_ value="<?php echo $_POST?$_POST['correo']:""; ?>" />
 
      <br>
      <span id="e_fecha" class="styerror"></span>
       <input id="demo1" type="text" name="fecha" class="fecha" placeholder="fecha" readonly="readonly" value="<?php echo $_POST?$_POST['fecha']:""; ?>" /> 
       
      <br>

      <hr style="height: 0px; width: 99%; padding-top:0px; margin:30px;"/>

      <p align="center">Datos sobre la imagen:</p>

      <span id="e_link" class="styerror"></span>
     <input name="link" type="text" id="link" class="link" placeholder="link" value="<?php echo $_POST?$_POST['link']:""; ?>"/> 
     
      <br>

     <input name="imgnombre" type="text" id="imgnombre" class="imgnombre" value=""/> 
     
     <br>
      <input name="descr" type="text" id="descr" class="descr" value=""/> 
     
     <br>
    <div class="checkbox1">
      <h4> Tipo de fotografía </h4>

            Sin categoria <input type="radio" name="tipo" value="Retrato" class="checkbox1" checked>
           Retrato <input type="radio" name="tipo" value="Retrato" class="checkbox1" >
           Paisaje  <input type="radio" name="tipo" value="Paisaje" class="checkbox1">
           Aerea <input type="radio" name="tipo" value="Aerea"  class="checkbox1"> 

    </div>
<br>
 

        <input name="Enviar" type="submit" value="Enviar" class="boton"/>

    
  </form>
  </div>