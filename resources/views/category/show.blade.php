@extends('modal_body')
@section('modal_title')
View Category
@endsection
@section('modal_content')
<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th>Id</th>
            <td>{!! $category->id !!}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{!! $category->category !!}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{!! $category->created_at !!}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{!! $category->updated_at!!}</td>
        </tr>
    </tbody>
</table>
@endsection