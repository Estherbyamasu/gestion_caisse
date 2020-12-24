
@extends('templates.default')

@section('content')

<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Adresses</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"> Adresses</h1>
			</div>
		</div>

<div class="modal-dialog form-dark" role="document">
    <!--Content-->
<div class="modal-content card-image" >
      <div class="text-white  py-5 px-5 ">
        <!--Header--><div class="modal-header text-center pb-4">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
        <div class="col-lg-10">   
<div class="panel panel-info"><!--/.row-->
    <h3 class="modal-title w-100 white-text font-weight-bold color_siew" id="myModalLabel"><strong>Modification de caisse detail</strong> <a
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
                <div class="panel-heading">Modifier caisse detail n&deg; {{ $caisse_detail->id }}</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form"  action="/caisse_details/{{$caisse_detail->id}}"  method="POST">
                            @csrf
                            @method('PUT')
                            <!-- <div class="form-group">
						<label>Nom compte</label> 
						<select name="compte_id" id="" class="form-control"
						class="@error('nom_compte') is-danger @enderror"> 
						<option value="" >Select Nom compte</option>
						@foreach($comptes as $compte)
                        <option value="{{$compte->id}}">{{$compte->nom_compte}}</option>
						@endforeach
						@error('compte_id')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror
						</select>
					</div> -->

					<!-- <div class="form-group">
                    <label for="numero_caisse">Numero caisse</label>
                    <select name="caisse_id" id="" class="form-control">
                        <option value="">Select caisse</option>
                        @foreach($caisses as $caisse)
                        <option value="{{$caisse->id}}">{{$caisse->numero_caisse}}</option>
                        @endforeach
                    </select>
                </div> -->
				<div class="form-group">
					<label> nom_compte</label> 
									
					<input type="text" name="nom_compte" class="form-control" placeholder="" value="{{$compte->nom_compte}}">
									
					</div>

				<div class="form-group">
					<label> numero_caisse</label> 
									
					<input type="text" name="numero_caisse" class="form-control" placeholder="" value="{{$caisse->numero_caisse}}">
									
					</div>


					<!-- <div class="form-group">
						<label>caisse</label> 
						<select name="caisse_id" id="" class="form-control"
						class="@error('numero_caisse') is-danger @enderror"> 
						<option value="" >Select numero_caisse</option>
						@foreach($caisses as $caisse)
                        <option value="{{$caisse->id}}">{{$caisse->numero_caisse}}</option>
						@endforeach
						@error('caisse_id')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror
						</select>
					</div> -->
					
					<div class="form-group">
					<label> type_action</label> 
									
					<input type="text" name="type_action" class="form-control" placeholder="" value="{{$caisse_detail->type_action}}">
									
					</div>

					<label > somme</label> 
									
					<input type="text" name="somme" class="form-control" placeholder="" value="{{$caisse_detail->somme}}">
									
					</div>

					<div class="form-group">
						<label> libelle </label> 
										
						<input type="text" name="libelle" class="form-control" placeholder="" value="{{$caisse_detail->libelle}}">
										
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