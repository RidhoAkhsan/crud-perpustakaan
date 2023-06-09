@extends('layouts.parent')

@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">Edit User</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select class="form-control" id="roles" name="roles" required>
                        <option value="USER" {{ $user->roles === 'USER' ? 'selected' : '' }}>User</option>
                        <option value="ADMIN" {{ $user->roles === 'ADMIN' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>

@endsection
