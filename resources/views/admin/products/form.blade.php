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
                    {!! Form::label('sell_price', 'Sell Price') !!}
                    {!! Form::number('sell_price', null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('sell_vat', 'VAT') !!}
                    {!! Form::number('sell_vat', null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                    {!! Form::label('promotion_price', 'Promotion Price (Optional)') !!}
                    {!! Form::text('promotion_price', null, ['class' => 'form-control']) !!}
                </div>


            <div class="form-group">
                {!! Form::label('desc', 'Description') !!}
                {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
            </div>



            <div class="form-group">
                {!! Form::label('keyword', 'Keywords') !!}
                {!! Form::textarea('keyword', null, ['class' => 'form-control']) !!}
            </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id',  ['' => 'Choose Category'] + App\Category::where('status', true)->pluck('name', 'id')->all(), null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('supplier_id', 'Supplier') !!}
                    {!! Form::select('supplier_id',  ['' => 'Choose Supplier'] + App\Supplier::where('status', true)->pluck('name', 'id')->all(), null, ['class' => 'form-control']) !!}
                </div>


           <div class="form-group">
                {!! Form::label('detail', 'Details') !!}
                {!! Form::textarea('detail', null, ['class' => 'form-control ckeditor']) !!}
            </div>




                @foreach (['image', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6'] as $img)

                    <div class="form-group">
                        {!! Form::label($img, strtoupper($img)) !!}
                        @if ($content->{$img})
                            <img src="{{url('img/cache/small/' . ($content->{$img}))}}" />
                            <hr>
                        @endif
                        {!! Form::file($img, null, ['class' => 'form-control']) !!}
                    </div>
                @endforeach



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