<ul>
    @foreach($errors as $error)
    <li>{!! $error !!}</li>
    @endforeach
</ul>

<div class="form-group">
    {!! Form::label('category', 'Name') !!}
    {!! Form::text('category', null, array('class' => 'form-control')) !!}
</div>
{!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}