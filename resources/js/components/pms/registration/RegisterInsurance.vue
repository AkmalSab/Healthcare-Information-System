<template>
    <div class="container">
        <h1 class="">Register Insurance</h1>
        <blockquote class="blockquote">
            <p>This form is for patient's insurance registration.</p>
        </blockquote>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storePatientInsurance">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="PatId" class="form-label">Patient name</label>
                                <input type="hidden" class="form-control" v-model="form.PatId" oninput="this.value = this.value.toUpperCase()" style="text-transform:uppercase" id="PatId" aria-describedby="PatIdHelp" disabled>
                                <input type="text" class="form-control" v-model="form.PatName" id="PatName" aria-describedby="PatNameHelp" disabled>
                                <div id="PatIdHelp" class="form-text">This is patient's name.</div>
                            </div>          
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="InsName" class="form-label">Insurance Name</label>
                                <input type="text" class="form-control" v-model="form.InsName" oninput="this.value = this.value.toUpperCase()" style="text-transform:uppercase" id="InsName" aria-describedby="InsNameHelp" required>
                                <div id="InsNameeHelp" class="form-text">Please input insurance's name.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="InsMedicalCardNumber" class="form-label">Medical Card Number</label>
                                <input type="text" class="form-control" v-model="form.InsMedicalCardNumber" id="InsMedicalCardNumber" @keypress="isNumber($event)" aria-describedby="InsMedicalCardNumberHelp" maxlength="10" required>
                                <div id="InsMedicalCardNumberHelp" class="form-text">Please input insurance's contact number.</div>
                            </div>
                        </div>  
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="InsType" class="form-label">Type</label>
                                <input class="form-control" type="text" v-model="form.InsType" id="InsType" aria-label="InsTypeHelp">                              
                                <div id="InsTypeHelp" class="form-text">Please input insurance's nationality.</div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="InsExpiryDate" class="form-label">Expiry Date</label>
                                <input type="date" class="form-control" v-model="form.InsExpiryDate" id="InsExpiryDate" aria-describedby="InsExpiryDateHelp" required>
                                <div id="InsExpiryDateHelp" class="form-text">Please input insurance's address line 1.</div>
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
            form: {
                PatName: '',
                PatId: this.$route.params.id,
                InsName: '',                
                InsMedicalCardNumber: '',
                InsType: '',
                InsExpiryDate: ''
            },
        }
    },
    created() {
        this.getPatient();
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
        storePatientInsurance() {
            axios
            .post("/api/insurance", {
                'patient_id': this.form.PatId,
                'name': this.form.InsName,
                'medical_card_no': this.form.InsMedicalCardNumber,
                'type': this.form.InsType,
                'expiry_date': this.form.InsExpiryDate                
            }).then(res=> {
                Swal.fire({
                    icon: 'success',
                    title: 'Inserted',
                    text: 'Insurance successfully registered!'
                }).then(res => {
                    if (res.isConfirmed) {
                        this.$router.push({name: 'PmsInsurancePanelInformation'});
                    }
                })                
            }).catch(error=> {
                console.log(console.error);
            })
        },
        isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                evt.preventDefault();
            }
            return true;
        },
    }
}
</script>

<style>

</style>