
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

    {{-- <li>
        <a href="#menu3" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="icofont-user"></i>{{ __('Customers') }}
        </a>
        <ul class="collapse list-unstyled" id="menu3" data-parent="#accordion">
            <li>
                <a href="{{ route('admin-user-index') }}"><span>{{ __('Customers List') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-user-image') }}"><span>{{ __('Customer Default Image') }}</span></a>
            </li>
        </ul>
    </li> --}}

    {{-- <li>
        <a href="#vendor" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="icofont-ui-user-group"></i>{{ __('Vendors') }}
        </a>
        <ul class="collapse list-unstyled" id="vendor" data-parent="#accordion">
            <li>
                <a href="{{ route('admin-vendor-index') }}"><span>{{ __('Vendors List') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-vendor-withdraw-index') }}"><span>{{ __('Withdraws') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-vendor-subs') }}"><span>{{ __('Vendor Subscriptions') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-vendor-color') }}"><span>{{ __('Default Background') }}</span></a>
            </li>

        </ul>
    </li> --}}

    {{-- <li>
        <a href="#vendor1" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
                <i class="icofont-verification-check"></i>{{ __('Vendor Verifications') }}
        </a>
        <ul class="collapse list-unstyled" id="vendor1" data-parent="#accordion">
            <li>
                <a href="{{ route('admin-vr-index') }}"><span>{{ __('All Verifications') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-vr-pending') }}"><span>{{ __('Pending Verifications') }}</span></a>
            </li>
        </ul>
    </li> --}}
    {{-- <li>
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
    </li> --}}

    {{-- <li>
        <a href="{{ route('admin-subscription-index') }}" class=" wave-effect"><i class="fas fa-dollar-sign"></i>{{ __('Vendor Subscription Plans') }}</a>
    </li> --}}

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

    {{-- <li>
        <a href="{{ route('admin-prod-import') }}"><i class="fas fa-upload"></i>{{ __('Bulk Product Upload') }}</a>
    </li> --}}


    {{-- <li>
        <a href="{{ route('admin-coupon-index') }}" class=" wave-effect"><i class="fas fa-percentage"></i>{{ __('Set Coupons') }}</a>
    </li> --}}


    {{-- <li>
        <a href="#general" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-cogs"></i>{{ __('General Settings') }}
        </a>
        <ul class="collapse list-unstyled" id="general" data-parent="#accordion">
            <li>
                <a href="{{ route('admin-gs-logo') }}"><span>{{ __('Logo') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-gs-fav') }}"><span>{{ __('Favicon') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-gs-load') }}"><span>{{ __('Loader') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-shipping-index') }}"><span>{{ __('Shipping Methods') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-package-index') }}"><span>{{ __('Packagings') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-pick-index') }}"><span>{{ __('Pickup Locations') }}</span></a>
            </li>
            <li>
            <a href="{{ route('admin-gs-contents') }}"><span>{{ __('Website Contents') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-gs-footer') }}"><span>{{ __('Footer') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-gs-affilate') }}"><span>{{__('Affiliate Information')}}</span></a>
            </li>

            <li>
                <a href="{{ route('admin-gs-popup') }}"><span>{{ __('Popup Banner') }}</span></a>
            </li>


            <li>
                <a href="{{ route('admin-gs-error-banner') }}"><span>{{ __('Error Banner') }}</span></a>
            </li>


            <li>
                <a href="{{ route('admin-gs-maintenance') }}"><span>{{ __('Website Maintenance') }}</span></a>
            </li>

        </ul>
    </li> --}}

    {{-- <li>
        <a href="#homepage" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-edit"></i>{{ __('Home Page Settings') }}
        </a>
        <ul class="collapse list-unstyled" id="homepage" data-parent="#accordion">
            <li>
                <a href="{{ route('admin-sl-index') }}"><span>{{ __('Sliders') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-service-index') }}"><span>{{ __('Services') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-ps-best-seller') }}"><span>{{ __('Right Side Banner1') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-ps-big-save') }}"><span>{{ __('Right Side Banner2') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-sb-index') }}"><span>{{ __('Top Small Banners') }}</span></a>
            </li>

            <li>
                <a href="{{ route('admin-sb-large') }}"><span>{{ __('Large Banners') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-sb-bottom') }}"><span>{{ __('Bottom Small Banners') }}</span></a>
            </li>

            <li>
                <a href="{{ route('admin-review-index') }}"><span>{{ __('Reviews') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-partner-index') }}"><span>{{ __('Partners') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-ps-customize') }}"><span>{{ __('Home Page Customization') }}</span></a>
            </li>
        </ul>
    </li> --}}

    {{-- <li>
        <a href="#menu" class="accordion-toggle wave-effect" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-file-code"></i>{{ __('Menu Page Settings') }}
        </a>
        <ul class="collapse list-unstyled" id="menu" data-parent="#accordion">
            <li>
                <a href="{{ route('admin-faq-index') }}"><span>{{ __('FAQ Page') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-ps-contact') }}"><span>{{ __('Contact Us Page') }}</span></a>
            </li>
            <li>
                <a href="{{ route('admin-page-index') }}"><span>{{ __('Other Pages') }}</span></a>
            </li>
        </ul>
    </li> --}}
    {{-- <li>
        <a href="{{ route('admin-staff-index') }}" class=" wave-effect"><i class="fas fa-user-secret"></i>{{ __('Manage Staffs') }}</a>
    </li> --}}

    {{-- <li>
        <a href="{{ route('admin-subs-index') }}" class=" wave-effect"><i class="fas fa-users-cog mr-2"></i>{{ __('Subscribers') }}</a>
    </li> --}}


        {{-- <li>
            <a href="{{ route('admin-role-index') }}" class=" wave-effect"><i class="fas fa-user-tag"></i>{{ __('Manage Roles') }}</a>
        </li> --}}
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
        <li>
            <a href="{{ route('admin-cache-clear') }}" class=" wave-effect"><i class="fas fa-sync"></i>{{ __('Clear Cache') }}</a>
        </li>
