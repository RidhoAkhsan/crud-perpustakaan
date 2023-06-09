@extends('layouts.parent')

@section('content')

<div class="container">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">Cover Buku &raquo; {{ $book->title }}</h4>
        </div>
        <div class="card">
            <div class="card-body">

                <!-- Button Create -->
                <a href="{{ route('dashboard.book.gallery.create', $book) }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Create Cover</span>
                </a>

                <div class="card table-responsive mt-4">
                    <table class="table table-hover datatable" id="dataTable">

                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $row)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $row->url }}" alt="" style="width: 150px" class="img-thumbnail">
                                </td>
                                <td>
                                    <form action="{{ route('dashboard.book.gallery.destroy', [$book->id, $row->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-2">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center bg-danger text-white">Tidak ada data !</td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
                <a href="{{ route('dashboard.book.index', $book->id) }}" class="btn btn-outline-success btn-sm mt-2">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
            </div>
        </div>

    </div>
</div>


@endsection