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

<script src="<?= base_url()?>res/js/jsproducto.js"></script>

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
        <h5 class="card-title">MODULO PRODUCTO</h5>
          
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
      <div class="form-group">    
                      <label for="idcategoria">*Categoria:</label>
                      <?php 
                        echo form_dropdown('idcategoria', $categoria, '', 'class="form-control selectpicker" id="idcategoria" required '); ?>       
                   </div> 


    <div class ="col-md-12">
      <label for = "nombrep">*Nombre</label>
      <input type="text" class ="form-control" id= "nombrep" placeholder="Ingresar Nombre" required name="nombrep"> 
    </div>

    <div class ="col-md-12">
      <label for = "precio">*Precio</label>
      <input type="number" class ="form-control" id= "precio" placeholder="Ingresar Precio" required name="precio"> 
    </div>

    <div class ="col-md-12">
      <label for = "cantidad">*Cantidad</label>
      <input type="number" class ="form-control" id= "cantidad" placeholder="Ingresar Cantidad" required name="cantidad"> 

     <div class ="col-md-12">
      <label for = "idcat">*Id Categoria</label>
      <input type="number" class ="form-control" id= "idcat" placeholder="Ingresar categoria" required name="idcat"> 
    </div>

     <div class ="col-md-12">
      <label for = "nompro">*Nombre del peoducto</label>
      <input type="text" class ="form-control" id= "nompro" placeholder="Ingresar producto" required name="nompro"> 
    </div>

    <div class ="col-md-12">
      <label for = "precio">*Precio del producto</label>
      <input type="number" step="any" class ="form-control" id= "precio" placeholder="Ingresar precio" required name="precio"> 

     <div class ="col-md-12">
      <label for = "idcat">*Id Categoria</label>
      <input type="number" class ="form-control" id= "idcat" placeholder="Ingresar categoria" required name="idcat"> 
    </div>

     <div class ="col-md-12">
      <label for = "nompro">*Nombre del peoducto</label>
      <input type="text" class ="form-control" id= "nompro" placeholder="Ingresar producto" required name="nompro"> 
    </div>

    <div class ="col-md-12">
      <label for = "precio">*Precio del producto</label>
      <input type="number" step="any" class ="form-control" id= "precio" placeholder="Ingresar precio" required name="precio"> 
    </div>

    <div class ="col-md-12">
      <label for = "cantidadp">*Cantidad del producto</label>
      <input type="number" class ="form-control" id= "cantidadp" placeholder="Ingresar cantidad" required name="cantidadp"> 

    </div>

    <div class ="col-md-12">
      <label for = "cantidadp">*Cantidad del producto</label>
      <input type="number" class ="form-control" id= "cantidadp" placeholder="Ingresar cantidad" required name="cantidadp"> 
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
                <th data-field="v2">Tipo de producto</th>
                <th data-field="v3">Nombre</th>
                <th data-field="v4">Precio</th>
                <th data-field="v5">Cantidad</th>
            </tr>
            </thead>
        </table>

  </div>
</div>
</div>
  
</section>
</body>
</html>




