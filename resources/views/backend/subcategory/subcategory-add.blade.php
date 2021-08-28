@extends('backend.master')
@section('subcategory_active')
  active
@endsection
@section('content')
<div class="br-mainpanel">
    <div class="pd-30">
        <a href="{{url('dashboard')}}">
            <h4>Dashboard / Category</h4>
        </a>
    </div>
    <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm bg-light">
            <div class="col-xl-8 m-auto">
              <h5 class="tx-center mt-5 mb-5">Add SubCategory</h5>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong>{{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                                        
                @endif
              <h6>Add New</h6>  
              <form action="{{url('subcategory-post')}}" method="POST">
                  @csrf
                <div class="form-layout"> 
                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                      <div class="form-group mg-b-10-force">
                        <label for="subcategory_name" class="form-control-label">SubCategory Name <span class="tx-danger">*</span></label>
                        <input type="text" name="subcategory_name" value="{{old('subcategory_name')}}" class="form-control @error('subcategory_name') is-invalid @enderror" placeholder="Enter Category Name">
                        @error('subcategory_name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                      <div class="form-group mg-b-10-force">
                        <label for="category_name" class="form-control-label">Category Name <span class="tx-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-control">
                          <option value>Select Category</option>
                          @foreach ($category as $data)
                            <option value="{{$data->id}}">{{$data->category_name}}</option>
                          @endforeach
                        </select>
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