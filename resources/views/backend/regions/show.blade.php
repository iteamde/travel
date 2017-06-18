@extends ('backend.layouts.app')

@section ('title', 'Region Management' . ' | ' . 'View Region')

@section('page-header')
    <h1>
        Region Management
        <small>View Region</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">View Region</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.regions-header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">

                <table class="table table-striped table-hover">
                    @foreach($regions->trans as $key => $region)
                        <tr>
                            <th>Title <small>({{ $region->translanguage->title }})</small></th>
                            <td>{{ $region->title }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>Active</th>
                        <td>
                            @if ($regions->active == 1) 
                                <label class="label label-success">Active</label>
                            @else
                                <label class="label label-danger">Deactive</label>
                            @endif
                        </td>
                    </tr>

                    <!-- Start: Medias -->
                    <tr>
                         <th> <h3 style="color:#0A8F27">Medias</h3></th><td></td>   
                    </tr>
                    @if(empty($medias))
                      <tr>
                          <th> <p>No Medias Added.</p> </th><td></td>
                      </tr>
                    @endif
                    @foreach($medias as $key => $media)
                      <tr>
                          <th> <p><?=$media?></p> </th><td></td>
                      </tr>
                    @endforeach
                    <!-- End: Medias -->
                    
                </table>

            </div><!--tab panel-->

        </div><!-- /.box-body -->
    </div><!--box-->
@endsection