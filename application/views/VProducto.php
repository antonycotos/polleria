<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="<?= base_url()?>res/css/bootstrap.min.css">

<script src="<?= base_url()?>res/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url()?>res/js/popper.min.js""></script>
<script src="<?= base_url()?>res/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>res/js/jstrabajador.js"></script>

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
                      <label for="categoria">* Tipo Proveedor:</label>
                      <?php 
                        echo form_dropdown('categoria', $categoria, '', 'class="form-control selectpicker" id="categoria" required '); ?>       
                   </div> 
      </div>  

    <div class ="col-md-12">
      <label for = "nompro">*Nombre del proveedor</label>
      <input type="text" class ="form-control" id= "nompro" placeholder="Ingresar Nombre" required name="nompro"> 
    </div>

    <div class ="col-md-12">
      <label for = "apepro">*Apellidos del proveedor</label>
      <input type="text" class ="form-control" id= "apepro" placeholder="Ingresar Apellido" required name="apepro"> 
    </div>

    <div class ="col-md-12">
      <label for = "telet">*Telefono</label>
      <input type="number" class ="form-control" id= "telet" placeholder="Ingresar Telefono" required name="telet"> 
    </div>

    <div class ="col-md-12">
      <label for = "correot">*Correo Eletronico</label>
      <input type="email" class ="form-control" id= "correot" placeholder="Ingresar Correo" required name="correot"> 
    </div>

    <div class ="col-md-12">
      <label for = "ruc">*Ruc</label>
      <input type="number" class ="form-control" id= "ruc" placeholder="Ingresar Ruc" required name="ruc"> 
    </div>

    <div class ="col-md-12">
      <label for = "Razonsocial">*Razonsocial</label>
      <input type="text" class ="form-control" id= "Razonsocial" placeholder="Ingresar Nombre" required name="Razonsocial"> 
    </div>

    <div class ="col-md-12">
      <label for = "dirt">*Direccion</label>
      <input type="text" class ="form-control" id= "dirt" placeholder="Ingresar Direccion" required name="dirt"> 
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