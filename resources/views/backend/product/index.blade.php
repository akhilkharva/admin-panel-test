@extends('layouts.master')
@section('title') Dashboard @endsection
@section('css')
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('title') {{$urlSegment}} @endslot
        @slot('li_1') Dashboard @endslot
        @slot('li_2') {{$urlSegment}} @endslot
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

                    <div class="modal fade" id="importProduct" data-backdrop="static" tabindex="-1" role="dialog"
                         aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form method="post" enctype="multipart/form-data"
                              action="{{ route('backend.product.import') }}">
                            @csrf
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Upload File</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="file" name="data_import" id="data_import">
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-light waves-effect"
                                                data-dismiss="modal">Close
                                        </button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-centered datatable dt-responsive nowrap" data-page-length="5"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>URL</th>
                                <th>Supplier</th>
                                <th>Sku</th>
                                <th>Price</th>
                                <th>Title</th>
                                {{--<th>created on</th>
                                <th>updated on</th>--}}
                                {{--                                <th>operation</th>--}}
                                <th style="width: 120px;">Operation</th>
                                <th style="width: 120px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><a href="{{$product->url}}" class="text-dark font-weight-bold"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="{{$product->url}}">
                                            <i class="mdi mdi-open-in-new theme--light font-size-18"></i></a></td>
                                    <td>{{$product->supplier->name}}</td>
                                    <td>{{$product->sku}}</td>
                                    <td>
                                        <div class="badge badge-soft-success font-size-12">{{$product->price}}</div>
                                    </td>
                                    <td>
                                        {{$product->title}}
                                    </td>

                                    <td>
                                        @if($product->status == 'Queue')
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Review">
                                                {{--<input type="submit"
                                                       class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                       value="Review">--}}
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-warning waves-effect waves-light">
                                                    Review
                                                </button>
                                            </form>
                                        @elseif($product->status == 'Review')
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Queue">
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger waves-effect waves-light">
                                                    Reject
                                                </button>
                                                {{--<input type="submit"
                                                       class="btn btn-sm btn-link"
                                                       value="Reject">--}}
                                            </form>
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Published">
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-success waves-effect waves-light">
                                                    Publish
                                                </button>
                                            </form>
                                        @elseif($product->status == 'Published')
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Review">
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-warning waves-effect waves-light">
                                                    Review
                                                </button>
                                            </form>
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Draft">
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                                    Listing
                                                </button>
                                            </form>
                                        @elseif($product->status == 'Draft')
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Staged">
                                                {{--<input type="submit"
                                                       class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                       value="Stage">--}}
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                                    Stage
                                                </button>
                                            </form>
                                        @elseif($product->status == 'Staged')
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Active">
                                                {{--<input type="submit"
                                                       class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                       value="Active">--}}
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                                    Active
                                                </button>
                                            </form>
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Inactive">
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger waves-effect waves-light">
                                                    Inactive
                                                </button>
                                            </form>
                                        @elseif($product->status == 'Active')
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Inactive">
                                                {{--<input type="submit"
                                                       class="text-red-600 hover:text-red-900 mb-2 mr-2"
                                                       value="Inactive">--}}
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger waves-effect waves-light">
                                                    Inactive
                                                </button>
                                            </form>
                                        @elseif($product->status == 'Inactive')
                                            <form class="inline-block"
                                                  action="{{ route('backend.product.status') }}"
                                                  method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="post">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="id" value={{$product->id}}>

                                                <input type="hidden" name="status" value="Active">
                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                                    Active
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('backend.product.show', $product->id) }}"
                                           data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="View"
                                           class="text-success mb-2 mr-2"><i class="mdi mdi-eye font-size-18"></i></a>

                                        <a href="{{route('backend.product.edit', $product->id)}}" data-toggle="tooltip"
                                           data-placement="top" title="" data-original-title="Edit"
                                           class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2"><i
                                                class="mdi mdi-pencil font-size-18"></i></a>

                                        <a class="delete-confirmation-button text-danger mb-2 mr-2"
                                           data-toggle="tooltip" data-placement="top" data-original-title="Delete"
                                           href="{{ route('backend.product.delete', $product->id) }}" title="Delete"><i
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

    <script src="{{ URL::asset('/assets/js/backend/product/index.js')}}"></script>

@endsection

