<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="#!"><img src="{{ asset('assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        @php
            $currentRouteName = request()->route()->getName();
        @endphp
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="active">
                        <a href="{{ route('adminHome') }}">
                            <i class="ti-dashboard"></i> <span>dashboard</span>
                        </a>
                    </li>
                    <li class="{{ !str_contains($currentRouteName,'articles') ?: 'active'}}">
                        <a href="#!" aria-expanded="true"><i
                                class="ti-agenda"></i><span>Articles</span></a>
                        <ul class="collapse">
                            <li class="{{ $currentRouteName !== 'articles.create' ?: 'active'}}">
                                <a href="{{ route('articles.create') }}">Add article</a>
                            </li>
                            <li class="{{ $currentRouteName !== 'articles.index' ?: 'active'}}">
                                <a href="{{ route('articles.index') }}">List articles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ !str_contains($currentRouteName,'categories') ?: 'active'}}">
                        <a href="#!" aria-expanded="true"><i
                                class="ti-calendar"></i><span>Categories</span></a>
                        <ul class="collapse">
                            <li class="{{ $currentRouteName !== 'categories.create' ?: 'active'}}">
                                <a href="{{ route('categories.create') }}">Add categories</a>
                            </li>
                            <li class="{{ $currentRouteName !== 'categories.index' ?: 'active'}}">
                                <a href="{{ route('categories.index') }}">List categories</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
