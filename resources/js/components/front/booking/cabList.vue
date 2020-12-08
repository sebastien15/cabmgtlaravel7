<template>
    <div class="text-gray-800">
        <div class="p-2 sm:p-5 border-0 border-b-2 border-b-red-900 flex align-middle justify-between sm:justify-start">
            <span class=" mt-3 sm:font-semibold text-sm sm:text-md">{{ this.fromName }}</span>
            <span class=" mt-3 sm:font-semibold text-sm sm:text-md"><i class="fa fa-arrows-h"></i></span>
            <span class=" mt-3 sm:font-semibold text-sm sm:text-md"> {{ this.toName }}</span>
            <span class=" mt-3 sm:font-semibold text-sm sm:text-md"><</span>
            <span class=" mt-3 sm:font-semibold text-sm sm:text-md">{{ this.date }}</span>
            <span class=" mt-3 sm:font-semibold text-sm sm:text-md">></span>
            <span class=" font-semibold text-sm sm:text-md">
                <base-button className="border border-1 border-red-500 p-1 sm:p-2 bg-transparent" text="modify"></base-button>
            </span>
        </div>
        <div class="px-40 py-10 text-lg text-center" v-if="schedules.length == 0" >
            <img src="" alt="" srcset="">
            <br>
            <h3>Oops! No cabs found.</h3>
            <br>
            <p>
                All cabs on this route are full. Please search for another 
                date or try again later. Inconvenience caused is regretted
            </p>
            <br>
            <h3>Cabs available on alternative dates</h3>
            <br>
        </div>
        <div class=" text-lg text-center flex mt-16 px-1" v-if="schedules.length > 0">
            <div class="hidden sm:block sm:w-3/12 pl-5">
                <h4 class="uppercase mb-3 text-left">Filter</h4>
                <hr class="w-16 h-1 bg-gray-600 mb-4">
                <div>
                    <h4 class="uppercase mb-3 text-left">DEPARTURE TIME</h4>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> <i class=""></i> Before 6 am (0)</span>
                    </div>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> <i class="fa fa-sun-o"></i> 6 am to 12 pm (1)</span>
                    </div>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> <i class=""></i> 12 pm to 6 pm (0)</span>
                    </div>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> <i class="fa fa-moon-o"></i> After 6 pm (3)</span>
                    </div>                               
                </div>
                <div>
                    <h4 class="uppercase mb-3 text-left">arrival time</h4>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> <i class=""></i> Before 6 am (0)</span>
                    </div>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> <i class="fa fa-sun-o"></i> 6 am to 12 pm (1)</span>
                    </div>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> <i class=""></i> 12 pm to 6 pm (0)</span>
                    </div>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> <i class="fa fa-moon-o"></i> After 6 pm (3)</span>
                    </div> 
                </div>
                <div>
                    <h4 class="uppercase mb-3 text-left">bus type</h4>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> Winger</span>
                    </div>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> Sumo</span>
                    </div>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> Xylo</span>
                    </div>
                    <div class="flex align-middle mb-2">
                        <input type="checkbox" name="" id="" class="mr-2 text-2xl text-blue-400 w-8 h-6">
                        <span> Innova</span>
                    </div> 
                </div>
            </div>
            <div class="w-full sm:w-9/12">
                <div class="border-b border-blue-400 text-left text-sm md:text-md py-4">
                    <h4>All bus ratings include safety as a major factor</h4>
                </div>
                <div class="flex flex-col sm:flex-row justify-between mt-4">
                    <div class="w-full sm:w-3/12 flex text-sm sm:text-md">
                        <span class="font-bold ml-1">{{ this.schedules[0].length }} Buses </span>
                        <span> Found </span>
                    </div>
                    <div class="w-full sm:w-9/12 flex justify-around text-sm sm:text-md">
                        <span class="font-bold">Sort By:</span>                         
                        <span class="text-xs sm:text-md rounded-md border border-gray-300 px-1 tags">Departure</span>
                        <span class="text-xs sm:text-md rounded-md border border-gray-300 px-1 tags">Duration</span>
                        <span class="text-xs sm:text-md rounded-md border border-gray-300 px-1 tags">Arrival</span>
                        <span class="text-xs sm:text-md rounded-md border border-gray-300 px-1 tags">Fare</span>
                        <span class="text-xs sm:text-md rounded-md border border-gray-300 px-1 tags">Seats Available</span>
                    </div>
                </div>
                <div v-for="schedule in schedules" :key="schedule.id">
                    <div class="border border-blue-500 shadow-sm p-1 sm:p-4 my-10" v-for="sche in schedule" :key="sche.id">
                        <div class="flex overflow-x-hidden text-xs sm:text-md w-72 sm:w-full">
                            <div class="sm:w-3/12 mr-2">
                                <h4>{{ sche.operator_company }}</h4>
                                <!-- <p>A/C Seater</p> -->
                            </div>
                            <div class="sm:w-1/12 mr-2">
                                <h4>{{ sche.departure_time }}</h4>
                                <p>{{ sche.route_from }}</p>
                            </div>
                            <div class="sm:w-1/12 mr-2">{{ sche.journey_time }}</div>
                            <div class="sm:w-1/12 mr-2">
                                <h4>{{ sche.arrival_time }}</h4>
                                <p>{{ sche.route_to }}</p>
                            </div>
                            <div class="w-1/12 hidden sm:block">
                                <span class="bg-red-500 p-2 text-white">2.9</span>
                            </div>
                            <div class="sm:w-3/12">{{ sche.journey_price }}</div>
                            <div class="sm:w-3/12">
                                <p>15 Seats available</p>
                                <p>8 Window</p>                 
                            </div>
                        </div>
                        <div class="flex justify-end mt-2">
                            <button class="p-1 sm:p-3 sm:py-2 text-sm sm:text-md bg-red-500 border border-red-500 text-white" @click="showSeatesModel()">view Seats</button>
                        </div>
                        <div class="bg-gray-200 px-3"
                            :class="[
                                showSeats ? 'relative' : 'hidden',
                            ]"
                        >
                            <div class="flex justify-between border-b border-gray-7">
                                <div class=" py-3 px-1">
                                    Seat Prices <span class="bg-gray-900 text-white mr-2 p-1 px-3">All</span> <span class="bg-white border border-gray-900 p-1">3283</span>
                                </div>
                                <div class="font-hairline border border-gray-900 text-gray-900 p-1 sm:py-1 sm:px-3 rounded-full absolute closeModel" @click="showSeatesModel()">X</div>
                            </div>
                            <div class="flex">
                                <div class="w-1/2">
                                    <h6 class="text-blue-600 text-md font-light mb-2">Click on an Available seat to proceed with your transaction.</h6>
                                    <div>c
                                        
                                    </div>
                                </div>
                                <div class="w-1/2">
                                    <h6 class="uppercase">Seat legend</h6>
                                    <div class="flex">
                                        <div><Span class="w-6 h-4 bg-white mr-2"></Span> Available seates</div>
                                        <div><Span class="w-6 h-4 bg-yellow-200 mr-2"></Span> Selected seates</div>
                                        <div><Span class="w-6 h-4 bg-gray-700 mr-2"></Span> Unavailable seates</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "cabList",
    data() {
        return {
            fromName:null,
            toName:null,
            date:null,
            schedules:[],
            showSeats: false,
            form: new Form({
                from: '',
                to: '',
                date : '',
            }),
        }
    },
    methods: {
        checkParams(){
            this.fromName = new URL(location.href).searchParams.get('from');
            this.toName = new URL(location.href).searchParams.get('to');
            this.date = new URL(location.href).searchParams.get('date')
            this.newdate = this.date.replaceAll(",","-");
            this.form.from = this.fromName
            this.form.to = this.toName
            this.form.date = this.newdate
        },
        availableschedules(){            
            this.form.post("/api/querySchedulers").then( data => (
                // console.log(data.data)
                this.schedules = data.data
            )).catch((error)=>console.log(error.message));
         },
        showSeatesModel(){
            this.showSeats = !this.showSeats
        }
    },
    beforeMount() {
      this.checkParams()
      this.availableschedules()
    },
}
</script>
<style scoped>
.tags{
    font-size: 10px;
}
.closeModel{
    top: 0px;
    right: 0px;
}

</style>

