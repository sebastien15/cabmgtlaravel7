<template>
    <div>   
        <navigations></navigations>
        <div class="p-5 sm:p-20 text-center sm:text-left mt-6">
            <!-- <div class="sm:w-1/2 p-2 md:pt-20 ">
                <div class="overflow-x-auto">
                    <table class="border border-blue-900 ">
                        <thead class="border border-blue-900 ">
                            <tr class="p-2 text-sm font-bold">

                            </tr>
                        </thead>
                        <tbody class="border border-blue-400 border-t-0">
                            <tr class="p-2 " v-for="booking in bookings" :key="booking.id">
                                <td class="border-r border-blue-400 flex p-2">
                                    <span class="cursor-pointer" @click="showSingleBooking( booking.id )"><i class="fa fa-eye text-xl text-blue-400 mr-2"></i></span>
                                    <span  class="cursor-pointer"><i class="fa fa-trash text-2xl text-red-500 cursor-pointer"></i></span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> -->
            <!-- {{ profile[0] }} -->
            <ul class="list-none" v-if="profileAdded">
                <li>
                    <img class="w-32 h-32" :src="'../upload/'+ profile[0].profile_pic" />
                </li>
                <li><span class="mr-2">Names: </span> <span>{{user.name}}</span></li>
                <li><span class="mr-2">phone: </span> <span>{{profile[0].phone}}</span></li>
                <li><span class="mr-2">Company names: </span> <span>{{profile[0].company_name}}</span></li>
                <li><span class="mr-2">Car Type: </span> <span>{{usercar[0].name}}</span></li>
            </ul>   
            <div class="flex sm:justify-end p-4 mt-5">
                <button class="w-full sm:w-3/12 py-2 px-4 border border-gray-600 text-gray-900"  v-show="!profileAdded" @click="addProfile(user.id)">Add Profile</button>
                <button class="w-full sm:w-3/12 py-2 px-4 border border-blue-600 text-blue-900" v-show="profileAdded" @click="editProfile(user.id,profile[0])">Edit profile</button>
            </div>         
        </div>
        <div 
            class="bg-white w-full border-blue-400 top-0 md:mt-20  p-2 sm:p-20"
            :class="[
                profileform ? 'absolute' : 'hidden',
            ]"
            >
            <h2 class="text-2xl font-bold mb-4" v-show="!editMode">Add Profile information</h2>
            <h2 class="text-2xl font-bold mb-4" v-show="editMode" >Edit Profile</h2>
            <div class="border-b-blue-200 mb-10">
                <form @submit.prevent="editMode? updateProfile(profile[0].id) : addProfile()"  enctype="multipart/form-data">
                    <div class="flex flex-col justify-between mb-2">
                        <input type="hidden" v-model="form.operator_id" name="operator_id" placeholder="company_name"/>
                        <input class="w-8/12 m-auto mb-3 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.company_name" name="company_name" placeholder="company_name"/>
                        <input class="w-8/12 m-auto mb-3 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.phone" name="phone" placeholder="phone"/>
                        <input class="w-8/12 m-auto mb-3 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" type="text" v-model="form.number_plate" name="NumberPlage" placeholder="Number Plate"/>
                        <input class="w-8/12 m-auto mb-3 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" @change="onFileChange" type="file" name="profilepic" id="profilepic" placeholder="profile pic"/>
                        <select class="w-8/12 m-auto mb-3 text-blue-800 text-md rounded-sm border border-blue-700 px-2 py-3" v-model="form.car_id" name="car_id">
                            <option v-for="car in cars" :key="car.id" :value="car.id" v-text="car.name"></option>
                        </select>
                    </div>
                    <div class="flex justify-items-start pt-10">
                        <button type="submit" v-show="!editMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-blue-600 text-blue-600" >Save</button>
                        <button type="submit" v-show="editMode" class="p-2 rounded-md mr-3 text-md font-light border-2 border-green-600 text-green-600" >Update</button>
                        <a class="p-2 rounded-md mr-3 text-md font-light border-2 border-red-600 text-red-600" @click="()=>{this.profileform = !this.profileform}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "operatorprofile",
    props : ['user'],
    data() {
        return {
            cars:{},
            profile:{},
            profileAdded: false,
            usercar:'',
            profileform:false,
            editMode: false,
            fileName:"",
            form: new Form({
                    operator_id: this.user,
                    user_id: '',
                    car_id : '',
                    company_name: '',
                    phone: '',
                    profile_pic: '',
                    number_plate: '',
                }),
        }
    },
    methods: {
            allcars() {
                axios.get("/api/cars").then( data => (this.cars = data.data))
             },
            onFileChange(e){
                this.form.profile_pic = e.target.files[0];
            },
            userProfile() {
                axios.get("/api/operatorinfo/" + this.user.id).then( data => {
                    this.profile = data.data;
                    this.profileAdded = !this.profileAdded;
                    axios.get("/api/cars/" + this.profile[0].car_id).then(data=>(
                        this.usercar = data.data
                        ))  
                })
            },
            editProfile(id,profile) {
                this.form.clear();
                this.profileform = !this.profileform;
                this.editMode = true;
                this.form.operator_id = this.user.id;
                this.allcars();
                this.form.fill(profile)
            },
            addProfile(id) {
                this.profileform = !this.profileform;
                this.editMode = false;
                this.form.operator_id = this.user.id;
                this.allcars();
                this.$Progress.start();
                const setHeaders = {
                    headers: {
                        'content-type': 'multipart/form-data'
                        // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    }
                };
                console.log('the form follows');
                console.log(this.form);
                this.form.post('/api/operatorinfo',setHeaders)
                    .then(() => {
                        Fire.$emit('AfterCreatedUserLoadIt'); //custom events
                        Toast.fire({
                            icon: 'success',
                            title: 'Profile added created successfully'
                        })
                        this.$Progress.finish()
                        this.profileform = !this.profileform;
                        this.userProfile()
                    })
                    .catch((error) => {
                    console.log(error.message)
                    })
                
            },
            updateProfile(id){
            const setHeaders = {
                headers: {
                    'content-type': 'multipart/form-data'
                    // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                }
            };
             this.form.put('/api/operatorinfo/'+id, setHeaders)
                .then(()=>{
                    Toast.fire({
                        icon: 'success',
                        title: 'Profile updated successfully'
                        })
                        Fire.$emit('AfterCreatedUserLoadIt');
                    this.profileform = !this.profileform
                    this.userProfile
                })
                .catch((error)=>{
                    console.log(error.message)
                })
             },
        },
    mounted(){        
        this.userProfile()
    },
}
</script>
<style scoped>

</style>

