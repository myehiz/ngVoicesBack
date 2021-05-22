@extends('layouts.dashboard')
@section('page_title'){{ "Edit Category | ngVoices - Voters & Civic Education" }}@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Category
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Edit Category</li>
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
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 text-red-600" :errors="$errors" />
            </center>
            <!-- form start -->
            <form class="form-horizontal" method="POST" name="" action="{{ route('updateCategory') }}">
                @csrf
                @method('POST')
                <input type="hidden" name="id" value="{{ $category->id }}">
                <div class="box-body">
                    <h4 class="box-title">Edit Category</h4>
                    @if (!blank($languages))
                    <div class="row form-group">
                        <div class="col-xs-4">
                            <label for="language_id" class="control-label text-primary">Select a language*</label>
                            <select class="form-control" name="language_id" required>
                                @foreach ($languages as $language)
                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    @endif

                    <div class="row form-group">
                        <div class="col-xs-12 col-md-3">
                            <label for="name" class="control-label text-primary">Name of Category*</label>
                            <input type="text" class="form-control" id="name" value="{{ $category->name }}" name="name"
                                required autocomplete="name" placeholder="Name of Category">
                        </div>

                        <div class="col-xs-12 col-md-3">
                            <label for="name" class="control-label text-primary">Slug of Category</label>
                            <input type="text" class="form-control" id="slug" value="{{ $category->slug }}" name="slug"
                                autocomplete="slug" placeholder="Slug of Category">
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <label for="description" class="control-label text-primary">Description of Category</label>
                            <input type="text" class="form-control" id="name" value="{{ $category->description }}"
                                name="description" autocomplete="description" placeholder="Description of Category">
                        </div>

                    </div>
                </div>
                <div class="box-footer">
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