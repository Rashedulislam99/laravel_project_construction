<div class="mdc-drawer__header">
    <a href="index.html" class="brand-logo">
        <img src="{{ asset('assets') }}/images/logo.svg" alt="logo">
    </a>
</div>
<div class="mdc-drawer__content">
    <div class="user-info">
        <p class="name">Rashedul Islam</p>
        <p class="email">clydemiles@elenor.us</p>
    </div>
    <div class="mdc-list-group">
        <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="index.html">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">home</i>
                    Dashboard
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/forms/basic-forms.html">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">track_changes</i>
                    Forms
                </a>
            </div>
            {{-- <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">dashboard</i>
                    UI Features
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link   {{request()->is("system/suppliers") ? "":"" }}   " href="{{url("system/suppliers")}}">
                                Buttons
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="pages/ui-features/typography.html">
                                Typography
                            </a>
                        </div>
                    </nav>
                </div>
            </div> --}}
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu2">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">dashboard</i>
                    Supplier Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu2">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/suppliers') }}">
                                Supplier List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/suppliers/create') }}">
                                Supplier Create
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Project Report -->
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu3">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                        assignment </i>
                    Project Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu3">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/projects') }}">
                                Project List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/projects/create') }}">
                                Project Create
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- Task Report -->
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu4">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">assessment</i>
                    Task Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu4">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/tasks') }}">
                                Tasks List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/tasks/create') }}">
                                Task Create
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- employees Report -->
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu5">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">people</i>
                    Employee Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu5">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/employees') }}">
                                Employees List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/employees/create') }}">
                                Employees Create
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Task Details Report -->
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu6">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">description</i>
                    Task Details Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu6">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/task_details') }}">
                                Task Details List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/employees/create') }}">
                                Employees Create
                            </a>
                        </div>
                    </nav>
                </div>
            </div>


            <!-- Employees Task Report -->

            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu7">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                        assignment </i>
                    Employees Task R
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu7">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/employees_tasks') }}">
                                Employees Task List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/employees_tasks/create') }}">
                                Employees Create
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- materials Report -->

            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu8">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                        home </i>

                    Materials Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu8">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/materials') }}">
                                materials List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/materials/create') }}">
                                Add Material
                            </a>
                        </div>
                    </nav>
                </div>
            </div>


            <!-- Inventory Report -->

            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu9">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                        home </i>
                    Inventory Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu9">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/inventorys') }}">
                                Inventory List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/inventorys/create') }}">
                                Add Inventory
                            </a>
                        </div>
                    </nav>
                </div>
            </div>


            <!-- Inventory Report -->

            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu10">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                        home </i>
                    Expenses Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu10">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/expenses') }}">
                                Expense List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/expenses/create') }}">
                                Add Expense
                            </a>
                        </div>
                    </nav>
                </div>
            </div>


            <!-- roles Report -->
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu11">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                        home </i>
                    Role Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu11">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/roles') }}">
                        Role List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/roles/create') }}">
                                Add Role
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- user Report -->
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="ui-sub-menu12">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">
                        home </i>
                 user Report
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="ui-sub-menu12">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/users') }}">
                    User List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/users/create') }}">
                                Add User
                            </a>
                        </div>
                    </nav>
                </div>
            </div>




            {{-- .mdc-drawer .mdc-drawer__content .mdc-drawer-menu .mdc-drawer-item .mdc-drawer-link.active {
            background: #fff;         ai code  ta ace style.css a white color change korte parbo --}}

            {{-- suppliers --}}
            {{-- <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel1"
                    data-target="supplier-sub-menu">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">dashboard</i>
                    Supplier
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="supplier-sub-menu">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/suppliers') }}">
                                Supplier List
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="{{ url('system/suppliers/create') }}">
                                Add Supplier
                            </a>
                        </div>
                    </nav>
                </div>
            </div> --}}





            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/tables/basic-tables.html">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">grid_on</i>
                    Tables
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link" href="pages/charts/chartjs.html">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">pie_chart_outlined</i>
                    Charts
                </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel"
                    data-target="sample-page-submenu">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">pages</i>
                    Sample Pages
                    <i class="mdc-drawer-arrow material-icons">chevron_right</i>
                </a>
                <div class="mdc-expansion-panel" id="sample-page-submenu">
                    <nav class="mdc-list mdc-drawer-submenu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="pages/samples/blank-page.html">
                                Blank Page
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="pages/samples/403.html">
                                403
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="pages/samples/404.html">
                                404
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="pages/samples/500.html">
                                500
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="pages/samples/505.html">
                                505
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="pages/samples/login.html">
                                Login
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="pages/samples/register.html">
                                Register
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
                <a class="mdc-drawer-link"
                    href="https://www.bootstrapdash.com/demo/material-admin-free/jquery/documentation/documentation.html"
                    target="_blank">
                    <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                        aria-hidden="true">description</i>
                    Documentation
                </a>
            </div>
        </nav>
    </div>
    <div class="profile-actions">
        <a href="javascript:;">Settings</a>
        <span class="divider"></span>
        <a href="javascript:;">Logout</a>
    </div>
    {{-- <div class="mdc-card premium-card">
          <div class="d-flex align-items-center">
            <div class="mdc-card icon-card box-shadow-0">
              <i class="mdi mdi-shield-outline"></i>
            </div>
            <div>
              <p class="mt-0 mb-1 ml-2 font-weight-bold tx-12">Material Dash</p>
              <p class="mt-0 mb-0 ml-2 tx-10">Pro available</p>
            </div>
          </div>
          <p class="tx-8 mt-3 mb-1">More elements. More Pages.</p>
          <p class="tx-8 mb-3">Starting from $25.</p>
          <a href="https://www.bootstrapdash.com/product/material-design-admin-template/" target="_blank">
						<span class="mdc-button mdc-button--raised mdc-button--white">Upgrade to Pro</span>
					</a>
        </div> --}}
</div>
