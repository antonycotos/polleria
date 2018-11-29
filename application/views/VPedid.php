 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
<link rel="stylesheet" href="<?= base_url()?>res/css/bootstrap.min.css">

<script src="<?= base_url()?>res/js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url()?>res/js/popper.min.js""></script>
<script src="<?= base_url()?>res/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>res/js/jspedido.js"></script>

  <title>Pedido</title>
</head>
<body>
<header id="header" class="">
  
</header>
<script>
ruta='<?=base_url()?>';
$(document).ready(function(){
  ejecutar();
});
</script>
<section>
	<div class="container"><!--ABERTURA CONTAINER-->
		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-3">Registrar Pedido</h1>
		    <p class="lead">Ingrese datos</p>
		  </div>
		</div>

		<section>
		<div class="row">
			<div class="card col-md-12">
				<h5 class="card-title">Modulo Pedido</h5>
			</div>
		</div>
		</section>

		<section>
			
				<div class="col-md-12">
					<div class="col-md-6">
						<div class="form-group">
    		<label for="categoria">Categoria:</label>    		
    		<input type="checkbox" id="myCheck">
	    		<div class="input-group">	    			                  
	                <?php 
	                echo form_dropdown('categoria', $categoria, '', 'class="form-control selectpicker" id="categoria" required'); ?>
	                     
	            </div>            
        </div> 
						  <div class="card-body">

    <div class="card-body">
    <h5 class="card-title">PRODUCTO</h5>
    <table id="tableproducto"  class="table table-striped"      
    data-show-toggle="true" 
    data-show-columns="true" 
    data-toggle="table" data-pagination="true" data-click-to-select="true" data-unique-id="v1">
            <thead>
            <tr>
            	<th data-field="state" data-radio="true" data-button>Seleccionar</th>
            	<th data-field="v1">ID</th>
                <th data-field="v2">NOMBRE</th>                
            </tr>
            </thead>
        </table>
  </div>
 

  </div>
					</div>	
					<div class="col-md-6">
						<div class="card-body">
						    <h5 class="card-title">Listados</h5>
						    	
						    <table id="table">
						      <thead>
						        <tr>
						          <th data-filed ="v2">Tipo de proveedor</th>
						          <th data-filed ="v4">nombre</th>
						          <th data-filed ="v4">apellido</th>
						          <th data-filed ="v4">telefono</th>
						          <th data-filed ="v4">Correo Eletronico</th>
						        </tr>
						      </thead>
						    </table>
						  </div>		
					</div>	
				</div>	
			
		</section>


			
	</div><!--CIERRE CONTAINER-->	
</section>
</body>
</html>