@extends('app')
@section('content')
<h1>Edit category</h1>

{!! Form::model($category, ['method' => 'PATCH', 'route' => ['category.update', $category->id]] ) !!}
    @include('category/blocks/form_fields', ['errors' => $errors->all(), 'category' => $category])
{!! Form::close() !!}

@endsection