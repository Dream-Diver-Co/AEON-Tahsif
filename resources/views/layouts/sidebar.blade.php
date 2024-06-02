{{-- Left sidebar --}}
<nav class="mt-2">
    @canany(['permission.show', 'roles.show', 'user.show'])
    <ul class="nav nav-sidebar">
        <li class="nav-item">

            <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}"><i
                    class="fas fa-home"></i>Home</a>
        </li>
    </ul>
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
            data-accordion="false">

            <li
                class="nav-item has-treeview {{ Request::is('role/add') || Request::is('roles') || Request::is('permissions') || Request::is('users') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'active' : '' }}">
                    <i class="fas fa-users-cog"></i>
                    <p>
                        @lang('cruds.userManagement.title')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview"
                    style="display: {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'block' : 'none' }};">
                    @can('permission.show')
                        <li class="nav-item">
                            <a href="{{ route('permissionIndex') }}"
                                class="nav-link {{ Request::is('permission*') ? 'active' : '' }}">
                                <i class="fas fa-key"></i>
                                <p> @lang('cruds.permission.title_singular')</p>
                            </a>
                        </li>
                    @endcan

                    @can('roles.show')
                        <li class="nav-item">
                            <a href="{{ route('roleIndex') }}" class="nav-link {{ Request::is('role*') ? 'active' : '' }}">
                                <i class="fas fa-user-lock"></i>
                                <p> @lang('cruds.role.fields.roles')</p>
                            </a>
                        </li>
                    @endcan

                    @can('user.show')
                        <li class="nav-item">
                            <a href="{{ route('userIndex') }}" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                                <i class="fas fa-user-friends"></i>
                                <p> @lang('cruds.user.title')</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>

            {{-- @can('api-user.view')
            <li class="nav-item">
                <a href="{{ route('api-userIndex') }}" class="nav-link {{ Request::is('api-users*') ? "active":'' }}">
                    <i class="fas fa-cog"></i>
                    <sub><i class="fas fa-child"></i></sub>
                    <p> API Users</p>
                </a>
            </li>
        @endcan --}}
        </ul>
    @endcanany

    {{-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview">
            <a href="" class="nav-link">
                <i class="fas fa-palette"></i>
                <p>
                    @lang('global.theme')
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none">
                <li class="nav-item">
                    <a href="{{ route('userSetTheme', [auth()->id(), 'theme' => 'default']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-info"></i>
                        <p class="text">Default {{ auth()->user()->theme == 'default' ? '✅' : '' }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userSetTheme', [auth()->id(), 'theme' => 'light']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-white"></i>
                        <p>Light {{ auth()->user()->theme == 'light' ? '✅' : '' }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userSetTheme', [auth()->id(), 'theme' => 'dark']) }}" class="nav-link">
                        <i class="nav-icon fas fa-circle text-gray"></i>
                        <p>Dark {{ auth()->user()->theme == 'dark' ? '✅' : '' }}</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul> --}}
    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
        data-accordion="false">
        <li
            class="nav-item has-treeview  {{ Request::is('po-management-create') || Request::is('po-management-list') ? 'menu-open' : '' }}">
            <a href="#"
                class="nav-link {{ Request::is('po-management-create*') || Request::is('po-management-list') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i>
                <p>
                    Purchase Orders
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            @can('purchase_order_create')
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{ route('po-create') }}"
                            class="nav-link {{ Request::is('po-management-create*') ? 'active' : '' }}">create new po</a>
                    </li>
                </ul>
            @endcan

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('po-list') }}"
                        class="nav-link {{ Request::is('po-management-list') ? 'active' : '' }}">PO List</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li class="nav-item">

            <a href="{{ route('buyer-list') }}" class="nav-link {{ Request::is('buyer-list') ? 'active' : '' }}"><i
                    class="fas fa-building"></i> Buyers</a>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li class="nav-item">

            <a href="{{ route('vendor-list') }}" class="nav-link  {{ Request::is('vendor-list') ? 'active' : '' }}"><i
                    class="fas fa-industry"></i> Vendors</a>
        </li>
    </ul>

    @can('buyer_manage')
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
            data-accordion="false">
            <li
                class="nav-item has-treeview {{ Request::is('buyer-manage') || Request::is('department-manage') || Request::is('buyer_contact-manage') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ Request::is('permission*') || Request::is('role*') || Request::is('user*') ? 'active' : '' }}">
                    <i class="fas fa-warehouse"></i>
                    <p>
                        Buyer Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('buyer-manage') }}"
                            class="nav-link {{ Request::is('buyer-manage') ? 'active' : '' }}">Buyer Management</a>
                    </li>
                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('department-manage') }}"
                            class="nav-link {{ Request::is('department-manage') ? 'active' : '' }}">Departments</a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('buyer_contact-manage') }}"
                            class="nav-link {{ Request::is('buyer_contact-manage') ? 'active' : '' }}">Contacts</a>
                    </li>
                </ul>
            </li>
        </ul>
    @endcan


    @can('vendor_manage')
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
            data-accordion="false">
            <li
                class="nav-item has-treeview {{ Request::is('vendor-manage') || Request::is('manufacturer-manage') || Request::is('vendor_contact-manage') || Request::is('manufacturer-certificate') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ Request::is('vendor-manage') || Request::is('vendor_contact-manage') || Request::is('manufacturer-manage') || Request::is('manufacturer-certificate') ? 'active' : '' }}">
                    <i class="fas fa-recycle"></i>
                    <p>
                        Vendor Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('vendor-manage') }}"
                            class="nav-link  {{ Request::is('vendor-manage') ? 'active' : '' }}">Vendor Management</a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('manufacturer-manage') }}"
                            class="nav-link  {{ Request::is('manufacturer-manage') ? 'active' : '' }}">Manufacturers</a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('manufacturer-certificate') }}"
                            class="nav-link  {{ Request::is('manufacturer-certificate') ? 'active' : '' }}">Certificates</a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('vendor_contact-manage') }}"
                            class="nav-link  {{ Request::is('vendor_contact-manage') ? 'active' : '' }}">Contacts</a>
                    </li>
                </ul>
            </li>
        </ul>
    @endcan


    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item has-treeview {{ Request::is('critical-path-manage') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('critical-path-manage') ? 'active' : '' }}">
                <i class="fas fa-circle"></i>
                <p>
                    Critical Path
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('add-critical-path') }}" class="nav-link">Add New</a>
                </li>
            </ul> -->
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('critical-path') }}"
                        class="nav-link  {{ Request::is('critical-path-manage') ? 'active' : '' }}">Critical Paths</a>
                </li>

                {{-- @if (Auth::user()->hasRole('Super Admin')) --}}
                @can('buyer_critical_path.show')
                    <li class="nav-item">
                        <a href="{{ route('buyer-critical-path') }}"
                            class="nav-link  {{ Request::is('buyer-critical-path-manage') ? 'active' : '' }}">Buyer
                            Critical Paths</a>
                    </li>
                @endcan
                {{-- @endif --}}
            </ul>

        </li>
    </ul>
    {{--    @can('card.main') --}}

    {{--    @endcan --}}
</nav>
