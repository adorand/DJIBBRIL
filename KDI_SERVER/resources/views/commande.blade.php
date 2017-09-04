@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($products as $product)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-sm-6">
                                <img src="data:image/png;base64,{{ $product->image }}" alt="" class="thumbnail">
                            </div>
                            <div class="col-sm-6">
                                <div class="list-group row">
                                    <div class="list-group-item">{{ $product->description }}</div>
                                </div>
                                <form action="/add-product-cmd/{{ $product->code }}" method="post" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="quantite" placeholder="quantite">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary">
                                                    Ajouter
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection