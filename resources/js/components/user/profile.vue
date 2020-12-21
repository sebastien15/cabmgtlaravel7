<template>
    <div class="container">
        <!-- <div class="sm:px-40 sm:py-10 flex flex-col">
            <div class="header bg-gray-100 min-w-full p-2 rounded-md rounded-b-none">
                User Credentials
            </div>
            <div class="infoDiv border border-gray-100 p-4">
                <div class="inputGroup">
                    <input type="file" @change='upload_image' name="image"/>
                </div>
                <div class="flex sm:flex-row file">
                    <div class="inputGroup w-full sm:w-6/12">
                        <label for="fistName">First Name:</label>
                        <input type="text" name="" id="fistName" class="border border-blue-500 text-blue-800 p-1 sm:p-2 w-10/12 m-auto">
                    </div>
                    <div class="inputGroup w-full sm:w-6/12">
                        <label for="secondName">Seconde Name:</label>
                        <input type="text" name="" id="secondName" class="border border-blue-500 text-blue-800 p-1 sm:p-2 w-10/12 m-auto">
                    </div>
                </div>
            </div>
        </div> -->
        <div class="sm:px-40 sm:py-10 flex flex-col">
            <div class="header bg-gray-100 min-w-full p-2 rounded-md rounded-b-none">
                Address Information
            </div>
            <div class="infoDiv border border-gray-100 p-4">
                <div class="flex sm:flex-row flex-col">
                    <div class="inputGroup w-full sm:w-6/12">
                        <label for="fistName">First Name:</label>
                        <input type="text" name="" id="fistName" class="border border-blue-500 text-blue-800 p-1 sm:p-2 w-10/12 m-auto">
                    </div>
                    <div class="inputGroup w-full sm:w-6/12">
                        <label for="secondName">Seconde Name:</label>
                        <input type="text" name="" id="secondName" class="border border-blue-500 text-blue-800 p-1 sm:p-2 w-10/12 m-auto">
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col mt-2">
                    <div class="inputGroup w-full sm:w-6/12">
                        <label for="tel">Telephone:</label>
                        <input type="text" name="" id="tel" class="border border-blue-500 text-blue-800 p-1 sm:p-2 w-10/12 m-auto">
                    </div>
                    <div class="inputGroup w-full sm:w-6/12">
                        <label for="address">Home address:</label>
                        <input type="text" name="" id="address" class="border border-blue-500 text-blue-800 p-1 sm:p-2 w-10/12 m-auto">
                    </div>
                </div>
                <div class="flex sm:flex-row flex-col mt-2 justify-end">
                    <div class="sm:w-6/12">
                        <button type="submit" class="cursor-pointer w-full sm:w-10/12 m-auto mt-3 p-2 text-base border border-blue-500 hover:bg-blue-500 hover:text-white text-blue-700">Save</button>
                    </div>
                </div>
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
            userinfo: new Form({
                firstName:'',
                secondName:'',
                telephone:'',
                homeAddress:'',
            }),
        }
    },
    methods: {
        // upload_image(){
        // }
        
    },
}
</script>
<style scoped>

</style>

