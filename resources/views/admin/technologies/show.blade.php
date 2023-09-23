@extends('layouts.app')

@section('page-title', 'Technology')

@section('main-content')
<div class="container-sm">
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{ $technology->id}}</td>
        <td>{{ $technology->title}}</td>
        <td> {{ $technology->slug}}</td>
        </tr>
    </tbody>
    </table>
</div>
@endsection