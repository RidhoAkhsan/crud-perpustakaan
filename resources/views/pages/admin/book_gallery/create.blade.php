@extends('layouts.parent')

@section('content')

<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">Create Cover Buku</h4>
        </div>
        <div class="card">
            <div class="card-body">

                <form action="{{ route('dashboard.book.gallery.store', $book->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <a href="{{ route('dashboard.book.gallery.index', $book->id) }}" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>

                    <div class="col mb-3">
                        <div class="form-group">
                            <label for="inputFile" class="col-sm-2 col-form-label">Cover Buku</label>
                            <input class="form-control" type="file" id="inputFile" multiple  name="files[]">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection