@extends('layouts.master')
@section('title') Dashboard @endsection
@section('css')
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') Suppliers @endslot
        @slot('li_1') Dashboard @endslot
        @slot('li_2') Suppliers @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <x-jet-button class="btn btn-sm btn-outline-primary mb-2 ">
                            <a class="text-white"
                               href="{{ route('backend.supplier.create')}}">
                                <i class="mdi mdi-plus mr-2"></i>{{ __('Add Supplier') }}</a>
                        </x-jet-button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered datatable dt-responsive nowrap" data-page-length="5"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{$supplier->id}}</td>
                                    <td>{{$supplier->name}}</td>
                                    <td>{{$supplier->description}}</td>
                                    <td>
                                        <a href="{{route('backend.supplier.edit', $supplier->id)}}" data-toggle="tooltip"
                                           data-placement="top" title="" data-original-title="Edit"
                                           class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>

                                        <a class="delete-confirmation-button text-danger mb-2 mr-2" data-toggle="tooltip" data-placement="top" data-original-title="Delete"
                                           href="{{ route('backend.supplier.delete', $supplier->id) }}" title="Delete"><i class="mdi mdi-trash-can font-size-18"></i>
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

    <script src="{{ URL::asset('/assets/js/backend/supplier/index.js')}}"></script>

@endsection

