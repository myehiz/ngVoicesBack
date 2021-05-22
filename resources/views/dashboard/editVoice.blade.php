@extends('layouts.dashboard')
@section('page_title'){{ "Edit Voice Note | ngVoices - Voters & Civic Education" }}@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <style>
        #is_draft:hover {
            background-color: lightsteelblue;
        }

        #is_draft:checked {
            background-color: rgb(86, 214, 231);
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Voice Note
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Update Voice Note</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <center>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 text-red-600" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 text-red-600" :errors="$errors" />
            </center>
            <!-- form start -->
            <form class="form-horizontal" method="POST" name="" action="{{ route('updateVoice') }}"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $voice->id }}">
                <div class="box-body">
                    <h4 class="box-title">Edit Voice Note</h4>
                    @if (!blank($categories))
                    <div class="row form-group">
                        <div class="col-xs-4">
                            <label for="category_id" class="control-label text-primary">Select a Category*</label>
                            <select class="form-control" name="category_id" required>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-xs-6">
                            <label for="meta_description" class="control-label text-primary"> Meta Description</label>
                            <input class="form-control" type="text" value="{{ $voice->meta_description }}"
                                name="meta_description" id="meta_description" placeholder="Meta Description">
                        </div>
                    </div>
                    @endif

                    <div class="row form-group">
                        <div class="col-xs-12 col-md-6">
                            <label for="title" class="control-label text-primary">Title*</label>
                            <input type="text" class="form-control" id="title" value="{{ $voice->title }}" name="title"
                                required autocomplete="title" placeholder="Title of your voice note">
                        </div>

                        <div class="col-xs-3 col-md-4">
                            <label for="content" class="control-label text-primary">Voice Note*</label>
                            <input type="file" class="form-control" id="content" name="content" autocomplete="content"
                                placeholder="Voice Note">
                        </div>

                    </div>
                </div>
                <div class="box-footer">
                    <label for="is_draft" class="control-label text-primary"><input type="checkbox" name="is_draft"
                            id="is_draft" class="form-control" value="1"> Save as draft</label>
                    <button type="submit" id="" name="" class="btn btn-info pull-right">Update</button>
                </div>
            </form>
            <!-- /.box-footer -->

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection