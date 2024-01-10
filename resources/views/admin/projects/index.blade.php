@extends('layouts.app')

@section('content')
    <section>
        <div class="container pt-5">
            <h1 class="text-center pb-5">Your Projects</h1>
        </div>
    </section>
    <section>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Type</th>
                        <th><a class="btn btn-primary btn-sm" href="{{ route('admin.projects.create') }}">Add New Project</a></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>
                                <a href="{{ route('admin.projects.show', $project) }}">
                                    {{ $project->title }}
                                </a>
                            </td>
                            <td>{{ $project->slug }}</td>
                            <td>
                                {{ isset($project->type) ?  $project->type->name : '-' }}
                              </td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Projects to Show</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
