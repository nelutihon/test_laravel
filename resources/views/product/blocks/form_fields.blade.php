<ul>
    @foreach($errors as $error)
    <li>{!! $error !!}</li>
    @endforeach
</ul>

<div class="form-group">
    {!! Form::label('product_name', 'Name') !!}
    {!! Form::text('product_name', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('product_price', 'Price') !!}
    {!! Form::text('product_price', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $categories, null, array('class' => 'form-control') ) !!}
</div>

{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}