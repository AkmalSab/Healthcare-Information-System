<template>
    <div class="table-responsive container">
        <h1 class="">Medicine Lookup</h1>
        <blockquote class="blockquote">
            <p>List of Medicine.</p>
        </blockquote>
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Manufacturer</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Type</th>
                    <th scope="col">Dose</th>
                    <th scope="col">Stock</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="medicine in medicines" :key="medicine.id">
                    <th scope="row">{{ medicine.id }}</th>                    
                    <td>{{ medicine.name }}</td>
                    <td>{{ medicine.description }}</td>
                    <td>{{ medicine.manufacturer }}</td>
                    <td>{{ medicine.cost }}</td>
                    <td>{{ medicine.type }}</td>
                    <td>{{ medicine.dose }}</td>
                    <td>{{ medicine.stock }}</td>
                    <td>
                        <router-link :to="{name: 'pmsPatientRegisterNextofKin', params: {id: medicine.id}}" class="btn btn-secondary text-white">Edit</router-link>
                    </td>   
                    <td>
                        <router-link :to="{name: 'PmsPatientMasterIndex', params: {id: medicine.id}}" class="btn btn-danger text-white">Delete</router-link>
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
                medicines: [],
            }
        },
        watch: {

        },
        created() {
            this.getPatientInsurances();
        },
        methods: {
            getPatientInsurances() {
                axios.get("/api/medicine")
                .then(res => {
                    this.medicines = res.data.data;
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