  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Delevery Area</li>
        <li class="{{ (request()->is('admin/dashboard*')) ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></li>
        <li class="{{ (request()->is('admin/parcels/add*')) ? 'active' : '' }}"><a href="{{ route('admin.parcels.add') }}"><i class="fa fa-plus"></i> <span>Add Parcel For Marchent</span></a></li>
        <li class="{{ (request()->is('admin/parcels/request')) ? 'active' : '' }}"><a href="{{ route('admin.parcels.request') }}"><i class="fa fa-plus"></i> <span>Request Parcels</span></a></li>
        <li class="{{ (request()->is('admin/parcels/pending')) ? 'active' : '' }}"><a href="{{ route('admin.parcels.pending') }}"><i class="fa fa-plus"></i> <span>Pending Parcels</span></a></li>
        <li class="{{ (request()->is('admin/parcels/approved')) ? 'active' : '' }}"><a href="{{ route('admin.parcels.approved') }}"><i class="fa fa-plus"></i> <span>Listed Parcels</span></a></li>

        <li class="header">Shipping Area</li>
        <li class="{{ (request()->is('admin/parcels/assigned')) ? 'active' : '' }}"><a href="{{ route('admin.parcels.assigned') }}"><i class="fa fa-plus"></i> <span>Assigned Parcels</span></a></li>
        

        <li class="header">Payment Area</li>
        <li class="{{ (request()->is('admin/payment/invoice')) ? 'active' : '' }}"><a href="{{ route('admin.payment.invoice') }}"><i class="fa fa-plus"></i> <span>Generate Invoice</span></a></li>

        <li class="{{ (request()->is('admin/payment/paid/invoice')) ? 'active' : '' }}"><a href="{{ route('admin.payment.paid.invoice') }}"><i class="fa fa-plus"></i> <span>Paid Invoice</span></a></li>


        
        <li class="header">Management Area</li>
        <!-- Optionally, you can add icons to the links -->

        <li class="{{ (request()->is('admin/users*')) ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>

        <li class="{{ (request()->is('admin/marchents*')) ? 'active' : '' }}"><a href="{{ route('admin.marchents.index') }}"><i class="fa fa-hand-o-right"></i> <span>Marchents</span></a></li>

        <li class="{{ (request()->is('admin/heros*')) ? 'active' : '' }}"><a href="{{ route('admin.heros.index') }}"><i class="fa fa-bicycle"></i> <span>Heros</span></a></li>

        <li class="{{ (request()->is('admin/affiliates*')) ? 'active' : '' }}"><a href="{{ route('admin.affiliates.index') }}"><i class="fa fa-bullhorn"></i> <span>Affiliates</span></a></li>

        <li class="{{ (request()->is('admin/areas*')) ? 'active' : '' }}"><a href="{{ route('admin.areas.index') }}"><i class="fa fa-map-marker"></i> <span>Areas</span></a></li>

        <li class="{{ (request()->is('admin/zones*')) ? 'active' : '' }}"><a href="{{ route('admin.zones.index') }}"><i class="fa fa-map-marker"></i> <span>Zones</span></a></li>

        <li class="{{ (request()->is('admin/charges*')) ? 'active' : '' }}"><a href="{{ route('admin.charges.index') }}"><i class="fa fa-money"></i> <span>Charges</span></a></li>


        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>