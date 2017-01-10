@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">New Blog</div>
                <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')
                <!-- New Blog Form -->
                    <form action="{{ route('add_blog') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- Blog Name -->
                        <div class="form-group">
                            <label for="blog-title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-6">
                                <input type="text" name="title" id="blog-title" class="form-control" value="{{ old('title') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="blog-content" class="col-sm-3 control-label">Content</label>
                            <div class="col-sm-6">
                                <textarea name="content" id="blog-content" class="form-control" rows="4" cols="50">{{ old('content') }}</textarea>
                            </div>
                        </div>
                        <!-- Add Blog Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Blog
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Current Blogs -->
            @if (count($blogs) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">Current Blogs</div>
                    <div class="panel-body">
                        <table class="table table-striped blog-table">
                            <thead>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td class="table-text"><div>{{ $blog->id }}</div></td>
                                        <td class="table-text"><div>{{ $blog->title }}</div></td>
                                        <td class="table-text"><div>{{ $blog->content }}</div></td>
                                        <!-- Blog Delete Button -->
                                        <td>
                                            <form action="{{ url('blog/'.$blog->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
