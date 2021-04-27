@section('sidebar')
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion text-gray-100" id="accordionSidebar"
    style="background-color: #00a504;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{Auth::user()->username}}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
    <!-- Heading -->
    <div class="sidebar-heading">
        People
    </div>
    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
            aria-controls="collapseUser">
            <i class="fa fa-fw fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Components:</h6>
                <a class="collapse-item" href="{{route('user.index')}}">All User</a>
                <a class="collapse-item" href="{{route('user.create')}}">Add User</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmployee"
            aria-expanded="true" aria-controls="collapseEmployee">
            <i class="fas fa-fw fa-users"></i>
            <span>Employee</span>
        </a>
        <div id="collapseEmployee" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Employee Components:</h6>
                <a class="collapse-item" href="{{route('employee.index')}}">All Employee</a>
                <a class="collapse-item" href="{{route('employee.create')}}">Add Employee</a>
            </div>
        </div>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Customer</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Customer Components:</h6>
                <a class="collapse-item" href="{{route('customer.index')}}">All Customer</a>
                <a class="collapse-item" href="{{route('customer.create')}}">Add Customer</a>
            </div>
        </div>
    </li>   
    <!-- Divider -->
    <hr class="sidebar-divider">
   
    @endif
    <!-- Heading -->
    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
    <div class="sidebar-heading">
        Set Up
    </div>
    @if(Auth::user()->role == 1)
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="true"
            aria-controls="collapseRoles">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Roles</span>
        </a>
        <div id="collapseRoles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Role Components:</h6>
                <a class="collapse-item" href="{{route('role.index')}}">All Role</a>
                <!-- <a class="collapse-item" href="{{route('role.create')}}">Add Role</a> -->
            </div>
        </div>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartment"
            aria-expanded="true" aria-controls="collapseDepartment">
            <i class="fas fa-fw fa-building"></i>
            <span>Department</span>
        </a>
        <div id="collapseDepartment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Department Components:</h6>
                <a class="collapse-item" href="{{route('department.index')}}">All Department</a>
                <a class="collapse-item" href="{{route('department.create')}}">Add Department</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDesignation"
            aria-expanded="true" aria-controls="collapseDesignation">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Designation</span>
        </a>
        <div id="collapseDesignation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Designation Components:</h6>
                <a class="collapse-item" href="{{route('title.index')}}">Title</a>
                <a class="collapse-item" href="{{route('level.index')}}">Level</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif
    @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
    <!-- Heading -->
    <div class="sidebar-heading">
        Enquiry
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEnquiryCategory"
            aria-expanded="true" aria-controls="collapseEnquiryCategory">
            <i class="fas fa-fw fa-folder"></i>
            <span>Enquiry Category</span>
        </a>
        <div id="collapseEnquiryCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category Components:</h6>
                <a class="collapse-item" href="{{route('enquirycategory.index')}}">All Category</a>
                <a class="collapse-item" href="{{route('enquirycategory.create')}}">Add Category</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEnquirySource"
            aria-expanded="true" aria-controls="collapseEnquirySource">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Enquiry Source</span>
        </a>
        <div id="collapseEnquirySource" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Source Components:</h6>
                <a class="collapse-item" href="{{route('enquirysource.index')}}">All Source</a>
                <a class="collapse-item" href="{{route('enquirysource.create')}}">Add Source</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEnquiry"
            aria-expanded="true" aria-controls="collapseEnquiry">
            <i class="fas fa-fw fa-question"></i>
            <span>New Enquiry</span>
        </a>
        <div id="collapseEnquiry" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Enquiry Components:</h6>
                <a class="collapse-item" href="{{route('enquiry.index')}}">All Enquiry</a>
                <a class="collapse-item" href="{{route('enquiry.create')}}">Add Enquiry</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEnquiryResponse"
            aria-expanded="true" aria-controls="collapseEnquiryResponse">
            <i class="fas fa-fw fa-reply"></i>
            <span>Enquiry Response</span>
        </a>
        <div id="collapseEnquiryResponse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Response Components:</h6>
                <a class="collapse-item" href="{{route('enquiryresponse.index')}}">All Response</a>
                <!-- <a class="collapse-item" href="{{route('enquiryresponse.create')}}">Add Response</a> -->
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif
    @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
    <!-- Heading -->
    <div class="sidebar-heading">
        Task Management
    </div>
    @if(Auth::user()->role == 1)
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTask" aria-expanded="true"
            aria-controls="collapseTask">
            <i class="fas fa-fw fa-copy"></i>
            <span>Tasks</span>
        </a>
        <div id="collapseTask" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tasks Components:</h6>
                <a class="collapse-item" href="{{route('todo.index')}}">All Tasks</a>
                <a class="collapse-item" href="{{route('todo.create')}}">Add Tasks</a>
                <a class="collapse-item" href="{{route('pendingTask')}}">Pending Tasks</a>
                <a class="collapse-item" href="{{route('completedTask')}}">Completed Tasks</a>
            </div>
        </div>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMyTask" aria-expanded="true"
            aria-controls="collapseMyTask">
            <i class="fas fa-fw fa-file"></i>
            <span>My Tasks</span>
        </a>
        <div id="collapseMyTask" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tasks Components:</h6>
                <a class="collapse-item" href="{{route('alltask')}}">All Tasks</a>
                <a class="collapse-item" href="{{route('assigned')}}">Assigned Tasks</a>
                <a class="collapse-item" href="{{route('received')}}">Received Tasks</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif
    @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
    <!-- Heading -->
    <div class="sidebar-heading">
        Leave Management
    </div>
    @if(Auth::user()->role == 1 || Auth::user()->role == 2)
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeaveTypes"
            aria-expanded="true" aria-controls="collapseLeaveTypes">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Leave Types</span>
        </a>
        <div id="collapseLeaveTypes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">LeaveType Components:</h6>
                <a class="collapse-item" href="{{route('leaveType.index')}}">All LeaveType</a>
                <a class="collapse-item" href="{{route('leaveType.create')}}">Add LeaveType</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLeave" aria-expanded="true"
            aria-controls="collapseLeave">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Leaves</span>
        </a>
        <div id="collapseLeave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Leaves Components:</h6>
                <a class="collapse-item" href="{{route('leave.index')}}">All Leaves</a>
                <a class="collapse-item" href="{{route('pendingLeave')}}">Pending Leaves</a>
                <a class="collapse-item" href="{{route('leaveApproved')}}">Approved Leaves</a>
                <a class="collapse-item" href="{{route('leaveRejected')}}">Rejected Leaves</a>
            </div>
        </div>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMyLeave"
            aria-expanded="true" aria-controls="collapseMyLeave">
            <i class="fas fa-fw fa-calendar-minus"></i>
            <span>My Leaves</span>
        </a>
        <div id="collapseMyLeave" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Leaves Components:</h6>
                <a class="collapse-item" href="{{route('leave.create')}}">Apply Leave</a>
                <a class="collapse-item" href="{{route('myLeaves')}}">Leave History</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif
    @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
    <!-- Heading -->
    <div class="sidebar-heading">
        Accounts
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIncome" aria-expanded="true"
            aria-controls="collapseIncome">
            <i class="fas fa-fw fa-coins"></i>
            <span>Incomes</span>
        </a>
        <div id="collapseIncome" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Income Components:</h6>
                <a class="collapse-item" href="{{route('incomecategory.index')}}">Income Category</a>
                <a class="collapse-item" href="{{route('income.index')}}">Incomes</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExpenses"
            aria-expanded="true" aria-controls="collapseExpenses">
            <i class="fas fa-fw fa-coins"></i>
            <span>Expenses</span>
        </a>
        <div id="collapseExpenses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Expenses Components:</h6>
                <a class="collapse-item" href="{{route('expensecategory.index')}}">Expenses Category</a>
                <a class="collapse-item" href="{{route('expense.index')}}">Expenses</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBank" aria-expanded="true"
            aria-controls="collapseBank">
            <i class="fas fa-fw fa-landmark"></i>
            <span>Bank Account</span>
        </a>
        <div id="collapseBank" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Bank Components:</h6>
                <a class="collapse-item" href="{{route('bankaccount.index')}}">All Bank Accounts</a>
                <a class="collapse-item" href="{{route('bankaccount.create')}}">Add Bank Accounts</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePayments"
            aria-expanded="true" aria-controls="collapsePayments">
            <i class="fas fa-fw fa-receipt"></i>
            <span>Payments</span>
        </a>
        <div id="collapsePayments" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Payments Components:</h6>
                <a class="collapse-item" href="{{route('cashIn.index')}}">Cash In</a>
                <a class="collapse-item" href="{{route('cashOut.index')}}">Cash Out</a>
            </div>
        </div>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInvoice"
            aria-expanded="true" aria-controls="collapseInvoice">
            <i class="fas fa-fw fa-cog"></i>
            <span>Invoices</span>
        </a>
        <div id="collapseInvoice" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Invoice Components:</h6>
                <a class="collapse-item" href="{{route('invoice.index')}}">Invoices</a>
            </div>
        </div>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">
    @endif
    @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)
    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
            aria-controls="collapseUser">
            <i class="fas fa-fw fa-cog"></i>
            <span>User Settings</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Settings Components:</h6>
                @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                <a class="collapse-item" href="{{route('general')}}">General Settings</a>
                <a class="collapse-item" href="{{route('payment')}}">Payment Settings</a>
                @endif
                <a class="collapse-item" href="{{route('email')}}">Email Settings</a>
                <a class="collapse-item" href="{{route('password')}}">Change Password</a>               
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    @endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
</ul>
<!-- End of
 Sidebar -->
@endsection
