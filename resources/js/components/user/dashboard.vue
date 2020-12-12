<template>
    <div class="px-2 sm:px-20 py-2 sm:py-5 text-base">
       <user-base-nav></user-base-nav>
       <div class="flex text-sm sm:text-base">
           <a class="border border-gray-900 text-xs sm:text-base cursor-pointer p-2 mr-1" @click="showPanel('allbookings')">My booking</a>
           <a class="border border-gray-900 text-xs sm:text-base cursor-pointer p-2 mr-1" @click="showPanel('unpaid')">Un payed</a>
           <a class="border border-gray-900 text-xs sm:text-base cursor-pointer p-2 mr-1" @click="showPanel('pending')">Pending</a>
       </div>
       <div class="panel allbookings">
           <table class="w-full overflow-x-hidden">
               <h4>All my bookings</h4>
               <thead class="border border-gray-900">
                   <tr>
                       <td class="border-r border-gray-900">id</td>
                       <td class="border-r border-gray-900">id</td>
                       <td class="border-r border-gray-900">id</td>
                       <td class="border-r-0">id</td>
                   </tr>
               </thead>
               <tbody class="border border-gray-900">
                   <tr class="border-b border-gray-900">
                       <td>1</td>
                       <td>1</td>
                       <td>1</td>
                       <td>1</td>
                   </tr>
               </tbody>
           </table>
       </div>
       <div class="panel unpaid hidden">
           <h4>Please hurry up and pay this bookings </h4>
           <table class="w-full overflow-x-hidden ">
               <thead class="border border-gray-900">
                   <tr>
                       <td class="border-r border-gray-900">id</td>
                       <td class="border-r border-gray-900">id</td>
                       <td class="border-r border-gray-900">id</td>
                       <td class="border-r-0">id</td>
                   </tr>
               </thead>
               <tbody class="border border-gray-900">
                   <tr class="border-b border-gray-900">
                       <td>1</td>
                       <td>1</td>
                       <td>1</td>
                       <td>1</td>
                   </tr>
               </tbody>
           </table>
       </div>
       <div class="panel pending hidden">
           <h4>Pending bookings</h4>
           <table class="w-full overflow-x-hidden ">
               <thead class="border border-gray-900">
                   <tr>
                       <td class="border-r border-gray-900">id</td>
                       <td class="border-r border-gray-900">id</td>
                       <td class="border-r border-gray-900">id</td>
                       <td class="border-r-0">id</td>
                   </tr>
               </thead>
               <tbody class="border border-gray-900">
                   <tr class="border-b border-gray-900">
                       <td>1</td>
                       <td>1</td>
                       <td>1</td>
                       <td>1</td>
                   </tr>
               </tbody>
           </table>
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
    //     var data = { totalCompetetions: this.values.length}
    // return data
        return {
            bookings: {},
            pending: {},
            unpaid: {},
            currentUser: this.user
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

                    break;
                case "pending":
                    document.querySelectorAll(".panel").forEach(element=>{
                        if(element.classList.contains('pending')){
                            element.classList.remove("hidden")
                        }else{
                            element.classList.add("hidden")
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
                    break;
                default:
                    break;
            }
         },
        allBookings(id){
            axios.get("api/bookings/findByUser/"+id).then(data=>(this.bookings = data.data))
            console.log("ALL BOOKINGS" +this.bookings)
         },
        pendingBookings(id){
            axios.get("api/bookings/findPendingByUser/"+id).then(data=>(this.pending = data.data))
            console.log("PENDING" +this.pending)
         },
        unpaidBookings(id){
            axios.get("api/bookings/findUnpaidByUser/"+id).then(data=>(this.unpaid = data.data))
            console.log("PAID" +this.unpaid)
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

</style>

