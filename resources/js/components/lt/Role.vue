<template>
    <div class="table-responsive container">
        <h1 class="">Role Lookup</h1>
        
        <blockquote class="blockquote">
            <p>List of role.</p>
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
                <tr v-for="role in roles" :key="role.id">
                    <th scope="row">{{ role.id }}</th>
                    <td>{{ role.name }}</td>
                    <td>
                        <router-link :to="{name: 'pmsPatientRegisterNextofKin', params: {id: role.id}}" class="btn btn-secondary text-white">Edit</router-link>
                    </td>   
                    <td>
                        <router-link :to="{name: 'PmsPatientMasterIndex', params: {id: role.id}}" class="btn btn-danger text-white">Delete</router-link>
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
                roles: [],
            }
        },
        watch: {

        },
        created() {
            this.getRoles();
        },
        methods: {
            getRoles() {
                axios.get("/api/role")
                .then(res => {
                    this.roles = res.data.data;
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