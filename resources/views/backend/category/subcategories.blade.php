@extends('backend.master')

@section('content')
<div class="br-mainpanel">
    <div class="pd-1">
    </div><!-- d-flex -->
<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-center">Category Lists</h6>
        <a href="{{ route('Category') }}" style="float: right; margin-bottom: 5px; margin-left: 5px; cursor: pointer;" type="button" class="btn btn-primary">View Category</a>
        <a href="" style="float: right; margin-bottom: 5px; cursor: pointer;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add SubCategory</a>

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
                        <form action="{{ route('SubCategoryStore') }}" method="post">
                            @csrf
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"></h6>
                            <div class="row">
                            <label class="col-sm-4 form-control-label">SubCategory Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="subcategory_name" class="form-control" placeholder="Enter New SubCategory">
                            </div>
                            </div><!-- row -->
                            <div class="row mg-t-10">
                                <label class="col-sm-4 form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <select class="form-control select2" name="category_id">
                                        @foreach ($categories as $catid)
                                            <option value="{{ $catid->id }}">{{ $catid->category_name }}</option>
                                        @endforeach
                                      </select>
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
            <th class="wd-35p">SubCategory Name</th>
            <th class="wd-35p">Slug</th>
            <th class="wd-35p">Category Id</th>
            <th class="wd-35p">Created At</th>
            <th class="wd-20p">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $key=>$catview)
            <tr>
                <th>{{ $subcategories->firstItem() + $key }}</th>
                <td>{{ $catview->subcategory_name }}</td>
                <td>{{ $catview->slug ?? "NA" }}</td>
                <td>{{ $catview->category_id ?? "NA" }}</td>
                <td>{{ $catview->created_at != null ? $catview->created_at->diffForHumans() : 'N/A' }}</td>
                    <td style="display: flex">
                        <a class="btn btn-outline-primary mr-1" href="{{ $catview->slug }}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#EditSCategory{{ $catview->slug }}" data-whatever="@mdo" title="Edit"><i class="icon ion-compose"></i></a>
                        <a class="btn btn-outline-danger" title="Delete" href="{{ route('SubCategoryDelete', $catview->id) }}"><i class="icon ion-trash-a"></i></a>

                        <div class="modal fade" id="EditSCategory{{ $catview->slug }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                          <form action="{{ route('SubCategoryUpdate') }}" method="post">
                                              @csrf
                                              <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10"></h6>
                                              <div class="row">
                                              <label class="col-sm-4 form-control-label">Firstname: <span class="tx-danger">*</span></label>
                                              <input type="hidden" name="id" value="{{ $catview->id }}">
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <input type="text" name="subcategory_name" class="form-control" value="{{ $catview->subcategory_name }}">
                                                </div>
                                              </div><!-- row -->

                                              <div class="row mg-t-10">
                                                <label class="col-sm-4 form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                                    <select class="form-control select2" name="category_id">
                                                        @foreach ($categories as $catid)
                                                            <option @if ($catid->id == $catview->category_id) selected @endif value="{{ $catid->id }}">{{ $catid->category_name }}</option>
                                                        @endforeach
                                                      </select>
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
      {{ $subcategories->links('pagination::bootstrap-4') }}


      {{-- Sub Categories Trused --}}
      <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 tx-center">Trused SubCategory Lists</h6>
      <table class="table table-bordered table-colored table-info">
        <thead>
            <tr>
              <th class="wd-10p">ID</th>
              <th class="wd-35p">SubCategory Name</th>
              <th class="wd-35p">Slug</th>
              <th class="wd-35p">Category Id</th>
              <th class="wd-35p">Created At</th>
              <th class="wd-20p">Action</th>
            </tr>
          </thead>
        <tbody>
            @foreach ($subcattrushed as $subcatsview)
            <tr>
                <th>{{ $loop->index + 1 }}</th>
                <td>{{ $subcatsview->subcategory_name }}</td>
                <td>{{ $subcatsview->slug ?? "NA" }}</td>
                <td>{{ $subcatsview->category_id ?? "NA" }}</td>
                <td>{{ $subcatsview->created_at != null ? $subcatsview->created_at->diffForHumans() : 'N/A' }}</td>
                    <td style="display: flex">
                        <a class="btn btn-outline-primary mr-1" href="{{ route('SubCategoryRestore', $subcatsview->id ) }}" type="button" class="btn btn-primary" title="Restore"><i class="icon ion-refresh"></i></a>
                        <a class="btn btn-outline-danger" title="Permanent Delete" href="{{ route('SubCategoryPdelete', $subcatsview->id) }}"><i class="icon ion-trash-b"></i></a>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
@endsection
