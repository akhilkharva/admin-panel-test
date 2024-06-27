@extends('layouts.master')
@section('title') Dashboard @endsection
@section('css')
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') Doctors @endslot
        @slot('li_1') Dashboard @endslot
        @slot('li_2') Doctors @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <x-jet-button class="btn btn-sm btn-outline-primary mb-2 ">
                            <a class="text-white"
                               href="{{ route('backend.doctor.create')}}">
                                <i class="mdi mdi-plus mr-2"></i>{{ __('Add Doctor') }}</a>
                        </x-jet-button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered datatable dt-responsive nowrap" data-page-length="5"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)
                                <tr>
                                    <td>{{$doctor->id}}</td>
                                    <td>{{$doctor->first_name}}</td>
                                    <td>{{$doctor->last_name}}</td>
                                    <td>{{$doctor->email}}</td>
                                    <td>{{$doctor->gender}}</td>
                                    <td>{{$doctor->phone}}</td>
                                    <td>
                                        <a href="{{ route('backend.doctor.show', $doctor->id) }}"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="View"
                                           class="text-success mb-2 mr-2"><i class="mdi mdi-eye font-size-18"></i></a>

                                        <a href="{{route('backend.doctor.edit', $doctor->id)}}" data-toggle="tooltip"
                                           data-placement="top" title="" data-original-title="Edit"
                                           class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>

                                        <a class="delete-confirmation-button text-danger mb-2 mr-2"
                                           data-toggle="tooltip" data-placement="top" data-original-title="Delete"
                                           href="{{ route('backend.doctor.delete', $doctor->id) }}" title="Delete"><i
                                                class="mdi mdi-trash-can font-size-18"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection

@section('script')

    <!-- Responsive examples -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js')}}"></script>

    <script src="{{ URL::asset('/assets/js/backend/doctor/index.js')}}"></script>

@endsection

