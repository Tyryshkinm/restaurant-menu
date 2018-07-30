@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Menus
                        @if(Auth::check())
                            <div class="entity-add">
                                <a href="{{ route('menus.create') }}">
                                    <button class="btn btn-success">Add Menu</button>
                                </a>
                            </div>
                        @endif
                    </div>

                    @foreach($menus as $menu)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 entity">
                                    <div class="entity-name">
                                        {{ $menu->name }}
                                    </div>
                                    <div class="entity-btn">
                                        <a href="{{ route('menus.products.index', $menu->id) }}">
                                            <button type="button" class="btn btn-info">View</button>
                                        </a>
                                        @if(Auth::check())
                                            <a href="{{ route('menus.edit', $menu->id) }}">
                                                <button type="button" class="btn btn-warning">Edit</button>
                                            </a>
                                            <form action="{{ route('menus.destroy', $menu->id) }}" method="post">
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