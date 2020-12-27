<template>
<div>
        <div class="absolute p-2 cursor-pointer bg-blue-800 text-white -mt-4" id="menuOpener" @click="this.openMenu">
            {{ menuText }}
        </div>
        <div v-if="isOpened" class="sm:flex flex-col absolute min-h-full -mt-4 bg-blue-800 w-44 pt-5"  id="navigation">
                <div class="p-2 hover:bg-blue-700 hover:text-white cursor-pointer border-b border-blue-400">
                    <div class="flex justify-between">
                    <p class="text-sm">Pending bookings </p>
                    <p class="rounded-full bg-blue-100 p-1 px-3">2</p>
                </div>             
                </div>
                <div class="p-2 hover:bg-blue-700 hover:text-white cursor-pointer border-b border-blue-400">
                    <div class="flex justify-between">
                    <a href="/operator/scheduler" class="text-sm">schedulers </a>
                    <p class="rounded-full bg-blue-100 p-1 px-3">2</p>
                    </div>                              
                </div>
                <div class="p-2 hover:bg-blue-700 hover:text-white cursor-pointer border-b border-blue-400">
                    <div class="flex justify-between">
                    <p class="text-sm">Pending pays </p>
                    <p class="rounded-full bg-green-100 p-1 px-3">2</p>
                    </div>         
                </div>
                <div class="p-2 hover:bg-blue-700 hover:text-white cursor-pointer border-b border-blue-400">
                    <div class="flex justify-between">
                        <a href="/operator/profile">
                        <p class="text-sm">Profile </p>
                        </a>
                    <p class="rounded-full bg-gray-100 p-1 px-3">2</p>
                    </div>
                </div> 
                <div class=" p-2 hover:bg-blue-700 hover:text-white cursor-pointer border-b border-blue-400">
                    <div class="flex justify-between">
                        <a href="/operator/location">
                            <p class="text-sm">Locations </p>
                        </a>
                    <p class="rounded-full bg-gray-100 p-1 px-3">2</p>
                    </div> 
                </div>
                <div class=" p-2 hover:bg-blue-700 hover:text-white cursor-pointer border-b border-blue-400">
                    <div class="flex justify-between">
                    <p class="text-sm">Notifications </p>
                    <p class="rounded-full bg-gray-100 p-1 px-3">2</p>
                    </div> 
                </div>      
        </div>
</div>
</template>

<script>
    export default {
        name: "navigations",
        data() {
            return {
                isOpened: false,
                menuText: "Menu",
            }
        },
        methods: {
            openMenu(){
                this.isOpened = !this.isOpened
                if (this.isOpened == false) {
                    this.menuText = "Menu"
                }else{
                     this.menuText = "X"
                }
                let menuOpener = document.querySelector("#menuOpener")

                menuOpener.classList.toggle("ml-44")
            }
        },
    }
</script>

<style scoped>
#menuOpener{
    writing-mode: vertical-rl;
    text-orientation: mixed;
}
</style>
