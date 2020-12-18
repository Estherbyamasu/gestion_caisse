@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Caisse utilisateurs</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Caisse utilisateurs</h1>
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
  Nouveau Caisse utilisateurs
</button>

                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Heure debut</th>
                                    <th scope="col">Heure fin</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Nom utilisateur</th>
                                    <th scope="col">Numero caisse</th>
                                    
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($caisse_utilisateurs as $caisse_utilisateur)
                                <tr>
                                    <td>{{ $caisse_utilisateur->id }}</td>
                                    <td>{{ $caisse_utilisateur->heure_debut }}</td>
                                    <td>{{ $caisse_utilisateur->heure_fin }}</td>
                                    <td>{{ $caisse_utilisateur->date }}</td>
                                    <td>{{ $caisse_utilisateur->name }}</td>
                                    <td>{{ $caisse_utilisateur->numero_caisse }}</td>
                                    
                                    <td>
                                        <a href="caisse_utilisateurs/edit/{{ $caisse_utilisateur->id }}" class="glyphicon glyphicon-edit   btn btn-info">edit</a>
                                        <form action="caisse_utilisateurs/destroy/{{ $caisse_utilisateur->id }}" method="post" class="form-inline">
                                        @csrf
                                <button type="submit" onclick="return confirm('Voulez vs vraiment supprimer cette categorie ?')" class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
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
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des caisse utilisateurs</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('caisse_utilisateurs') }}" method="post">
                           @csrf
                           <div class="form-group">
            <label for="">Heure debut</label>
                    <input type="time" name="heure_debut" id="heure_debut" class="form-control "
                    class="@error('heure_debut') is-danger @enderror " placeholder="" aria-describedby="helpId" required>
                    @error('heure_debut')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
            <label for="">Heure fin</label>
                    <input type="time" name="heure_fin" id="heure_fin" class="form-control "
                    class="@error('heure_fin') is-danger @enderror " placeholder="" aria-describedby="helpId" required>
                    @error('heure_fin')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
            <label for="">Date </label>
                    <input type="datetime-local" name="date" id="date" 
                    class="@error('date') is-danger @enderror form-control datepicker" placeholder="" aria-describedby="helpId" required>
                    @error('date')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
            <label for="">Name user</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}"
                    class="@error('name') is-danger @enderror " placeholder="" aria-describedby="helpId" required>
                    @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                           <div class="form-group">
                    <label for="numero_caisse">Numero caisse</label>
                    <select name="caisse_id" id="" class="form-control" 
                    class="@error('date') is-danger @enderror" required>
                        <option value="">Select caisse</option>
                        @foreach($caisses as $caisse)
                        <option value="{{$caisse->id}}">{{$caisse->numero_caisse}}</option>
                        @endforeach
                        @error('caisse_id')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    </select>
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