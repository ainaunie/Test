@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Newsletter</h1>
        <form action="{{ route('admin.newsletters.update', $newsletter) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $newsletter->title }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required>{{ $newsletter->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
