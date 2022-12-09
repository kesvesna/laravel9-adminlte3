<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item" style="border-bottom: 1px white; border-bottom-style: groove;" >
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                    Заявки
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
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
                    <a href="{{ route('admin.application_statuses.index') }}"
                       class="nav-link {{ request()->routeIs('admin.application_statuses.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Статусы заявок
                            @if(isset($application_statuses_count))
                                <span class="badge badge-info right">
                            {{ $application_statuses_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" style="border-bottom: 1px white; border-bottom-style: groove;">
            <a href="{{ route('admin.repairs.index') }}"
               class="nav-link {{ request()->routeIs('admin.repairs.index')?'active':'' }}">
                <i class="nav-icon far fa-edit"></i>
                <p>
                    Ремонт
                    @if(isset($repairs_count))
                        <span class="badge badge-info right">
                            {{ $repairs_count }}
                        </span>
                    @endif
                </p>
            </a>
        </li>
        <li class="nav-item" style="border-bottom: 1px white; border-bottom-style: groove;">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                    Архитектура
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
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
                <li class="nav-item">
                    <a href="{{ route('admin.floors.index') }}"
                       class="nav-link {{ request()->routeIs('admin.floors.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Этаж/Уровень
                            @if(isset($floors_count))
                                <span class="badge badge-info right">
                            {{ $floors_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.rooms.index') }}"
                       class="nav-link {{ request()->routeIs('admin.rooms.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Помещение
                            @if(isset($rooms_count))
                                <span class="badge badge-info right">
                            {{ $rooms_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" style="border-bottom: 1px white; border-bottom-style: groove;">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                    Оборудование
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('admin.equipments.index') }}"
                       class="nav-link {{ request()->routeIs('admin.equipments.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Оборудование
                            @if(isset($equipments_count))
                                <span class="badge badge-info right">
                            {{ $equipments_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.equipment_names.index') }}"
                       class="nav-link {{ request()->routeIs('admin.equipment_names.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Наименование
                            @if(isset($equipment_names_count))
                                <span class="badge badge-info right">
                            {{ $equipment_names_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.systems.index') }}"
                       class="nav-link {{ request()->routeIs('admin.systems.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Тип оборудования
                            @if(isset($systems_count))
                                <span class="badge badge-info right">
                            {{ $systems_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.spare_parts.index') }}"
                       class="nav-link {{ request()->routeIs('admin.spare_parts.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Деталь
                            @if(isset($spare_parts_count))
                                <span class="badge badge-info right">
                            {{ $spare_parts_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.work_types.index') }}"
                       class="nav-link {{ request()->routeIs('admin.work_types.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Тип работ
                            @if(isset($spare_parts_count))
                                <span class="badge badge-info right">
                            {{ $spare_parts_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" style="border-bottom: 1px white; border-bottom-style: groove;">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                    Профиль
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('admin.profiles.timesheet') }}"
                       class="nav-link {{ request()->routeIs('admin.profiles.timesheet')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Табель
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item" style="border-bottom: 1px white; border-bottom-style: groove;">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-file"></i>
                <p>
                    Пользователи
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                       class="nav-link {{ request()->routeIs('admin.users.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Пользователи
                            @if(isset($users_count))
                                <span class="badge badge-info right">
                            {{ $users_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.user_statuses.index') }}"
                       class="nav-link {{ request()->routeIs('admin.user_statuses.index')?'active':'' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Статусы
                            @if(isset($user_statuses_count))
                                <span class="badge badge-info right">
                            {{ $user_statuses_count }}
                        </span>
                            @endif
                        </p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
