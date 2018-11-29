<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="<?= base_url()?>res/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url()?>res/css/bootstrap-table.min.css">
<script src="<?= base_url()?>res/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url()?>res/js/bootstrap-table.min.js"></script>
<script src="<?= base_url()?>res/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>res/js/jspedido.js"></script>

  <title>PEDIDO</title> 
</head> 
<body>
<header id="header" class="">
  
</header>
<script>
 ruta='<?= base_url()?>';      
  $(document).ready(function() {
    ejecutar();
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
<div class="card col-md-6">
  <div class="alert alert-success" role="alert" id = "wok">
  <p id="mok"></p>
</div>
<div class="alert alert-danger" role="alert" id = "werror">
  <p id="merror"></p>
</div>
  <?= form_open('#',array('id'=>'frmbuscar','name' => 'frmbuscar'))?>
      <div class="form-group">
                  <label for="producto">
                   PRODUCTO 
                  </label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Ingrese Producto" id="producto" name="producto" >
                    <span class="input-group-btn">
                      <button class="btn btn-primary"  id="btnbuscarproducto" name="btnbuscarproducto" type="submit">BUSCAR</button>                      
                    </span>                    
                  </div>                 
    	</div>

      <div class="form-group">
                  <label for="categoria">
                   CATEGORIA
                  </label>
                  <span class="input-group-btn">
                       <input type="checkbox" name="bcat" id="bcat" vaulue="yes">                      
                    </span>  
                      <?php 
                        echo form_dropdown('categoria', $categoria, '', 'class="form-control selectpicker" id="categoria" required '); ?>                             
      </div>
    	</form> 
  <div class="card-body">
    
     <?= form_open('#', array('id' => 'frmreg','name' => 'frmreg')) ?>

    <div class="card-body">
    <h5 class="card-title">PRODUCTO</h5>
    <table id="tableproducto"  class="table table-striped"
    data-click-to-select="true"
    data-detail-formatter="detailFormatter"     
    data-sort-order="desc" 
    data-show-toggle="true" 
    data-show-columns="true" 
    data-toggle="table" data-pagination="true" data-click-to-select="true"                   
    data-unique-id="v1">
            <thead>
            <tr>
                <th data-field="state" data-radio="true" data-button>Seleccionar</th>
                <th data-field="v1">ID</th>
                <th data-field="v2">CATEGORIA</th>
                <th data-field="v3">NOMBRE</th>                
            </tr>
            </thead>
        </table>

  </div>
 
    </form>
    
  </div>
</div>
<div class="card col-md-6">
  <div class="card-body">
    <h5 class="card-title">PEDIDO</h5>
   
    <table id="tablepedido"  class="table table-striped"
    data-click-to-select="true"
    data-detail-formatter="detailFormatter"     
    data-sort-order="desc" 
    data-show-toggle="true" 
    data-show-columns="true" 
    data-toggle="table" data-pagination="true" data-click-to-select="true"                   
    data-unique-id="v1">
            <thead>
            <tr>
                <th data-field="state" data-radio="true" data-button>Seleccionar</th>
                <th data-field="v1">ID</th>
                <th data-field="v2">CATEGORIA</th>
                <th data-field="v3">NOMBRE</th>
                <th data-field="v4" data-editable="true">CANTIDAD</th>                
            </tr>
            </thead>
        </table>
      <div class="form-group">
                  <label for="cantidadnueva">
                   Cantidad
                  </label>

                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Precio Nuevo" id="cantidadnueva" name="cantidadnueva" >
                    <span class="input-group-btn">
                      <button class="btn btn-primary" onclick="cantidadeditado()" id="btncantidadnueva" name="btncantidadnueva" type="button">Guardar Nuevo Precio</button>                      
                    </span>                    
                  </div>                 
      </div>
      <div class="text-center">
                  <button type="submit" id="btnregpedido" name="btnregpedido" onclick="recorrertable()" data-toggle="modal" data-target="#mregistropedido2" class="btn btn-primary">Guardar Pedido</button>                  
       </div>
  </div>
</div>
</div>
  
</section>
</body>
</html>




