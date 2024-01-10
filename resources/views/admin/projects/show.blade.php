@extends('layouts.app')

@section('content')
    <section class="pt-5">
      <div class="container">
        <h1>{{ $project->title }}</h1>
        @if($project->type)
        <h4>
          {{ $project->type->name }}
        </h4>
        @endif
        <ul class="d-flex gap-2 ps-0">
          @foreach ($project->technologies as $technology)
            <li class="badge rounded-pill text-bg-primary">{{ $technology->name }}</li>
          @endforeach 
        </ul>
        <h3>{{ $project->slug }}</h3>
        <p>Post Made: {{ $project->created_at->format('d/m/Y') }}</p>
      </div>
    </section>
@endsection
