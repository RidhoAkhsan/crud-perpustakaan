@extends('layouts.parent')

@section('content')

<div class="container">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">List User</h4>
        </div>
        <div class="card">
            <div class="card-body">

                <div class="card table-responsive mt-4">
                    <table class="table table-hover table-bordered datatable">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($role->id == Auth::id())
                                    <strong>{{ $role->name }}</strong>
                                    @else
                                    {{ $role->name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($role->roles == 'ADMIN')
                                    <span class="btn btn-danger btn-sm">{{ $role->roles }}</span>
                                    @else
                                    <span class="btn btn-warning btn-sm">{{ $role->roles }}</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Button Edit -->
                                    <a href="{{ route('dashboard.user.edit', $role->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pen"></i>
                                        Edit
                                    </a>
                                    <!-- Button Delete -->
                                    <form action="{{ route('dashboard.user.destroy', $role->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
