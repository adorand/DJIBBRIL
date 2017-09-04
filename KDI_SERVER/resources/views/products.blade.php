@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($products as $product)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pull-left">
                                <img src="data:image/png;base64,{{ $product->image }}" alt="" class="thumbnail">
                            </div>
                            <div class="pull-right">
                                <div class="list-group">
                                    <div class="list-group-item">{{ $product->description }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection