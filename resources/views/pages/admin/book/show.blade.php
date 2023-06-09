@extends('layouts.parent')

@section('content')

<div class="container">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">Show List Book <span><strong>{{ $book->name }}</strong></span></h4>
        </div>
        <div class="card">
            <div class="card-body">

                <form method="post" action="{{ route('dashboard.book.index') }}" enctype="multipart/form-data">

                    @csrf
                    @method('POST')

                    <!-- === Title Book === -->
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Title Book</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="title" value="{{ $book->title }}" readonly>
                        </div>
                    </div>

                    <!-- === Author Book === -->
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Author Book</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="author" value="{{ $book->author }}" readonly>
                        </div>
                    </div>

                    <!-- === Category Book === -->
                    <div class="row mb-3">
                        <label for="inputCategory" class="col-sm-2 col-form-label">Category Book</label>
                        <div class="col-sm-10">
                            <input type="name" class="form-control" id="inputNumber" name="number" value="{{ $book->category->name }}" readonly>
                        </div>
                    </div>

                    <!-- === ISBN Book === -->
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">ISBN Book</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputNumber" name="number" value="{{ $book->number }}" readonly>
                        </div>
                    </div>

                    <!-- === Description Book === -->
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Decription Book</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="description" cols="30" rows="10" disabled>{!! $book->description !!}</textarea>
                        </div>
                    </div>

                    <!-- === Button === -->
                    <div class="text-center">
                        <a class="btn btn-success" href="{{ route('dashboard.book.index') }}">
                            <i class="fas fa-arrow-left"></i>
                            Back
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>

@endsection