@extends('layouts.main')

@section('page-title')
    {{ env('APP_NAME') }} | {{ $association->id? 'UPDATE ASSOCIATION' : 'CREATE ASSOCIATION' }}
@endsection
@section('breadcrumb')
    @include('inc.breadcrumb', [
        'title' => $association->id? 'UPDATE Association' : 'Create New Association',
        'active' => $association->id? 'Update' : 'Create',
        'links' => [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Association', 'url' => route('association.index')]
        ]
    ])
@endsection

@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <i class="mdi {{ $association->id? 'mdi-account-edit' : 'mdi-plus-box' }}"></i> {{ $association->id? 'Update Association' : 'Create New Organization' }}
        </div>
        <form action="{{ $association->id? route('association.update', $association->slug) : route('association.store') }}" class="user-form" method="POST">
            <div class="card-body">
                @include('inc.alert-msg')
                @csrf
                @if($association->id)
                    @method('put')
                @endif
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>Organization <span class="text-danger">*</span></label>
                            <select class="form-control select2-with-clear @error('organization_id') is-invalid @enderror" id="organization" name="organization_id" data-placeholder="Organization">
                                <option value="">Organization</option>
                                @foreach($organizationsGroup as $type => $organizations)
                                    <optgroup label="{{$type}}">
                                        @foreach($organizations AS $organization)
                                            <option {{ old('organization_id', $association->organization_id) == $organization->id ? 'selected' : '' }} type-name="{{ $organization->type }}" value="{{ $organization->id }}">{{ $organization->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('organization_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Relation <span class="text-danger">*</span></label>
                            </label>
                            <input type="text" class="form-control @error('relation') is-invalid @enderror" name="relation" value="{{ old('relation', $association->name) }}" placeholder="Relation" />
                            @error('relation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Position Title <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('position_title') is-invalid @enderror" name="position_title" value="{{ old('position_title', $association->position_title) }}" placeholder="Position Title" />
                            @error('position_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>
                                Start Date
                            </label>
                            <input type="text" id="startDate" class="form-control start-date active @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $association->start_date) }}" placeholder="Start Date" />
                            @error('start_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label>
                                End Date
                            </label>
                            <input type="text" id="endDate" class="form-control end-date active @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', $association->end_date) }}" placeholder="End Date" />
                            @error('end_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6" style="display:none" id="salary">
                        <div class="form-group">
                            <label>
                                Salary
                            </label>
                            <input type="number" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary', $association->salary) }}" placeholder="Salary" />
                            @error('salary')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-blue waves-effect waves-light">
                    <i class="fa fa-save"></i> Save
                </button>
            </div>
        </form>
    </div>
@endsection

@section('javascripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script>
        $(document).ready(function(){
            $('select.select2-with-clear').select2({
                allowClear: true
            });

            $(".start-date").flatpickr({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'Y-m-d',
            });

            $(".end-date").flatpickr({
                dateFormat: 'Y-m-d',
            });

            $.validator.addMethod("checkStartDateInFuture",
                function(value, element, params) {
                    let mStart = moment(value);
                    if (moment(mStart).isSameOrAfter(moment()))
                        return false;
                    return params;
                },'Start date must not be in the future.');

            $.validator.addMethod("greaterThan",
                function(value, element, params) {
                    let mStart = moment($(params).val());
                    let mEnd = moment(value);

                    if (moment(mEnd).isSameOrAfter(moment()))
                        return false;
                    if (mStart.isValid() && mEnd.isSameOrBefore(mStart, 'day'))
                        return false;
                    return true;
                },'End date must be greater than start date and not be in the future.');

            //in case of loading the editing association page
            @if($association->id)
                let type_name = $('#organization').find('option:selected').attr('type-name');
                checkType(type_name);
            @endif

            //in case of changing the select value
            $('#organization').on('change', function() {
                let type_name = $(this).find('option:selected').attr('type-name');
                checkType(type_name);
            });

            function checkType(type_name){
                if ( type_name === 'Company')
                    $("#salary").show();
                else
                    $("#salary").hide();
            }

            $('.user-form').validate({
                rules: {
                    position_title: {
                        required: true,
                        maxlength: 50
                    },
                    relation: {
                        required: true,
                        maxlength: 255
                    },
                    organization_id: {
                        required: true
                    },
                    start_date: { checkStartDateInFuture: true
                    },
                    end_date: { greaterThan: "#startDate" },
                }
            });
        });
    </script>
@endsection
