<div class="card card-info">
              <div class="card-header">
                <h3 class=" text-center">Bienvenido <?php  echo $this->session->userdata('session_usuario') ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="<?php echo base_url();?>personac/update" method="POST">
                <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="apellido" class="col-sm-2 col-form-label">Apellido|</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="apellido"id="apellido" placeholder="Apellido">
                    </div>
                  </div>                
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                  </div>
         
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Cambiar datos</button>
                  
                </div>
                <!-- /.card-footer -->
              </form>
</div>



<form class="form-horizontal" action="<?php echo base_url();?>personac/delete" method="POST">

    <button class="btn btn-outline-danger float-right" type="submit">Borrar esta cuenta</button>
</form>



   
