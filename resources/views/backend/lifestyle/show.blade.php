@extends ('backend.layouts.app')

@section ('title', 'Life Style Management' . ' | ' . 'View Life Style')

@section('page-header')
    <h1>
        Life Style Management
        <small>View Life Style</small>
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
            <h3 class="box-title">View Life Style</h3>

            <div class="box-tools pull-right">
                @include('backend.lifestyle.partials.header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">
                
                <table class="table table-striped table-hover">
                    @foreach($lifestyletrans as $key => $lifestyle_translation)
                        <tr> <th> <h3 style="color:#0A8F27">{{ $lifestyle_translation->translanguage->title }}</h3> </th><td></td> </tr>
                        <tr>
                            <th>Title <small>({{ $lifestyle_translation->translanguage->title }})</small></th>
                            <td>{{ $lifestyle_translation->title }}</td>
                        </tr>
                        <tr>
                            <th>Description <small>({{ $lifestyle_translation->translanguage->title }})</small></th>
                            <td class="description"><p><?=$lifestyle_translation->description?></p></td>
                        </tr>
                    @endforeach
                    <tr>
                        
                    </tr>
                </table>
                

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection