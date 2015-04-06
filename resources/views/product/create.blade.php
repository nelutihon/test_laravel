@extends('app')
@section('content')
<h1>Add a product</h1>
{!! Form::model(new App\Product, ['route' => ['product.store']] ) !!}
@include('product/blocks/form_fields', ['errors' => $errors->all()])
{!! Form::close() !!}
@endsection