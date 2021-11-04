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
                                <input type="hidden" class="form-control" v-model="form.PatId" id="PatId" aria-describedby="PatIdHelp" disabled>
                                <input type="text" class="form-control" v-model="form.PatName" id="PatName" aria-describedby="PatNameHelp" disabled>
                                <div id="PatIdHelp" class="form-text">This is patient's name.</div>
                            </div>          
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="InsName" class="form-label">Insurance Name</label>
                                <input type="text" class="form-control" v-model="form.InsName" id="InsName" aria-describedby="InsNameHelp" required>
                                <div id="InsNameeHelp" class="form-text">Please input insurance's name.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="InsPhone" class="form-label">Insurance Phone Number</label>
                                <input type="phone" class="form-control" v-model="form.InsPhone" id="InsPhone" @keypress="isNumber($event)" aria-describedby="InsPhoneHelp" maxlength="12" min="10" required>
                                <div id="InsPhoneHelp" class="form-text">Please input insurance's contact number.</div>
                            </div>
                        </div>  
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="InsNationality" class="form-label">Country</label>
                                <input class="form-control" type="text" v-model="form.InsNationality" id="InsNationality" aria-label="InsNationality" disabled>                              
                                <div id="InsNationality" class="form-text">Please input insurance's nationality.</div>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="InsAddress1" class="form-label">Address 1</label>
                                <input type="text" class="form-control" v-model="form.InsAddress1" id="InsAddress1" aria-describedby="InsAddress1Help" required>
                                <div id="InsAddress1Help" class="form-text">Please input insurance's address line 1.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="InsAddress2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" v-model="form.InsAddress2" id="InsAddress2" aria-describedby="InsAddress2Help" required>
                                <div id="InsAddress2Help" class="form-text">Please input insurance's address line 2.</div>
                            </div>
                        </div>
                    </div>                             
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="InsState" class="form-label">State</label>
                                <select class="form-select" v-model="form.InsState" id="InsState" aria-label="InsStateHelp" aria-describedby="InsStateHelp" required>                                    
                                    <option value="Johor">Johor</option>
                                    <option value="Kedah">Kedah</option>
                                    <option value="Kelantan">Kelantan</option>
                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                    <option value="Labuan">Labuan</option>
                                    <option value="Melaka">Melaka</option>
                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                    <option value="Pahang">Pahang</option>
                                    <option value="Penang">Penang</option>
                                    <option value="Perak">Perak</option>
                                    <option value="Perlis">Perlis</option>
                                    <option value="Putrajaya">Putrajaya</option>
                                    <option value="Sabah">Sabah</option>
                                    <option value="Sarawak">Sarawak</option>
                                    <option value="Selangor">Selangor</option>
                                    <option value="Terengganu">Terengganu</option>
                                </select>
                                <div id="InsStateHelp" class="form-text">Please input insurance's state.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="InsPostcode" class="form-label">Postcode</label>
                                <input type="text" class="form-control" v-model="form.InsPostcode" @keypress="isNumber($event)" id="InsPostcode" aria-describedby="InsPostcodeHelp" maxlength="6" required>
                                <div id="InsPostcodeHelp" class="form-text">Please input insurance's postcode.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="InsCity" class="form-label">City</label>
                                <input type="text" class="form-control" v-model="form.InsCity" id="InsCity" aria-describedby="InsCityHelp" required>
                                <div id="InsCityHelp" class="form-text">Please input insurance's city.</div>
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
                InsPhone: '',
                InsNationality: 'Malaysia',                
                InsAddress1: '',
                InsAddress2: '',
                InsState: '',
                InsPostcode: '',
                InsCity: '',
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
                'phone': this.form.InsPhone,
                'country': this.form.InsNationality,
                'address_1': this.form.InsAddress1,
                'address_2': this.form.InsAddress2,
                'state': this.form.InsState,
                'postcode': this.form.InsPostcode,
                'city': this.form.InsCity,
            }).then(res=> {
                this.$router.push({name: 'PmsPatientBiodata'});
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