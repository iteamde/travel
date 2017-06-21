@extends ('backend.layouts.app')

@section ('title', 'Pages Categories Management' . ' | ' . 'View Pages Categories')

@section('page-header')
    <h1>
        Pages Categories Management
        <small>View Page Category</small>
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
            <h3 class="box-title">View Page Category</h3>

            <div class="box-tools pull-right">
                @include('backend.pages_categories.partials.header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">
                
                <table class="table table-striped table-hover">
                    <tr>
                         <th> <h3 style="color:#0A8F27">Common Fields</h3></th><td></td>   
                    </tr>                    
                    <tr>
                        <th>Title</th>
                        <td>{{ $pages_categories->title }}</td>
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