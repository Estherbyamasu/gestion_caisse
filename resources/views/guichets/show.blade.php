@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Guichets</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
    <div class="col-lg-12">  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header text-center pb-4">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
        <div class="col-md-12">
            <a href="{{ url('guichets') }}" class="   btn btn-link"><h1 class="page-header">Product categories</h1></a>
            <a href="{{ url('guichets') }}" > <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            
            <span aria-hidden="true">&times;</span></a>
          </button></a>
        </div>
        
       
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
     
        <div class="row">
          <div class="col-md-10">
            <div class="panel panel-default">
          
            <div class="panel-body">
           
                <div class="panel-heading">Liste des caisses appartenant dans la guichet {{ $guichet_caisses->numero_guichet }}</div>
                
                
                   
                    
            <form action="{{url('guichet')}}" method="POST">
                    @csrf
                   

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




                <div class="row">
            <div class="text-center mb-3 col-md-6">
              <button type="submit" class=" glyphicon glyphicon-plus btn  btn-primary btn-block btn-rounded z-depth-1">Save</button>
              </div>
              <div class="text-center mb-3 col-md-6">
              <button  type="reset"class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Reset</button>
              </div>
             </div>
           
            </form>
            <div class="modal-content">
      <!--Modal cascading tabs-->
      <div class="modal-body text-center mb-1">
                        <table  id="example1" class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                        <th>ID</th>
                                        <th>Numero du Caisse</th>
                                        <th> Solde caisse</th>
                                        
                                       
                                        

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($guichet_caisses->caisses as $caisse)
                                        <tr>
                                            <td> {{ $caisse->id }}</td>
                                            <td> {{ $caisse->numero_caisse }}</td>
                                            <td> {{ $caisse->solde_caisse }}</td>
                                            
                                           

                                           
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    </div>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.panel-->
    </div>
    </div>
        </div>
        </div> </div>

</div><!-- /.row -->
</div>
<!--/.main-->

@endsection