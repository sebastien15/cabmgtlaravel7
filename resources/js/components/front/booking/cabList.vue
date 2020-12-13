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
                                {{ sche.operator_car }}                
                            </div>
                        </div>
                        <div class="flex justify-end mt-2">
                            <button class="p-1 sm:p-3 sm:py-2 text-sm sm:text-md bg-red-500 border border-red-500 text-white" @click="showSeatesModel(sche.id)">view Seats</button>
                        </div>
                        <div class="bg-gray-200 px-3"
                            :class="[
                                showSeats ? 'relative' : 'hidden',
                            ]"
                        >
                            <div class="flex justify-between border-b border-gray-7 mt-2">
                                <div class=" py-3 px-1">
                                    Seat Prices <span class="bg-gray-900 text-white mr-2 p-1 px-3">All</span> <span class="bg-white border border-gray-900 p-1">3283</span>
                                </div>
                                <div class="font-hairline border border-gray-900 text-gray-900 p-1 sm:py-1 sm:px-3 rounded-full absolute closeModel cursor-pointer" @click="showSeatesModel(sche.id)">X</div>
                            </div>
                            <div class="flex flex-col sm:flex-row">
                                <div class="w-full sm:w-1/2">
                                    <h6 class="text-blue-600 text-xs sm:text-sm md:text-md font-light mb-2">Click on an Available seat to proceed with your transaction.</h6>
                                    <div>
                                        <!-- svg for sumo -->
                                        <svg version="1.1" id="Layer_1" class="car_svg" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 800 500"
                                             xml:space="preserve"
                                             :class="[
                                                    sche.operator_car != 3 ? 'hidden' : 'relative',
                                                ]">
                                                <g id="Layer_1_1_">
                                                    <rect id="border" x="36.8" y="40.3" class="st0" width="703.2" height="429.2"/>
                                                  </g>
                                                <g id="driver" >
                                                    <rect id="XMLID_1_" x="112.7" y="61.7" class="st0" width="125.4" height="186.5"/>
                                                    <text id="XMLID_2_" transform="matrix(0 -0.8255 1 0 193.167 205.8369)" class="st1 st2 st3">Driver</text>
                                                 </g>
                                                <g id="seat_1">
                                                    <rect id="XMLID_6_" x="111.8" y="373.7" class="st0 seats" width="126.6" height="80.6" data-seatNumber="1"/>
                                                 </g>
                                                <g id="seat_2">
                                                    <rect id="XMLID_3_" x="113.6" y="270.7" class="st0 seats" width="122.4" height="82.2" data-seatNumber="2"/>
                                                 </g>
                                                <g id="seat_3">
                                                    <rect id="XMLID_18_" x="333.7" y="371.1" class="st0 seats" width="118.2" height="83.2" data-seatNumber="3"/>
                                                 </g>
                                                <g id="seat_4">
                                                    <rect id="XMLID_19_" x="333.7" y="266.1" class="st0 seats" width="118.2" height="81" data-seatNumber="4"/>
                                                 </g>
                                                <g id="seat_5">
                                                    <rect id="XMLID_12_" x="333.7" y="165.5" class="st0 seats" width="118.2" height="81" data-seatNumber="5"/>
                                                 </g>
                                                <g id="seat_6">
                                                    <rect id="XMLID_15_" x="334.9" y="63.6" class="st0 seats" width="114.3" height="82.6" data-seatNumber="6"/>
                                                 </g>
                                                <g id="seat_7">
                                                    <rect id="XMLID_10_" x="540.3" y="367.9" class="st0 seats" width="118.3" height="86.4" data-seatNumber="7"/>
                                                 </g>
                                                <g id="seat_8">
                                                    <rect id="XMLID_13_" x="540.9" y="265.4" class="st0 seats" width="118.3" height="85.3" data-seatNumber="8"/>
                                                 </g>
                                                <g id="seat_9">
                                                    <rect id="XMLID_7_" x="541.8" y="161.6" class="st0 seats" width="118.3" height="83" data-seatNumber="9"/>
                                                 </g>
                                                <g id="seat_10">
                                                    <rect id="XMLID_8_" x="540.3" y="63.6" class="st0 seats" width="118.3" height="83" data-seatNumber="10"/>
                                                 </g>
                                         </svg>
                                        
                                        <!-- svg for sumo end -->    
                                        <!-- svg for Winger starts -->
                                        <svg version="1.1" id="Layer_2" class="car_svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	                                                viewBox="0 0 800 500" xml:space="preserve"
                                                  :class="[
                                                    sche.operator_car != 2 ? 'hidden' : 'relative',
                                                ]"
                                                 >
                                                <g id="Layer_1_1_">
                                                    <rect id="border" x="18.8" y="9.8" class="st0 " width="750.8" height="473.5"/>
                                                 </g>
                                                <g id="driver">
                                                    <rect id="XMLID_1_" x="68.9" y="23" class="st0 seats" width="124.6" height="201.7"/>
                                                    <text id="XMLID_2_" transform="matrix(0 -0.8101 1 0 154.1362 171.8828)" class="st1 st2 st3">Driver</text>
                                                 </g>
                                                <g id="seat1">
                                                    <rect id="XMLID_6_" x="68.9" y="369.5" class="st0 seats" width="124.6" height="100.1" data-seatNumber="1"/>
                                                 </g>
                                                <g id="seat2">
                                                    <rect id="XMLID_3_" x="68.9" y="247.7" class="st0 seats" width="124.6" height="100.1" data-seatNumber="2"/>
                                                 </g>
                                                <g id="seat_3">
                                                    <rect id="XMLID_18_" x="269.2" y="369.5" class="st0 seats" width="105" height="102.7" data-seatNumber="3"/>
                                                 </g>
                                                <g id="seat_4">
                                                    <rect id="XMLID_26_" x="269.2" y="246.7" class="st0 seats" width="105" height="102.1" data-seatNumber="4"/>
                                                 </g>
                                                <g id="seat_5">
                                                    <rect id="XMLID_12_" x="269.2" y="140.1" class="st0 seats" width="105" height="93.1" data-seatNumber="5"/>
                                                 </g>
                                                <g id="seat_6">
                                                    <rect id="XMLID_23_" x="270.3" y="27.9" class="st0 seats" width="101.5" height="91.8" data-seatNumber="6"/>
                                                 </g>
                                                <g id="seat_7">
                                                    <rect id="XMLID_4_" x="424.5" y="368.2" class="st0 seats" width="105" height="102.7" data-seatNumber="7"/>
                                                 </g>
                                                <g id="seat_8">
                                                    <rect id="XMLID_20_" x="424.5" y="140.1" class="st0 seats" width="105" height="93.1" data-seatNumber="8"/>
                                                 </g>
                                                <g id="seat_9">
                                                    <rect id="XMLID_8_" x="424.5" y="27.9" class="st0 seats" width="105" height="91.8" data-seatNumber="9"/>
                                                 </g>
                                                <g id="seat_10">
                                                    <rect id="XMLID_16_" x="579" y="368.2" class="st0 seats" width="105" height="102.7" data-seatNumber="10"/>
                                                 </g>
                                                <g id="seat_11">
                                                    <rect id="XMLID_14_" x="579" y="246.4" class="st0 seats" width="105" height="102.7" data-seatNumber="11"/>
                                                 </g>
                                                <g id="seat_12">
                                                    <rect id="XMLID_11_" x="579" y="140.1" class="st0 seats" width="105" height="91.8" data-seatNumber="12"/>
                                                 </g>
                                                <g id="seat_13">
                                                    <rect id="XMLID_9_" x="579" y="27.9" class="st0 seats" width="105" height="91.8" data-seatNumber="13"/>
                                                 </g>
                                             </svg>
                                        <!-- svg for Winger ends -->
                                        <!-- svg for Xylo starts -->

                                        <svg version="1.1" id="Layer_3" class="car_svg" xmlns:x="&ns_extend;" xmlns:i="&ns_ai;" xmlns:graph="&ns_graphs;"
                                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 800 500" xml:space="preserve"
                                            :class="[
                                                    sche.operator_car != 1 ? 'hidden' : 'relative',
                                            ]">

                                            <g id="Layer1">
                                                <rect id="border" x="36.8" y="18.7" class="st0" width="750.8" height="473.5"/>
                                            </g>
                                            <g id="driver">
                                                <rect id="XMLID_1_" x="109.9" y="32.9" class="st0 seats" width="157.4" height="254.7"/>
                                                <text id="XMLID_2_" transform="matrix(0 -0.8101 1 0 217.5601 220.9087)" class="st1 st2 st3">Driver</text>
                                            </g>
                                            <g id="seat1">
                                                <rect id="XMLID_3_" x="109.6" y="346.2" class="st0 seats" width="153.1" height="130.3" data-seatNumber="1"/>
                                            </g>
                                            <g id="seat2">
                                                <rect id="XMLID_18_" x="348.2" y="378.4" class="st0 seats" width="105" height="102.7" data-seatNumber="2"/>
                                            </g>
                                            <g id="seat3">
                                                <rect id="XMLID_26_" x="348.2" y="255.5" class="st0 seats" width="105" height="102.1" data-seatNumber="3"/>
                                            </g>
                                            <g id="seat4">
                                                <rect id="XMLID_12_" x="348.2" y="149" class="st0 seats" width="105" height="93.1" data-seatNumber="4"/>
                                            </g>
                                            <g id="seat5">
                                                <rect id="XMLID_23_" x="349.3" y="36.8" class="st0 seats" width="101.5" height="91.8" data-seatNumber="5"/>
                                            </g>
                                            <g id="seat6">
                                                <rect id="XMLID_4_" x="542.5" y="351.3" class="st0 seats" width="131.3" height="128.4" data-seatNumber="6"/>
                                            </g>
                                            <g id="seat7">
                                                <rect id="XMLID_20_" x="542.5" y="186.8" class="st0 seats" width="128.9" height="114.3" data-seatNumber="7"/>
                                            </g>
                                            <g id="seat8">
                                                <rect id="XMLID_8_" x="542.5" y="36.8" class="st0 seats" width="131.3" height="114.8" data-seatNumber="8"/>
                                            </g>
                                         </svg>

                                        <!-- svg for Xylo ends -->

                                    </div>
                                </div>
                                <div class="w-full sm:w-1/2 text-sm">
                                    <h6 class="uppercase">Seat legend</h6>
                                    <div class="flex">
                                        <div><Span class="w-6 h-4 bg-white mr-2"></Span> Available</div>
                                        <div><Span class="w-6 h-4 bg-yellow-200 mr-2"></Span> Selected</div>
                                        <div><Span class="w-6 h-4 bg-gray-700 mr-2"></Span> Booked</div>
                                    </div>
                                    <div class="flex mt-1 w-6 h-4">
                                        <div style="min-height: 20px; min-width: 20px;" class="h-4 w-3 mr-1 bg-green-600"></div>
                                        <div style="min-height: 20px; min-width: 20px;" class="h-4 w-3 mr-1 bg-red-700"></div>
                                        <div style="min-height: 20px; min-width: 20px;" class="h-4 w-3 mr-1 bg-red-700"></div>
                                    </div>
                                    <div class="flex flex-col shadow-md p-2 py-3 text-sm my-2" v-if="seatNumber" >
                                        <h3 class="text-left" @click="schedule">Book summary</h3>
                                        <br/>
                                        <div class="flex">
                                            <p class=" mr-1">{{ sche.route_to }}</p> to <p class="mx-2">{{ sche.route_from }} </p>
                                            <p>{{ sche.price }}</p>
                                         </div>
                                        <div class="flex">
                                            <p>Seat N<sup>o</sup>: {{ seatNumber }} </p>
                                         </div>
                                        <div class="flex justify-end">
                                            <button class="px-3 py-2 text-green border border-green-900" v-if="user" @click="book()">Book</button>
                                            <div v-if="!user">
                                                <a href="/register" class="text-blue-700 mr-1 cursor-pointer" v-if="!user">register</a>
                                                You have an account? click <a href="/login" class="text-blue-700 mx-1 cursor-pointer" v-if="!user">login</a>
                                             </div>
                                         </div>
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
    props: ['user'],
    data() {
        return {
            fromName:null,
            toName:null,
            date:null,
            schedules:[],
            showSeats: false,
            seatNumber: null,
            form: new Form({
                from: '',
                to: '',
                date : '',
             }),
            bookForm: new Form({
                user_id: null,
                route_id: null,
                loc_from:null, 
                loc_to:null, 
                scheduler_id:null, 
                car_id:null, 
                seat_no:null, 
                price:null, 
                payed:null, 
                approved:null, 
                nbr_people:null, 
                nbr_luggage:null, 
                pickup_date:null, 
                pickup_time:null,
                pickup_full_add:null, 
                dropoff_full_add:null, 
                custom_message:null
             })
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
        showSeatesModel(schedule){
            this.showSeats = !this.showSeats;
            this.getSeats(schedule);
         },
        getSeats(schedule){         
            let seats = document.querySelectorAll(".seats");
            seats.forEach(element => {
                element.addEventListener('click',()=>{
                    seats.forEach(element => {
                        element.classList.remove("booked");
                    });
                    element.classList.toggle("booked");
                    this.seatNumber = element.dataset.seatNumber
                    this.assignToForm(this.seatNumber, schedule)
                })
            });
         },
        assignToForm(seatNumber,schedule){
            try {
                let id = schedule
                axios.get("/api/schedulers/"+id).then( data=>{
                    this.bookForm.user_id         = this.user.id;
                    this.bookForm.loc_from        = this.fromName;
                    this.bookForm.loc_to          = this.toName;
                    this.bookForm.scheduler_id    = data.data[0].id;
                    this.bookForm.seat_no         = seatNumber;
                    this.bookForm.price           = data.data[0].journey_price;
                    this.bookForm.payed           = false;
                    this.bookForm.car_id          = data.data[0].operator_car;
                    this.bookForm.nbr_people      = 1;
                    this.bookForm.nbr_luggage     = 1;
                    this.bookForm.pickup_date     = this.newdate;
                    this.bookForm.pickup_time     = data.data[0].departure_time;
                    this.bookForm.pickup_full_add = null;
                    this.bookForm.dropoff_full_add = null;
                    this.bookForm.custom_message  = null;
                 })
            } catch (error) {
                console.log(error.message)
            }
        },
        book(){
            this.$Progress.start()
            this.bookForm.post('/api/bookings')                
                .then(() => {
                    Fire.$emit('AfterCreatedUserLoadIt'); //custom events
                    Toast.fire({
                        icon: 'success',
                        title: 'Booked successfully'
                    })
                    this.$Progress.finish()
                })
                .catch((error) => {
                    console.log(error.message)
                })
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
.car_svg {
    enable-background:new 0 0 800 500; 
    max-height: 200px; 
    max-width: 300px;
}
.st0{    
    fill: none;
    stroke:lightgreen;
    stroke-width:2;
    stroke-miterlimit:10;
    cursor:pointer;
}
.seats{
    fill:lightgreen;
    stroke:green;
    stroke-width:2;
    stroke-miterlimit:10;
}
.booked{
    fill:red;
    stroke:red;
    stroke-width:2;
    stroke-miterlimit:10;
}
.st1{
    font-family:'lato';
}
.st2{
    font-size:60px;
}

</style>

