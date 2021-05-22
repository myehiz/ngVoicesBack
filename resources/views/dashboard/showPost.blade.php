@extends('layouts.dashboard')
@section('page_title'){{ $article->title }}{{ " | ngVoices - Voters & Civic Education" }}@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $article->title }}
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Article</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ $article->title }}</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body no-padding">
                        @if ($article)
                        <table class="table" style="margin: 2rem;">
                            <tr>
                                <th>Author</th>
                                <td>{{ $article->user->nickname }}</td>
                            </tr>
                            <tr>
                                <th>Language</th>
                                <td>{{ $article->language->name }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $article->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Body</th>
                                <td>{!! $article->content !!}</td>
                            </tr>
                            <tr>
                                <th>Feature Image</th>
                                <td><img src="{{ asset($article->page_image) }}" alt="Proof of Request"
                                        title="Proof of Request" class="img-thumbnail" style="max-width: 150px;"></td>
                            </tr>
                            <tr>
                                <th>Slug</th>
                                <td>{{ $article->slug }}</td>
                            </tr>
                            <tr>
                                <th>Published At</th>
                                <td>{{ $article->published_at }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $draftPublished = $article->is_draft ? 'Draft' : 'Published' }}</td>
                            </tr>
                            </tr>
                            <tr>
                                <td><a class="btn btn-warning btn-xs float-left"
                                        href="{{ route('editArticle', $article->id) }}"><i class="fa fa-edit"></i>
                                        Edit</a></td>
                                <td><a class="btn-danger btn btn-xs delete button delete-confirm float-right"
                                        href="{{ route('deleteArticle', $article->id) }}"><i class="fa fa-remove"></i>
                                        Delete</a></td>
                            </tr>

                        </table>

                        @else
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <li><strong> Can not fetch this post at the moment.
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