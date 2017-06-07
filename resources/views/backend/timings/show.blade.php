@extends ('backend.layouts.app')

@section ('title', 'Timings Management' . ' | ' . 'View Timings')

@section('page-header')
    <h1>
        Timings Management
        <small>View Timings</small>
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
            <h3 class="box-title">View Timings</h3>

            <div class="box-tools pull-right">
                @include('backend.timings.partials.header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">
                
                <table class="table table-striped table-hover">
                    @foreach($timingstrans as $key => $timings_translation)
                        <tr> <th> <h3 style="color:#0A8F27">{{ $timings_translation->translanguage->title }}</h3> </th><td></td> </tr>
                        <tr>
                            <th>Title <small>({{ $timings_translation->translanguage->title }})</small></th>
                            <td>{{ $timings_translation->title }}</td>
                        </tr>
                        <tr>
                            <th>Description <small>({{ $timings_translation->translanguage->title }})</small></th>
                            <td><?php echo $timings_translation->description; ?></td>
                        </tr>
                    @endforeach                    
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