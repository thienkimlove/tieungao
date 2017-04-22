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
                                <th>ID</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{$content->id}}</td>
                                    <td>{{$content->order->id}}</td>
                                    <td>
                                        {{($content->status) ? 'Complete' : 'Cancel'}}
                                    </td>

                                    <td>
                                        @if ($content->status)
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

            $('.cancel-content').click(function(){
                window.location.href = window.baseUrl + '/admin/cancel_export/' + $(this).attr('id-attr');
            });
        });
    </script>
@endsection