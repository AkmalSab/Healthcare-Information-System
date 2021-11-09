<template>
    <div class="container">
        <h1 class="">Create Appointment</h1>
        <blockquote class="blockquote">
            <p>This form is for patient's appointment creation.</p>
        </blockquote>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storePatientAppointment">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="PatId" class="form-label">Patient name</label>
                                <input type="hidden" class="form-control" v-model="form.PatId" id="PatId" oninput="this.value = this.value.toUpperCase()" style="text-transform:uppercase" aria-describedby="PatIdHelp" disabled>
                                <input type="text" class="form-control" v-model="form.PatName" id="PatName" aria-describedby="PatNameHelp" disabled>
                                <div id="PatIdHelp" class="form-text">This is patient's name.</div>
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
                    <button type="submit" style="width: 100%; color: white" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    components:{

    },
    data() {
        return {
            patients: [],
            staffs: [],
            cases: [],
            form: {
                PatName: '',
                PatId: this.$route.params.id,
                StaffName: '',
                AppDate: '',
                AppTime: '',    
                AppToc: '',
                AppDesc: ''
            },
        }
    },
    created() {
        this.getPatient();
        this.getStaff();
        this.getCase();
    },
    methods: {
        getPatient() {
            axios.get('/api/patient/' + this.$route.params.id)
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
                'patient_id': this.form.PatId,
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
                        this.$router.push({name: 'pmsPatientAppointmentInformation'});
                    }
                })
            }).catch(error=> {
                console.log(console.error);
            })
        },        
    }
}
</script>

<style>

</style>