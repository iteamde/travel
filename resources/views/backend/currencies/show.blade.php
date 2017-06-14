@extends ('backend.layouts.app')

@section ('title', 'Currencies Management' . ' | ' . 'View Currencies')

@section('page-header')
    <h1>
        Currencies Management
        <small>View Currencies</small>
    </h1>
@endsection

@section('after-styles')
    <style type="text/css">
        td.description {
            word-break: break-all;
        }
        #map {
            height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">View Currencies</h3>

            <div class="box-tools pull-right">
                @include('backend.currencies.partials.header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">
                
                <table class="table table-striped table-hover">
                    @foreach($currenciestrans as $key => $currencies_translation)
                        <tr> <th> <h3 style="color:#0A8F27">{{ $currencies_translation->translanguage->title }}</h3> </th><td></td> </tr>
                        <tr>
                            <th>Title <small>({{ $currencies_translation->translanguage->title }})</small></th>
                            <td>{{ $currencies_translation->title }}</td>
                        </tr>
                    @endforeach
                    <tr> 
                        <th> <h3 style="color:#0A8F27"> Common Fields </h3> </th> 
                    </tr>
                    <tr>
                        <th>Active</th>
                        <td>
                            @if($currencies->active == 1)
                                <label class="label label-success">Active</label>
                            @else
                                <label class="label label-danger">Deactive</label>
                            @endif
                        </td>
                    </tr>                              
                </table>
            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script type="text/javascript">
        $('.description_input').summernote({
             height: 200
        });
    </script>
    <script type="text/javascript">
        $('.select2Class').select2({
            placeHolder: 'Select Region'
        });
    </script>
@endsection