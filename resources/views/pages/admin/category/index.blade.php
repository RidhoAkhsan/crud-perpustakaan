@extends('layouts.parent')

@section('content')

<div class="cotainer">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">Category Buku</h4>
        </div>
        <div class="card">
            <div class="card-body">

                <!-- Button Create -->
                <a href="{{ route('dashboard.category.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Create Category</span>
                </a>

                <div class="card table-responsive mt-4">
                    <table class="table table-hover table-borderes datatable">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Genre</th>
                                <th>slug</th>
                                <th>action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse( $category as $row)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->slug }}</td>
                                <td>
                                    <!-- Button Show -->
                                    <a href="{{ route('dashboard.category.show', $row->id) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                        Show
                                    </a>
                                    <!-- Button Edit -->
                                    <a href="{{ route('dashboard.category.edit', $row->id) }}" class="btn btn-warning">
                                        <i class="fas fa-pen"></i>
                                        Edit
                                    </a>
                                    <!-- Button Delete -->
                                    <form action="{{ route('dashboard.category.destroy', $row->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mt-2">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="4" class="text-center bg-danger text-white">Tidak ada data !</td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection