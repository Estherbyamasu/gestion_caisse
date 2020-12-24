@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Caisse detail</li>
        </ol>
    </div>
    <!--/.row-->
    

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Caisse detail</h1>
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
  Nouveau Caisse detail
</button>
<!-- <div class="col-md-12">
	  @foreach($caisses as $caisse)
	 <div class="form-group">
	<label>solde anterieur</label> 
    <option value="{{$caisse->id}}">{{$caisse->solde_caisse}}</option>						
	<input type="text"style="width:300px; height:35px " name="solde_caisse" class="form-control" placeholder="" value="{{$caisse->solde_caisse}}">
	@endforeach							
	</div> -->
                        <table  id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
<tr>
<td>ID</td>
<td>Nom compte</td>
<td>Numero caisse</td>
<td>type operation</td>
<td>somme</td>
<td>libelle</td>



<td>Action</td>

</tr>
</thead>


<tbody>
@foreach($caisse_details as $caisse_detail)
<tr>
<td>{{$caisse_detail->id}}</td>

<td>{{$caisse_detail->nom_compte}} </td>  {{-- &nbsp {{$caisse_detail->numero_compte}} --}}
<td>{{$caisse_detail->numero_caisse}} </td>
<td>{{$caisse_detail->type_action}} 
<td>{{$caisse_detail->somme}}</td>
<td>{{$caisse_detail->libelle}}</td>



<td><a href="caisse_details/edit/{{$caisse_detail->id}}" class="btn btn-primary">
                    <span class="glyphicon glyphicon-edit">modifier</span></a>
				
<!--<button type="submit" onclick="return confirm('Voulez vous supprimer cette facture ?')" class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash">supprimer</span></button>
 <button type="submit" value="" class="btn btn-sm btn-danger">Delete</button> -->



<td> <a href="caisse_details/edit/{{$caisse_detail->id}}" type="button" class="btn btn-sm btn-success">Edit</a>
<form action="caisse_details/destroy/{{$caisse_detail->id}}" method="POST">
@csrf
<button type="submit" value="" class="btn btn-sm btn-danger">Delete</button> 
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
        <h2 class="modal-title" id="exampleModalLabel">L'ajout des caisse details</h2>
       
        
                                        <div class="form-group">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="panel panel-default">
               
               <div class="panel-body">
                   <div class="col-md-8">
                       <form role="form" action="{{ url('caisse_details') }}" method="post">
                           @csrf

                           <div class="form-group">
                                        <label for="nom_compte"> comptes </label>
                                        <select name="compte_id"
                                            style="width:300px; height:35px ;background:gray; color:white" id=""
                                            class="form-control" class="@error('nom_compe') is-danger @enderror">
                                            <option value="">Select comptes</option>
                                            @foreach($comptes as $compte)
                                            <option value="{{$compte->id}}">{{$compte->nom_compte}}</option>
                                            @endforeach
                                            @error('compte->id')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero_caisse"> caisse</label>
                                        <select name="caisse_id"
                                            style="width:300px; height:35px ;background:gray; color:white" id=""
                                            class="form-control" class="@error('numero_caisse') is-danger @enderror">
                                            <option value="">Select caisse</option>
                                            @foreach($caisses as $caisse)
                                            <option value="{{$caisse->id}}">{{$caisse->numero_caisse}}</option>
                                            @endforeach
                                            @error('caisse_id')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </select>

                                        <div class="form-group">

<label for="type_action">type_action</label><br />
<select name="type_action" id="genre"
    style="width:300px; height:32px ;background:gray; color:white">
    <option value="encaissement">ENCAISSEMEnt</option>
    <option value="decaissement">DECAISSEMENT</option>
</select>

</div>


<div class="form-group">
<label for=""> somme</label>
<input type="float" style="width:300px; height:35px ;background:gray; color:white"
    name="somme" id="" class="form-control"
    class="@error('somme') is-danger @enderror" placeholder="">
@error('somme')
<div class="alert alert-danger">{{$message}}</div>
@enderror
</div>

<div class="form-group">
<label for="">libelle</label>
<input type="text" style="width:300px; height:35px ;background:gray; color:white"
    name="libelle" id="" class="form-control"
    class="@error('libelle') is-danger @enderror" placeholder="">
@error('libelle')
<div class="alert alert-danger">{{$message}}</div>
@enderror
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
@endsection