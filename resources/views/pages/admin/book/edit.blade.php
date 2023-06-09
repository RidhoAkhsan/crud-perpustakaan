@extends('layouts.parent')

@section('content')

<div class="container">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="card-title m-0 font-weight-bold text-primary">Create List Book</h4>
        </div>
        <div class="card">
            <div class="card-body">

                <form method="post" action="{{ route('dashboard.book.update', $book->id) }}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <a href="{{ route('dashboard.category.index') }}" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-arrow-left"></i>
                        Back
                    </a>
                    
                    <!-- === Title Book === -->
                    <div class="row mb-3">
                        <label for="inputName" class="col-sm-2 col-form-label">Title Book</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="title" value="{{ $book->title }}">
                        </div>
                    </div>

                    <!-- === Author Book === -->
                    <div class="row mb-3">
                        <label for="inputAuthor" class="col-sm-2 col-form-label">Author Book</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAuthor" name="author" value="{{ $book->author }}">
                        </div>
                    </div>

                    <!-- === Category Book === -->
                    <div class="row mb-3">
                        <label for="inputCategory" class="col-sm-2 col-form-label">Category Book</label>
                        <div class="col-sm-10">
                            <select name="category_id" id="inputCategory" class="form-control">
                                <option selected value="{{ $book->category->id }}">{{ $book->category->name }}</option>
                                <option selected value=""><=== Pilih Category ===></option>
                                @foreach($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- === ISBN Book === -->
                    <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">ISBN Book</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="inputNumber" name="number" value="{{ $book->number }}">
                        </div>
                    </div>

                    <!-- === Description Book === -->
                    <div class="row mb-3">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Description Book</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="inputDescription" cols="30" rows="10">{!! $book->description !!}</textarea>
                        </div>
                    </div>

                    <!-- === Button === -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('inputDescription');
</script>

@endsection
