@extends ('backend.layouts.app')

@section ('title', 'Pages Management' . ' | ' . 'View Pages')

@section('page-header')
    <h1>
        Pages Management
        <small>View Pages</small>
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
            <h3 class="box-title">View Pages</h3>

            <div class="box-tools pull-right">
                @include('backend.pages.partials.header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">
                
                <table class="table table-striped table-hover">
                    @foreach($pagestrans as $key => $pages_translation)
                        <tr> <th> <h3 style="color:#0A8F27">{{ $pages_translation->translanguage->title }}</h3> </th><td></td> </tr>
                        <tr>
                            <th>Title <small>({{ $pages_translation->translanguage->title }})</small></th>
                            <td>{{ $pages_translation->title }}</td>
                        </tr>
                        <tr>
                            <th>Description <small>({{ $pages_translation->translanguage->title }})</small></th>
                            <td><?php echo $pages_translation->description; ?></td>
                        </tr>
                    @endforeach

                    <tr>
                         <th> <h3 style="color:#0A8F27">Common Fields</h3></th><td></td>   
                    </tr>                    
                    <tr>
                        <th>Active</th>
                        <td>
                            @if ($pages->active == 1) 
                                <label class="label label-success">Active</label>
                            @else
                                <label class="label label-danger">Deactive</label>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Url</th>
                        <td><a href="{{ $pages->url }}" >{{ $pages->url }}</a></td>
                    </tr>

                    <!-- Start: Medias -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Medias</h3></th><td></td>   
                    </tr>
                    @if(empty($medias))
                      <tr>
                          <th> <p>No Medias Added.</p> </th>
                      </tr>
                    @endif
                    @foreach($medias as $key => $media)
                      <tr>
                          <th> <p><?=$media?></p> </th>
                      </tr>
                    @endforeach
                    <!-- End: Medias -->

                    <!-- Start: Admins -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Admins</h3></th><td></td>   
                    </tr>
                    @if(empty($admins))
                      <tr>
                          <th> <p>No Admins Added.</p> </th>
                      </tr>
                    @endif
                    @foreach($admins as $key => $admin)
                      <tr>
                          <th> <p><?=$admin?></p> </th>
                      </tr>
                    @endforeach
                    <!-- End: Admins -->
                    
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