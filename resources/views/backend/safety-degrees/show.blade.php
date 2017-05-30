@extends ('backend.layouts.app')

@section ('title', 'Safety Degrees Management' . ' | ' . 'View Safety Degree')

@section('page-header')
    <h1>
        Safety Degrees Management
        <small>View Safety Degree</small>
    </h1>
@endsection

@section('after-styles')
    <style type="text/css">
        td.description {
            word-break: break-all;
        }
    </style>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">View Safety Degree</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.safety-degrees-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">
                
                <table class="table table-striped table-hover">
                    @foreach($degreetrans as $key => $degrees)
                        <tr>
                            <th>Title <small>({{ $degrees->translanguage->title }})</small></th>
                            <td>{{ $degrees->title }}</td>
                        </tr>
                        <tr>
                            <th>Description <small>({{ $degrees->translanguage->title }})</small></th>
                            <td class="description"><p><?=$degrees->description?></p></td>
                        </tr>
                    @endforeach
                    <tr>
                        
                    </tr>
                </table>
                

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection