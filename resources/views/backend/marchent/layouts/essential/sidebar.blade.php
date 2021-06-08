  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{ (request()->is('marchent/dashboard*')) ? 'active' : '' }}"><a href="{{ route('marchent.home') }}"><i class="fa fa-desktop"></i> <span>Dashboard</span></a></li>

        <li class="header">Parcel Area</li>
        <li class="{{ (request()->is('marchent/parcels/create')) ? 'active' : '' }}"><a href="{{ route('marchent.parcels.create') }}"><i class="fa fa-plus"></i> <span>Add Parcel</span></a></li>
        <li class="{{ (request()->is('marchent/parcels*')) ? 'active' : '' }}"><a href="{{ route('marchent.parcels.index') }}"><i class="fa fa-dropbox"></i> <span>Parcels</span></a></li>

        <li class="header">Payments</li>
        <li class="{{ (request()->is('marchent/shop-payments*')) ? 'active' : '' }}"><a href="{{ route('marchent.shop-payments.index') }}"><i class="fa fa-money"></i> <span>Shop Payment</span></a></li>

        <li class="header">Settings</li>
        <li class="{{ (request()->is('marchent/pickups*')) ? 'active' : '' }}"><a href="{{ route('marchent.pickups.index') }}"><i class="fa fa-map-marker"></i> <span>Pickup Settings</span></a></li>
        <li class="{{ (request()->is('marchent/settings/payments*')) ? 'active' : '' }}"><a href="{{ route('marchent.payments.index') }}"><i class="fa fa-money"></i> <span>Payment Settings</span></a></li>

        {{-- <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
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
        </li> --}}
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>