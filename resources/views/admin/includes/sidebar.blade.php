<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class="nav-item active"><a href="/"><i class="icon-home"></i><span
              class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
          </li>

          <span class="badge badge badge-success badge-pill float-right mr-1 mt-1">{{App\Models\Branch::count()}}</span>
          <li class="nav-item"><a href="{{route('admin.branches')}}"><i class="la la-building"></i><span
              class="menu-title" data-i18n="nav.add_on_drag_drop.main">الفروع </span></a>
          </li>
          
          
          <span class="badge badge badge-danger badge-pill float-right mr-1 mt-1">{{App\Models\Product::count()}}</span>
          <li class="nav-item"><a href="{{route('admin.products')}}"><i class="icon-grid"></i><span
              class="menu-title" data-i18n="nav.add_on_drag_drop.main">المنتجات </span></a>
          </li>

          <span class="badge badge badge-warning badge-pill float-right mr-1 mt-1">{{App\Models\Employee::count()}}</span>
          <li class="nav-item"><a href="{{route('admin.employees')}}"><i class="la la-users"></i><span
              class="menu-title" data-i18n="nav.add_on_drag_drop.main">الموظفين </span></a>
          </li>

          <span class="badge badge badge-secondary badge-pill float-right mr-1 mt-1">{{App\Models\Supplier::count()}}</span>
          <li class="nav-item "><a href="{{route('admin.suppliers')}}"><i class="icon-users"></i><span
              class="menu-title" data-i18n="nav.add_on_drag_drop.main">المزودين </span></a>
          </li>

          
          <span class="badge badge badge-info badge-pill float-right mr-1 mt-1">{{App\Models\Client::count()}}</span>
          <li class="nav-item"><a href="{{route('admin.clients')}}"><i class="ft-users"></i><span
              class="menu-title" data-i18n="nav.add_on_drag_drop.main"> العملاء </span></a>
          </li>

          
          <li class="nav-item open"><a href=""><i class="la la-money"></i>
              <span class="menu-title" data-i18n="nav.dash.main"> الفواتير </span>
              <span
              class="badge badge badge-dark badge-pill float-right mr-2">{{App\Models\Invoice::count()}}</span>
          </a>
              <ul class="menu-content">
                  <li class="active"><a class="menu-item" href="{{route('admin.invoices')}}"
                                        data-i18n="nav.dash.ecommerce">فواتير البيع</a>
                  </li>
                  <li class="active"><a class="menu-item" href="" data-i18n="nav.dash.crypto">قواتير المزودين </a>
                  </li>
                  <li class="active"><a class="menu-item" href="{{route('admin.employeesInvoice')}}" data-i18n="nav.dash.crypto">فواتتير الموظفين </a>
                  </li>
              </ul>
          </li>
      </ul>
  </div>
</div>
