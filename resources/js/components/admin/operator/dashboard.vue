<template>
    <div>   
        <navigations></navigations>       
        <div class="flex flex-col sm:flex-row justify-between md:pt-20">
            <div class="sm:w-1/2 p-2  ">
                <div class="overflow-x-auto" v-if="bookings">
                    <table class="border border-blue-100 ">
                        <thead class="bg-blue-100 text-gray-700 ">
                            <tr class="p-2 text-sm font-bold">                                
                                <td class="border-r border-blue-600 p-2">Id</td>
                                <td class="border-r border-blue-600 p-2">car Id</td>
                                <td class="border-r border-blue-600 p-2">From</td>
                                <td class="border-r border-blue-600 p-2">To</td>
                                <td class="border-r border-blue-600 p-2">Seat No</td>
                                <td class="border-r border-blue-600 p-2">Price</td>
                                <td class="border-r border-blue-600 p-2">Payed</td>
                                <td class="border-r border-blue-600 p-2">Approved</td>
                                <td class="border-r border-blue-600 p-2">P date</td>
                                <td class="border-r border-blue-600 p-2">D date</td>
                                <td class="border-r border-blue-600 p-2">P time</td>
                                <td class="border-r border-blue-600 p-2">D time</td>
                                <td class="border-r border-blue-600 p-2">Custom message</td>
                                <td class="border-r border-blue-600 p-2">quick actions</td>
                            </tr>
                        </thead>
                        <tbody class="border border-blue-400 border-t-0">
                            <tr class="p-2" v-for="booking in bookings" :key="booking.id">
                                <td class="border-r border-blue-600 p-2">{{ booking.id }}</td>
                                <td class="border-r border-blue-600 p-2"></td>
                                <td class="border-r border-blue-600 p-2"></td>
                                <td class="border-r border-blue-600 p-2"></td>
                                <td class="border-r border-blue-600 p-2"></td>
                                <td class="border-r border-blue-600 p-2"></td>
                                <td class="border-r border-blue-600 p-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div v-if="!bookings" class="text-center font-extrabold text-3xl text-gray-600 p-20 ">
                    no bookings you have to day!!!
                </div>
            </div>
            <div class="sm:w-1/2 text-center"> Notifications area</div>
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
    props: ['user'],
    data() {
        return {
            bookings:null,
            showSingleBookingModel:false,
            singleBooking:{},
        }
    },
    methods: {
            
            allbookings() {
                let userId = this.user.id
                axios.get("/api/bookings/findByOperator/"+userId).then( data => (this.bookings = data.data))
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

