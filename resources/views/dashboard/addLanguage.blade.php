@extends('layouts.dashboard')
@section('page_title'){{ "Add New Language | ngVoices - Voters & Civic Education" }}@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add New Language
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Add Language</li>
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
            <form class="form-horizontal" method="POST" name="" action="{{ route('storeLanguage') }}">
                @csrf
                @method('POST')
                <div class="box-body">
                    <h4 class="box-title">Add New Language</h4>
                    <div class="row form-group">
                        <div class="col-xs-12 col-md-3">
                            <label for="name" class="control-label text-primary">Name of Language*</label>
                            <input type="text" class="form-control" maxlength="30" id="name" name="name" required
                                autocomplete="name" placeholder="Name of Language">
                        </div>

                        <div class="col-xs-12 col-md-4">
                            <label for="description" class="control-label text-primary">Description of Language</label>
                            <input type="text" class="form-control" id="name" name="description"
                                autocomplete="description" placeholder="Description of Language">
                        </div>

                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" id="update_password_but" name="" class="btn btn-info pull-right">Add</button>
                </div>
            </form>
            <!-- /.box-footer -->

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection