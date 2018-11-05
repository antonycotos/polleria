idtipoproveedorp<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="<?= base_url()?>res/css/bootstrap.min.css">

<script src="<?= base_url()?>res/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url()?>res/js/popper.min.js""></script>
<script src="<?= base_url()?>res/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>res/js/jsproveedor.js"></script>

  <title></title>
</head>
<body>
<header id="header" class="">
  
</header>
<script>
ruta='<?=base_url()?>';
$(document).ready(function(){
  doaccion();
});
</script>
<div class="container">

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Registrar Proveedor</h1>
    <p class="lead">Ingrese datos</p>
  </div>
</div>
<section>
<div class="row">
<div class="card col-md-12">
  <h5 class="card-title">Modulo Proveedor</h5>
</div>
</div>
</section>

<section>
<div class="row">
<div class="card col-md-4">
  <div class="card-body">
    <h5 class="card-title">Registrar</h5>

    <div class="alert alert-success" role="alert" id = "wok">
  <p id="mok"></p>
</div>
<div class="alert alert-danger" role="alert" id = "werror">
  <p id="merror"></p>
</div>

    <?= form_open('#',array('id'=>'frmreg','name' => 'frmreg'))?>
    
          <div class ="col-md-12">
     <div class="form-group">    
                      <label for="idtipoproveedorp">* Tipo Proveedor:</label>
                      <?php 
                        echo form_dropdown('idtipoproveedorp', $tipo, '', 'class="form-control selectpicker" id="idtipoproveedorp" required '); ?>       
                   </div> 
      </div>  

    <div class ="col-md-12" id="dnombre">
      <label for = "nombresprov">*Nombre del proveedor</label>
      <input type="text" class ="form-control" id= "nombresprov" placeholder="Ingresar Nombre" required name="nombresprov"> 
    </div>

    <div class ="col-md-12" id="dapellidos">
      <label for = "apellidoprov">*Apellidos del proveedor</label>
      <input type="text" class ="form-control" id= "apellidoprov" placeholder="Ingresar Apellido" required name="apellidoprov"> 
    </div>

    <div class ="col-md-12">
      <label for = "telefonoprov">*Telefono</label>
      <input type="number" class ="form-control" id= "telefonoprov" placeholder="Ingresar Telefono" required name="telefonoprov"> 
    </div>

    <div class ="col-md-12">
      <label for = "correoelectronicol">*Correo Eletronico</label>
      <input type="email" class ="form-control" id= "correoelectronicol" placeholder="Ingresar Correo" required name="correoelectronicol"> 
    </div>

     <div class ="col-md-12" id="druc">
      <label for = "ruc" id="lruc">*Ruc</label>
      <input type="number" class ="form-control" id= "ruc" placeholder="Ingresar Ruc" required name="ruc"> 
    </div>

    <div class ="col-md-12" id="drz">
      <label for = "razonsocial" id="lrz">*Razonsocial</label>
      <input type="text" class ="form-control" id= "razonsocial" placeholder="Ingresar Nombre" required name="razonsocial"> 
    </div>

    <div class ="col-md-12">
      <label for = "direccionprov">*Direccion</label>
      <input type="text" class ="form-control" id= "direccionprov" placeholder="Ingresar Direccion" required name="direccionprov"> 
    </div>

    <div class ="col-md-12">
      <label></label>
    </div>
    <div class ="col-md-12">
      <label></label>
    </div>

    <button class="btn btn-primary btn-lg btn-block" type="submit" id="brgrabar">Grabar</button>

  </form>

  </div>
</div>

<div class="card col-md-8">
  <div class="card-body">
    <h5 class="card-title">Listados</h5>
    <button class="btn btn-primary btn-lg btn-block" type=
    "submit" id="brMostrar">Mostrar</button>
    <table id="table">
      <thead>
        <tr>
          <th data-filed ="v2">Tipo de proveedor</th>
          <th data-filed ="v4">nombre</th>
          <th data-filed ="v4">apellido</th>
          <th data-filed ="v4">telefono</th>
          <th data-filed ="v4">Correo Eletronico</th>
          <th data-filed ="v4">ruc</th>
          <th data-filed ="v4">razon social</th>
          <th data-filed ="v4">direccion</th>
        </tr>
      </thead>
    </table>


  </div>
</div>
</div>
  
</section>
</body>
</html>