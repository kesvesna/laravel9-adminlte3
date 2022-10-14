<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.applications.index') }}" class="nav-link">
                <i class="nav-icon far fa-edit"></i>
                <p>
                    Заявки
                    <span class="badge badge-info right">
                        @if(isset($applications_count))
                            {{ $applications_count }}
                        @else
                            0
                        @endif
                    </span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.towns.index') }}" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                    Города
                    <span class="badge badge-info right">
                        @if(isset($towns_count))
                            {{ $towns_count }}
                        @else
                            0
                        @endif
                    </span>
                </p>
            </a>
        </li>
    </ul>
</nav>
