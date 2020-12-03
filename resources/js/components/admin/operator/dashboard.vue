<template>
    <div>   
        <div class="p-5 sm:flex justify-around mb-4">
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
                    <p class="text-sm sm:text-lg sm:font-bold">Notifications </p>
                    <p class="rounded-full bg-gray-100 sm:p-2 px-3 sm:ml-4">2</p>
                    </div> 
                </div>
            </div>            
        </div>
        <hr class="w-10/12 bg-blue-400 m-auto" style="height: 1px">
        <div class="flex flex-col sm:flex-col justify-around">
            <div class="sm:w-1/2 p-2 md:pt-20 ">
                <div class="overflow-x-auto">
                    <table class="border border-blue-900 ">
                        <thead class="border border-blue-900 ">
                            <tr class="p-2 text-sm font-bold">                                
                                <td class="border-r border-blue-600 p-2">quick actions</td>
                            </tr>
                        </thead>
                        <tbody class="border border-blue-400 border-t-0">
                            <tr class="p-2 " v-for="booking in bookings" :key="booking.id">
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="sm:w-1/2"> Notifications area</div>
        </div>
        <div 
        class="w-11/12 md:w-8/12 bg-white border-blue-400 top-0 mt-5 md:mt-20  p-20"
        :class="[
            showSingleBookingModel ? 'absolute' : 'hidden',
        ]"
        >
            <div class="border-b-blue-200 mb-10">
                <div class="flex justify-between mb-5">
                <p class="text-xl font-bold ">Book id</p>
                <p class="cursor-pointer" @click="showSingleBooking(1)"><i class="fa fa-times text-blue-700 text-3xl"></i></p>
                </div>
                <p>Hyedrabad to kigali</p>
            </div>
            <div class=" mb-10">
                <h3>Passenger info</h3>
                <div>
                    <p>Passenger names: Ndagijimana sebastine</p>
                    <p>Passenger phone: <a href="tel:0788451717">0788451717</a></p>
                    <p>Passenger sex: Male</p>
                    <p>Passenger with luggage: yes</p>
                </div>
            </div>
            <div class=" mb-10">
                <p class="text-lg leading-8 font-light mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut blanditiis eligendi 
                    accusantium, similique minima earum corrupti voluptate odit qui veritatis possimus 
                    sit facere quisquam maiores provident eaque necessitatibus rem quis.
                </p>
                <p>Payment status: <span class="text-blue-300 border-1 border-blue-300">Payed</span></p>
            </div>
            <div>
                <h3>Quick actions</h3>
                <div class="flex justify-items-start pt-10">
                    <button type="submit" class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600">Cancel</button>
                    <button type="submit" class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600">Delete</button>
                    <button type="submit" class="p-2 rounded-md mr-3 text-md font-light border-2 border-blue-600 text-blue-600">Call passenger</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "operatordashboard",
    data() {
        return {
            bookings:{},
            showSingleBookingModel:false,
            singleBooking:{},
        }
    },
    methods: {
            allbookings() {
                axios.get("/api/bookings").then( data => (this.bookings = data.data))
            },
            showSingleBooking(id) {
                this.showSingleBookingModel = !this.showSingleBookingModel,
                axios.get("/api/bookings/"+id).then( (response)=>(this.singleBooking = response.data)).then(console.log(this.singleBooking))
            },
        },
    beforeMount(){
        this.allbookings()
    },
}
</script>
<style scoped>

</style>

