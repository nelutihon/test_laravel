@extends('app')
@section('content')
<h1>Create a category</h1>


{!! Form::model(new App\Category, ['route' => ['category.store']] ) !!}
    @include('category/blocks/form_fields', ['errors' => $errors->all()])
{!! Form::close() !!}

@endsection