@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="bc">
                            <a href="/">Menus</a>&nbsp;>&nbsp;
                            <div>{{ $menu->name }}</div>
                        </div>
                        @if(Auth::check())
                            <div class="entity-add">
                                <a href="{{ route('menus.products.create', $menu->id) }}">
                                    <button class="btn btn-success">Add Product</button>
                                </a>
                            </div>
                        @endif
                    </div>

                    @foreach($menu->products as $product)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 entity">
                                    <div class="entity-name">
                                        {{ $product->name }}
                                    </div>
                                    <div class="entity-btn">
                                        @if(Auth::check())
                                            <a href="{{ route('menus.products.edit', [$menu->id, $product->id]) }}">
                                                <button type="button" class="btn btn-warning">Edit</button>
                                            </a>
                                            <form action="{{ route('menus.products.destroy', [$menu->id, $product->id]) }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection