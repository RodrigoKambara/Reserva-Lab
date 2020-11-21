  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de Reservas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Início</a></li>
              <li class="breadcrumb-item active">Reservas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

                <div class="row">
                  <div class="col-sm-3">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox">
                          <label class="form-check-label">Bloco 7</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="">
                          <label class="form-check-label">Bloco 10</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox"  ">
                          <label class="form-check-label">Bloco 11</label>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Bloco</th>
                    <th>Laboratorio</th>
                    <th>Professor</th>
                    <th>Diciplina</th>
                    <th>Turma</th>
                    <th>Ínicio</th>
                    <th>Fim</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($reservas as $reserva) {  ?>
                  <tr>
                    <td><?=$reserva->bloco?></td>
                    <td><?=$reserva->laboratorio?></td>
                    <td><?=$reserva->professor?></td>
                    <td><?=$reserva->disciplina?></td>
                    <td><?=$reserva->turma?></td>
                    <td><?=$reserva->inicio?></td>
                    <td><?=$reserva->fim?></td>
                  </tr>
                   <?php } ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

  
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>