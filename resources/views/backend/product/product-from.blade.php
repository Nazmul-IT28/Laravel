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
              <h5 class="tx-center mt-5 mb-5">Product Add</h5>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong>{{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                                        
                @endif
              <h6>Add New Product</h6>  
               <form action="{{route('productFrom')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="form-layout"> 
                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                      <div class="form-group mg-b-10-force">
                        <label for="title" class="form-control-label">Product Name <span class="tx-danger">*</span></label>
                        <input type="text" name="title" id="title" value="{{$title ?? old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Category Name">
                        @error('title')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>

                  <div class="row mg-b-25">
                     <div class="col-lg-12">
                       <div class="form-group mg-b-10-force">
                         <label for="slug" class="form-control-label">Product Slug <span class="tx-danger">*</span></label>
                         <input type="text" name="slug" id="slug" value="{{$slug ?? old('slug')}}" class="form-control @error('slug') is-invalid @enderror" placeholder="Enter Category Name">
                         @error('slug')
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
                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                          @endforeach
                        </select>
                        @error('brand_name')
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
                            <option value="{{$data->id}}">{{$data->category_name}}</option>
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
                            <option value="{{$data->id}}">{{$data->subcategory_name}}</option>
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
                         <label for="summery" class="form-control-label">Product Summery<span class="tx-danger">*</span></label>
                         <textarea type="text" name="summery" value="{{old('summery')}}" class="form-control @error('summery') is-invalid @enderror" placeholder="Summery hare"></textarea>
                         @error('summery')
                             <div class="alert alert-danger">{{$message}}</div>
                         @enderror
                        </div>
                     </div>
                  </div>

                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                       <div class="form-group mg-b-10-force">
                        <label for="description" class="form-control-label">Product Description<span class="tx-danger">*</span></label>
                        <textarea type="text" name="description" value="{{old('description')}}" class="form-control @error('description') is-invalid @enderror" placeholder="Description hare"></textarea>
                        @error('description')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                       </div>
                    </div>
                 </div>

                  <div class="row mg-b-25">
                     <div class="col-lg-12">
                       <div class="form-group mg-b-10-force">
                         <label for="price" class="form-control-label">Product Price<span class="tx-danger">*</span></label>
                         <input type="text" name="price" value="{{$price ?? old('price')}}" class="form-control @error('price') is-invalid @enderror" placeholder="Product Price Ex:$500">
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
                         
                         <input type="file" name="thumbnail" value="{{$thumbnail ?? old('thumbnail')}}" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="Enter Category Name">
                         @error('thumbnail')
                             <div class="alert alert-danger">{{$message}}</div>
                         @enderror
                       </div>
                     </div>
                  </div>

                  <div class="row mg-b-25">
                    <div class="col-lg-12">
                      <div class="form-group mg-b-10-force">
                        <label for="image" class="form-control-label">Product Gallery<span class="tx-danger">*</span></label>
                        <input multiple type="file" name="image" value="{{$image ?? old('image')}}" class="form-control @error('image') is-invalid @enderror" placeholder="Select Product Image">
                        @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                 </div>

                  <div class="form-layout-footer mg-t-30 mg-b-30 tx-center">
                      <button class="btn btn-info">Submit Form</button>
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

      // $('#category_id').change(function(){
      //    let category_id=$(this).val();
      //    if(category_id){
      //     $.ajax({
      //       type "GET",
      //       url: "{{url('subcat-id')}}"+category_id,
      //       success:function(e){
      //         if(e){
      //           $('#subcategory_id').empty();
      //           $('#sbucategory_id').append('<option value>Select One</option>');
      //           $.each(e, function(key, value){
      //             $('#sbucategory_id').append('<option value="'+value.id+'">'+valie.subcategory_name+'</option>');
      //           })
      //         }else{
      //           $('#subcategory_id').empty();
      //         }
      //       }
      //     })
      //    }else{
      //     $('#subcategory_id').empty();
      //    }
      // })
   </script>
@endsection