@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{strtoupper($model)}}</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            @if ($content->id)
                <h2>Edit</h2>
                {!! Form::model($content, ['method' => 'PATCH', 'route' => [$model.'.update', $content->id], 'files' => true]) !!}
            @else
                <h2>Add</h2>
                {!! Form::model($content, ['route' => [$model.'.store'], 'files' => true]) !!}
            @endif

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('desc', 'Description') !!}
                {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('keyword', 'Keywords') !!}
                {!! Form::textarea('keyword', null, ['class' => 'form-control']) !!}
            </div>

           {{-- <div class="form-group">
                {!! Form::label('content', 'content') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control ckeditor']) !!}
            </div>--}}

            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                @if ($content->image)
                    <img src="{{url('img/cache/small/' . $content->image)}}" />
                    <hr>
                @endif
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            </div>


                <div class="form-group">
                {!! Form::label('status', 'Status') !!}
                {!! Form::select('status', array(1 => 'Active', 0 => 'Inactive'), null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}

            @include('admin.list')

        </div>
    </div>
@endsection