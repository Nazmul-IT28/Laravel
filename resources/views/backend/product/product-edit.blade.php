@extends('backend.master')
@section('product_active')
  active
@endsection
@section('content')
<div class="br-mainpanel">
   <div class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="{{url('dashboard')}}">Dashboard</a>
      <span class="breadcrumb-item active text-capitalize">{{$last}}</span>
    </div>
    <div class="br-pagebody mg-t-5 pd-x-30">
        <div class="row row-sm bg-light">
            <div class="col-xl-8 m-auto">
              <h5 class="tx-center mt-5 mb-5">Update Product</h5>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong>{{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                                        
                @endif
              <h6>Update Product</h6>  
               <form action="{{route('productUpdate')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-layout"> 
                  <input type="hidden" name="product_id" value="{{$product->id}}"> 
                  <div class="row mg-b-25">
                     <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                           <label for="title" class="form-control-label">Product Name <span class="tx-danger">*</span></label>
                           <input type="text" name="title" id="title" value="{{$product->title ?? old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Product Name">
                           @error('title')
                              <div class="alert alert-danger">{{$message}}</div>
                           @enderror
                        </div>
                     </div>
                  </div>

                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                      <div class="form-group mg-b-10-force">
                        <label for="brand_name" class="form-control-label">Brand Name <span class="tx-danger">*</span></label>
                        <select name="brand_id" id="brand_name" class="form-control @error('brand_name') is-invalid @enderror">
                          <option value>Select Category</option>
                          @foreach ($brands as $brand)
                            <option
                            @if ($product->brand_name==$brand->id)
                              selected
                            @endif
                            value="{{$brand->id}}">{{$brand->brand_name}}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                      <div class="form-group mg-b-10-force">
                        <label for="category_name" class="form-control-label">Category Name <span class="tx-danger">*</span></label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                          <option value>Select Category</option>
                          @foreach ($category as $data)
                            <option
                            @if ($product->category_id==$data->id)
                              selected
                            @endif
                            value="{{$data->id}}">{{$data->category_name}}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                      <div class="form-group mg-b-10-force">
                        <label for="subcategory_name" class="form-control-label">SubCategory Name <span class="tx-danger">*</span></label>
                        <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                          <option value>Select Category</option>
                          @foreach ($subcategory as $data)
                            <option
                            @if ($product->subcategory_id==$data->id)
                              selected
                            @endif
                            value="{{$data->id}}">{{$data->subcategory_name}}</option>
                          @endforeach
                        </select>
                        @error('subcategory_id')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mg-b-25">
                     <div class="col-lg-12">
                       <div class="form-group mg-b-10-force">
                         <label for="price" class="form-control-label">Product Price<span class="tx-danger">*</span></label>
                         <input type="text" name="price" value="{{$product->price ?? old('price')}}" class="form-control @error('price') is-invalid @enderror" placeholder="Product Price Ex:$500">
                         @error('price')
                             <div class="alert alert-danger">{{$message}}</div>
                         @enderror
                       </div>
                     </div>
                  </div>

                  <div class="row mg-b-25">
                     <div class="col-lg-12">
                       <div class="form-group mg-b-10-force">
                         <label for="thumbnail" class="form-control-label">Product Thumbnail<span class="tx-danger">*</span></label>
                         
                         <input type="file" name="thumbnail" value="{{$thumbnail ?? old('thumbnail')}}" class="form-control @error('thumbnail') is-invalid @enderror" onchange="document.getElementById('image_id').src=window.URL.createObjectURL(this.files[0])">
                         @error('thumbnail')
                             <div class="alert alert-danger">{{$message}}</div>
                         @enderror
                       </div>
                     </div>
                  </div>
                  <div class="row mg-b-25">
                     <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                           <label for="thumbnail_preview" class="form-control-label">Thumbnail Preview<span class="tx-danger">*</span></label>
                           <img id="image_id" width="100" src="{{asset('images/' .$product->created_at->format('Y/m/').$product->id.'/'.$product->thumbnail)}}" alt="">
                        </div>
                     </div>
                  </div>

                  <div class="form-layout-footer mg-t-30 mg-b-30 tx-center">
                      <button class="btn btn-info">Update Form</button>
                  </div> 
               </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_js')
   <script>
      $('#title').keyup(function(){
         $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
      });
   </script>
@endsection