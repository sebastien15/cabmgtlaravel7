<template>
    <div class="px-40 text-lg bg-blue-400 -mt-6 pt-64 pb-10">
        <div class="w-7/12 m-auto flex">
            <div class="w-8/12 flex bg-white border-gray-300">
                <div class="border-2 border-gray-300 px-3">
                    <base-input  label="From" placeholder="From" id="fromInput" className="h-8 p-2 text-red-800 font-hairline text-lg border-0" v-model="from"></base-input>
                    <div class="absolute bg-white h-24">
                        <ul class="w-full list-none" v-if="results.length > 0">
                            <li class="border-b-blue-400 p-4 py-2 text-base cursor-pointer" v-for="result in results" :key="result.id"  v-text="result.name" @click="setLocFrom(result.name)"></li>
                        </ul>
                    </div>
                </div>
                <div class="border-2 border-gray-300 px-3">
                    <base-input label="to"   placeholder="to" id="toInput" className="h-8 p-2 text-red-800 font-hairline text-lg border-0" v-model="to"> </base-input>
                    <div class="absolute bg-white h-24">
                        <ul class="w-full list-none" v-if="resultsTo.length > 0">
                            <li class="border-b-blue-400 p-4 py-2 text-base cursor-pointer" v-for="result in resultsTo" :key="result.id"  v-text="result.name" @click="setLocTo(result.name)"></li>
                        </ul>
                    </div>
                </div>
                <div class="border-2 border-gray-300 px-3">
                    <base-input  label="Date" placeholder="date" id="date"  type="date" className="h-8 p-2 text-red-800 font-hairline text-lg border-0" ></base-input>
                </div>
            </div>
            <div class="w-4/12">
                <base-button className="h-16 px-10 bg-red-400 text-white font-hairline text-lg border-0 p-0"></base-button>
            </div>
        </div>  
    </div>
</template>

<script>
export default {
    name: "banner",
    props: {
        fromName: null,
        toName: null,
    },
    data() {
        return {
            from: null,
            to: null,
            results: [],
            resultsTo: [],
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
            console.log(name)
         },
        setLocTo(name){
            console.log(name);
         }
    },
}
</script>
<style scoped>
</style>

