<template>
    <div class="sm:px-40 sm:py-10 flex flex-col">
        <div class="header bg-gray-100 sm:-mx-40 sm:-my-10 min-w-full p-2 sm:p-4 rounded-md">
            User Information
        </div>
        <div class="infoDiv border border-gray-100">
            <div class="inputGroup">
                <input type="file" @change='upload_image' name="image"/>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "userDashboard",
    props: ['user'],
    data() {
        return {
            
        }
    },
    methods: {
        upload_image(){

        }
    },
}
</script>
<style scoped>

</style>

