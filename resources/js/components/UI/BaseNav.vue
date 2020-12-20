<template>
    <nav class="bg-red-500">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/" class="flex items-center">
                            <img src="/images/logo.png" alt="logo" class="w-16 h-12">
                            <!-- <span class="text-gray-300 text-xl font-semibold mx-2">Home</span> -->
                        </a>
                    </div>
                    <div class="hidden md:block">
                        <div class="mx-10 flex items-baseline">
                            <!-- <a href="#"
                               class="px-3 py-2 rounded-md text-sm font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">Home</a> -->
                            <a href="/"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-300 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">Home</a>
                            <a href="/about"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-300 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">About us</a>
                            <div class="relative mx-1">
                                <span class="px-3 py-2 rounded-md 
                               text-sm font-medium cursor-pointer
                               text-gray-300 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700" id="dropTrigger" @click="this.selfInvoking">Help</span>
                                <div class="absolute bg-red-500 text-gray-300 flex flex-col mt-3" v-if="!dropOpen">
                                    <a href="#contactus" class="text-sm hover:bg-red-800 px-3 mt-4 hover:text-white">Contact</a>
                                    <a href="#fandq" class="text-sm hover:bg-red-800 px-3 hover:text-white">F&Q</a>
                                </div>
                               </div>
                            <a href="/user/dashboard" v-if="user"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-300 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">Dashboard</a>
                            <a href="/user/profile" v-if="user"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-300 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">Profile</a>
                               
                            <!-- <a href="/contactus"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-300 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">contact us</a>
                            <a href="/values"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-300 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">Our values</a>
                            <a href="/offers"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-300 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">Offers</a>
                            <a href="/siteMap"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-300 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">Site Map</a> -->
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="flex">
                        <a class="
                              px-3 py-2 rounded-md text-sm font-medium
                              text-gray-300 hover:text-white hover:bg-gray-700 
                              focus:outline-none focus:text-white 
                              focus:bg-gray-700" href="/login" v-if="!user">Log in 
                        </a>
                        <span v-if="user" class="
                              px-3 py-2 rounded-md text-sm font-medium text-gray-300
                            hover:text-white">Welcome <span class="mx-1">{{user.name}}</span>!
                        </span>
                        <button class="
                              px-3 py-2 rounded-md text-sm font-medium
                              text-gray-300 hover:text-white hover:bg-gray-700 
                              focus:outline-none focus:text-white 
                              focus:bg-gray-700" v-if="user" @click="this.logout">Log out
                        </button>                      
                    </div>
                </div>
                <div class="-ml-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button @click="isOpen = !isOpen"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!--
          Mobile menu, toggle classes based on menu state.

          Open: "block", closed: "hidden"
        -->
        <div class="block md:hidden" v-show="isOpen">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <!-- <a href="#"
                   class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">Home</a> -->
                <a href="/"
                   class="
                   mt-1 block px-3 py-2 
                   rounded-md text-base 
                   font-medium text-gray-300 
                   hover:text-white 
                   hover:bg-gray-700 
                   focus:outline-none 
                   focus:text-white 
                   focus:bg-gray-700">Home</a>
                <a href="/about"
                   class="
                   mt-1 block px-3 py-2 
                   rounded-md text-base 
                   font-medium text-gray-300 
                   hover:text-white 
                   hover:bg-gray-700 
                   focus:outline-none 
                   focus:text-white 
                   focus:bg-gray-700">About us</a>
                <!-- <a href="/contactus"
                   class="
                   mt-1 block px-3 py-2 
                   rounded-md text-base 
                   font-medium text-gray-300 
                   hover:text-white 
                   hover:bg-gray-700 
                   focus:outline-none 
                   focus:text-white 
                   focus:bg-gray-700">contact us</a> -->
                <!-- <a href="/values"
                   class="
                   mt-1 block px-3 py-2 
                   rounded-md text-base 
                   font-medium text-gray-300 
                   hover:text-white 
                   hover:bg-gray-700 
                   focus:outline-none 
                   focus:text-white 
                   focus:bg-gray-700">Our values</a> -->
                <!-- <a href="/offers"
                   class="
                   mt-1 block px-3 py-2 
                   rounded-md text-base 
                   font-medium text-gray-300 
                   hover:text-white 
                   hover:bg-gray-700 
                   focus:outline-none 
                   focus:text-white 
                   focus:bg-gray-700">Offers</a> -->
                <!-- <a href="/siteMap"
                   class="
                   mt-1 block px-3 py-2 
                   rounded-md text-base 
                   font-medium text-gray-300 
                   hover:text-white 
                   hover:bg-gray-700 
                   focus:outline-none 
                   focus:text-white 
                   focus:bg-gray-700">Site map</a> -->
                <!-- <button class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700"
                   @click="logout">Logout</button> -->
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "BaseNav",
        props: ['user'],
        data() {
            return {
                isOpen: false,
                dropOpen: false,
            }
        },
        methods: {
            logout() {
                axios.post('logout')
                    .then(() => location.reload());
            },
            selfInvoking(){
                this.dropOpen = !this.dropOpen
                console.log(this.dropOpen)
            }
        }
    }
</script>

<style scoped>

</style>
