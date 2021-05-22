@extends('layouts.dashboard')
@section('page_title'){{ "Add New Article | ngVoices - Voters & Civic Education" }}@endsection
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
            Add New Article
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Article</li>
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
            <form class="form-horizontal" method="POST" name="" action="{{ route('storeArticle') }}"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="box-body">
                    <h4 class="box-title">Add New Article</h4>
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
                            <input class="form-control" type="text" name="meta_description" id="meta_description"
                                placeholder="Meta Description">
                        </div>
                    </div>
                    @endif

                    <div class="row form-group">
                        <div class="col-xs-12 col-md-9">
                            <label for="title" class="control-label text-primary">Title*</label>
                            <input type="text" class="form-control" id="title" name="title" required
                                autocomplete="title" placeholder="Title of your article">
                        </div>

                        <div class="col-xs-3 col-md-3">
                            <label for="page_image" class="control-label text-primary">Article Image</label>
                            <input type="file" class="form-control" id="page_image" name="page_image"
                                autocomplete="page_image" placeholder="Article Image">
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col-xs-12 ">
                            <label for="content" class="control-label text-primary">Body*</label>
                            <textarea class="form-control" name="content" id="editor1" cols="20" rows="50"
                                required>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, maiores facilis. Reprehenderit eligendi, molestias earum consequatur corporis iste soluta adipisci quia laudantium similique mollitia, perspiciatis, voluptatum modi et sit? Quisquam.</textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <label for="is_draft" class="control-label text-primary"><input type="checkbox" name="is_draft"
                            id="is_draft" class="form-control" value="1"> Save as draft</label>
                    <button type="submit" id="" name="" class="btn btn-info pull-right">Post</button>
                </div>
            </form>
            <!-- /.box-footer -->

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection