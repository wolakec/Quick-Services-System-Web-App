<nav role="navigation" class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand"><p style="padding: 13px;">Quick Services</p>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/locations') }}"> Locations</a></li>

                <li><a href="{{ url('/services/types') }}">Service Types</a></li>
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Vehicles<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/makes') }}">List of Makes</a></li>
                        <li><a href="{{ url('/models') }}">List of Models</a></li>
                        <li><a href="{{ url('/models/add') }}">Add Model</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Employees<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/employees') }}">List of Employees</a></li>
                        <li><a href="{{ url('/employees/add') }}">Add Employee</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Stations <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/stations') }}">List of Stations</a></li>
                        <li><a href="{{ url('/stations/add') }}">Add Stations</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Qr Codes <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/codes') }}" >View Qr Codes</a></li>
                        <li><a href="{{ url('/codes/add') }}" >Generate QR Codes</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        Services <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/services') }}" >View Services</a></li>
                    </ul>
                </li>
            </ul>
            <form role="search" class="navbar-form navbar-right" style="margin-right: 2px;">
                <div class="form-group">
                    <input type="text" placeholder="Search Here" class="form-control">
                </div>
            </form>
        </div>
    </div>
</nav>







<!--<a href="{{ url('/employees') }}">Employees</a> - 
<a href="{{ url('/employees/add') }}">Add Employee</a> - 
<a href="{{ url('/stations') }}">Stations</a> -
<a href="{{ url('/stations/add') }}">Add Station</a> -
<a href="{{ url('/codes') }}">Qr Codes</a>
</br></br>-->