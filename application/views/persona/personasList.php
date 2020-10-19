
    <button id="btnGetAll" class="btn btn-success">Actualizar</button>



    <div class="box box-primary">
        <table id="tblPersonas" class="table table-bordered">
                <thead>                  
                        <tr>
                        <th style="width: 10px">#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Ciudad</th>
                        <th>DNI</th>  
                        <th>Editar</th>  

                        </tr>
                    
                </thead>                
        </table>
    </div>



    <div class="modal fade" id="modal-overlay">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class=" d-flex justify-content-center align-items-center">
            </div>
            <div class="modal-header">
              <h4 class="modal-title">Editar Persona</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" action="<?php echo base_url();?>personac/update" method="POST">
            <div class="modal-body">
            <input id="personaId" name="personaId" hidden>
                <div class="card-body">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="apellido"id="apellido" placeholder="Apellido">
                    </div>
                  </div>                
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                  </div>
         
                  
                </div>
               
            
        </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Cambiar datos</button>    
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  





    <script type="text/javascript">
        var baseurl ="<?php echo base_url();?>";

        
    </script>

    