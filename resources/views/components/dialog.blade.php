<div
    x-data="{
        show: true,
        focusables() {
            // All focusable element types...
            let selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'

            return [...$el.querySelectorAll(selector)]
                // All non-disabled elements...
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-show="show"
    x-init="$watch('show', toggleOverflow)"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    class="fixed inset-0 overflow-y-auto flex items-center z-40"
>
    <div x-show="show" class="fixed inset-0 transform" x-on:click="show = false">
        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-50"></div>
    </div>

    <div x-show="show" class="flex transform overflow-hidden w-full h-full md:h-auto md:mx-auto md:max-w-5xl">
        <form class="w-full md:p-4" wire:submit.prevent="submit">
            <div
                class="flex flex-col bg-white md:rounded-lg items-start w-full h-full overflow-hidden space-between shadow-dialog">
                <div class="flex items-center w-full p-4 dark:bg-gray-800 shadow-rimmed-xs z-10">
                    <div
                        class="dark:text-gray-300 ml-4 sm:ml-0 text-gray-900 font-bold text-lg">
                        {{ $title }}
                    </div>
                    <em class="flex items-center justify-center dark:text-gray-300 fas fa-fw fa-times vertical-inner vertical-icon h-full ml-auto fill-current text-gray-700 w-5 h-5 cursor-pointer"
                        x-on:click="show = false"></em>
                </div>

                <div class="flex flex-col gap-3 grow px-8 py-4 dark:bg-gray-700 h-full md:max-h-70 w-full overflow-y-auto">
                    {{ $slot }}
                </div>
            </div>
        </form>
    </div>
</div>
