@extends ('backend.layouts.app')

@section ('title', 'Languages Spoken Management' . ' | ' . 'View Languages Spoken')

@section('page-header')
    <h1>
        Languages Spoken Management
        <small>View Languages Spoken</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">View Languages Spoken</h3>

            <div class="box-tools pull-right">
                @include('backend.languages_spoken.partials.header-buttons-view')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

            <div role="tabpanel">

                 <table class="table table-striped table-hover">
                    @foreach($languagespokentrans as $key => $language_spoken_translation)
                        <tr> <th> <h3 style="color:#0A8F27">{{ $language_spoken_translation->translanguage->title }}</h3> </th><td></td> </tr>
                        
                        <tr>
                            <th>Title <small>({{ $language_spoken_translation->translanguage->title }})</small></th>
                            <td>{{ $language_spoken_translation->title }}</td>
                        </tr>

                        <tr>
                            <th>Description <small>({{ $language_spoken_translation->translanguage->title }})</small></th>
                            <td><?php echo $language_spoken_translation->description; ?></td>
                        </tr>
                    @endforeach
                        <tr> <th> <h3 style="color:#0A8F27"> Common Fields </h3> </th><th></th> </tr>
                        <tr>
                            <th>Active</th>
                            <td>
                                @if($languagespoken->active == 1)
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