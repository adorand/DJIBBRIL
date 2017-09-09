@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Ajouter un Produit</div>
                    <div class="panel-body">
                        <form class="form-horizontal col-sm-12 col-xs-12" role="form" action="/produit" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="quantite">Quantité</label>
                                <input type="number" class="form-control" id="quantite" name="quantite" required>
                            </div>
                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" id="prix" name="prix" required>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="form-group">
                                <select name="categorie" id="categorie" class="form-control" required>
                                    <option value="0">--Categories--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->code}}">{{$category->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default pull-right">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection