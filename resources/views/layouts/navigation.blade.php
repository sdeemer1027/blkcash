<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">Wallet: <b><span style="color:#0da10d">${{ Auth::user()->wallet }}</span></b>                   
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">                  
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    
                    <x-slot name="trigger">
                            <div>                      
                    @if(auth()->user()->profile_picture)
                       <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" width="40px"  style="border-radius: 30%;">
                    @else
    <!-- Default profile picture or placeholder -->
                       {{ Auth::user()->name }}
                    @endif

                            </div>

                            <div class="ms-1">
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        {{-- 
                         <x-dropdown-link :href="route('dashboard')">
                           Dashboard
                        </x-dropdown-link>
                        --}}
                        <x-dropdown-link :href="route('profile.edit')">
                           {{ Auth::user()->name }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    @if(auth()->user()->profile_picture)
    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Profile Picture" width="40px"  style="border-radius: 30%;">
@else
    <!-- Default profile picture or placeholder -->
   {{ Auth::user()->name }}
@endif
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
           {{--
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link> --}}
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
            <x-responsive-nav-link :href="route('profile.index')" :active="request()->routeIs('profile.index')">
                {{ Auth::user()->name }}
            </x-responsive-nav-link>
                {{--       
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>    
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                --}}
            </div>

            <div class="mt-3 space-y-1">
                {{-- 
                <x-responsive-nav-link :href="route('dashboard')">
                   Dashboard
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.index')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                --}}

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<div  style="display: flex; justify-content: center;  margin-top: -50px;">
<img src="/logo.png" width="75px" >
</div>