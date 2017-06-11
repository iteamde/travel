@extends ('backend.layouts.app')

@section ('title', 'Age Ranges Management' . ' | ' . 'View Age Range')

@section('page-header')
    <h1>
        Age Ranges Management
        <small>View Age Ranges</small>
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
            <h3 class="box-title">View Age Range</h3>

            <div class="box-tools pull-right">
                @include('backend.ageranges.partials.header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">
                
                <table class="table table-striped table-hover">
                    @foreach($agerangestrans as $key => $ageranges_translation)
                        <tr> <th> <h3 style="color:#0A8F27">{{ $ageranges_translation->translanguage->title }}</h3> </th><td></td> </tr>
                        <tr>
                            <th>Title <small>({{ $ageranges_translation->translanguage->title }})</small></th>
                            <td>{{ $ageranges_translation->title }}</td>
                        </tr>
                    @endforeach
                    <tr> 
                        <th> <h3 style="color:#0A8F27">Common Fields</h3> </th><td></td> 
                    </tr>
                    <tr>
                        <th>From</th>
                        <td>{{ $ageranges->from }}</td>
                    </tr>
                    <tr>
                        <th>To</th>
                        <td>{{ $ageranges->to }}</td>
                    </tr>
                    <tr>
                        <th>Active</th>
                        <td>
                            @if($ageranges->active == 1)
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