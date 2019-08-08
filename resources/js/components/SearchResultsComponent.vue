<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-dark-custom text-light custom-padding">
                    <table class="table text-light">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Open 24/7</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Address</th>
                            <th scope="col">Price</th>
                            <th scope="col">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="studio in studios">
                                <th>{{ studio.name }}</th>
                                <th>{{ studio.time_24hours? 'Yes': 'No' }}</th>
                                <th>{{ studio.grade }}/10</th>
                                <th>{{ studio.street }}, {{ studio.postal_code }}</th>
                                <th>{{ studio.price }} €</th>
                                <th><span class="badge badge-light">Contract: {{ studio.contract.description }}</span> <span class="badge badge-light">Shower: {{ studio.shower.description }}</span> <span class="badge badge-light">Coaching: {{ studio.coaching.description }}</span></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            studios: {
                type: Array,
            }
        },
        mounted() {

        }
    }
</script>
