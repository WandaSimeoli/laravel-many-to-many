@extends('layouts.app')

@section('page-title', 'Add')

@section('main-content')
<div class="container-sm">
<form action="{{ route('admin.projects.store')}}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="inputTitle" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror"  id="inputTitle" name="title" 
    placeholder="Enter title" value="{{old('title')}}">
  </div>
  @error('title')
      <div class="alert alert-danger">
        {{$message}}
        @enderror
      </div>
  <div class="mb-3">
  <label class="form-label" for="inputslug">Slug</label>
  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="inputslug" name="slug" 
  placeholder="Enter url" value="{{old('slug')}}">
</div>
@error('slug')
      <div class="alert alert-danger">
        {{$message}}
        @enderror
      </div>
  <div class="mb-3 container-sm">
    <label for="inputDescription" class="form-label" >Content</label>
    <textarea class="form-control @error('content') is-invalid @enderror" placeholder="Enter description" id="inputDescription" style="height: 100px" 
    name="content">{{old('content')}}</textarea>
  </div>
  @error('content')
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
        @if (old('type_id') == $type->id) selected
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
          @if (in_array($technology->id, old('technologies', [])))
          checked
          @endif>
            <label class="form-check-label" for="technology-{{ $technology->id }}">
            {{ $technology->title }}
            </label>
          </div>
          @endforeach
      </div>
      <div class="container-sm">
      <button type="submit" class="btn btn-success">Add</button>
      </div>
</form>
</div>
@endsection