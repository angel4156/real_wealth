@extends('template.main')
@section('title', 'Add stock')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">@yield('title')</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/Stock">stock</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="text-right">
                <a href="/stock" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                  Back
                </a>
              </div>
            </div>
            <form class="needs-validation" novalidate action="/stock" method="POST">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label for="question">Question</label>
                      <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" id="question" placeholder="Input your idea" value="{{old('question')}}" required>
                      @error('question')
                      <span class="invalid-feedback text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>                 
                </div> 
                <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="question">Min</label>
                        <input type="number" min="0" step="0.01" name="min" class="form-control @error('min') is-invalid @enderror" id="min" placeholder="Input your idea" value="{{old('min')}}" required>
                        @error('min')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>                 
                  </div> 
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="question">Max</label>
                        <input type="number" name="max" class="form-control @error('max') is-invalid @enderror" id="max" placeholder="Input your idea" value="{{old('max')}}" required>
                        @error('max')
                        <span class="invalid-feedback text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>                 
                  </div>                                 
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-dark mr-1" type="reset"><i class="fa-solid fa-arrows-rotate"></i>
                  Reset</button>
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk"></i>
                  Save</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.content -->
      </div>
    </div>
  </div>
</div>

@endsection