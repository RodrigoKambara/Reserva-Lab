  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Minhas Reservas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
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