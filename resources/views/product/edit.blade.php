@extends('app')
@section('content')
<h1>Edit product</h1>

{!! Form::model($product, ['method' => 'PATCH', 'route' => ['product.update', $product->id]] ) !!}
    @include('product/blocks/form_fields', ['errors' => $errors->all(), 'product' => $product])
{!! Form::close() !!}

@endsection