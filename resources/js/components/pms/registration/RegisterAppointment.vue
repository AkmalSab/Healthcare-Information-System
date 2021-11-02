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
                                <input type="hidden" class="form-control" v-model="form.PatId" id="PatId" aria-describedby="PatIdHelp" disabled>
                                <input type="text" class="form-control" v-model="form.PatName" id="PatName" aria-describedby="PatNameHelp" disabled>
                                <div id="PatIdHelp" class="form-text">This is patient's name.</div>
                            </div>          
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="DocName" class="form-label">Doctor Name</label>
                                <select class="form-select" v-model="form.DocName" id="DocName" aria-label="DocNameHelp" aria-describedby="DocNameHelp" required>                                    
                                    <option v-for="doctor in doctors" v-bind:key="doctor.id" v-bind:value="doctor.id">{{ doctor.name }}</option>                                    
                                </select>
                                <div id="DocNameHelp" class="form-text">Please input doctor's name.</div>
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
                                <input type="text" class="form-control" v-model="form.AppToc" id="AppToc" aria-describedby="AppTocHelp" required>
                                <div id="AppTocHelp" class="form-text">Please input appointment's case type.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="AppPur" class="form-label">Appointment Purpose</label>
                                <input type="text" class="form-control" v-model="form.AppPur" id="AppPur" aria-describedby="AppPurHelp" required>
                                <div id="AppPurHelp" class="form-text">Please input appointment's purpose.</div>
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
            doctors: [],
            form: {
                PatName: '',
                PatId: this.$route.params.id,
                DocName: '',
                AppDate: '',
                AppTime: '',    
                AppToc: '',
                AppPur: ''
            },
        }
    },
    created() {
        this.getPatient();
        this.getDoctor();
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
        getDoctor() {
            axios.get('/api/doctor/')
                .then(res => {
                    this.doctors = res.data.data;
                })
                .catch(error => {
                    console.log(error)
                });
        },
        storePatientAppointment() {
            axios
            .post("/api/appointment", {
                'patient_id': this.form.PatId,
                'doctor_id': this.form.DocName,                
                'date': this.form.AppDate,
                'time': this.form.AppTime,
                'case_type': this.form.AppToc,
                'purpose': this.form.AppPur
            }).then(res=> {
                this.$router.push({name: 'PmsPatientBiodata'});
            }).catch(error=> {
                console.log(console.error);
            })
        },        
    }
}
</script>

<style>

</style>