@extends('admin.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{strtoupper($model)}}</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-heading">

                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#OrderID</th>
                                <th>Information</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{$content->id}}</td>
                                    <td>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>Quantity</td>
                                                    <td>Price</td>
                                                    <td>VAT</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($content->orderItems as $item)
                                                    <tr>
                                                        <td>{{$item->product->name}}</td>
                                                        <td>{{$item->quantity}}</td>
                                                        <td>{{$item->product_current_price}}</td>
                                                        <td>{{$item->product_current_vat}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </td>
                                    <td>
                                        {{strtoupper($content->status)}}
                                    </td>

                                    <td>
                                        @if ($content->status == 'create')
                                            <button id-attr="{{$content->id}}"
                                                    class="btn btn-primary btn-sm confirm-content"
                                                    type="button">
                                                Confirm
                                            </button>&nbsp;
                                        @endif

                                        @if (\App\Site::enoughProductForOrder($content) && $content->status == 'confirm')
                                            <button id-attr="{{$content->id}}"
                                                    class="btn btn-primary btn-sm export-content"
                                                    type="button">
                                                Export
                                            </button>&nbsp;
                                        @endif

                                       @if ($content->status != 'cancel')

                                        <button id-attr="{{$content->id}}"
                                                class="btn btn-primary btn-sm cancel-content"
                                                type="button">
                                            Cancel
                                        </button>&nbsp;

                                       @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">{!!$contents->render()!!}</div>
                    </div>


                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
@endsection
@section('footer')
    <script>
        $(function(){

            $('.confirm-content').click(function(){
                window.location.href = window.baseUrl + '/admin/confirm_order/' + $(this).attr('id-attr');
            });

            $('.export-content').click(function(){
                window.location.href = window.baseUrl + '/admin/export_order/' + $(this).attr('id-attr');
            });

            $('.cancel-content').click(function(){
                window.location.href = window.baseUrl + '/admin/cancel_order/' + $(this).attr('id-attr');
            });
        });
    </script>
@endsection