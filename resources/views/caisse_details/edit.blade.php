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
    <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Modification du caisse_detail</strong> <a
              class="green-text font-weight-bold"><strong> </strong></a></h3>
              </div>
              </div>
              </div>
              <a href="{{ url('caisse_details') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
    
    <!--/.row-->

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier caisse_detail n&deg; {{ $compte->id }}</div>
               
                
                <div class="panel-body">mpt
                    <div class="col-md-12">
                        <form role="form" action="/caisse_details/{{ $compte->id }}" method="POST">
                            
                            @csrf
                            @method('PUT')
                            <div class="form-group">
						<label>Nom compte</label> 
						<select name="compte_id" style="background:gray; color:white" id="" class="form-control"
						class="@error('nom_compte') is-danger @enderror"> 
						<option value="" >Select Nom categorie_compte</option>
						@foreach($comptes as $compte)
                        <option value="{{$compte->id}}">{{$compte->nom_compte}}</option>
						@endforeach
						@error('compte_id')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror
						</select>
                    </div>
                    

                
                    <div class="panel-heading">Modifier caisse_detail n&deg; {{ $caisse->id }}</div>
                    <div class="panel-body">mpt
                        <div class="col-md-12">
            
                                <form role="form" action="/caisse_details/{{ $caisse->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                            <label>Nom compte</label> 
                            <select name="caisse_id" style="background:gray; color:white" id="" class="form-control"
                            class="@error('numero_caisse') is-danger @enderror"> 
                            <option value="" >Select numero_caisse </option>
                            @foreach($caisses as $caisse)
                            <option value="{{$caisse_detail->id}}">{{$caisse->numero_caisse}}</option>
                            @endforeach
                            @error('caisse_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            </select>
                        </div>


                    <div class="row">
                    <div class="col-lg-6"> 
                    <div class="form-group">
					<label>libelle</label> 
									
					<input type="text"style="background:gray; color:white" name="libelle" 
                    class="form-control" placeholder="" value="{{$caisse_detail->libelle}}">
									
					</div>
                    </div>
                    <div class="col-lg-6"> 
                    <div class="form-group">
					<label>Encaissement</label> 
									
					<input type="text" style="background:gray; color:white"
                     name="encaissement" class="form-control" placeholder="" value="{{$caisse_detail->encaissement}}">
									
					</div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6"> 
                    <div class="form-group">
                    <label >decaissement</label> 
									
					<input type="text" style="background:gray; color:white" name="decaissement" class="form-control" placeholder="" value="{{$caisse_detail->decaissement}}">
									
				     </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6"> 
                        <div class="form-group">
                        <label>libelle</label> 
                                        
                        <input type="text"style="background:gray; color:white" name="libelle" 
                        class="form-control" placeholder="" value="{{$caisse_detail->libelle}}">
                                        
                        </div>
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