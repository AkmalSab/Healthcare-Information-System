<template>
    <div class="container">  
        <h1>Medicine Lookup</h1>
        <blockquote class="blockquote">
            <p>View and Register Medicine 🚨</p>
        </blockquote>      
        <div class="card mt-2">
                <div class="card-body">
                    <table class="table text-center" id="medicineTable">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Dose(mg)</th>
                                <th scope="col">Cost(RM)</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="meds in medsData" :key="meds.id">
                                <th scope="row">
                                    <img
                                        :src="
                                            'https://e-techify-storage.s3.ap-southeast-1.amazonaws.com/medicine_picture/' +
                                                meds.picture
                                        "
                                        width="100"
                                        height="100"
                                    />
                                </th>
                                <td>{{ meds.name }}</td>
                                <td>{{ meds.manufacturer }}</td>
                                <td>{{ meds.dose }}</td>
                                <td>{{ meds.cost }}</td>
                                <td>{{ meds.description }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        style="color:white"
                                    >
                                        Edit
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-danger"
                                        style="color:white"
                                        @click="deleteMeds(meds.id)"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
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
                medsData: []
            }
        },
        watch: {

        },
        created() {
            this.getMedicineData();
        },
        methods: {
            getMedicineData() {
            axios
                .get("/api/medicine")
                .then(res => {
                    this.medsData = res.data;
                    this.$nextTick(() => {
                        $("#medicineTable").DataTable({
                            bRetrieve: true,
                            columnDefs: [{ orderable: false, targets: [0, 6] }]
                        });
                    });
                })
                .catch(error => {
                    console.log(error);
                });
            },
            deleteMeds(id) {
                axios.delete("/api/medicine/" + id).then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    $("#medicineTable")
                        .DataTable()
                        .destroy();
                    this.getMedicineData();
                });
            },
        }
    }
</script>

<style>

</style>