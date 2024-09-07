@extends('layout.backendlayout')

@section('content')

<div class="container mt-4">
  <!-- ========== title-wrapper start ========== -->
  <div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title">
          <h2>Category
          </h2>
        </div>
      </div>
      <!-- end col -->

    </div>
    <!-- end row -->
  </div>
  <!-- ========== title-wrapper end ========== -->
  <div class="container">
    <div class="row">
      <div class="col-lg-5 ps-0">
        <div class="card">
          <div class="card-header">
            Add Category
          </div>
          <div class="card-body">
            <form action="{{ route('category.save', $editedCategory->id ?? null) }}" method="POST">
              @csrf
              <div class="input-style-1 mb-2">
                <input type="text" placeholder="Category Name" name="title" value="{{ $editedCategory->title ?? null }}"
                  class="form-control">
                @error('title')
                <span class="text-danger">
                  {{ $message }}
                </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-7 ">
        <div class="card">
          <div class="card-header">
            All Categories
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
                @foreach ($categories as $key=>$category)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $category->title }}</td>
                  <td>
                    <a href="{{ route('category.edit', $category->id) }}" class="text-primary">
                      <i class="fa-solid fa-pencil"></i></a>
                    <a href="{{ route('category.delete', $category->id) }}" class="text-danger"><i
                        class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection