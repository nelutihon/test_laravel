@extends('modal_body')
@section('modal_title')
View Product
@endsection
@section('modal_content')
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th>Id</th>
            <td>{!! $product->id !!}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{!! $product->product_name !!}</td>
        </tr>
        <tr>
            <th>Price</th>
            <td>{!! $product->product_price !!}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{!! $product->created_at !!}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{!! $product->updated_at!!}</td>
        </tr>
    </tbody>
</table>
@endsection