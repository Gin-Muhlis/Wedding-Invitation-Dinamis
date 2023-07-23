<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://vemto.app/favicon.png" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">Wedding Invitation</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                            Apps
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\User::class)
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Album::class)
                            <li class="nav-item">
                                <a href="{{ route('albums.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Album</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Bridegroom::class)
                            <li class="nav-item">
                                <a href="{{ route('bridegrooms.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Mempelai</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Order::class)
                            <li class="nav-item">
                                <a href="{{ route('orders.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Order</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Visitor::class)
                            <li class="nav-item">
                                <a href="{{ route('visitors.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Pengunjung</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Fitur::class)
                            <li class="nav-item">
                                <a href="{{ route('fiturs.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Fitur</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Faq::class)
                            <li class="nav-item">
                                <a href="{{ route('faqs.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Pertanyaan</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Testimony::class)
                            <li class="nav-item">
                                <a href="{{ route('testimonies.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Testimoni</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\FiturCategory::class)
                            <li class="nav-item">
                                <a href="{{ route('fitur-categories.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Fitur Kategori</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\GiftPayment::class)
                            <li class="nav-item">
                                <a href="{{ route('gift-payments.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Pembayaran Hadiah</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\InvitedGuest::class)
                            <li class="nav-item">
                                <a href="{{ route('invited-guests.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Tamu Undangan</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Story::class)
                            <li class="nav-item">
                                <a href="{{ route('stories.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Cerita Cinta</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Website::class)
                            <li class="nav-item">
                                <a href="{{ route('websites.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Data Website</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Rsvp::class)
                            <li class="nav-item">
                                <a href="{{ route('rsvps.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Rsvp</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Category::class)
                            <li class="nav-item">
                                <a href="{{ route('categories.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Kategori</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\WeddingReception::class)
                            <li class="nav-item">
                                <a href="{{ route('wedding-receptions.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Data Resepsi</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\WeddingCeremony::class)
                            <li class="nav-item">
                                <a href="{{ route('wedding-ceremonies.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Data Akad Nikah</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\WeddingData::class)
                            <li class="nav-item">
                                <a href="{{ route('all-wedding-data.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Data Pernikahan</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Gift::class)
                            <li class="nav-item">
                                <a href="{{ route('gifts.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Data Hadiah</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Theme::class)
                            <li class="nav-item">
                                <a href="{{ route('themes.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Tema</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\ReplyRsvp::class)
                            <li class="nav-item">
                                <a href="{{ route('reply-rsvps.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Balasan RSVPS</p>
                                </a>
                            </li>
                            @endcan
                    </ul>
                </li>

                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || 
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-key"></i>
                        <p>
                            Access Management
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', Spatie\Permission\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan

                        @can('view-any', Spatie\Permission\Models\Permission::class)
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
                @endauth

                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1//index.html" target="_blank" class="nav-link">
                        <i class="nav-icon icon ion-md-help-circle-outline"></i>
                        <p>Docs</p>
                    </a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>