<nav role="navigation" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand"><img class="logo" src="{{ asset('Images/qsLogoWeb.png') }}"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                

                
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Settings<b class="caret"></b></a>
                        
                    <ul class="dropdown-menu">
                        @can('listStations')
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Stations</a>
                            @endcan
                            <ul class="dropdown-menu">
                                @can('listStations')
                                <li><a href="{{ url('/stations') }}">List of Stations</a></li>
                                @endcan
                                @can('addStation')
                                    <li><a href="{{ url('/stations/add') }}">Add Stations</a></li>
                                @endcan
                                @can('addStation')
                                <li><a href="{{ url('/stations/map') }}">View Map</a></li>
                                @endcan
                            </ul>
                            
                        </li>
                         @can('listEmployees')
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Employees/Admins</a>
                            <ul class="dropdown-menu">
                                @can('listEmployees')
                                <li><a href="{{ url('/employees') }}">List of Employees</a></li>
                                @endcan
                                @can('addEmployee')
                                <li><a href="{{ url('/employees/add') }}">Add Employee</a></li>
                                @endcan
                                @can('addEmployee')
                                <li><a href="{{ url('/admin') }}">List of Admins </a></li>
                                @endcan
                                @can('addEmployee')
                                <li><a href="{{ url('/admin/add') }}">Add Admin </a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Cars</a>
                            <ul class="dropdown-menu">
                                @can('viewMakes')
                                    <li><a href="{{ url('/makes') }}">List of Makes</a></li>
                                @endcan
                                @can('viewModels')
                                    <li><a href="{{ url('/models') }}">List of Models</a></li>
                                @endcan
                                @can('addModel')
                                    <li><a href="{{ url('/models/add') }}">Add Model</a></li>
                                @endcan
                            </ul>
                            @can('SeeCharts')
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#" >Charts And statistics</a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu"><a tabindex="-1" href="#">Cars</a>
                                      <ul class="dropdown-menu">
                                         <li><a href="{{ url('statistics/makes') }}">Makes</a></li>
                                         <li><a href="{{ url('statistics/makes') }}">Models</a></li>
                                      </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a tabindex="-1" href="#">Sales</a>
                                    <ul class="dropdown-menu">
                                         <li><a href="{{ url('statistics/sales') }}">Sales</a></li>
                                         <li><a href="{{ url('statistics/sales/purchases') }}">Sales with Purchases</a></li>
                                      </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a tabindex="-1" href="#">Stations</a>
                                    <ul class="dropdown-menu">
                                         <li><a href="{{ url('statistics/stations/services') }}">Services</a></li>
                                         <li><a href="{{ url('statistics/stations/sales') }}">Sales</a></li>
                                    </ul>
                                    </li>
                                    <li class="dropdown-submenu"><a tabindex="-1" href="#">Employees</a>
                                    <ul class="dropdown-menu">
                                         <li><a href="{{ url('statistics/employees') }}">General Info</a></li>
                                         <li><a href="{{ url('statistics/employees/services') }}">Services</a></li>
                                         <li><a href="{{ url('statistics/employees/sales') }}">Sales</a></li>
                                         <li><a href="{{ url('statistics/employees/sales/income') }}">Sales Income</a></li>
                                    </ul>
                                    </li>
                                    <li><a href="{{ url('statistics/products') }}">Products</a></li>
                                    
                                    <li><a href="{{ url('statistics/purchases') }}">Purchases</a></li>
                                    <li><a href="{{ url('statistics/services') }}">Services</a></li>
                                </ul>
                            </li>
                        @endcan
                        </li>
                        <li><a href="{{ url('/company') }}">Company info</a></li>
                        <li><a href="{{ url('/locations') }}"> Locations</a></li>
                        @can('addQr')
                            <li class="dropdown-submenu"><a tabindex="-1" href="#">
                                     QR Codes </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url('/codes') }}" >View Codes</a></li>
                                <li><a href="{{ url('/codes/add') }}" >Generate Codes</a></li>
                            </ul>
                            </li>
                 
                        @endcan
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Services <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/services') }}" >View Services</a></li>
                        <li><a href="{{ url('/services/values') }}">Service Points</a></li>
                        @can('createServiceValue')
                        <li><a href="{{ url('/services/values/add') }}">Set Service Points</a></li>
                        @endcan
                        <li><a href="{{ url('/services/categories') }}">Service Categories</a></li>
                        <li><a href="{{ url('/services/preferences') }}">Service Preferences</a></li>
                        @can('addPreference')
                        <li><a href="{{ url('/services/preferences/add') }}">Set Service Preferences</a></li>
                        @endcan
                        @can('createServiceTypes')
                        <li><a href="{{ url('/services/types') }}">Service Types</a></li>
                        @endcan
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Rewards <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/rewards') }}" >Rewards</a></li>
                        @can('addReward')
                        <li><a href="{{ url('/rewards/add') }}" >Add Reward</a></li>
                        @endcan
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Products <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/product') }}">List of Products</a></li>
                     @can('createproducts')
                        <li><a href="{{ url('/product/add') }}">Add new product</a></li>
                        @endcan
                        @can('createUnit')
                        <li><a href="{{ url('/unit') }}">Units</a></li> 
                        @endcan
                        @can('createCategory')
                        <li><a href="{{ url('/categories') }}">Categories</a></li> 
                        @endcan
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Transactions <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/transactions">List of Transactions</a></li>
                        <li><a href="/transactions/add">New Transaction</a></li>
                    </ul>
                </li>
                
                @can('createNotifications')
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Notifications <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/notifications') }}" >Broadcast History</a></li>
                        <li><a href="{{ url('/notifications/add') }}" >Create Broadcast</a></li>
                    </ul>
                </li>
                @endcan
            </ul>
            
                    <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Account <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/changepassword">Change Password</a></li>
                        <li><a href="/auth/logout">Logout</a></li>
                    </ul>
                </li>
                <li><a onclick='printDiv("print")' style="cursor: pointer;"><span class="glyphicon glyphicon-print"></span></a>
</li>
                    </ul>
        </div>
    </div>
</nav>
