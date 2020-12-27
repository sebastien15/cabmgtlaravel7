<template>
    <div>    
        <navigations></navigations>
        <div class="flex flex-col sm:flex-row justify-around ">
            <div class="sm:w-10/12 p-2 md:pt-20 ">
                <h4 class="text-sm sm:text-xl font-bold mb-3">Locatioons</h4>
                <div class="overflow-x-auto">
                    <table class="border border-blue-900 text">
                        <thead class="border border-blue-900 ">
                            <tr class="p-2 text-xs sm:text-sm font-bold">
                                <td class="border-r border-blue-600 p-2">id</td>
                                <td class="border-r border-blue-600 p-2">Name</td>
                                <td class="border-r border-blue-600 p-2">Post code</td>
                                <td class="border-r border-blue-600 p-2">quick actions</td>
                            </tr>
                        </thead>
                        <tbody class="border border-blue-400 border-t-0 text-xs sm:text-sm">
                            <tr class="p-2 " v-for="location in locations" :key="location.id">
                                <td class="border-r border-blue-400 p-2">{{ location.id }}</td>
                                <td class="border-r border-blue-400 p-2">{{ location.name }}</td>
                                <td class="border-r border-blue-400 p-2">{{ location.loc_postcode }}</td>
                                <td class="border-r border-blue-400 flex p-2 ">
                                    <span  class="cursor-pointer" @click="deleteLocation( location.id )" > Delete <i class="fa fa-trash ml-1 text-sm  md:text-lg text-red-500 cursor-pointer"></i></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="order-first sm:order-last sm:w-2/12 p-2 md:pt-20 ">
                <button class="text-xs sm:text-md md:text-xl font-bold mb-3 border border-blue-400 text-blue-500 p-1 sm:p-3 md:p-4 rounded-sm" @click="()=>{this.addLocationModel = !this.addLocationModel}">Add a Location</button>
            </div>
        </div>
        <!-- scheduler add model -->
        <div 
            class="w-full sm:w-8/12  bg-white border-blue-400 top-10 mt-4 md:mt-20 p-5 sm:p-10 md:p-20 shadow-md absolute"
            :class="[
                addLocationModel ? 'absolute' : 'hidden',
            ]"
            >
            <h2 class="text-2xl font-bold mb-4">Add a Location</h2>
            <div class="border-b-blue-200 mb-10">
                <form @submit.prevent="editMode? updateLocation() : saveLocation()">
                    <div class="flex flex-col sm:flex-row justify-between mb-2 sm:mb-4">
                        <input class="w-full sm:w-5/12 text-blue-800 text-sm sm:text-md rounded-sm border border-blue-700 p-1 sm:px-2 sm:py-3 mb-2 sm:mb-0" type="text" v-model="form.name" name="name" placeholder="name"/>
                        <input class="w-full sm:w-5/12 text-blue-800 text-sm sm:text-md rounded-sm border border-blue-700 p-1 sm:px-2 sm:py-3 mb-2 sm:mb-0" type="text" v-model="form.loc_postcode" name="loc_postcode" placeholder="loc_postcode"/>
                    </div>
                    <div class="flex flex-col sm:flex-row justify-items-start pt-10 text-center">
                        <button type="submit" v-show="!editMode" class="mb-1 sm:mb-0 p-1 sm:p-2 rounded-md sm:mr-3 text-sm sm:text-md font-light border-2 border-blue-600 text-blue-600" >Save</button>
                        <button type="submit" v-show="editMode" class="mb-1 sm:mb-0 p-1 sm:p-2 rounded-md sm:mr-3 text-sm sm:text-md font-light border-2 border-green-600 text-green-600" >Update</button>
                        <a class="p-1 sm:p-2 rounded-md sm:mr-3  text-sm sm:text-md font-light border-2 border-red-600 text-red-600" @click="()=>{this.addLocationModel = false}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "operatorscheduler",
     props : ['user'],
    data() {
        return {
            locations: null,
            singleLocation:{},
            addLocationModel: false,
            editMode: false,
            operator:'',
            form: new Form({
                    name:'',
                    loc_postcode: '', 
                }),
        }
    },
    methods: {
            alllocations() {
                axios.get("/api/locations").then( data => (this.locations = data.data))
            },
            saveLocation(){
                this.$Progress.start()
                this.form.post('/api/locations')                
                    .then(() => {
                        Fire.$emit('AfterCreatedUserLoadIt'); //custom events
                        Toast.fire({
                            icon: 'success',
                            title: 'Sheduler created successfully'
                        })
                        this.$Progress.finish()
                        this.alllocations()
                    })
                    .catch((error) => {
                        console.log(error.message)
                    })
             }, 
            deleteLocation(id) {
                 Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then(response=>{
                    if (response.isConfirmed) {
                    this.alllocations();
                    axios.delete("/api/locations/"+ id)
                        .then( 
                            (response) => {
                                Swal.fire(
                                    'Deleted!',
                                    'Location deleted successfully',
                                    'success'
                                    )
                        this.alllocations()
                        }) 
                        .catch(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>Why do I have this issue?</a>'
                            })
                            this.alllocations()
                        })
                }
                })
             },            
        },
    beforeMount(){
        this.alllocations()
    },
}
</script>
<style scoped>

</style>

