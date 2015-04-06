@extends('app')
@section('content')

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="table-responsive">

    <a class="pull-right" href="{{ URL::to('product/create') }}">Add product</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Category</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td><a href="{{ URL::to('product/' . $product->id) }}">{{ $product->id }}</a></td>
                <td>{!! $product->product_name !!}</td>
                <td>{{ $product->category->category }}</td>

                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>{{ $product->product_price }}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-default pull-left col-lg-offset-1" href="{{ URL::to('product/' . $product->id) }}">show</a>
                    <a class="btn btn-sm btn-success pull-left col-lg-offset-1" href="{{ URL::to('product/' . $product->id . '/edit') }}">edit</a>
                    {!! Form::open(array('route' => array('product.destroy', $product->id), 'method' => 'delete')) !!}
                        <button type="submit" class="btn btn-danger btn-sm col-lg-offset-1 btn-delete">Delete</button>
                    {!! Form::close() !!}

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 


@endsection