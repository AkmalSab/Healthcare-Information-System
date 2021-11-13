<template>
    <div class="table-responsive container">
        <h1 class="">Appoinment Information</h1>
        <blockquote class="blockquote">
            <p>List of registered patient's appointment.</p>
        </blockquote>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Select Patient</label>
                        <select
                            class="form-select"
                            aria-label="Default select example"
                        >
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Select Staff</label>
                        <select
                            class="form-select"
                            aria-label="Default select example"
                        >
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Select Case</label>
                        <select
                            class="form-select"
                            aria-label="Default select example"
                        >
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label class="form-label">Description</label>
                        <div class="form-floating">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                style="height: 100px"
                            ></textarea>
                            <label>Comments</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" />
                    </div>
                    <div class="col">
                        <label class="form-label">Time</label>
                        <input type="time" class="form-control" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <router-link
                            :to="{ name: 'PmsPatientMasterIndex' }"
                            class="btn btn-danger w-100"
                            style="color: white"
                            >Return to PMI</router-link
                        >
                    </div>
                    <div class="col">
                        <button
                            class="btn btn-primary w-100"
                            style="color:white"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table" id="appointmentInformationTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Staff ID</th>
                    <th scope="col">Type of Case</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="appointment in appointments" :key="appointment.id">
                    <th scope="row">{{ appointment.id }}</th>
                    <td>{{ appointment.patient_id }}</td>
                    <td>{{ appointment.staff_id }}</td>
                    <td>{{ appointment.case_id }}</td>
                    <td>{{ appointment.description }}</td>
                    <td>{{ appointment.date }}</td>
                    <td>{{ appointment.time }}</td>                   
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
    components: {},
    data() {
        return {
            appointments: []
        };
    },
    watch: {},
    created() {
        this.getPatientAppointment();
    },
    methods: {
        getPatientAppointment() {
            axios
                .get("/api/appointment")
                .then(res => {
                    this.appointments = res.data.data;
                    $(document).ready( function () {
                        $('#appointmentInformationTable').DataTable({
                            data: this.appointments,                        
                            // columnDefs: [{
                            //     'targets': [8,9,10], /* column index */
                            //     'orderable': false, /* true or false */
                            // }]
                        });
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        }
    }
};
</script>

<style></style>
