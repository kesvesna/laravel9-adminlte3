<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.applications.index') }}"
               class="nav-link {{ request()->routeIs('admin.applications.index')?'active':'' }}">
                <i class="nav-icon far fa-edit"></i>
                <p>
                    Заявки
                    @if(isset($applications_count))
                        <span class="badge badge-info right">
                            {{ $applications_count }}
                        </span>
                    @endif
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.towns.index') }}"
               class="nav-link {{ request()->routeIs('admin.towns.index')?'active':'' }}">
                <i class="nav-icon far fa-file"></i>
                <p>
                    Город
                    @if(isset($towns_count))
                        <span class="badge badge-info right">
                            {{ $towns_count }}
                        </span>
                    @endif
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.trks.index') }}"
               class="nav-link {{ request()->routeIs('admin.trks.index')?'active':'' }}">
                <i class="nav-icon far fa-file"></i>
                <p>
                    ТРК
                    @if(isset($trks_count))
                        <span class="badge badge-info right">
                            {{ $trks_count }}
                        </span>
                    @endif
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.buildings.index') }}"
               class="nav-link {{ request()->routeIs('admin.buildings.index')?'active':'' }}">
                <i class="nav-icon far fa-file"></i>
                <p>
                    Блок/Зона
                    @if(isset($buildings_count))
                        <span class="badge badge-info right">
                            {{ $buildings_count }}
                        </span>
                    @endif
                </p>
            </a>
        </li>
    </ul>
</nav>
