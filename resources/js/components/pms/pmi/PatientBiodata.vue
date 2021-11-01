<template>
    <div class="table-responsive container">
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">NRIC</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Religion</th>
                    <th scope="col">Race</th>
                    <th scope="col">Next-of-Kin</th>
                    <th scope="col">Insurance</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="patient in patients" :key="patient.id">
                    <th scope="row">{{ patient.id }}</th>                    
                    <td>{{ patient.name }}</td>
                    <td>{{ patient.nric }}</td>
                    <td>{{ patient.phone }}</td>
                    <td>{{ patient.birthdate }}</td>
                    <td>{{ patient.gender }}</td>
                    <td>{{ patient.religion }}</td>
                    <td>{{ patient.race }}</td>
                    <td><router-link :to="{name: 'pmsPatientRegisterNextofKin', params: {id: patient.id}}" class="btn btn-primary text-white w-100">Add</router-link></td>
                    <td><router-link :to="{name: 'pmsPatientRegisterInsurance', params: {id: patient.id}}" class="btn btn-primary text-white w-100">Add</router-link></td>
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
                patients: [],
            }
        },
        watch: {

        },
        created() {
            this.getPatient();
        },
        methods: {
            getPatient() {
                axios.get("/api/patient")
                .then(res => {
                    this.patients = res.data.data;
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