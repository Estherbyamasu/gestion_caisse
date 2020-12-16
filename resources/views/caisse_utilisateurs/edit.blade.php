@extends('templates.default')

@section('content')

<div class="modal-dialog form-dark" role="document">
    <!--Content-->
<div class="modal-content card-image" >
      <div class="text-white  py-5 px-5 ">
        <!--Header--><div class="modal-header text-center pb-4">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
        <div class="col-lg-10">   
<div class="panel panel-info"><!--/.row-->
    <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Modification de caisse utilisateurs </strong> <a
              class="green-text font-weight-bold"><strong> </strong></a></h3>
              </div>
              </div>
              </div>
              <a href="{{ url('caisse_utilisateurs') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
    
    <!--/.row-->

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier la caisse utilisateur n&deg; {{ $caisse_utilisateur->id }}</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="/caisse_utilisateurs/{{ $caisse_utilisateur->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                    <label for="numero_caisse">Numero caisse</label>
                    <select name="caisse_id" id="" class="form-control">
                        <option value="">Select caisse</option>
                        @foreach($caisses as $caisse)
                        <option value="{{$caisse->id}}">{{$caisse->numero_caisse}}</option>
                        @endforeach
                    </select>
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
                    <label for="">Heure debut</label>
                    <input type="time" name="heure_debut" id="montant" value="{{$caisse_utilisateur->heure_debut}}" 
                     class="form-control " class="@error('heure_debut') is-danger @enderror " placeholder="" aria-describedby="helpId">
                    @error('heure_debut')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Heure fin</label>
                    <input type="time" name="heure_fin" id="montant" value="{{$caisse_utilisateur->heure_fin}}" 
                     class="form-control " class="@error('heure_fin') is-danger @enderror " placeholder="" aria-describedby="helpId">
                    @error('heure_fin')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Date </label>
                    <input type="text" name="date" id="date" value="{{$caisse_utilisateur->date}}" 
                     class="@error('date') is-danger @enderror form-control datepicker" placeholder="" aria-describedby="helpId">
                    @error('date')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                            <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" class=" glyphicon glyphicon-edit btn btn-success btn-block btn-rounded z-depth-1">Modifier</button>
              </div>
             
             </div>
                        </form>
                    </div>
                </div>
                </div>
    </div>
    </div>
    </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div><!-- /.col-->
</div><!-- /.row -->
</div>
<!--/.main-->

@endsection