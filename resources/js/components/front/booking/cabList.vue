<template>
    <div class="text-gray-800">
        <div class="p-5 border-0 border-b-2 border-b-red-900 flex align-middle">
            <span class="mr-5 mt-3 font-semibold">{{ this.fromName }}</span>
            <span class="mr-5 mt-3 font-semibold"><i class="fa fa-arrows-h"></i></span>
            <span class="mr-5 mt-3 font-semibold"> {{ this.toName }}</span>
            <span class="mr-5 mt-3 font-semibold"><</span>
            <span class="mr-5 mt-3 font-semibold">{{ this.date }}</span>
            <span class="mr-5 mt-3 font-semibold">></span>
            <span class="mr-5 font-semibold">
                <base-button className="border border-1 border-red-500 p-2 bg-transparent" text="modify"></base-button>
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
        <div class=" text-lg text-center flex mt-16" v-if="schedules.length > 0">
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
                <div class="border-b border-blue-400 text-left text-md py-4">
                    <h4>All bus ratings include safety as a major factor</h4>
                </div>
                <div class="flex justify-between mt-4">
                    <div class="w-3/12 flex">
                        <span class="font-bold ml-1">{{ this.schedules[0].length }} Buses </span>
                        <span> Found </span>
                    </div>
                    <div class="w-9/12 flex justify-around">
                        <span class="font-bold">Sort By:</span>                         
                        <span>Departure</span>
                        <span>Duration</span>
                        <span>Arrival</span>
                        <span>Fare</span>
                        <span>Seats Available</span>
                    </div>
                </div>
                <div v-for="schedule in schedules" :key="schedule.id">
                    <div class="border border-blue-500 shadow-sm p-4 my-10" v-for="sche in schedule" :key="sche.id">
                        <div class="flex">
                            <div class="w-3/12">
                                <h4>{{ sche.operator_id }} Cname</h4>
                                <p>A/C Seater</p>
                            </div>
                            <div class="w-1/12">
                                <h4>{{ sche.departure_time }}</h4>
                                <p>{{ sche.route_from }}</p>
                            </div>
                            <div class="w-1/12">{{ sche.journey_time }}</div>
                            <div class="w-1/12">
                                <h4>{{ sche.arrival_time }}</h4>
                                <p>{{ sche.route_to }}</p>
                            </div>
                            <div class="w-1/12">
                                <span class="bg-red-500 p-2 text-white">2.9</span>
                            </div>
                            <div class="w-3/12">{{ sche.journey_price }}</div>
                            <div class="w-3/12">
                                <p>15 Seats available</p>
                                <p>8 Window</p>                 
                            </div>
                        </div>
                        <div class="flex justify-end mt-2">
                            <button class="p-3 py-2 bg-red-500 border border-red-500 text-white">view Seats</button>
                        </div>
                        <div class="bg-gray-200 px-3">
                            <div class="flex justify-between border-b border-gray-7">
                                <div class=" py-3 px-1">
                                    Seat Prices <span class="bg-gray-900 text-white mr-2 p-1 px-3">All</span> <span class="bg-white border border-gray-900 p-1">3283</span>
                                </div>
                                <div class="font-hairline border border-gray-900 text-gray-900 py-1 px-3 rounded-full">X</div>
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
            console.log("date now is " + this.newdate)
            this.form.from = this.fromName
            this.form.to = this.toName
            this.form.date = this.newdate
        },
        availableschedules(){            
            this.form.post("/api/querySchedulers").then( data => (
                // console.log(data.data)
                this.schedules = data.data,
                console.log(this.schedules)
            )).catch((error)=>console.log(error.message));
         },
    },
    beforeMount() {
      this.checkParams()
      this.availableschedules()
    },
}
</script>
<style scoped>

</style>

