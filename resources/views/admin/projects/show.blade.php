@extends('layouts.app')

@section('page-title', 'Project')

@section('main-content')
<div class="container-sm">
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">slug</th>
        <th scope="col">Content</th>
        <th scope="col">Image</th>
        <th scope="col">Type</th>
        <th scope="col">Technology</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{ $project->id}}</td>
        <td>{{ $project->title}}</td>
        <td> {{ $project->slug}}</td>
        <td> {{ $project->content}}</td>
        <td> 
            @if($project->image)
                <img src="/storage/{{$project->image}}" alt="{{$project->title}}" class="w-25"></td>
            @endif
        <td> 
            @if ($project->type) 
                <a href="{{ route('admin.projects.store', ['type'=> $project->type->id])}}">
                {{ $project->type->title}}</a> 
            @else 
            - 
            @endif
        </td>
        <td>
        <div>
        @forelse ($project->technologies as $technology)
        <span class="badge rounded-pill bg-secondary">
                {{ $technology->title }}</span>
                            @empty
                            No technology associated with this project
                            @endforelse
        </div>
        </td>
        </tr>
    </tbody>
    </table>
</div>
@endsection