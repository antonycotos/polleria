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

<script src="<?= base_url()?>res/js/jsresponsable.js"></script>

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
    <h1 class="display-3">REGISTRAR</h1>
    <p class="lead">INGRESE DATOS</p>
  </div>
</div>
<section>
<div class="row">
  <div class="card col-md-12">  
    <div class="card-body">
        <h5 class="card-title">MODULO RESPONSABLE</h5>
          
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
      <label for = "idtrab">*Tipo de trabajador</label>
      <input type="number" class ="form-control" id= "idtrab" placeholder="Ingresar Nombre" required name="idtrab"> 
    </div>

    <div class ="col-md-12">
      <label for = "idloc">*Tipo de local</label>
      <input type="number" class ="form-control" id= "idloc" placeholder="Ingresar Telefono" required name="idloc"> 
    </div>

    <div class ="col-md-12">
      <label for = "fecini">*Fecha de inicio</label>
      <input type="date" class ="form-control" id= "fecini" placeholder="Ingresar Direccion" required name="fecini"> 
    </div>

    <div class ="col-md-12">
      <label for = "fecfin">*Fecha de fin</label>
      <input type="date" class ="form-control" id= "fecfin" placeholder="Ingresar Correo" required name="fecfin"> 
    </div>

    <div class ="col-md-12">
      <label></label>
    </div>

     <button class="btn btn-primary btn-lg btn-block" type="submit" id="brgrabar">Registrar</button>

    </form>
    
  </div>
</div>
<div class="card col-md-8">
  <div class="card-body">
    <h5 class="card-title">LISTADOS</h5>
    <button class="btn btn-primary btn-lg btn-block" id="brMostrar">Mostrar</button>
    <table id="table"  class="table table-striped"
    data-click-to-select="true"
    data-detail-formatter="detailFormatter" 
    data-sort-name="v5"
    data-sort-order="desc" 
    data-show-toggle="true" 
    data-show-columns="true"                     
                                >
            <thead>
            <tr>
          <th data-filed ="v2">Nombre</th>
          <th data-filed ="v3">Telefono</th>
          <th data-filed ="v4">Direccion</th>
          <th data-filed ="v5">Correo Electronico</th>
          <th data-filed ="v6">Aforo</th>
            </tr>
            </thead>
        </table>

  </div>
</div>
</div>
  
</section>
</body>
</html>




