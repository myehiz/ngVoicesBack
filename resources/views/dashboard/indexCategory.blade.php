@extends('layouts.dashboard')
@section('page_title'){{ "Categories | ngVoices - Voters & Civic Education" }}@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Categories
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Categories</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Categories Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a type="button" href="{{ route('categoriesAdd') }}" class="btn btn-default btn-success"><i
                                class="fa fa-suitcase"></i> Add
                            New Category</a>
                    </div>
                    <div class="box-body no-padding">
                        @if (count($categories) >= 1)
                        <table class="table" style="margin: 2rem;">
                            <tr>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->description }}</td>
                                <td><a class="btn btn-warning btn-xs"
                                        href="{{ route('editCategory', $category->id) }}"><i class="fa fa-edit"></i>
                                        Edit</a>&nbsp;&nbsp;&nbsp;<a
                                        class="btn-danger btn btn-xs delete button delete-confirm"
                                        href="{{ route('deleteCategory', $category->id) }}"><i class="fa fa-remove"></i>
                                        Delete</a></td>
                            </tr>
                            @endforeach

                        </table>

                        {{ $categories->links() }}

                        @else
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <li><strong>You have no category yet. Kindly add a new category.
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