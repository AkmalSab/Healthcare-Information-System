<template>
    <div class="table-responsive container">
        <h1 class="">Spouse/Family Information</h1>
        <blockquote class="blockquote">
            <p>List of registered patient's next of kin.</p>
        </blockquote>
        <table class="table" id="familyInformationTable">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Patiend Id</th>
                    <th scope="col">NRIC</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Relationship</th>
                    <th scope="col">Country</th>
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
                </tr>                
            </tbody>
        </table>
    </div>
</template>

<script>
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";

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
                    $(document).ready( function () {
                        $('#familyInformationTable').DataTable({
                            data: this.families,    
                            columnDefs: [{
                            'targets': [3,4,5,6], /* column index */
                            'orderable': false, /* true or false */
                            }]                  
                        }); 
                    });                                  
                })
                .catch(error => {
                    console.log(error);
                })
            },
        }
    }
</script>