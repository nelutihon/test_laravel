@extends('app')
@section('content')
@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="row-fluid col-lg-12">

    <a class="pull-right" href="{{ URL::to('category/create') }}">Add category</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Category</th>
                <th>Updated at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td><a href="{{ URL::to('category/' . $category->id) }}">{{ $category->id }}</a></td>
                <td>{{ $category->category }}</td>

                <td>{{ $category->created_at }}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-default pull-left col-lg-offset-1" href="{{ URL::to('category/' . $category->id) }}">show</a>
                    <a class="btn btn-sm btn-success pull-left col-lg-offset-1" href="{{ URL::to('category/' . $category->id . '/edit') }}">edit</a>

                    {!! Form::open(array('route' => array('category.destroy', $category->id), 'method' => 'delete')) !!}
                        <button type="submit" class="btn btn-danger btn-sm col-lg-offset-1 btn-delete">Delete</button>
                    {!! Form::close() !!}
                    

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@include('modal')

@endsection