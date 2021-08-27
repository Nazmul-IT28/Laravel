@extends('backend.master')
@section('category_active')
  active
@endsection
@section('content')
<div class="br-mainpanel">
    <div class="pd-30">
        <a href="http://127.0.0.1:8000/dashboard">
            <h4>Dashboard / Category</h4>
        </a>
    </div>
    <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm bg-light">
            <div class="col-xl-8 m-auto">
              <h5 class="tx-center mt-5 mb-5">Add Category</h5>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong>{{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                                        
                @endif
              <h6>Add New</h6>  
              <form action="{{url('/category-post')}}" method="POST">
                  @csrf
                <div class="form-layout"> 
                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                      <div class="form-group mg-b-10-force">
                        <label for="category_name" class="form-control-label">Category Name <span class="tx-danger">*</span></label>
                        <input type="text" name="category_name" value="{{old('category_name')}}" class="form-control @error('category_name') is-invalid @enderror" placeholder="Enter Category Name">
                        @error('category_name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-layout-footer mg-t-30 mg-b-30 tx-center">
                      <button class="btn btn-info">Submit Form</button>
                  </div>
                </div> 
              </form>
            </div>
        </div>
    </div>
</div>
@endsection