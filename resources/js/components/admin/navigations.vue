<template>
        <div class="p-5 sm:flex justify-around mb-4" id="navigation">
            <div class="sm:w-4/12 flex justify-between">
                <div class="w-5/12 sm:w-1/2 bg-blue-300 rounded-md mb-2 sm:mb-0 p-2 sm:p-5 sm:py-10 cursor-pointer">
                    <div class="flex justify-around">
                    <p class="text-sm sm:text-lg sm:font-bold">Pending bookings </p>
                    <p class="rounded-full bg-blue-100 sm:p-2 px-3 sm:ml-4">2</p>
                </div>             
                </div>
                <div class="w-5/12 sm:w-1/2 bg-blue-300 rounded-md mb-2 sm:mb-0 p-2 sm:p-5 sm:py-10 cursor-pointer">
                    <div class="flex justify-around">
                    <a href="/operator/scheduler" class="text-sm sm:text-lg sm:font-bold">schedulers </a>
                    <p class="rounded-full bg-blue-100 sm:p-2 px-3 sm:ml-4">2</p>
                    </div>                              
                </div>
            </div>
            <div class="sm:w-4/12 flex justify-between">
                <div class="w-5/12 sm:w-1/2 bg-green-300 rounded-md mb-2 sm:mb-0 p-2 sm:p-5 sm:py-10 cursor-pointer">
                    <div class="flex justify-around">
                    <p class="text-sm sm:text-lg sm:font-bold">Pending pays </p>
                    <p class="rounded-full bg-green-100 sm:p-2 px-3 sm:ml-4">2</p>
                    </div>         
                </div>
                <div class="w-5/12 sm:w-1/2 bg-gray-300 rounded-md mb-2 sm:mb-0 p-2 sm:p-5 sm:py-10 cursor-pointer">
                    <div class="flex justify-around">
                        <a href="/operator/profile">
                        <p class="text-sm sm:text-lg sm:font-bold">Profile </p>
                        </a>
                    <p class="rounded-full bg-gray-100 sm:p-2 px-3 sm:ml-4">2</p>
                    </div>
                </div>            
            </div>
            <div class="sm:w-4/12 flex justify-between">
                <div class="w-5/12 sm:w-1/2 bg-gray-300 rounded-md mb-2 sm:mb-0 p-2 sm:p-5 sm:py-10 cursor-pointer">
                    <div class="flex justify-around">
                        <a href="/operator/location">
                            <p class="text-sm sm:text-lg sm:font-bold">Locations </p>
                        </a>
                    <p class="rounded-full bg-gray-100 sm:p-2 px-3 sm:ml-4">2</p>
                    </div> 
                </div>
                <div class="w-5/12 sm:w-1/2 bg-gray-300 rounded-md mb-2 sm:mb-0 p-2 sm:p-5 sm:py-10 cursor-pointer">
                    <div class="flex justify-around">
                    <p class="text-sm sm:text-lg sm:font-bold">Notifications </p>
                    <p class="rounded-full bg-gray-100 sm:p-2 px-3 sm:ml-4">2</p>
                    </div> 
                </div>
            </div>            
        </div>
</template>

<script>
    export default {
        name: "navigations",
        methods: {
            
        },
    }
</script>

<style scoped>

</style>
