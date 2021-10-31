<template>
    <div class="table-responsive container">
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Patiend Id</th>
                    <th scope="col">NRIC</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Relationship</th>
                    <th scope="col">Country</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="family in families" :key="family.id">
                    <th scope="row">{{ family.id }}</th>                    
                    <td>{{ family.name }}</td>
                    <td>{{ family.patient_id }}</td>
                    <td>{{ family.nric }}</td>
                    <td>{{ family.phone }}</td>
                    <td>{{ family.relationship }}</td>
                    <td>{{ family.country }}</td>
                    <td>
                        <router-link :to="{name: 'pmsPatientRegisterNextofKin'}" class="btn btn-secondary text-white">Edit</router-link>
                    </td>   
                    <td>
                        <router-link :to="{name: 'PmsPatientMasterIndex'}" class="btn btn-danger text-white">Delete</router-link>
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
                families: [],
            }
        },
        watch: {

        },
        created() {
            this.getPatientNextofKin();
        },
        methods: {
            getPatientNextofKin() {
                axios.get("/api/family")
                .then(res => {
                    this.families = res.data.data;
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