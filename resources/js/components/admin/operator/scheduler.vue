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
        <div class="flex flex-col sm:flex-row justify-around ">
            <div class="sm:w-10/12 p-2 md:pt-20 ">
                <h4 class="text-xl font-bold mb-3">To day's Scheduler</h4>
                <div class="overflow-x-auto ">
                    <table class="border border-blue-900 ">
                        <thead class="border border-blue-900 ">
                            <tr class="p-2 text-sm font-bold">
                                <td class="border-r border-blue-600 p-2">id</td>
                                <td class="border-r border-blue-600 p-2">Company</td>
                                <td class="border-r border-blue-600 p-2">From</td>
                                <td class="border-r border-blue-600 p-2">To</td>
                                <td class="border-r border-blue-600 p-2">Dep date</td>
                                <td class="border-r border-blue-600 p-2">Dep time</td>
                                <td class="border-r border-blue-600 p-2">Arrival time</td>
                                <td class="border-r border-blue-600 p-2">expected time</td>
                                <td class="border-r border-blue-600 p-2">Price</td>
                                <td class="border-r border-blue-600 p-2">custom message</td>
                                <td class="border-r border-blue-600 p-2">quick actions</td>
                            </tr>
                        </thead>
                        <tbody class="border border-blue-400 border-t-0">
                            <tr class="p-2 " v-for="scheduler in schedulers" :key="scheduler.id">
                                <td class="border-r border-blue-400 p-2">{{ scheduler.id }}</td>
                                <td class="border-r border-blue-400 p-2">{{ scheduler.operator_company }}</td>
                                <td class="border-r border-blue-400 p-2">{{ scheduler.route_from }}</td>
                                <td class="border-r border-blue-400 p-2">{{ scheduler.route_to }}</td>
                                <td class="border-r border-blue-400 p-2">{{ scheduler.journey_date }}</td>
                                <td class="border-r border-blue-400 p-2">{{ scheduler.departure_time }}</td>
                                <td class="border-r border-blue-400 p-2">{{ scheduler.arrival_time }}</td>
                                <td class="border-r border-blue-400 p-2">{{ scheduler.journey_time }}</td>
                                <td class="border-r border-blue-400 p-2">{{ scheduler.journey_price }}</td>
                                <td class="border-r border-blue-400 p-2">{{ scheduler.message }}</td>
                                <td class="border-r border-blue-400 flex p-2 ">
                                    <span class="cursor-pointer" @click="showSingleScheduler( scheduler.id )"><i class="fa fa-eye text-xl text-blue-400 mr-2"></i></span>
                                    <span  class="cursor-pointer" @click="deleteScheduler( scheduler.id )" ><i class="fa fa-trash text-2xl text-red-500 cursor-pointer"></i></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="order-first sm:order-last sm:w-2/12 p-2 md:pt-20 ">
                <button class="text-xl font-bold mb-3 border border-blue-400 text-blue-500 p-4 rounded-sm" @click="()=>{this.addSchedulerModel = !this.addSchedulerModel}">Add a Scheduler</button>
            </div>
        </div>
        <!-- scheduler showing model -->
        <div 
            class="w-11/12 md:w-8/12 bg-white border-blue-400 top-0 mt-5 md:mt-20  p-20"
            :class="[
                showSingleSchedulerModel ? 'absolute' : 'hidden',
            ]"
            >
            
            <div class="border-b-blue-200 mb-10">
                <div class="flex justify-between mb-5">
                <p class="text-xl font-bold ">Scheduler </p>
                <p class="cursor-pointer" @click="()=>{this.showsingleSchedulerModel = !this.showsingleSchedulerModel}"><i class="fa fa-times text-blue-700 text-3xl"></i></p>
                </div>
                <p><span class="ml-2">{{ singleScheduler.route_from }}</span> to <span class="ml-2">{{ singleScheduler.route_to }}</span></p>
                
            </div>
            <div class=" mb-10">
                <h3>Scheduler info</h3>
                <div>
                    <p class=" font-bold">Expected departure Date:<p> 
                        <p>{{ singleScheduler.journey_date }}</p>
                    <p class=" font-bold">Company name:<p> 
                        <p>{{ singleScheduler.operator_company }}</p>
                    <p class=" font-bold">Expected departure time:<p> 
                        <p>{{ singleScheduler.departure_time }}</p>
                    <p class=" font-bold">Expected arrival time:<p> 
                        <p>{{ singleScheduler.arrival_time }}</p>
                    <p class=" font-bold">Expected journey time:<p> 
                        <p>{{ singleScheduler.journey_time }}</p>
                    <p class=" font-bold">Journey price:<p> 
                        <p>{{ singleScheduler.journey_price }}</p>
                    <p class="font-bold">Custom message to show passengers: </p>
                        <p>{{ singleScheduler.message }}</p>
                </div>
            </div>
            <div>
                <h3>Quick actions</h3>
                <div class="flex justify-items-start pt-10">
                    <button type="submit" class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="deleteScheduler(singleScheduler.id)">Delete</button>
                    <button class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600" @click="editModalWindow(singleScheduler);">Edit</button>
                </div>
            </div>
        </div>
        <!-- scheduler add model -->
        <div 
            class="w-11/12 sm:w-8/12  bg-white border-blue-400 top-10 mt-5 md:mt-20 p-20 shadow-md"
            :class="[
                addSchedulerModel ? 'absolute' : 'hidden',
            ]"
            >
            <h2 class="text-2xl font-bold mb-4">Add a Scheduler</h2>
            <div class="border-b-blue-200 mb-10">
                <form @submit.prevent="editMode? updateScheduler() : saveScheduler()">
                    <div class="flex justify-between mb-2 sm:mb-4">
                        <input type="hidden" v-model="form.operator_id" name="operator_id" value="(user.id )"/>
                        <input type="hidden" v-model="form.operator_car" name="operator_id" value="(operator.car_id )"/>
                        <input type="hidden" v-model="form.operator_company" name="operator_id" value="(user.company_name )"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.route_from" name="route_from" placeholder="route_from"/>
                        <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.route_to" name="route_to" placeholder="route_to"/>
                    </div>
                    <div class="flex justify-between mb-2 sm:mb-4">
                        <div class="w-3/12 flex flex-col">
                            <label class="text-md pb-2 mb-2">Journey date</label>
                            <input class=" text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="date" v-model="form.journey_date" name="journey_date" placeholder="journey_date"/>
                        </div>
                        <div class="w-3/12 flex flex-col">
                            <label class="text-md pb-2 mb-2">Depart time</label>
                            <input class=" text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" @change="calcJourneytime()" type="time" v-model="form.departure_time" name="departure_time" placeholder="12/15"/>
                        </div>
                        <div class="w-3/12 flex flex-col">
                            <label class="text-md pb-2 mb-2">Arrival time</label>
                            <input class=" text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" @change="calcJourneytime()" type="time" v-model="form.arrival_time" name="arrival_time" placeholder="15/04"/>
                        </div>
                    </div>
                    <div class="flex justify-between mb-2 sm:mb-4">
                        <div class="w-3/12 flex flex-col">
                            <label class="text-md pb-2 mb-2"> Expected journey price</label>
                            <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.journey_price" name="journey_price" placeholder="journey_price"/>
                        </div>
                        <div class="w-3/12 flex flex-col">
                            <label class="text-md pb-2 mb-2"> Expected journey time</label>
                            <input class="w-5/12 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" disabled v-model="form.journey_time" name="journey_time" placeholder="journey_time"/>
                        </div>
                        <div class="w-3/12 flex flex-col">
                            <label class="text-md pb-2 mb-2">some custom message</label>
                            <textarea class=" text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" v-model="form.message" name="message">message</textarea>
                        </div>
                    </div>
                    <div class="flex justify-items-start pt-10">
                        <button type="submit" v-show="!editMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-blue-600 text-blue-600" >Save</button>
                        <button type="submit" v-show="editMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600" >Update</button>
                        <a class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="()=>{this.addSchedulerModel = false}">Cancel</a>
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
            Scheduler_id:'',
            schedulers:{},
            showSingleSchedulerModel:false,
            singleScheduler:{},
            addSchedulerModel: false,
            editMode: false,
            operator:'',
            form: new Form({
                    operator_id: this.user.id,
                    operator_company:'',
                    operator_car:'',
                    route_from: '', 
                    route_to: '', 
                    journey_date:'',
                    departure_time: '', 
                    arrival_time: '', 
                    journey_time: '', 
                    journey_price: '', 
                    message: '',
                }),
        }
    },
    methods: {
            allschedulers() {
                axios.get("/api/schedulers").then( data => (this.schedulers = data.data))
            },
            getTodaysScheduler() {
                try {
                    axios.get("/schedulers/today").then( data => (this.schedulers = data.data))
                } catch (error) {
                    console.log("her is the erro" + err.message)
                }
            },
            fetchOperator() {
                try {
                    axios.get("/api/operatorinfo/").then( data => (
                        this.operator = data.data
                        )).then(()=>{
                        this.form.operator_company = this.operator.company_name
                        this.form.operator_car = this.operator.car_id
                        console.log(this.operator)
                        })
                } catch (error) {
                    console.log("her is the erro" + err.message)
                }
            },
            showSingleScheduler(id) {
                this.showSingleSchedulerModel = !this.showSingleSchedulerModel,
                axios.get("/api/schedulers/"+id).then( data=>(this.singleScheduler = data.data[0] ))
             },
            editModalWindow(singleScheduler){
                this.form.clear();
                this.editMode = true;
                this.addSchedulerModel = true;
                this.showSingleSchedulerModel = false;
                this.form.reset();
                this.form.fill(singleScheduler)
                this.form.Scheduler_id = this.singleScheduler.id
             },
            saveScheduler(){
                this.$Progress.start()
                this.form.post('/api/schedulers')
                    .then(() => {
                        Fire.$emit('AfterCreatedUserLoadIt'); //custom events
                        Toast.fire({
                            icon: 'success',
                            title: 'Sheduler created successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                        console.log(error.message)
                    })
             }, 
            updateScheduler(){
             this.form.put('/api/schedulers/'+this.form.Scheduler_id)
                .then(()=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Scheduler updated successfully'
                        })
                        Fire.$emit('AfterCreatedUserLoadIt');
                    this.allschedulers()
                })
                .catch((error)=>{
                    console.log(error.message)
                })
             },
            deleteScheduler(id) {
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
                    this.allschedulers();
                    axios.delete("/api/schedulers/"+ id)
                        .then( 
                            (response) => {
                                Swal.fire(
                                    'Deleted!',
                                    'Scheduler deleted successfully',
                                    'success'
                                    )
                        this.allschedulers()
                        if (this.showSingleSchedulerModel) {
                            this.showSingleSchedulerModel = !this.showSingleSchedulerModel
                        }
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
             },
            
            calcJourneytime(){
                let depTime = this.form.departure_time
                let arrTime = this.form.arrival_time
                if(depTime != "" && arrTime != "")
                {
                    let depHour = +depTime.slice(0, 2)
                    let depMin  = +depTime.substr(3)
                    let arrHour = +arrTime.slice(0, 2)
                    let arrMin  = +arrTime.substr(3)

                    let diffHour =arrHour - depHour;
                    let diffMin = arrMin - depMin;
                    this.form.journey_time = JSON.stringify(diffHour)+"hrs "+ JSON.stringify(diffMin) + "min"
                    console.log(`dep hour is ${depHour} dep min is ${depMin} arr hour is ${arrHour} arr min is ${arrHour}`)
                    console.log(`journey hour is ${diffHour} and journey min is ${diffMin}`)
                    // console.log(new Date(depT))
                }
             }
        },
    beforeMount(){
        this.allschedulers()
        // this.getTodaysScheduler()
        this.fetchOperator()
    },
}
</script>
<style scoped>

</style>

