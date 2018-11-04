<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="<?= base_url()?>res/css/bootstrap.min.css">

<script src="<?= base_url()?>res/js/jquery-3.1.0.js"></script>
<script src="<?=base_url()?>res/js/bootstrap-select.min.js"></script>
  <script src="<?=base_url()?>res/js/bootstrap-table.js"></script>
  <script src="<?=base_url()?>res/js/bootstrap.min.js"></script>  
<script type="text/javascript" src="<?= base_url()?>res/js/jslocal.js"></script>

  <title></title> 
</head>
<body>
<script>
var ruta="<?=base_url()?>"
$(document).ready(function(){
  doaccion();
});
</script>  
<header id="header" class="">
  
</header>

<div class="container">



<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Registrar Local</h1>
    <p class="lead">Ingrese datos</p>
  </div>
</div>
<section>
<div class="row">
<div class="card col-md-12">
  <h5 class="card-title">Modulo Local</h5>
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
      <label for = "nombrel">*Nombre</label>
      <input type="text" class ="form-control" id= "nombrel" placeholder="Ingresar Nombre" required name="nombrel"> 
    </div>

    <div class ="col-md-12">
      <label for = "telefonol">*Telefono</label>
      <input type="number" class ="form-control" id= "telefonol" placeholder="Ingresar Telefono" required name="telefonol"> 
    </div>

    <div class ="col-md-12">
      <label for = "direccionl">*Direccion</label>
      <input type="text" class ="form-control" id= "direccionl" placeholder="Ingresar Direccion" required name="direccionl"> 
    </div>

    <div class ="col-md-12">
      <label for = "correoelectronicol">*Correo Eletronico</label>
      <input type="email" class ="form-control" id= "correoelectronicol" placeholder="Ingresar Correo" required name="correoelectronicol"> 
    </div>

    <div class ="col-md-12">
      <label for = "aforo">*Aforo</label>
      <input type="number" class ="form-control" id= "aforo" placeholder="Ingresar Aforo" required name="aforo"> 
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
    <table id="tablel" name="tablel" data-toggle="table" data-pagination="true" data-click-to-select="true" data-unique-id="v1">
      <thead>
        <tr>
          <th data-field="v1">ID</th>
          <th data-filed ="v2">nombre</th>
          <th data-filed ="v3">telefono</th>
          <th data-filed ="v4">direccion</th>
          <th data-filed ="v5">correoelectronico</th>
          <th data-filed ="v6">aforo</th>
        </tr>
      </thead>
    </table>


  </div>
</div>
</div>
  
</section>
</body>
</html>