<template>
    <div class="table-responsive container">
        <h1 class="">Appoinment Information</h1>
        <blockquote class="blockquote">
            <p>List of registered patient's appointment.</p>
        </blockquote>
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Id</th>                    
                    <th scope="col">Patient Id</th>
                    <th scope="col">Doctor Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Type of Case</th>
                    <th scope="col">Purpose</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="appointment in appointments" :key="appointment.id">
                    <th scope="row">{{ appointment.id }}</th>                    
                    <td>{{ appointment.patient_id }}</td>
                    <td>{{ appointment.doctor_id }}</td>
                    <td>{{ appointment.date }}</td>
                    <td>{{ appointment.time }}</td>
                    <td>{{ appointment.case_type }}</td>
                    <td>{{ appointment.purpose }}</td>
                    <td>
                        <router-link :to="{name: 'pmsPatientRegisterNextofKin', params: {id: appointment.id}}" class="btn btn-secondary text-white">Edit</router-link>
                    </td>   
                    <td>
                        <router-link :to="{name: 'PmsPatientMasterIndex', params: {id: appointment.id}}" class="btn btn-danger text-white">Delete</router-link>
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
                appointments: [],
            }
        },
        watch: {

        },
        created() {
            this.getPatientAppointment();
        },
        methods: {
            getPatientAppointment() {
                axios.get("/api/appointment")
                .then(res => {
                    this.appointments = res.data.data;
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