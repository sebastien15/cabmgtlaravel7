<template>
    <nav class="">
        <div class="container">
                <div class="">
                    <div class="px-1 sm:mx-10 flex items-baseline">
                        <a href="/user/dashboard"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-900 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">Dasboard
                        </a>             
                        <a href="/user/profile"
                               class="mx-1 
                               px-3 py-2 rounded-md 
                               text-sm font-medium 
                               text-gray-900 hover:text-white 
                               hover:bg-gray-700 focus:outline-none 
                               focus:text-white focus:bg-gray-700">Profile
                        </a>             
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "UserBaseNav"
    }
</script>

<style scoped>

</style>
