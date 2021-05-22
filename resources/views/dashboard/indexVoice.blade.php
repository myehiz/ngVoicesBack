@extends('layouts.dashboard')
@section('page_title'){{ "Voice Notes | ngVoices - Voters & Civic Education" }}@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Voice Notes
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Voice Notes</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Voice Notes Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a type="button" href="{{ route('voiceAdd') }}" class="btn btn-default btn-success"><i
                                class="fa fa-suitcase"></i> Add
                            New Voice Note</a>
                    </div>
                    <div class="box-body no-padding">
                        @if (count($voices) >= 1)
                        <table class="table" style="margin: 2rem;">
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Audio</th>
                                <th>Published At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($voices as $voice)
                            <tr>
                                <td>{{ $voice->title }}</td>
                                <td>{{ $voice->category->name }}</td>
                                <td><audio controls="true" src="{{ asset('')}}{{ $voice->content }}"></audio> </td>
                                <td>{{ $voice->published_at }}</td>
                                <td>{{ $draftPublished = $voice->is_draft ? 'Draft' : 'Published' }}</td>
                                <td><a class="btn btn-warning btn-xs" href="{{ route('editVoice', $voice->id) }}"><i
                                            class="fa fa-edit"></i>
                                        Edit</a>&nbsp;&nbsp;&nbsp;<a
                                        class="btn-danger btn btn-xs delete button delete-confirm"
                                        href="{{ route('deleteVoice', $voice->id) }}"><i class="fa fa-remove"></i>
                                        Delete</a></td>
                            </tr>
                            @endforeach

                        </table>

                        {{ $voices->links() }}

                        @else
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <li><strong>You have no voice note yet. Kindly add a new voice note.
                                </strong></li>

                        </div>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->@endsection