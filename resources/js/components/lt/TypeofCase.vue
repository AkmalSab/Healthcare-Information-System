<template>
    <div class="table-responsive container">
        <h1 class="">Type of Case Lookup</h1>
        
        <blockquote class="blockquote">
            <p>List of type of case.</p>
        </blockquote>
        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="casex in cases" :key="casex.id">
                    <th scope="row">{{ casex.id }}</th>
                    <td>{{ casex.name }}</td>
                    <td>
                        <router-link :to="{name: 'pmsPatientRegisterNextofKin', params: {id: casex.id}}" class="btn btn-secondary text-white">Edit</router-link>
                    </td>   
                    <td>
                        <router-link :to="{name: 'PmsPatientMasterIndex', params: {id: casex.id}}" class="btn btn-danger text-white">Delete</router-link>
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
                cases: [],
            }
        },
        watch: {

        },
        created() {
            this.getTypeofCase();
        },
        methods: {
            getTypeofCase() {
                axios.get("/api/case")
                .then(res => {
                    this.cases = res.data.data;
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