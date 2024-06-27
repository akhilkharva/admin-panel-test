<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">@lang('translation.Menu')</li>

                <li>
                    <a href="{{url('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge badge-pill badge-success float-right">3</span>
                        <span>@lang('translation.Dashboard')</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-store-2-line"></i>
                        <span>@lang('translation.Products')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('ecommerce-products') }}">@lang('translation.Queue')</a></li>
                        <li><a href="{{ url('ecommerce-products-review') }}">@lang('translation.Review')</a></li>
                        <li><a href="{{ url('ecommerce-products-published') }}">@lang('translation.Published')</a></li>
                    </ul>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
