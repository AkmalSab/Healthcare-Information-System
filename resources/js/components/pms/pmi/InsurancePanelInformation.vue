<template>
    <div class="table-responsive container">
        <h1 class="">Insurance Information</h1>
        <blockquote class="blockquote">
            <p>List of registered patient's insurance.</p>
        </blockquote>
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Patiend Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Medical Card Number</th>
                    <th scope="col">Type</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="insurance in insurances" :key="insurance.id">
                    <th scope="row">{{ insurance.id }}</th>                    
                    <td>{{ insurance.patient_id }}</td>
                    <td>{{ insurance.name }}</td>
                    <td>{{ insurance.medical_card_no }}</td>
                    <td>{{ insurance.type }}</td>
                    <td>{{ insurance.expiry_date }}</td>
                    <td>
                        <router-link :to="{name: 'pmsPatientRegisterNextofKin', params: {id: insurance.id}}" class="btn btn-secondary text-white">Edit</router-link>
                    </td>   
                    <td>
                        <router-link :to="{name: 'PmsPatientMasterIndex', params: {id: insurance.id}}" class="btn btn-danger text-white">Delete</router-link>
                    </td> 
                </tr>                
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        components:{

        },
        data() {
            return {
                insurances: [],
            }
        },
        watch: {

        },
        created() {
            this.getPatientInsurances();
        },
        methods: {
            getPatientInsurances() {
                axios.get("/api/insurance")
                .then(res => {
                    this.insurances = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                })
            },
        }
    }
</script>

<style>

</style>