<template>
    <div>
        <search-component :coaching-options="coachingOptions" :city-options="cityOptions" @searchAPI="searchAPI"></search-component>
        <br>
        <search-results-component :studios="studios"></search-results-component>
    </div>
</template>

<script>
    export default {
        props: {
            coachingOptions: {
                type: Array,
            },
            cityOptions: {
                type: Array,
            }
        },
        mounted() {
            this.searchAPI();
        },
        data() {
            return {
                studios: []
            }
        },
        methods: {
            searchAPI(data){
                axios
                    .get('/api/search-api',{
                        params: data
                    }).then(response => {
                        this.studios = response.data;
                    });
            },
        }
    }
</script>
