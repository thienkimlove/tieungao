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
                    {!! Form::label('supplier_id', 'Suppliers') !!}
                    {!! Form::select('supplier_id', ['' => 'Choose Supplier'] + App\Supplier::where('status', true)->pluck('name', 'id')->all(), null, ['class' => 'form-control']) !!}
                </div>

            <div class="form-group">
                {!! Form::label('note', 'Note (Optional)') !!}
                {!! Form::textarea('note', null, ['class' => 'form-control']) !!}
            </div>

                <div class="form-group">
                    <h3>Product List</h3>

                    <div id="template_product" style="display: none">
                        <div>
                            <label>Select Product</label>
                            {!! Form::select('product_id[]', array('' => 'Choose Product') + App\Product::where('status', true)->pluck('name', 'id')->all(), null) !!}

                            <label>Quantity</label>
                            <input type="number" name="product_quantity[]" value=""/>
                            <input type="button" class="btn-danger delete-product" value="Del"/>
                        </div>
                    </div>


                    <div id="product" class="form-group">
                        @if ($content->import_items->count() > 0)
                            @foreach ($content->import_items as $item)
                                <div>
                                    <label>Choose Product</label>
                                    {!! Form::select('product_id[]', array('' => 'Choose Product') + App\Product::where('status', true)->pluck('name', 'id')->all(), $item->product_id) !!}

                                    <label>Quantity</label>
                                    <input type="number" name="product_quantity[]" value="{{$item->quantity}}"/>
                                    <input type="button" class="btn-danger delete-product" value="Del"/>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        <button id="add-product" class="btn-success">Add</button>
                    </div>
                </div>


            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}

            @include('admin.list')

        </div>
    </div>
@endsection

@section('footer')
    <script>
        $(function () {

            $('#product').on('click', '.delete-product', function () {
                $(this).parent().remove();
            });

            $('#add-product').click(function () {
                $('#product').append($('#template_product').html());
                return false;
            });
        });

    </script>
@endsection