<template>
    <div class="table-responsive container">
        <h1 class="">Appoinment Information</h1>
        <blockquote class="blockquote">
            <p>List of registered patient's appointment.</p>
        </blockquote>
        <div class="card mb-3">
            <div class="card-body">
                <form @submit.prevent="storePatientAppointment">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="PatName" class="form-label">Patient name</label>
                                <select class="form-select" v-model="form.PatName" id="PatName" aria-label="PatNameHelp" aria-describedby="PatNameHelp" required>
                                    <option v-for="patient in patients" v-bind:key="patient.id" v-bind:value="patient.id">{{ patient.name }}</option>
                                </select>
                                <div id="PatNameHelp" class="form-text">This is patient's name.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="StaffName" class="form-label">Doctor Name</label>
                                <select class="form-select" v-model="form.StaffName" id="StaffName" aria-label="StaffNameHelp" aria-describedby="StaffNameHelp" required>
                                    <option v-for="staff in staffs" v-bind:key="staff.id" v-bind:value="staff.id">{{ staff.name }}</option>
                                </select>
                                <div id="StaffNameHelp" class="form-text">Please select doctor's name.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="AppToc" class="form-label">Type of Case</label>
                                <select class="form-select" v-model="form.AppToc" id="AppToc" aria-label="AppTocHelp" aria-describedby="AppTocHelp" required>
                                    <option v-for="casex in cases" v-bind:key="casex.id" v-bind:value="casex.id">{{ casex.name }}</option>
                                </select>
                                <div id="AppTocHelp" class="form-text">Please input appointment's case type.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="AppDesc" class="form-label">Appointment Description</label>
                                <input type="text" class="form-control" v-model="form.AppDesc" id="AppDesc" aria-describedby="AppDescHelp" required>
                                <div id="AppDescHelp" class="form-text">Please input appointment's purpose.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="AppDate" class="form-label">Appointment Date</label>
                                <input type="date" class="form-control" v-model="form.AppDate" id="AppDate" aria-describedby="AppDateHelp" required>
                                <div id="AppDateHelp" class="form-text">Please input appointment's date.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="AppTime" class="form-label">Appointment Time</label>
                                <input type="time" class="form-control" v-model="form.AppTime" id="AppTime" aria-label="AppTimeHelp">
                                <div id="AppTimeHelp" class="form-text">Please input appointment's time.</div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" style="width: 100%; color: white" class="btn btn-primary">Submit</button>
                </form>
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
                    <td>{{ appointment.patient.name }}</td>
                    <td>{{ appointment.staff.name }}</td>
                    <td>{{ appointment.case.name }}</td>
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
            appointments: [],
            patients: [],
            staffs: [],
            cases: [],
            form: {
                PatName: '',
                StaffName: '',
                AppDate: '',
                AppTime: '',
                AppToc: '',
                AppDesc: ''
            },
        };
    },
    watch: {},
    created() {
        this.getPatientAppointment();
        this.getPatient();
        this.getStaff();
        this.getCase();
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
                            retrieve: true,
                            columnDefs: [{
                                'targets': [4], /* column index */
                                'orderable': false, /* true or false */
                            }]
                        });
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getPatient() {
            axios.get('/api/patient/')
                .then(res => {
                    this.patients = res.data.data;
                    this.form.PatName = this.patients.name;
                })
                .catch(error => {
                    console.log(error)
                });
        },
        getStaff() {
            axios.get('/api/staff/')
                .then(res => {
                    this.staffs = res.data.data;
                })
                .catch(error => {
                    console.log(error)
                });
        },
        getCase() {
            axios.get('/api/case/')
                .then(res => {
                    this.cases = res.data.data;
                })
                .catch(error => {
                    console.log(error)
                });
        },
        storePatientAppointment() {
            axios
            .post("/api/appointment", {
                'patient_id': this.form.PatName,
                'staff_id': this.form.StaffName,
                'case_id': this.form.AppToc,
                'date': this.form.AppDate,
                'time': this.form.AppTime,
                'description': this.form.AppDesc,
            }).then(res=> {
                Swal.fire({
                    icon: 'success',
                    title: 'Booked',
                    text: 'Appointment successfully booked!'
                }).then(res => {
                    if (res.isConfirmed) {
                        this.getPatientAppointment();
                    }
                })
            }).catch(error=> {
                console.log(console.error);
            })
        },
    }
};
</script>

<style></style>
