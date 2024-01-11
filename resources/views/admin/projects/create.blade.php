@extends('layouts.app')

@section('content')
    <section class="py-3">
      <div class="container">
        <h1>Add a New Project</h1>
      </div>
    </section>
    <section>
      <div class="container">
        <form action="{{ route('admin.projects.store') }}" method="POST">

        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Title:</label>
          <input type="text" required class="form-control" name="title" id="title" placeholder="Project Title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
          <label for="type_id" class="form-label">Types</label>
          <select name="type_id" class="form-control" id="type_id">
            <option value="">Select a Type</option>
            @foreach($types as $type)
              <option @selected( old('type_id') == $type->id ) value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group mb-3">
          <p>Select Technologies:</p>
          <div class="d-flex flex-wrap gap-4 ">
            @foreach ($technologies as $technology)
              <div class="form-check">
                <input name="technologies[]" class="form-check-input" type="checkbox" value="{{$technology->id}}" id="tag-{{$technology->id}}" @checked( in_array($technology->id, old('technologies',[]) ) ) >
                <label class="form-check-label" for="tag-{{$technology->id}}">
                  {{ $technology->name }}
                </label>
              </div>
            @endforeach
          </div>
        </div>

        <div class="mb-3">
          <label for="content"  class="form-label">Project Description:</label>
          <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
          <input type="submit" class="btn btn-primary " value="Add project">
        </div>
      </form>

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      </div>
    </section>
@endsection
