<template>
    <div class="table-responsive container">
        <h1 class="">Staff Lookup</h1>
        <blockquote class="blockquote">
            <p>List of Staff.</p>
        </blockquote>
        <table class="table" id="patientBiodateTable">
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
                </tr>
            </thead>
            <tbody>
                <tr v-for="staff in staffs" :key="staff.id">
                    <th scope="row">{{ staff.id }}</th>                    
                    <td>{{ staff.name }}</td>
                    <td>{{ staff.nric }}</td>
                    <td>{{ staff.phone }}</td>
                    <td>{{ staff.birthdate }}</td>
                    <td>{{ staff.gender }}</td>
                    <td>{{ staff.religion }}</td>
                    <td>{{ staff.race }}</td>
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
            staffs: [],
        }
    },
    watch: {

    },
    created() {
        this.getStaff();
    },
    methods: {
        getStaff() {
            axios.get("/api/staff")
            .then(res => {
                this.staffs = res.data.data;                
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