@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Caisses</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Caisses</h1>
        </div>
    </div>
    <!--/.row-->
    
  
    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">
                
                <div class="panel-body">
                    <div class="col-md-12">
                    <div class="row">
     
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Nouveau Caisse
</button>

                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Numero caisse</th>
                                    <th scope="col">Solde caisse</th>
                                    <th scope="col">Numero guichet</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($caisses as $caisse)
                                <tr>
                                    <td>{{ $caisse->id }}</td>
                                    <td>{{ $caisse->numero_caisse }}</td>
                                    <td>{{ $caisse->solde_caisse }}</td>
                                    <td>{{ $caisse->numero_guichet }}</td>
                                    <td>
                                        <a href="caisses/edit/{{ $caisse->id }}" class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                           
                                        <form action="caisses/destroy/{{ $caisse->id }}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette caisse ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

              

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des caisses</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('caisses') }}" method="POST">
                           @csrf

                        
                <div class="form-group">
                    <label for="numero_guichet">Numero guichet</label>
                    <select name="guichet_id" id="" class="form-control" 
                    class="@error('solde_caisse') is-danger @enderror" required>
                        <option value="">Select caisse</option>
                        @foreach($guichets as $guichet)
                        <option value="{{$guichet->id}}">{{$guichet->numero_guichet}}</option>
                        @endforeach
                        @error('guichet_id')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </select>
                </div>
                

                           <div class="form-group">
                               <label>Num caisse:</label>
                               <input type="text" name="numero_caisse" class="form-control"
                                placeholder="Entrez le numero de la caisse" required>
                           </div>

                           <div class="form-group">
                               <label>Solde caisse:</label>
                               <input type="text" name="solde_caisse" class="form-control"
                                placeholder="Entrez le solde de la caisse" required>
                           </div>
                           <div class="modal-footer">
      <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" class=" glyphicon glyphicon-plus btn  btn-primary btn-block btn-rounded z-depth-1">Save</button>
              </div>
              <div class="text-center mb-3 col-md-6">
              <button  type="reset"class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Reset</button>
              </div>
             </div>
      </div>
                       </form>
                   </div>
               </div>
               
               </div>
               </div>
      </div>
     
    </div>
  </div>
</div>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div>
</div><!-- /.row -->
</div>
<!--/.main-->

@endsection