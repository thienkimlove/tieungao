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
                                <th>#</th>
                                <th>By User</th>
                                <th>Supplier</th>
                                <th>Info</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{$content->id}}</td>
                                    <td>{{$content->user->name}}</td>
                                    <td>{{$content->supplier->name}}</td>
                                    <td>
                                        <table class="table table-striped table-bordered table-hover">
                                            <tbody>
                                               @foreach ($content->import_items as $item)
                                                   <tr>
                                                       <td>{{$item->product->name}}</td>
                                                       <td>{{$item->quantity}}</td>
                                                   </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </td>

                                    <td>{{strtoupper($content->status)}}</td>

                                    <td>

                                        @if ($content->status == 'create')
                                            <button id-attr="{{$content->id}}"
                                                    content-attr="{{$model}}"
                                                    class="btn btn-primary btn-sm edit-content"
                                                    type="button">
                                                Edit
                                            </button>&nbsp;

                                            <button id-attr="{{$content->id}}"
                                                    class="btn btn-primary btn-sm import-content"
                                                    type="button">
                                                Import
                                            </button>&nbsp;

                                            <button id-attr="{{$content->id}}"
                                                    class="btn btn-primary btn-sm cancel-content"
                                                    type="button">
                                                Cancel
                                            </button>&nbsp;


                                        @endif

                                        @if ($content->status == 'complete')
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
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-primary add-content" content-attr="{{$model}}" type="button">Add</button>
                        </div>
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
            $('.add-content').click(function(){
                window.location.href = window.baseUrl + '/admin/'+$(this).attr('content-attr')+'/create';
            });
            $('.edit-content').click(function(){
                window.location.href = window.baseUrl + '/admin/'+$(this).attr('content-attr')+'/' + $(this).attr('id-attr') + '/edit';
            });
            $('.import-content').click(function(){
                window.location.href = window.baseUrl + '/admin/make_import/' + $(this).attr('id-attr');
            });

            $('.cancel-content').click(function(){
                window.location.href = window.baseUrl + '/admin/cancel_import/' + $(this).attr('id-attr');
            });
        });
    </script>
@endsection