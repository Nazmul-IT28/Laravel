@extends('backend.master')
@section('content')
<div class="br-mainpanel">
    <br>
    <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm bg-light mg-t-5">
            <div class="col-xl-8 m-auto">
              <h5 class="tx-center mt-5">Edit Category</h5>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong>{{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                                        
                @endif
              <form action="{{url('category-update')}}" method="POST">
                  @csrf
                <div class="form-layout">
                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                        <input type="hidden" value="{{$category->id}}" name="category_id">
                      <div class="form-group mg-b-10-force">
                        <label for="category_name" class="form-control-label">Category Name <span class="tx-danger">*</span></label>
                        <input type="text" name="category_name" value="{{$category->category_name ?? old('category_name')}}" class="form-control @error('category_name') is-invalid @enderror" placeholder="Enter Category Name">
                        @error('category_name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-layout-footer mg-t-30 mg-b-30 tx-center">
                      <button class="btn btn-info">Update</button>
                  </div>
                </div> 
              </form>
            </div>
        </div>
    </div>
</div>
@endsection