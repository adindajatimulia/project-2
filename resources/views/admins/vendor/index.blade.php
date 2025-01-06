@extends('admins.layouts.main')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-end">
                        <a href="javascript:void(0);" onclick="addModal()" class="btn btn-sm btn-primary"><i class="fa fa-plus-square-o"></i> Add Data</a>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <v-datatables></v-datatables>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->

  @include('admins.vendor.partials.form')
@endsection