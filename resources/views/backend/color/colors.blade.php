@extends('backend.master')

@section('content')
<div class="br-mainpanel">
    <div class="pd-1">
    </div><!-- d-flex -->
<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-center">Color Lists</h6>
        <a href="" style="float: right; margin-bottom: 5px; margin-left: 5px; cursor: pointer;" type="button" class="btn btn-primary">View Sizes</a>
        <a href="" style="float: right; margin-bottom: 5px; cursor: pointer;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Colors</a>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 100%; height: auto;">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" style="cursor: pointer" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mg-t-0">
                    <div class="col-xl-12">
                      <div class="form-layout form-layout-4">
                        <form action="{{ route('color.store') }}" method="post">
                            @csrf
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"></h6>
                            <div class="row">
                            <label class="col-sm-4 form-control-label">Color Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="color_name" class="form-control @error('color_name', 'post') is-invalid @enderror" placeholder="Enter New Color">
                                @error('color_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            </div><!-- row -->
                            <div class="form-layout-footer mg-t-30 text-center">
                            <button class="btn btn-info" type="submit" style="cursor: pointer">Add Color</button>
                        </div><!-- form-layout-footer -->
                        </form>
                      </div><!-- form-layout -->
                    </div><!-- col-6 -->
                </div>
            </div>
            </div>
        </div>
        </div>


      <table class="table table-bordered table-colored table-info">
        <thead>
          <tr>
            <th class="wd-10p">ID</th>
            <th class="wd-35p">Category Name</th>
            <th class="wd-35p">Slug</th>
            <th class="wd-35p">Created At</th>
            <th class="wd-20p">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($colors as $key=>$colorview)
            <tr>
                <th>{{ $colors->firstItem() + $key }}</th>
                <td>{{ $colorview->color_name }}</td>
                <td>{{ $colorview->slug ?? "NA" }}</td>
                <td>{{ $colorview->created_at != null ? $colorview->created_at->diffForHumans() : 'N/A' }}</td>
                    <td style="display: flex">
                        <a class="btn btn-outline-primary mr-1" href="{{ $colorview->slug }}" type="button" class="btn btn-primary" title="Edit" data-toggle="modal" data-target="#EditCategory{{ $colorview->slug }}" data-whatever="@mdo"><i class="icon ion-compose"></i></a>
                        <a class="btn btn-outline-danger" title="Delete" href="{{ route('CategoryDelete', $colorview->id) }}"><i class="icon ion-trash-a"></i></a>

                        <div class="modal fade" id="EditCategory{{ $colorview->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document" style="width: 100%; height: auto;">
                              <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"></h5>
                                  <button type="button" class="close" style="cursor: pointer" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <div class="row mg-t-0">
                                      <div class="col-xl-12">
                                        <div class="form-layout form-layout-4">
                                          <form action="{{ route('color.update', $colorview->id) }}" method="POST">
                                              @csrf
                                              <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"></h6>
                                              <div class="row">
                                              <label class="col-sm-4 form-control-label">Color Name: <span class="tx-danger">*</span></label>
                                              <input type="hidden" name="id" value="{{ $colorview->id }}">
                                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                  <input type="text" name="color_name" class="form-control" value="{{ $colorview->color_name }}">
                                              </div>
                                              </div><!-- row -->
                                              <div class="form-layout-footer mg-t-30 text-center">
                                              <button class="btn btn-info" type="submit">Add Category</button>
                                          </div><!-- form-layout-footer -->
                                          </form>
                                        </div><!-- form-layout -->
                                      </div><!-- col-6 -->
                                  </div>
                              </div>
                              </div>
                          </div>
                    </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      {{ $colors->links('pagination::bootstrap-4') }}

      {{-- <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-center">Trused Category Lists</h6>
        <table class="table table-bordered table-colored table-info">
            <thead>
            <tr>
                <th class="wd-10p">ID</th>
                <th class="wd-35p">Category Name</th>
                <th class="wd-35p">Slug</th>
                <th class="wd-35p">Created At</th>
                <th class="wd-20p">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($trusedcolor as $tolorview)
                <tr>
                    <th>{{ $loop->index+1 }}</th>
                    <td>{{ $tolorview->category_name }}</td>
                    <td>{{ $tolorview->slug ?? "NA" }}</td>
                    <td>{{ $tolorview->created_at != null ? $tolorview->created_at->diffForHumans() : 'N/A' }}</td>
                        <td style="display: flex">
                            <a class="btn btn-outline-primary mr-1" href="{{ route('CategoryRestore', $tolorview->id) }}" type="button" title="Restore"><i class="icon ion-refresh"></i></a>
                            <a class="btn btn-outline-danger" title="Permanent Delete" href="{{ route('CategoryPdelete', $tolorview->id) }}"><i class="icon ion-trash-b"></i></a>

                            <div class="modal fade" id="EditCategory{{ $tolorview->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="width: 100%; height: auto;">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="close" style="cursor: pointer" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mg-t-0">
                                        <div class="col-xl-12">
                                            <div class="form-layout form-layout-4">
                                            <form action="{{ route('CategoryUpdate') }}" method="post">
                                                @csrf
                                                <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"></h6>
                                                <div class="row">
                                                <label class="col-sm-4 form-control-label">Firstname: <span class="tx-danger">*</span></label>
                                                <input type="hidden" name="id" value="{{ $colorview->id }}">
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="category_name" class="form-control" value="{{ $colorview->category_name }}">
                                                </div>
                                                </div><!-- row -->
                                                <div class="form-layout-footer mg-t-30 text-center">
                                                <button class="btn btn-info" type="submit">Add Category</button>
                                            </div><!-- form-layout-footer -->
                                            </form>
                                            </div><!-- form-layout -->
                                        </div><!-- col-6 -->
                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
@endsection


@section('footer_js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        @if(session('ColorStore'))
        Toast.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Color Added Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif

        @if(session('ColorUpdate'))
        Toast.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Color Update Successfully',
                showConfirmButton: false,
                timer: 1000
            })
        @endif
    </script>
@endsection
