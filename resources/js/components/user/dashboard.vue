<template>
    <div class="px-2 sm:px-20 py-2 sm:py-5 text-base">
       <user-base-nav></user-base-nav>
       <div class="flex text-sm sm:text-base mt-2 sm:mt-4">
           <a class="border border-gray-100 rounded-sm text-xs sm:tex-sm cursor-pointer p-1 mr-1 navBtn bookBtn" @click="showPanel('allbookings')">My booking</a>
           <a class="border border-gray-100 rounded-sm text-xs sm:tex-sm cursor-pointer p-1 mr-1 navBtn unpaidBtn" @click="showPanel('unpaid')">Un paid</a>
           <a class="border border-gray-100 rounded-sm text-xs sm:tex-sm cursor-pointer p-1 mr-1 navBtn pendingBtn" @click="showPanel('pending')">Pending</a>
       </div>
       <div class="panel allbookings">
           <h4 class="my-3 font-semibold">All my bookings</h4>
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full" v-if="bookings">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">id</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">price</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Car_id</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">operator_id</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">pickup date</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">pickup hour</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">pickup dest</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">dropoff dest</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr v-for="booking in bookings" :key="booking.id">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ booking.id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ booking.price }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ booking.car_id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ booking.operator_id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ booking.pickup_date }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ booking.pickup_time }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ booking.loc_from }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ booking.loc_to }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                                    <div class="flex">
                                        <!-- <a class="py-1 px-2 text-sm text-hairline text-green-900 border border-green-500">Complete</a> -->
                                        <a class="cursor-pointer mr-1 py-1 px-2 text-sm text-hairline text-purple-900 border border-purple-500" @click="payBookingForm(booking.id)">pay</a>
                                        <a class="cursor-pointer mr-1 py-1 px-2 text-sm text-hairline text-blue-900 border border-blue-500" @click="showBookingForm(booking.id)">Edit</a>
                                        <a class="cursor-pointer py-1 px-2 text-sm text-hairline text-red-900 border border-red-500" @click="deleteBooking(booking.id)">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
       </div>
       <div class="panel unpaid hidden" >
           <h4>Please hurry up and pay this bookings </h4>
           <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full" v-if="unpaids">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">id</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">price</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Car_id</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">operator_id</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">pickup date</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">pickup hour</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">pickup dest</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">dropoff dest</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr v-for="unpaid in unpaids" :key="unpaid.id">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ unpaid.id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ unpaid.price }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ unpaid.car_id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ unpaid.operator_id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ unpaid.pickup_date }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ unpaid.pickup_time }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ unpaid.loc_from }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ unpaid.loc_to }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                                    <div class="flex">
                                        <!-- <a class="py-1 px-2 text-sm text-hairline text-green-900 border border-green-500">Complete</a> -->
                                        <a class="cursor-pointer mr-1 py-1 px-2 text-sm text-hairline text-purple-900 border border-purple-500" @click="payBookingForm(unpaid.id)">pay</a>
                                        <a class="cursor-pointer mr-1 py-1 px-2 text-sm text-hairline text-blue-900 border border-blue-500" @click="showBookingForm(unpaid.id)">Edit</a>
                                        <a class="cursor-pointer py-1 px-2 text-sm text-hairline text-red-900 border border-red-500" @click="deleteBooking(unpaid.id)">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
       </div>
       <div class="panel pending hidden">
           <h4>Pending bookings</h4>
           <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full" v-if="pendings">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">id</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">price</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Car_id</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">operator_id</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">pickup date</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">pickup hour</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">pickup dest</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">dropoff dest</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr v-for="pending in pendings" :key="pending.id">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ pending.id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ pending.price }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ pending.car_id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ pending.operator_id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ pending.pickup_date }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ pending.pickup_time }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ pending.loc_from }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ pending.loc_to }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                                    <div class="flex">
                                        <!-- <a class="py-1 px-2 text-sm text-hairline text-green-900 border border-green-500">Complete</a> -->
                                        <a class="cursor-pointer mr-1 py-1 px-2 text-sm text-hairline text-purple-900 border border-purple-500" @click="payBookingForm(pending.id)">pay</a>
                                        <a class="cursor-pointer mr-1 py-1 px-2 text-sm text-hairline text-blue-900 border border-blue-500" @click="showBookingForm(pending.id)">Edit</a>
                                        <a class="cursor-pointer py-1 px-2 text-sm text-hairline text-red-900 border border-red-500" @click="deleteBooking(pending.id)">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
       </div>
       <div class="single absolute m-1 p-1">
           <div class="flex justify-between">
               <p>Booking 1</p>
               <button class="p-2 text-base cursor-pointer border border-gray-900">X</button>
           </div>
           <div class="editBooking">
               edit booking 
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
            bookings: {},
            pendings: {},
            unpaids: {},
            currentUser: this.user,
            editBookingForm:false,
            payBookingFrom:false
        }
    },
    methods: {
        showPanel(panelName){
            switch (panelName) {
                case "allbookings":
                    document.querySelectorAll(".panel").forEach(element=>{
                        if(element.classList.contains('allbookings')){
                            element.classList.remove("hidden")
                        }else{
                            element.classList.add("hidden")
                        }                 
                     })

                    document.querySelectorAll(".navBtn").forEach(element=>{
                        if(element.classList.contains('bookBtn')){
                            let classesToAdd = [ 'bg-gray-100', 'text-gray-800'];
                            element.classList.add(...classesToAdd)
                        }else{
                            let classesToRemove = [ 'bg-gray-100', 'text-gray-800'];
                            element.classList.remove(...classesToRemove)
                        }                 
                     })

                    break;
                case "pending":
                    document.querySelectorAll(".panel").forEach(element=>{
                        if(element.classList.contains('pending')){
                            element.classList.remove("hidden")
                        }else{
                            element.classList.add("hidden")
                        }                 
                     })
                    document.querySelectorAll(".navBtn").forEach(element=>{
                        if(element.classList.contains('pendingBtn')){
                            let classesToAdd = [ 'bg-gray-100', 'text-gray-800'];
                            element.classList.add(...classesToAdd)
                        }else{
                            let classesToRemove = [ 'bg-gray-100', 'text-gray-800'];
                            element.classList.remove(...classesToRemove)
                        }                 
                     })
                    break;
                case "unpaid":
                    document.querySelectorAll(".panel").forEach(element=>{
                        if(element.classList.contains('unpaid')){
                            element.classList.remove("hidden")
                        }else{
                            element.classList.add("hidden")
                        }                 
                     })
                    document.querySelectorAll(".navBtn").forEach(element=>{
                        if(element.classList.contains('unpaidBtn')){
                            let classesToAdd = [ 'bg-gray-100', 'text-gray-800'];
                            element.classList.add(...classesToAdd)
                        }else{
                            let classesToRemove = [ 'bg-gray-100', 'text-gray-800'];
                            element.classList.remove(...classesToRemove)
                        }                 
                     })
                    break;
                default:
                    break;
            }
         },
        allBookings(id){
            try {
                axios.get("/api/bookings/findByUser/"+id).then(data=>(this.bookings = data.data))
            } catch (error) {
                console.log(error.message)
            }            
         },
        pendingBookings(id){
            try {
                axios.get("/api/bookings/findPendingByUser/"+id).then(data=>(this.pendings = data.data))
            } catch (error) {
                console.log(error.message)
            }            
         },
        unpaidBookings(id){
            try {
                axios.get("/api/bookings/findUnpaidByUser/"+id).then(data=>(this.unpaids = data.data))
            } catch (error) {
                console.log(error.message)
            }            
         },
        payBookingForm(id){

        },
        showBookingForm(id){

        },
        deleteBooking(id){
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
                    axios.delete("/api/bookings/"+ id)
                        .then( 
                            (response) => {
                                Swal.fire(
                                    'Deleted!',
                                    'Booking deleted successfully',
                                    'success'
                                    )
                            this.allBookings(this.currentUser.id);
                            this.pendingBookings(this.currentUser.id);
                            this.unpaidBookings(this.currentUser.id);
                        }) 
                        .catch(() => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>Why do I have this issue?</a>'
                            })
                        })
                }
                })
        }
    },
    beforeMount() {
        this.allBookings(this.currentUser.id);
        this.pendingBookings(this.currentUser.id);
        this.unpaidBookings(this.currentUser.id);
    }
}
</script>
<style scoped>
table thead tr th{
    text-align: start
}
</style>

