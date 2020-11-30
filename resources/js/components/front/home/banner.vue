<template>
    <div class="px-40 text-lg bg-blue-400 -mt-6 pt-64 pb-10">
        <div class="w-7/12 m-auto flex">
            <div class="w-8/12 flex bg-white border-gray-300">
                <div class="border-2 border-gray-300 px-3">
                    <base-input  label="From" placeholder="From" className="h-8 p-2 text-red-800 font-hairline text-lg border-0" v-model="keywords"></base-input>
                </div>
                <div class="absolute bg-white h-24" style="	margin-top: 4.2rem;">
                    <ul class="w-full list-none" v-if="results.length > 0">
                        <li class="border-b-blue-400 p-4 py-2 text-base"  v-for="result in results" :key="result.id">
                            <span v-text="result.from" class="cursor-pointer hover:bg-blue-300"></span>
                            <span class="mx-2 text-lg text-blue-500"> <i class="fa fa-arrows-h"></i> </span>
                            <span v-text="result.to" class="cursor-pointer hover:bg-blue-300"></span>
                        </li>
                    </ul>
                </div>
                <div class="border-2 border-gray-300 px-3">
                    <base-input label="to"   placeholder="to" className="h-8 p-2 text-red-800 font-hairline text-lg border-0" > </base-input>
                </div>
                <div class="border-2 border-gray-300 px-3">
                    <base-input  label="Date" placeholder="date" className="h-8 p-2 text-red-800 font-hairline text-lg border-0" ></base-input>
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
    data() {
        return {
            keywords: null,
            results: []
        }
    },
    watch: {
        keywords(after, before) {
            this.fetch();
        }
    },
    methods: {
         fetch() {
            axios.get('api/search', { params: { keywords: this.keywords } })
                .then(response => {
                    this.results = response.data; 
                    // console.log("keywords is" + typeof(this.keywords))
                    // console.log(response)
                    if (this.keywords == '') {
                        this.results = []
                    }
                    })
                .catch(error => {console.log(error.message)});     
            axios.get('/api/searchStation', {params: {keywords: this.keywords}})
                 .then(
                     response => {
                         this.results = Object.assign(this.results, response.data);
                         console.log(this.results)
                     }
                 )
                 .catch(error=> console.log(error.message));     
        }
    },
}
</script>
<style scoped>
</style>

