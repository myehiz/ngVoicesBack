@extends('layouts.dashboard')
@section('page_title'){{ "Change Password | ngVoices - Voters & Civic Education" }}@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Change Password
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Change Password</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Horizontal Form -->
        <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!-- form start -->
                <form class="form-horizontal" method="POST" name="changePasswordForm"
                    action="{{ route('updateUserPassword') }}">
                    @csrf
                    @method('POST')
                    <div class="box-body">
                        <h4 class="box-title">Set New Password</h4>
                        <div class="row form-group">
                            <div class="col-xs-8">
                                <input type="password" class="form-control" id="oldPass" name="password" required
                                    autocomplete="current-password" placeholder="Old Password">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xs-8">
                                <input type="password" class="form-control" id="newPass" name="new_password" required
                                    autocomplete="current-password" placeholder="New Password">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xs-8">
                                <input type="password" class="form-control" id="confirmPass"
                                    name="new_password_confirmation" autocomplete="new_password_confirmation"
                                    placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="box-footer">
                <button type="submit" id="update_password_but" name="update_password_but"
                    class="btn btn-info pull-right">Update</button>
            </div>
            </form>
            <!-- /.box-footer -->

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection