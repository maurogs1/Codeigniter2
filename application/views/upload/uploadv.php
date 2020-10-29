<h3>Subir imagen</h3>
<form action="<?php echo base_url();?>uploadc/uploadImage" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titulo">Título</label>
        <input id="titulo" name="titulo" class="form-control" type="text" >
    </div>
    <div class="form-group">
        <label for="fileImagen">Imagen</label>
        <input id="fileImagen" name="fileImagen" class="form-control" type="file" >
    </div>
    <button type="submit" class="btn btn-danger"> Guardar </button>
<?php echo $error;?>


</form>







<h3>Subir y descargar Archivo</h3>
<form action="<?php echo base_url();?>uploadc/uploadFile" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titulo">Título</label>
        <input id="tituloFile" name="tituloFile" class="form-control" type="text" >
    </div>
    <div class="form-group">
        <label for="file">Archivo</label>
        <input id="file" name="file" class="form-control" type="file" >
    </div>
    <but ton type="submit" class="btn btn-danger"> Guardar </button>
<?php echo $error;?>
</form>


<?php echo $errorArch;?>
<?php echo $estado?>

<a href="<?php echo base_url()?>uploadc/download/<?php echo $archivo;?>"> Descargar </a>