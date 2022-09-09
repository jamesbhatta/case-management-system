<div class="py-4 pl-5">
    {{-- <img class="img-reponsive" src="{{ asset(config('constants.nep_gov.logo_sm')) }}" alt="Nepal Government Logo"
    height="80px"> --}}
    <img class="rounded-circle" src="{{ asset('logo1.png') }}" height="90px" />
</div>
<div id="sidenav-wrapper">
    <ul id="sidenav" class="nav flex-column font-noto">
        <li class="nav-item {{ setActive('dashboard') }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="text-warning"><i class="fa fa-tachometer-alt"></i></span>@lang('navigation.dashboard')
            </a>
        </li>
        <li class="nav-item">
            <a href="#case" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed nav-link"><span class="text-default"><i class="fas fa-tools"></i></span>मुद्दा</a>
            <ul class="list-unstyled collapse" id="case" style="">
                @hasanyrole('super-admin|admin')
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('cases.create') }}"><span class="mx-3"><i class="fas fa-circle"></i></span>थप्नुहोस्</a>
                </li>
                @endhasanyrole

                @hasanyrole('super-admin|admin')
                <li class="nav-item sub-nav">
                    <a class="nav-link" href="{{ route('cases.index') }}"><span class="mx-3"><i class="fas fa-circle"></i></span>व्यवस्थापन</a>
                </li>
                @endhasanyrole

            </ul>
        </li>

        {{-- <li class="nav-item">
            <a href="#versp" data-toggle="collapse" aria-expanded="false"
                class="dropdown-toggle collapsed nav-link"><span class="text-default"><i
                        class="fas fa-tools"></i></span>VERSP</a>
            <ul class="list-unstyled collapse" id="versp" style="">
                @hasanyrole('super-admin|admin')
                    <li class="nav-item sub-nav">
                        <a class="nav-link" href="{{ route('versp.index') }}"><span class="mx-3"><i class="fas fa-circle"></i></span>Add</a>
        </li>
        @endhasanyrole


    </ul>
    </li> --}}




    @can('user.*')
    <li class="nav-item {{ setActive('user.index') }} {{ setActive('user.create') }} {{ setActive('user.edit') }}">
        <a class="nav-link" href="{{ route('user.index') }}">
            <span class=""><i class="fa fa-users"></i></span>@lang('navigation.users')
        </a>
    </li>
    @endcan

    @hasanyrole('super-admin|admin')
    <li class="nav-item {{ setActive('settings.index') }}">
        <a class="nav-link" href="{{ route('settings.index') }}">
            <span class="amber-text"><i class="fas fa-cogs"></i></span>@lang('navigation.settings')
        </a>
    </li>
    @endhasrole



    <li class="nav-item">
        <a href="#configuration" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed nav-link"><span class="text-default"><i class="fas fa-tools"></i></span>@lang('navigation.configurations')</a>
        <ul class="list-unstyled collapse" id="configuration" style="">
            @hasanyrole('super-admin|admin')
            <li class="nav-item pl-5 {{ setActive('province.*') }} sub-nav">
                <a class="nav-link" href="{{ route('province.index') }}">@lang('navigation.province')</a>
            </li>
            @endhasanyrole
            @hasanyrole('super-admin|admin')
            <li class="nav-item pl-5 {{ setActive('district.*') }} sub-nav">
                <a class="nav-link" href="{{ route('district.index') }}">@lang('navigation.district')</a>
            </li>
            @endhasanyrole
            @hasanyrole('super-admin|admin')
            <li class="nav-item pl-5 {{ setActive('municipality.*') }} sub-nav">
                <a class="nav-link" href="{{ route('municipality.index') }}">@lang('navigation.municipality')</a>
            </li>
            @endhasanyrole



        </ul>
    </li>

    <li class="nav-item {{ setActive('report.index') }} {{ setActive('user.create') }} {{ setActive('user.edit') }}">
        <a class="nav-link" href="{{ route('report.index') }}">
            <span class=""><i class="fa fa-users"></i></span>रिपोर्ट
        </a>
    </li>
    @hasanyrole('super-admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.logs') }}" target="_blank">
            <span class="text-info"><i class="fas fa-exclamation-triangle"></i></span>@lang('System Logs')
        </a>
    </li>
    @endhasanyrole

    </ul>
</div>