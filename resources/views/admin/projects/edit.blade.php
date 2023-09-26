@extends('layouts.app')

@section('page-title', 'Modify')

@section('main-content')
<div class="container-sm">
<form action="{{ route('admin.projects.update', ['project'=>$project->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="inputTitle" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror"  id="inputTitle" name="title" 
    placeholder="Enter title" value="{{old('title', $project->title)}}">
  </div>
  @error('title')
      <div class="alert alert-danger">
        {{$message}}
        @enderror
      </div>
  <div class="mb-3">
  <label class="form-label" for="inputslug">Slug</label>
  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="inputslug" name="slug" 
  placeholder="Enter url" value="{{old('slug', $project->slug)}}">
  </div>
  @error('slug')
      <div class="alert alert-danger">
        {{$message}}
        @enderror
      </div>
  <div class="mb-3 container-sm">
    <label for="inputDescription" class="form-label" >Content</label>
    <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Enter description" id="inputDescription" style="height: 100px" 
    name="content">{{old('content', $project->content)}}</textarea>
  </div>
  @error('content')
      <div class="alert alert-danger">
        {{$message}}
        @enderror
      </div>
      <div class="container-sm"> 
            @if($project->image)
                <img src="/storage/{{$project->image}}" alt="{{$project->title}}" class="w-25">
            @endif
        <div> 
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" id="remove_image" name="remove_image">
          <label class="form-check-label" for="remove_image">
            Delete Image
        </label>
        </div>
      <div class="container-sm">
      <label for="image" class="form-label" >Image</label>
      </div>
      <div class="input-group mb-3 container-sm">
      <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
      @error('image')
      <div class="alert alert-danger">
        {{$message}}
        @enderror
      </div>
      <div class="mb-3 container-sm">
        <label for="typeId" class="form-label">Type</label>
        <select name="type_id" id="type_id" class="form-select">
        <option value="">Open this select menu</option>
        @foreach($types as $type)
        <option value="{{$type->id}}"
        @if (old('type_id', $project->type_id) == $type->id) selected
        @endif>
        {{$type->title}}</option>
        @endforeach
        </select>
      </div>
        <div class="mb-3 container-sm">
        <label class="form-label d-block">Technology</label>
          @foreach ($technologies as $technology)
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="technologies[]"
          id="technology-{{ $technology->id }}" value="{{ $technology->id }}"
          @if ($errors->any())
          @if (in_array($technology->id, old('technologies', [])))
          checked
          @endif
          @elseif($project->technologies->contains($technology->id))
          checked
          @endif>
            <label class="form-check-label" for="technology-{{ $technology->id }}">
            {{ $technology->title }}
            </label>
          </div>
          @endforeach
        </div>
      <div class="container-sm">
      <button type="submit" class="btn btn-success">Update</button>
      </div>
</form>
</div>
@endsection