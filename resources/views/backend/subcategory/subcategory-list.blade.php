@extends('backend.master')
@section('subcategory_active')
   active
@endsection
@section('content')
<div class="br-mainpanel">
    <div class="pd-20 bg-light">
        <a href="{{url('dashboard')}}">
          <h6 class="tx-dark">Dashboard / Category List</h6>
        </a>
    </div>
    <div class="br-pagebody">
          <h6 class="tx-center">All SubCategory List({{$lcat}})</h6>
          <h6 class="tx-center"></h6>
        <div class="row row-sm bg-white">
            <div class="col-xl-12 mg-t-25">
              
                <div class="tx-right">
                    <a href="{{url('category-add')}}"><i class="fa fa-plus"></i>Add</a>
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
                          <th class="tx-center">SubCategory Name</th>
                          <th class="tx-center">Slug</th>
                          <th class="tx-center">Category ID</th>
                          <th class="tx-center">Created_At</th>
                          <th class="tx-center">Updated_At</th>
                          <th class="tx-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($scat as $key=> $data)
                        <tr>
                          <th>{{$cat->firstitem() +$key}}</th>
                          <td>{{$data->subcategory_name}}</td>
                          <td>{{$data->slug}}</td>
                          <td>{{$data->category_id}}</td>
                          <td>{{$data->created_at !=null ? $data->created_at->diffForHumans() : 'N/A'}}</td>
                          <td>{{$data->updated_at !=null ? $data->updated_at->diffForHumans() : 'N/A'}}</td>
                          <td class="tx-center">
                              <a href="{{url('category-edit')}}/{{$data->id}}"><button class="btn btn-outline-success">Edit</button></a>
                              <a href="{{url('category-delete')}}/{{$data->id}}"><button class="btn btn-outline-danger">Delete</button></a>
                          </td>
                        </tr>
                        @endforeach                        
                      </tbody>
                    </table>
                    {{$scat}}
                </div>
                {{-- <P class="mg-t-5 tx-danger"><i>NazmulIslam Talukder</i></P> --}}
            </div>
        </div>
    </div>
</div>
@endsection