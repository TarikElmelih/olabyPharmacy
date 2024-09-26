@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Create Slide</h1>
        <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $slide->title ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $slide->description ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="button_text">Button Text</label>
                <input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text', $slide->button_text ?? '') }}">
            </div>
            <div class="form-group">
                <label for="button_link">Button Link</label>
                <input type="text" class="form-control" id="button_link" name="button_link" value="{{ old('button_link', $slide->button_link ?? '') }}">
            </div>
            <div class="form-group">
                <label for="desktop_image">Desktop Image</label>
                <input type="file" class="form-control" id="desktop_image" name="desktop_image">
            </div>
            <div class="form-group">
                <label for="mobile_image">Mobile Image</label>
                <input type="file" class="form-control" id="mobile_image" name="mobile_image">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
