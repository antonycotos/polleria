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

<script src="<?= base_url()?>res/js/jslocal.js"></script>

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
        <h5 class="card-title">MODULO LOCAL</h5>
          
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

     <div class ="col-md-12">
      <label></label>
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




