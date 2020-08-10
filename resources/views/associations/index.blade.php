@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} | Associations
@endsection

@section('breadcrumb')
    @include('inc.breadcrumb', [
        'title' => 'Associations List',
        'active' => 'Associations',
        'links' => [['name' => 'Home', 'url' => route('home')]]
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <h3>
                        <i class="mdi mdi-account-multiple"></i> Associations List
                    </h3>
                </div>
                <div class="col-sm-12 col-md-7">
                    <a href="{{ route('association.create') }}" class="btn btn-success btn-sm float-right">
                        <i class="mdi mdi-plus-box"></i>
                        Create New Association
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @include('inc.alert-msg')
            <form action="{{ route('association.index') }}" class="user-form" method="GET">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Position Title
                            </label>
                            <input type="text" class="form-control @error('position_title') is-invalid @enderror" value="{{ old('position_title') }}" name="position_title" placeholder="Position Title" />
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Organization Type
                            </label>
                            <select class="form-control select2-with-clear @error('organization_type_ids') is-invalid @enderror" name="organization_type_ids[]" data-placeholder="Organization Type" multiple>
                                <option value="">Organization Type</option>
                                @foreach($organizationTypes AS $organizationType)
                                    <option {{ old('organization_type_ids') !== null ? in_array($organizationType->id, old('organization_type_ids')) ? 'selected' : '' : '' }} value="{{ $organizationType->id }}">{{ $organizationType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-blue waves-effect waves-light">
                        <i class="fa fa-search"></i> Search
                    </button>
                    <a href="{{ route('association.index') }}" class="btn btn-success waves-effect waves-light">
                        <i class="fa fa-eraser"></i> Clear
                    </a>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table nowrap table-bordered" id="datatable">
                    <thead>
                    <tr>
                        <th>Position Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Salary</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Organization</th>
                        <th>Type</th>
                        <th>Relation</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('javascripts')
    <script>
        $(document).ready( function () {
            let table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: window.location.toString()
                },
                columns: [
                    { data: "position_title", name: "position_title" },
                    { data: "start_date", name: "start_date" },
                    { data: "end_date", name: "end_date" },
                    { data: "salary", name: "salary" },
                    { data: "first_name", name: "first_name" },
                    { data: "last_name", name: "last_name" },
                    { data: "organization", name: "organization" },
                    { data: "type", name: "type" },
                    { data: "relation", name: "relation" },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
                searching: false,
                "language": {
                    zeroRecords: "No Records Found",
                    emptyTable: "No Records Found",
                    paginate:{
                        previous:"<i class='mdi mdi-chevron-left'>",
                        next:"<i class='mdi mdi-chevron-right'>"
                    }
                },
                drawCallback:function(){
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                    $("[data-toggle='tooltip']").each(function() {
                        $(this).tooltip();
                    });
                }
            });

            $('select.select2-with-clear').select2({
                allowClear: true
            });

            $('.user-form').validate({
                rules: {
                    position_title: {
                        maxlength: 50
                    }
                }
            });
        });
    </script>
@endsection
