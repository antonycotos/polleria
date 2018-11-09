<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="<?= base_url()?>res/css/bootstrap.min.css">

<link rel="stylesheet" href="<?= base_url()?>res/css/bootstrap-table.min.css">

 

<script src="<?= base_url()?>res/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url()?>res/js/popper.min.js""></script>
<script src="<?= base_url()?>res/js/bootstrap.min.js"></script>

<script src="<?= base_url()?>res/js/bootstrap-table.min.js"></script>

<script src="<?= base_url()?>res/js/jstrabajador.js"></script>

  <title></title>
</head>
<body>
<header id="header" class="">
  
</header>
<script>
 ruta='<?= base_url()?>';      
  $(document).ready(function() {
    doaccion();
  });
</script>
<body>


<div class="container">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-3">Registrar Trabajador</h1>
    <p class="lead">Ingrese datos</p>
  </div>
</div>
<section>
<div class="row">
  <div class="card col-md-12">  
    <div class="card-body">
        <h5 class="card-title">MODULO DE TRABAJADOR</h5>
          
    </div>
   </div> 
</div>   
</section>

<section>
<div class="row">

<div class="card col-md-4">  
  <div class="card-body">
    <h5 class="card-title">REGISTRAR</h5>
    <div class="alert alert-success" role="alert" id="wok">
  <p id="mok"></p>
</div>
<div class="alert alert-danger" role="alert" id="werror">
  <p id="merror"></p>
</div>


     <?= form_open('#', array('id' => 'frmreg','name' => 'frmreg')) ?>
      
      <div class ="col-md-12">
      <label for = "idtipot">*Tipo de trabajador</label>
      <input type="number" class ="form-control" id= "idtipot" laceholder="Ingresar Nombre" required name="idtipot"> 
    </div>

    <div class ="col-md-12">
      <label for = "idtipodocut">*Tipo de documento</label>
      <input type="number" class ="form-control" id= "idtipodocut" placeholder="Ingresar Nombre" required name="idtipodocut"> 
    </div>

    <div class ="col-md-12">
      <label for = "nombrest">*Nombre</label>
      <input type="text" class ="form-control" id= "nombrest" placeholder="Ingresar Nombre" required name="nombrest"> 
    </div>

    <div class ="col-md-12">
      <label for = "apellidost">*Apellido</label>
      <input type="text" class ="form-control" id= "apellidost" placeholder="Ingresar Nombre" required name="apellidost"> 
    </div>

    <div class ="col-md-12">
      <label for = "telefonot">*Telefono</label>
      <input type="number" class ="form-control" id= "telefonot" placeholder="Ingresar Telefono" required name="telefonot"> 
    </div>

    <div class ="col-md-12">
      <label for = "direcciont">*Direccion</label>
      <input type="text" class ="form-control" id= "direcciont" placeholder="Ingresar Direccion" required name="direcciont"> 
    </div>

    <div class ="col-md-12">
      <label for = "correoelectronicot">*Correo Eletronico</label>
      <input type="email" class ="form-control" id= "correoelectronicot" placeholder="Ingresar Correo" required name="correoelectronicot"> 
    </div>

    <div class ="col-md-12">
      <label for = "fechanacimientot">*fecha de nacimiento</label>
      <input type="date" class ="form-control" id= "fechanacimientot" placeholder="Ingresar Aforo" required name="fechanacimientot"> 
    </div>

    <div class ="col-md-12">
      <label for = "documento">*Documento Identidad</label>
      <input type="number" class ="form-control" id= "documento" placeholder="Ingresar Numero de Documento" required name="documento"> 
    </div>
        <div class ="col-md-12">
      <label></label>
    </div>
    <div class ="col-md-12">
      <label></label>
    </div>
      <div class ="col-md-12">
     <button class="btn btn-primary btn-lg btn-block" type="submit" id="brgrabar">Registrar</button>
    </div>

    </form>
  </div>

</div>

<div class="card col-md-8">
  <div class="card-body">
    <h5 class="card-title">LISTADOS</h5> 
    <button class="btn btn-primary btn-lg btn-block" id="brMostrar">Mostrar</button>
    <table id="tablel"  class="table table-striped"
    data-click-to-select="true"
    data-detail-formatter="detailFormatter" 
    data-sort-name="v9"
    data-sort-order="desc" 
    data-show-toggle="true" 
    data-show-columns="true"                     
                                >
            <thead>
            <tr>
          <th data-filed ="v2">Tipo de trabajador</th>
          <th data-filed ="v3">Tipo de documento</th>
          <th data-filed ="v4">Apellido</th>
          <th data-filed ="v5">Telefono</th>
          <th data-filed ="v6">Direccion</th>
          <th data-filed ="v7">Correo Eletronico</th>
          <th data-filed ="v8">fecha de nacimiento</th>
          <th data-filed ="v9">Documento Identidad</th>
            </tr>
            </thead>
        </table>

  </div>
</div>
</div>
  
</section>
</body>
</html>




