<template>
    <div class="p-2 sm:px-40 text-lg bg-blue-900 -mt-6 pt-4 pb-24 bg-center bg-no-repeat bg-cover" style="background-image: url('/images/bannerbg.png')">
        <!-- <object type="image/svg+xml" data="images/xylo.svg" style="height:30px; width: 24px;"></object> -->
        <div class="mt-20 sm:mt-32 mb-12 sm:-ml-24">
        <h3 class="text-xl sm:text-4xl font-semibold text-gray-300 mb-1 sm:mb-3">
            City Taxi to your destination in town destination 
            </h3>
        <p class="text-md font-light text-gray-300">Choose from a range of categories and prices</p>
        </div>
        <div class="flex flex-col sm:flex-row">
            <div class="w-8/12 m-auto flex flex-col sm:flex-row sm:bg-white border-gray-300">
                <div class="border-0sm:border-2 border-gray-300 px-1 sm:px-3 mb-3 sm:mb-0 bg-white sm:bg-transparent">
                    <base-input  label="From" placeholder="From" id="fromInput" className="h-6 sm:h-8 px-2 sm:p-2 text-red-800 font-hairline text-lg border-0" v-model="from"></base-input>
                    <div class="absolute bg-white h-24">
                        <ul class="w-full list-none" v-if="results.length > 0">
                            <li class="border-b-blue-400 p-4 py-2 text-base cursor-pointer hover:bg-blue-400" v-for="result in results" :key="result.id"  v-text="result.name" @click="setLocFrom(result.name)"></li>
                        </ul>
                    </div>
                </div>
                <div class="border-0sm:border-2 border-gray-300 px-1 sm:px-3 mb-3 sm:mb-0 bg-white sm:bg-transparent">
                    <base-input label="to"   placeholder="to" id="toInput" className="h-6 sm:h-8 px-2 sm:p-2 text-red-800 font-hairline text-lg border-0" v-model="to"> </base-input>
                    <div class="absolute bg-white h-24">
                        <ul class="w-full list-none" v-if="resultsTo.length > 0">
                            <li class="border-b-blue-400 p-4 py-2 text-base cursor-pointer hover:bg-blue-400" v-for="result in resultsTo" :key="result.id"  v-text="result.name" @click="setLocTo(result.name)"></li>
                        </ul>
                    </div>
                </div>
                <div class="border-0sm:border-2 border-gray-300 px-1 sm:px-3 mb-3 sm:mb-0 bg-white sm:bg-transparent">
                    <base-input  label="Date" placeholder="date" id="date"  type="date" className="h-6 sm:h-8 px-2 sm:p-2 text-red-800 font-hairline text-lg border-0" v-model="dDate"></base-input>
                </div>
            </div>
            <div class="w-8/12 sm:w-4/12 m-auto" @click="redirect">
                <base-button className="h-8 sm:h-16 px-3 sm:px-10 bg-red-400 text-white font-hairline text-sm sm:text-lg border-0 p-0"></base-button>
            </div>
        </div>  
    </div>
</template>

<script>
export default {
    name: "banner",
    data() {
        return {
            from: null,
            to: null,
            results: [],
            resultsTo: [],
            dDate: null,
            fromName: null,
            toName: null,
        }
    },
    watch: {
        from(after, before) {
            this.fetch();
        },
        to(after, before) {
            this.fetchTo();
        }
    },
    methods: {
        fetch() {
            if (this.from == '') {
                this.results = []
            }else{
                axios.get('api/search', { params: { from: this.from } })
                    .then(response => {
                        this.results = response.data;                             
                        })
                    .catch(error => {console.log(error.message)}); 
            }
        },
        fetchTo() {
            if (this.to == '') {
                this.resultsTo = []
            }else{
            axios.get('api/search', { params: { to: this.to } })
                .then(response => {
                    this.resultsTo = response.data; 
                    })
                .catch(error => {console.log(error.message)}); 
            }
        },
        setLocFrom(name){
            document.querySelector('#fromInput').value = name;
            this.fromName = name;
            this.results = ''
         },
        setLocTo(name){
            document.querySelector('#toInput').value = name;
            this.toName = name;
            this.resultsTo = ''
         },
        redirect(){
            if (this.from ==null || this.to ==null || this.dDate ==null) {
                this.$Progress.start();
                Toast.fire({
                    icon: 'error',
                    title: 'Please add all fields'
                })
                this.$Progress.finish()
            }else{                
                window.location.href = `/book?from=${this.fromName}&to=${this.toName}&date=${this.dDate}`;
            }
         }
    },
}
</script>
<style scoped>
</style>

