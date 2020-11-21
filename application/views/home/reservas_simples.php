  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reservas Simples</h1>
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
                    <div class="form-group">
                      <label>Bloco</label>
                      <select class="form-control">
                        <option>Bloco 1</option>
                        <option>Bloco 2</option>
                        <option>Bloco 3</option>
                        <option>Bloco 4</option>
                        <option>Bloco 5</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Período</label>
                      <select class="form-control">
                      <option value="<?=$dia?> 19:00">1° horário 19:00 às 20:40</option>
                      <option value="<?=$dia?> 21:00">2° horário 21:00 às 22:30</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                  </div>

                  <div class="col-md-2">
                    <button type="button" data-toggle="modal" data-target="#modal-reserva" class="btn btn-block btn-success btn-sm pull-right" style="width: auto;float: right;">Agendar</button>
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






<form action="/reservascalendario" method="post">
    <div class="modal fade" id="modal-reserva">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agendar laboratório - <?$dia?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
              

              <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Professor</label>
                    <input type="text" disabled="disabled" class="form-control" placeholder="" 
                    value="<?=$this->session->get_userdata()['nome']?>">
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Disciplina</label>
                    <select name="disciplinaId" class="form-control">
                      <option selected="selected" disabled="disabled">Selecione a disciplina..</option>
                           <?php  foreach ($disciplinas as $disciplina) { ?>
                            <option value="<?=$disciplina->disciplinaId?>"><?=$disciplina->nome?></option>
                       <?php } ?>
                    </select>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-sm-4">
                  <!-- select -->
                  <div class="form-group">
                    <label>Turma</label>
                    <select name="turmaId" class="form-control">
                      <option selected="selected" disabled="disabled">Selecione a turma..</option>
                         <?php  foreach ($turmas as $turma) { ?>
                            <option value="<?=$turma->turmaId?>"><?=$turma->nome?></option>
                       <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                             <div class="form-group">
                  <label>Bloco</label>
                  <select name="blocoId" class="form-control">
                    <option selected="selected" disabled="disabled">Selecione o bloco..</option>
                    <?php  foreach ($blocos as $bloco) { ?>
                      <option value="<?=$bloco->blocoId?>"><?=$bloco->nome?></option>
                    <?php } ?>
                  </select>
                </div>
                </div>
                
                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Horários</label>
                    <select class="form-control" name="inicio" >
                      <option selected="selected" disabled="disabled">Selecione um horário..</option>
                      <option value="<?=$dia?> 19:00">1° horário 19:00 às 20:40</option>
                      <option value="<?=$dia?> 21:00">2° horário 21:00 às 22:30</option>
                    </select>
                  </div>
                </div>
              </div>



              <div class="row">
                <div class="col-sm-6">
                  <!-- select -->
                  <div class="form-group">
                    <label>Laboratórios</label>
                    <select name="laboratorioId" class="form-control">
                      <option selected="selected" disabled="disabled">Selecione um laboratório..</option>
                       <?php  foreach ($laboratorios as $laboratorio) { ?>
                            <option value="<?=$laboratorio->laboratorioId?>"><?=$laboratorio->nome?></option>
                       <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                
                  <div class="form-group">
                    <label>Tipo da reserva</label>

                    <div class="form-check">
                      <input class="form-check-input" name="tipo-reserva" type="radio">
                      <label class="form-check-label">Aula</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="tipo-reserva" type="radio" checked="">
                      <label class="form-check-label">Treinamento</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="tipo-reserva" type="radio" >
                      <label class="form-check-label">Prova</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="tipo-reserva" type="radio" >
                      <label class="form-check-label">Palestra</label>
                    </div>
                  </div>
                 
                </div>
              </div>


              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Salvar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </form>




  </div>