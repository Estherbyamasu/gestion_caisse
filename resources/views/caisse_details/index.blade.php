
@extends('templates.default')

@section('content')

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Caisse_detail</li>
        </ol>
    </div>
    <!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Caisse_details</h1>
        </div>
    </div>
    <!--/.row-->


    <div class="row">
        <div class="col-lg-10">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="row">

                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                Nouveau de Compte
                            </button>

                            <table id="example1" class="table table-bordered table-hover table-striped">
                                <legend> le caisse Caisse_detail </legend>
                                <thead>
                                    <tr>

                                        <th>compte_id</th>
                                        <th>caisse_id</th>
                                        <th>type</th>
                                        <th>libelle</th>
                                        <th>Solde</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach($caisse_details as $caisse_detail)
                                    <tr>
                                    <td>{{$caisse_detail->compte_id}}</td>
                                        <td>{{$caisse_detail->caisse_id}}</td>
                                        
                                        <td>{{$caisse_detail->type}}</td>
                                        
                                        <td>{{$caisse_detail->libelle}}
                                        <td>{{$caisse_detail->solde}}</td>

                                        <td>
                                            <a href="caisse_details/edit/{{$caisse_detail->id}}"
                                                class="glyphicon glyphicon-edit   btn btn-info">edit</a>

                                            <form action="caisse_details/destroy/{{ $caisse_detail->id}}" method="post"
                                                class="form-inline">
                                                @csrf
                                                <button type="submit"
                                                    onclick="return confirm('Voulez vs vraiment supprimer cette caisse ?')"
                                                    class="glyphicon glyphicon-delite glyphicon-trash   btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
 <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title" id="exampleModalLabel">L'ajout des operations</h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="panel panel-default">

                                                <div class="panel-body">
                                                    <div class="col-md-8">
                                                        <form role="form" action="{{ url('caisse_details') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="nom_compte"> nom compte </label>
                                                                <select name="compte_id"
                                                                    style="background:rgb(21, 153, 241); color:white" id=""
                                                                    class="form-control"
                                                                    class="@error('nom_compte') is-danger @enderror">
                                                                    <option value="">Select compte</option>
                                                                    @foreach($comptes as $compte)
                                                                    <option value="{{$compte->id}}">
                                                                        {{$compte->nom_compte}}</option>
                                                                    @endforeach
                                                                    @error('compte->id')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                    @enderror
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="numero_compte"> numero_caisse </label>
                                                                <select name="caisse_id"
                                                                    style="background:rgb(25, 182, 221); color:white" id=""
                                                                    class="form-control"
                                                                    class="@error('numero_caisse') is-danger @enderror">
                                                                    <option value="">Select compte</option>
                                                                    @foreach($caisses as $caisse)
                                                                    <option value="{{$caisse->id}}">
                                                                        {{$caisse->numero_caisse}}</option>
                                                                    @endforeach
                                                                    @error('caisse->id')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                    @enderror
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="form-group">


                                                                    <div class="container">
                                                                        <h4 class="page-header"> TYPES</h4>
                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <select class="form-control" style="background-color: aquamarine">
                                                                                    <option value="encaissement"> ENCAISSEMENT
                                                                                    </option>
                                                                                    <option value="decaisement">DECAISSEMENT
                                                                                    </option>
                                                                                    <option value="">Select compte</option>
                                                                    @foreach($caisse_details as $caisse_detail)
                                                                    <option value="{{$caisse_detail->id}}">
                                                                        {{$caisse_detail->type}}</option>
                                                                    @endforeach
                                                                    @error('caisse_detail->id')
                                                                    <div class="alert alert-danger">{{$message}}</div>
                                                                                </select>
                                                                                <label for=""> somme</label>
                                                                                <input type="text"
                                                                                    style="background:rgb(66, 242, 248); color:white"
                                                                                    name="encaissement" id=""
                                                                                    class="form-control"
                                                                                    class="@error('encaissement') is-danger @enderror"
                                                                                    placeholder=""
                                                                                    aria-describedby="helpId" required>
                                                                                @error('encaissement')
                                                                                <div class="alert alert-danger">
                                                                                    {{$message}}</div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label for=""> libelle</label>
                                                                                <input type="float"
                                                                                    style="background:rgb(42, 227, 240); color:white"
                                                                                    name="libelle" id=""
                                                                                    class="form-control"
                                                                                    class="@error('libelle') is-danger @enderror"
                                                                                    placeholder="" required>
                                                                                @error('libelle')
                                                                                <div class="alert alert-danger">
                                                                                    {{$message}}</div>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="col-lg-6">

                                                                                <div class="modal-footer">
                                                                                    <div class="row">
                                                                                        <div
                                                                                            class="text-center mb-3 col-md-6">
                                                                                            <button type="submit"
                                                                                                class=" glyphicon glyphicon-plus btn  btn-primary btn-block btn-rounded z-depth-1">Save</button>
                                                                                        </div>
                                                                                        <div
                                                                                            class="text-center mb-3 col-md-6">
                                                                                            <button type="reset"
                                                                                                class="btn btn-outline-info waves-effect ml-auto"
                                                                                                data-dismiss="modal">Reset</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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


                           
                                                          

                                                           


                                                         
                                                                            
                                                                              

                                                                    
                                                                       
                                                                        

                                                                        
