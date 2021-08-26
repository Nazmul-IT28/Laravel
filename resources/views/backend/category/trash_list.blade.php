@extends('backend.master')
@section('content')
<div class="br-mainpanel">
    <div class="pd-20 bg-light">
        <a href="{{url('dashboard')}}">
          <h6 class="tx-dark">Dashboard / Trashed List</h6>
        </a>
    </div>
    <div class="br-pagebody">
          <h6 class="tx-center">Trashed List({{$trashcou}})</h6>
          <h6 class="tx-center"></h6>
        <div class="row row-sm bg-white">
            <div class="col-xl-12 mg-t-25">
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
                          <th class="tx-center">ID</th>
                          <th class="tx-center">Category Name</th>
                          <th class="tx-center">Deleted_At</th>
                          <th class="tx-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($trashcat as $key=> $data)
                        <tr>
                          <th>{{$trashcat->firstitem() +$key}}</th>
                          <td>{{$data->category_name}}</td>
                          <td>{{$data->deleted_at !=null ? $data->deleted_at->diffForHumans() : 'N/A'}}</td>
                          <td class="tx-center">
                              <a href="{{url('trash-restore')}}/{{$data->id}}"><button class="btn btn-outline-success">Restor</button></a>
                              <a href="{{url('trash-delete')}}/{{$data->id}}"><button class="btn btn-outline-danger">Delete</button></a>
                          </td>
                        </tr>
                        @empty
                        <td class="tx-center" colspan="10">No data abailable</td>
                        @endforelse                       
                      </tbody>
                    </table>
                </div>
                {{-- <P class="mg-t-5 tx-danger"><i>NazmulIslam Talukder</i></P> --}}
            </div>
        </div>
    </div>
</div>
@endsection