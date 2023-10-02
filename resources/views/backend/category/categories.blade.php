@extends('backend.master')

@section('content')
<div class="br-mainpanel">
    <div class="pd-1">
    </div><!-- d-flex -->
<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-center">Category Lists</h6>
        <a href="{{ route('SubCategory') }}" style="float: right; margin-bottom: 5px; margin-left: 5px; cursor: pointer;" type="button" class="btn btn-primary">View SubCategory</a>
        <a href="" style="float: right; margin-bottom: 5px; cursor: pointer;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add Category</a>

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
                        <form action="{{ route('CategoryStore') }}" method="post">
                            @csrf
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"></h6>
                            <div class="row">
                            <label class="col-sm-4 form-control-label">Firstname: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="category_name" class="form-control" placeholder="Enter New Category">
                            </div>
                            </div><!-- row -->
                            <div class="form-layout-footer mg-t-30 text-center">
                            <button class="btn btn-info" type="submit" style="cursor: pointer">Add Category</button>
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
            @foreach ($category_view as $key=>$catview)
            <tr>
                <th>{{ $category_view->firstItem() + $key }}</th>
                <td>{{ $catview->category_name }}</td>
                <td>{{ $catview->slug ?? "NA" }}</td>
                <td>{{ $catview->created_at != null ? $catview->created_at->diffForHumans() : 'N/A' }}</td>
                    <td style="display: flex">
                        <a class="btn btn-outline-primary mr-1" href="{{ $catview->slug }}" type="button" class="btn btn-primary" title="Edit" data-toggle="modal" data-target="#EditCategory{{ $catview->slug }}" data-whatever="@mdo"><i class="icon ion-compose"></i></a>
                        <a class="btn btn-outline-danger" title="Delete" href="{{ route('CategoryDelete', $catview->id) }}"><i class="icon ion-trash-a"></i></a>

                        <div class="modal fade" id="EditCategory{{ $catview->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                              <input type="hidden" name="id" value="{{ $catview->id }}">
                                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                  <input type="text" name="category_name" class="form-control" value="{{ $catview->category_name }}">
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
      {{ $category_view->links('pagination::bootstrap-4') }}

      {{-- Trused Category lists --}}
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-center">Trused Category Lists</h6>
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
            @foreach ($trushed_cat as $tcatview)
            <tr>
                <th>{{ $loop->index+1 }}</th>
                <td>{{ $tcatview->category_name }}</td>
                <td>{{ $tcatview->slug ?? "NA" }}</td>
                <td>{{ $tcatview->created_at != null ? $tcatview->created_at->diffForHumans() : 'N/A' }}</td>
                    <td style="display: flex">
                        <a class="btn btn-outline-primary mr-1" href="{{ route('CategoryRestore', $tcatview->id) }}" type="button" title="Restore"><i class="icon ion-refresh"></i></a>
                        <a class="btn btn-outline-danger" title="Permanent Delete" href="{{ route('CategoryPdelete', $tcatview->id) }}"><i class="icon ion-trash-b"></i></a>

                        <div class="modal fade" id="EditCategory{{ $catview->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                              <input type="hidden" name="id" value="{{ $catview->id }}">
                                              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                  <input type="text" name="category_name" class="form-control" value="{{ $catview->category_name }}">
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
    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
@endsection
