<template>
    <div class="container">
        <h1 class="">Register Next of Kin</h1>
        <blockquote class="blockquote">
            <p>This form is for patient's next of kin registration.</p>
        </blockquote>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storePatientNextofKin">
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
                                <label for="NokName" class="form-label">Name</label>
                                <input type="text" class="form-control" v-model="form.NokName" oninput="this.value = this.value.toUpperCase()" style="text-transform:uppercase" id="NokName" aria-describedby="NokNameHelp" required>
                                <div id="NokNameHelp" class="form-text">Please input patient's emergency contact name.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="NokPhone" class="form-label">Phone No.</label>
                                <input type="phone" class="form-control" v-model="form.NokPhone" id="NokPhone" @keypress="isNumber($event)" aria-describedby="NokPhoneHelp" maxlength="12" min="10" required>
                                <div id="NokPhoneHelp" class="form-text">Please input patient's emergency contact number.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="NokNric" class="form-label">NRIC</label>
                                <input type="text" class="form-control" v-model="form.NokNric" id="NokNric" @keypress="isNumber($event)" aria-describedby="NokNricHelp" maxlength="12" required>
                                <div id="NokNricHelp" class="form-text">Please input patient's emergency contact identification number.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="NokRelationsip" class="form-label">Relationship Status</label>
                                <select class="form-select" v-model="form.NokRelationsip" id="NokRelationsip" aria-label="NokRelationsipHelp" aria-describedby="NokRelationsipHelp" required>
                                    <option value="Spouse">Spouse</option>
                                    <option value="Parent">Parent</option>
                                    <option value="Guardian">Guardian</option>
                                    <option value="Sibling">Sibling</option>
                                    <option value="Friend">Friend</option>
                                </select>
                                <div id="NokRelationsipHelp" class="form-text">Please input patient's emergency contact relationship status.</div>
                            </div>
                        </div> 
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="NokNationality" class="form-label">Country</label>
                                <input class="form-control" type="text" v-model="form.NokNationality" id="NokNationality" aria-label="NokNationality" disabled>                              
                                <div id="NokNationalityHelp" class="form-text">Please input patient's emergency contact nationality.</div>
                            </div>
                        </div>                                              
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="NokAddress1" class="form-label">Address 1</label>
                                <input type="text" class="form-control" v-model="form.NokAddress1" id="NokAddress1" aria-describedby="NokAddress1Help" required>
                                <div id="NokAddress1Help" class="form-text">Please input patient's emergency contact address line 1.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="NokAddress2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" v-model="form.NokAddress2" id="NokAddress2" aria-describedby="NokAddress2Help" required>
                                <div id="NokAddress2Help" class="form-text">Please input patient's emergency contact address line 2.</div>
                            </div>
                        </div>
                    </div>                             
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="NokState" class="form-label">State</label>
                                <select class="form-select" v-model="form.NokState" id="NokState" aria-label="NokStateHelp" aria-describedby="NokStateHelp" required>                                    
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
                                <div id="NokStateHelp" class="form-text">Please input patient's emergency contact state.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="NokPostcode" class="form-label">Postcode</label>
                                <input type="text" class="form-control" v-model="form.NokPostcode" @keypress="isNumber($event)" id="NokPostcode" aria-describedby="NokPostcodeHelp" maxlength="6" required>
                                <div id="NokPostcodeHelp" class="form-text">Please input patient's emergency contact postcode.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="NokCity" class="form-label">City</label>
                                <input type="text" class="form-control" v-model="form.NokCity" id="NokCity" aria-describedby="NokCityHelp" required>
                                <div id="NokCityHelp" class="form-text">Please input patient's emergency contact city.</div>
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
                NokName: '',
                NokPhone: '',
                NokNric: '',
                NokRelationsip: '',
                NokNationality: 'Malaysia',                
                NokAddress1: '',
                NokAddress2: '',
                NokState: '',
                NokPostcode: '',
                NokCity: '',
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
        storePatientNextofKin() {
            axios
            .post("/api/family", {
                'patient_id': this.form.PatId,
                'name': this.form.NokName,
                'nric': this.form.NokNric,
                'phone': this.form.NokPhone,
                'relationship': this.form.NokRelationsip,                
                'country': this.form.NokNationality,
                'address_1': this.form.NokAddress1,
                'address_2': this.form.NokAddress2,
                'state': this.form.NokState,
                'postcode': this.form.NokPostcode,
                'city': this.form.NokCity,
            }).then(res=> {
                Swal.fire({
                    icon: 'success',
                    title: 'Inserted',
                    text: 'Next of Kin successfully registered!'
                }).then(res => {
                    if (res.isConfirmed) {
                        this.$router.push({name: 'PmsSpouseFamilyInformation'});
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