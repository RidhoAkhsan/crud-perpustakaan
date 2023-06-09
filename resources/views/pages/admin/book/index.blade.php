@extends('layouts.parent')

@section('content')

<div class="cotainer">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">List Buku</h4>
        </div>
        <div class="card">
            <div class="card-body">

                <!-- Button Create -->
                <a href="{{ route('dashboard.book.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Create List Book</span>
                </a>

                <div class="card table-responsive mt-4">
                    <table class="table table-hover datatable" id="dataTable">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th>ISBN</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($book as $row)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->author }}</td>
                                <td>{{ $row->category->name }}</td>
                                <td>{!! $row->description !!}</td>
                                <td>{{ $row->number }}</td>

                                <!-- ===== Button ===== -->
                                <td>
                                    <!-- Show -->
                                    <a href="{{ route('dashboard.book.gallery.index', $row->id) }}" class="btn btn-info">
                                        <i class="fas fa-image"></i>
                                        Cover
                                    </a>
                                    <!-- Show -->
                                    <a href="{{ route('dashboard.book.show', $row->id) }}" class="btn btn-info">
                                        <i class="fas fa-eye"></i>
                                        Show
                                    </a>
                                    <!-- Edit -->
                                    <a href="{{ route('dashboard.book.edit', $row->id) }}" class="btn btn-warning">
                                        <i class="fas fa-pen"></i>
                                        Edit
                                    </a>
                                    <!-- Delete -->
                                    <form action="{{ route('dashboard.book.destroy', $row->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger mt-2">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>

                                </td>
                                <!-- ===== End Button ===== -->
                            </tr>

                            @empty
                            <tr>
                                <td colspan="7" class="text-center bg-danger text-white">Tidak ada data !</td>
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