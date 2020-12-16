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
    <h3 class="modal-title w-100 white-text font-weight-bold" id="myModalLabel"><strong>Modification des caisses</strong> <a
              class="green-text font-weight-bold"><strong> </strong></a></h3>
              </div>
              </div>
              </div>
              <a href="{{ url('caisses') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
    
    <!--/.row-->

    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-info">
                <div class="panel-heading">Modifier la caisse n&deg; {{ $caisse->id }}</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" action="/caisses/{{ $caisse->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                    <label for="numero_guichet">Numero guichet</label>
                    <select name="guichet_id" id="" class="form-control">
                        <option value="">Select guichet</option>
                        @foreach($guichets as $guichet)
                        <option value="{{$guichet->id}}">{{$guichet->numero_guichet}}</option>
                        @endforeach
                    </select>
                </div>
                            <div class="form-group">
                                <label>Numero caisse:</label>
                                <input type="text" name="numero_caisse" class="form-control" 
                                placeholder="Entrez le numero du caisse" value="{{ $caisse->numero_caisse }}" >
                            </div>

                            <div class="form-group">
                                <label>Solde caisse:</label>
                                <input type="text" name="solde_caisse" class="form-control" 
                                placeholder="Entrez le solde du caisse" value="{{ $caisse->solde_caisse }}" >
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