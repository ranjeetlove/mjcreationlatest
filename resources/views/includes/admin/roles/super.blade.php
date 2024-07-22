
    <li>
        <a href="#menu5" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false"><i class="fas fa-sitemap"></i>{{ __('Manage Categories') }}</a>
        <ul class="collapse list-unstyled
        @if(request()->is('admin/attribute/*/manage') && request()->input('type')=='category')
          show
        @elseif(request()->is('admin/attribute/*/manage') && request()->input('type')=='subcategory')
          show
        @elseif(request()->is('admin/attribute/*/manage') && request()->input('type')=='childcategory')
          show
        @elseif(request()->is('admin/attribute/*/manage') && request()->input('type')=='subchildcategory')
          show
        @endif" id="menu5" data-parent="#accordion" >
                <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='category') active @endif">
                    <a href="{{ route('admin-cat-index') }}"><span>{{ __('Main Category') }}</span></a>
                </li>
                <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='subcategory') active @endif">
                    <a href="{{ route('admin-subcat-index') }}"><span>{{ __('Sub Category') }}</span></a>
                </li>
                <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='childcategory') active @endif">
                    <a href="{{ route('admin-childcat-index') }}"><span>{{ __('Child Category') }}</span></a>
                </li>
                {{-- <li class="@if(request()->is('admin/attribute/*/manage') && request()->input('type')=='subchildcategory') active @endif">
                    <a href="{{ route('admin-sub-childcat-index') }}"><span>{{ __('Sub Child Category') }}</span></a>
                </li> --}}
        </ul>
    </li>
    <li>
        <a href="#menu2" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="icofont-cart"></i>{{ __('Products') }}
        </a>
        <ul class="collapse list-unstyled" id="menu2" data-parent="#accordion">
            <li>
                <a href="{{ route('admin-prod-physical-create') }}"><span>{{ __('Add New Product') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-prod-index') }}"><span>{{ __('All Products') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-prod-deactive') }}"><span>{{ __('Deactivated Product') }}</span></a>
            </li>
        </ul>
    </li>



    <li>
        <a href="#menu33" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-upload"></i>{{ __('Bulk Product Upload') }}
        </a>
        <ul class="collapse list-unstyled" id="menu33" data-parent="#accordion">
            <li>
                <a href="{{ route('admin-prod-import') }}"><span>{{ __('Product Upload') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-prod-imgae-import') }}"><span>{{ __('Product Image') }}</span></a>
            </li>
        </ul>
    </li>





        <li>
            <a href="#order" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false"><i class="fas fa-hand-holding-usd"></i>{{ __('Orders') }}</a>
            <ul class="collapse list-unstyled" id="order" data-parent="#accordion" >
                   <li>
                    <a href="{{route('admin-order-index')}}"> {{ __('All Orders') }}</a>
                </li>
                <li>
                    <a href="{{route('admin-order-pending')}}"> {{ __('Pending Orders') }}</a>
                </li>
                <li>
                    <a href="{{route('admin-order-processing')}}"> {{ __('Processing Orders') }}</a>
                </li>
                <li>
                    <a href="{{route('admin-order-completed')}}"> {{ __('Completed Orders') }}</a>
                </li>
                <li>
                    <a href="{{route('admin-order-declined')}}"> {{ __('Declined Orders') }}</a>
                </li>

            </ul>
        </li>

