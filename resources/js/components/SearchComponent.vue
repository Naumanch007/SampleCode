<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-dark-custom text-light custom-padding">
                    <form>
                        <fieldset>
                            <legend>Discover Fitness Studios</legend>
                        </fieldset>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="cityOptions">City</label>
                                <select class="form-control" v-model="city" id="cityOptions"
                                    @change="updateTrigger(city,'city')">
                                    <option v-for="cityOption in cityOptions">{{ cityOption.city}}</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="priceRangeOptions">Price Range</label>
                                <select class="form-control" v-model="price" id="priceRangeOptions"
                                    @change="updateTrigger(price,'price')">
                                    <option v-for="priceRangeOption in priceRangeOptions">{{ priceRangeOption.label}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="coachingOptions">Coaching</label>
                                <select class="form-control" v-model="coaching" id="coachingOptions"
                                    @change="updateTrigger(coaching,'coaching')">
                                    <option v-for="coachingOption in coachingOptions" :value="coachingOption.short">
                                        {{ coachingOption.description}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" v-model="open24"
                                    @change="updateTrigger(open24, 'open')">
                                <label class="form-check-label" for="gridCheck">
                                    Open 24/7 ?
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
        data() {
            return {
                priceRangeOptions: [
                    { value: '20-40', label: '20-40' },
                    { value: '40-60', label: '40-60' },
                    { value: '60-80', label: '60-80' },
                    { value: '80-100', label: '80-100' },
                ],
                city: this.cityOptions[0].city,
                price: '20-40',
                coaching: this.coachingOptions[0].short,
                open24: ''
            }
        },
        mounted() {

        },
        methods: {
            updateTrigger(value, trigger) {
                
                let data = {
                    'city': this.city,
                    'price': this.price,
                    'coaching': this.coaching,
                    'open24': this.open24
                };

                this.$emit('searchAPI', data);
            }
        },
    }
</script>