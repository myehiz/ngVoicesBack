@extends('layouts.dashboard')
@section('page_title'){{ "Articles | ngVoices - Voters & Civic Education" }}@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Articles
            <small>Control Panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Articles</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Articles Table</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <a type="button" href="{{ route('postAdd') }}" class="btn btn-default btn-success"><i
                                class="fa fa-flag"></i> Add New Article</a>
                    </div>

                    <div class="box-body no-padding">
                        @if (count($articles) >= 1)
                        <table class="table" style="margin: 2rem;">
                            <tr>
                                <th>Article</th>
                                <th>Author</th>
                                <th>Language</th>
                                <th>Category</th>
                                <th>Feature Image</th>
                                <th>Slug</th>
                                <th>Published At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($articles as $article)
                            <tr>
                                <td><a href="{{ route('showArticle', $article->slug) }}">{{ $article->title }}</a></td>
                                <td>{{ $article->user->nickname }}</td>
                                <td>{{ $article->language->name }}</td>
                                <td>{{ $article->category->name }}</td>
                                <td><img src="{{ asset($article->page_image) }}" alt="Proof of Request"
                                        title="Proof of Request" class="img-thumbnail" style="max-width: 150px;"></td>
                                <td>{{ $article->slug }}</td>
                                <td>{{ $article->published_at }}</td>
                                <td>{{ $draftPublished = $article->is_draft ? 'Draft' : 'Published' }}</td>
                                <td><a class="btn btn-warning btn-xs" href="{{ route('editArticle', $article->id) }}"><i
                                            class="fa fa-edit"></i>
                                        Edit</a>&nbsp;&nbsp;&nbsp;<a
                                        class="btn-danger btn btn-xs delete button delete-confirm"
                                        href="{{ route('deleteArticle', $article->id) }}"><i class="fa fa-remove"></i>
                                        Delete</a></td>
                            </tr>
                            @endforeach

                        </table>

                        {{ $articles->links() }}

                        @else
                        <div class="alert alert-dismissable alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <li><strong>You have no language yet. Kindly add a new language.
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