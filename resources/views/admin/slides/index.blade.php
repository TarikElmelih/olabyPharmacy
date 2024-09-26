@extends('admin.layouts.app')



@section('content')
    <div class="container">
        <h1>Slides</h1>
        <a href="{{ route('admin.slides.create') }}" class="btn btn-primary">Add New Slide</a>
        @if ($slides->count())
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Button Text</th>
                        <th>Button Link</th>
                        <th>desktop_image</th>
                        <th>mobile_image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slides as $slide)
                        <tr>
                            <td>{{ $slide->title }}</td>
                            <td>{{ $slide->description }}</td>
                            <td>{{ $slide->button_text }}</td>
                            <td>{{ $slide->button_link }}</td>
                            <td>
                                @if ($slide->desktop_image)
                                    <img src="{{ asset('images/slides/' . $slide->desktop_image) }}" alt="{{ $slide->title }}" width="100">
                                @endif
                            </td>
                            <td>
                                @if ($slide->mobile_image)
                                    <img src="{{ asset('images/slides/' . $slide->mobile_image) }}" alt="{{ $slide->title }}" width="100">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.slides.edit', $slide) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.slides.destroy', $slide) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No slides available.</p>
        @endif
    </div>
@endsection