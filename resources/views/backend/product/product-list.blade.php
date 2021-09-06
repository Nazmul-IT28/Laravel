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
    <div class="br-pagebody">
          <h6 class="tx-center">Product List({{$count}})</h6>
          <h6 class="tx-center"></h6>
        <div class="row row-sm bg-white">
            <div class="col-xl-12 mg-t-25">
              
                <div class="tx-right">
                    <a href="{{route('productAdd')}}"><i class="fa fa-plus"></i>Add</a>
                </div>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong>{{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>                                        
                @endif
                <div class="bd rounded table-responsive bg-light">
                    <table class="bd rounded table table-bordered">
                      <thead class="table table-bordered">
                        <tr>
                          <th class="tx-center">SL</th>
                          <th class="tx-center">Product Name</th>
                          <th class="tx-center">Slug</th>
                          <th class="tx-center">Category ID</th>
                          <th class="tx-center">SubCategory ID</th>
                          <th class="tx-center">Summery</th>
                          <th class="tx-center">Description</th>
                          <th class="tx-center">Price</th>
                          <th class="tx-center">Thumbnail</th>
                          <th class="tx-center">Created_At</th>
                          <th class="tx-center">Updated_At</th>
                          <th class="tx-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($product as $key=> $data)
                        <tr>
                          <th>{{$product->firstitem() +$key}}</th>
                          <td>{{$data->title}}</td>
                          <td>{{$data->slug}}</td>
                          <td>{{$data->category->category_name}}</td>
                          <td>{{$data->subcategory->subcategory_name}}</td>
                          <td>{{Str::limit($data->summery, '50')}}</td>
                          <td>{{Str::limit($data->description, '50')}}</td>
                          <td>{{$data->price}}</td>
                          <td><a download href="{{asset('images/'.$data->created_at->format('Y/m/').$data->id.'/'.$data->thumbnail )}}"><img width="100" src="{{asset('images/'.$data->created_at->format('Y/m/').$data->id.'/'.$data->thumbnail )}}" alt=""></a></td>
                          <td>{{$data->created_at !=null ? $data->created_at->diffForHumans() : 'N/A'}}</td>
                          <td>{{$data->updated_at !=null ? $data->updated_at->diffForHumans() : 'N/A'}}</td>
                          <td class="tx-center">
                              <a href="{{url('product-edit')}}/{{$data->id}}"><button class="btn btn-outline-success">Edit</button></a>
                              {{-- <a href="{{url('subcategory-delete')}}/{{$data->id}}"><button class="btn btn-outline-danger">Delete</button></a> --}}
                          </td>
                        </tr>
                        @endforeach                        
                      </tbody>
                    </table>
                  {{$product}}  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection