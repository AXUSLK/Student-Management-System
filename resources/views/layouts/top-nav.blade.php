<!-- Static top-nav for desktop -->
<div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
    <button type="button"
        class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden"
        @click="open = true">
        <span class="sr-only">Open sidebar</span>
        <svg class="h-6 w-6" x-description="Heroicon name: outline/menu-alt-2" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
        </svg>
    </button>
    <div class="flex-1 px-4 flex justify-end">
        <div class="ml-4 flex items-center md:ml-6">
            <!-- Profile dropdown -->
            <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()"
                @click.away="onClickAway($event)" class="ml-3 relative">
                <div>
                    <button type="button"
                        class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        id="user-menu-button" x-ref="button" @click="onButtonClick()"
                        @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()"
                        aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()"
                        @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                        <span class="sr-only">Open user menu</span>
                        <img class="h-8 w-8 rounded-full" src="/assets/images/profile.svg" alt="">
                    </button>
                </div>

                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                    x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state."
                    x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical"
                    aria-labelledby="user-menu-button" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()"
                    @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false"
                    @keydown.enter.prevent="open = false; focusButton()"
                    @keyup.space.prevent="open = false; focusButton()">

                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700"
                        :class="{ 'bg-gray-100': activeIndex === 3 }" role="menuitem" tabindex="-1"
                        id="user-menu-item-1" @mouseenter="activeIndex = 3" @mouseleave="activeIndex = -1"
                        @click="open = false; focusButton()">
                        Profile
                    </a>

                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                        :class="{ 'bg-gray-100': activeIndex === 4 }" role="menuitem" tabindex="-1"
                        id="user-menu-item-2" @mouseenter="activeIndex = 4" @mouseleave="activeIndex = -1"
                        @click="open = false; focusButton()"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Static top-nav for desktop -->
