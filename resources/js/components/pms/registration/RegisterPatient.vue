<template>
    <div class="container">
        <h1 class="">Register Patient</h1>
        <blockquote class="blockquote">
            <p>This form is for patient registration.</p>
        </blockquote>
        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storePatient">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="patName" class="form-label">Name</label>
                                <input type="text" class="form-control" v-model="form.patName" oninput="this.value = this.value.toUpperCase()" style="text-transform:uppercase" id="patName" aria-describedby="patNameHelp" required>
                                <div id="patNameHelp" class="form-text">Please input patient name.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="patIC" class="form-label">NRIC</label>
                                <input type="text" class="form-control" v-model="form.patIC" @keypress="isNumber($event)" id="patIC" aria-describedby="patICHelp" maxlength="12" required>
                                <div id="patICHelp" class="form-text">Please input patient identification number.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="patPhone" class="form-label">Phone No.</label>
                                <input type="phone" class="form-control" v-model="form.patPhone" @keypress="isNumber($event)" id="patPhone" aria-describedby="patPhoneHelp" maxlength="12" min="10" required>
                                <div id="patPhoneHelp" class="form-text">Please input patient phone number.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="patMaritial" class="form-label">Maritial Status</label>
                                <select class="form-select" v-model="form.patMaritial" id="patMaritial" aria-label="patMaritialHelp" aria-describedby="patMaritialHelp" required>
                                    <option selected>Open this select menu</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Windowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                                <div id="patMaritialHelp" class="form-text">Please input patient maritial status.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="patOccupatio" class="form-label">Occupation</label>
                                <input type="text" class="form-control" v-model="form.patOccupation" id="occupation" aria-describedby="patOccupationHelp" required>                                
                                <div id="patOccupationHelp" class="form-text">Please input patient occupation.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="patDOB" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" v-model="form.patDOB" id="patDOB" aria-describedby="patDOBHelp" required>
                                <div id="patDOBHelp" class="form-text">Please input patient date of birth.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="patGender" class="form-label">Gender</label>
                                <select class="form-select" v-model="form.patGender" id="patGender" aria-label="patGender" aria-describedby="patGenderHelp" required>
                                    <option selected>Open this select menu</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div id="patGenderHelp" class="form-text">Please input patient gender.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="patReligion" class="form-label">Religion</label>
                                <select class="form-select" v-model="form.patReligion" id="patReligion" aria-label="patReligion" aria-describedby="patReligionHelp" required>
                                    <option selected>Open this select menu</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Buddhist">Buddhist</option>
                                    <option value="Christian">Christian</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Chinese Religionist">Chinese Religionist</option>
                                    <option value="Others">Others</option>
                                </select>
                                <div id="patReligionHelp" class="form-text">Please input patient religion.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="patCountry" class="form-label">Country</label>
                                <select class="form-select" v-model="form.patCountry" id="patCountry" aria-label="patCountry" aria-describedby="patCountryHelp" required>
                                    <option selected>Open this select menu</option>
                                    <option value="Malaysia">Malaysia</option>
                                </select>
                                <div id="patCountryHelp" class="form-text">Please input patient nationality.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="patRace" class="form-label">Race</label>
                                <select class="form-select" v-model="form.patRace" id="patRace" aria-label="patRace" aria-describedby="patRaceHelp" required>
                                    <option selected>Open this select menu</option>
                                    <option value="Malay">Malay</option>
                                    <option value="Chinese">Chinese</option>
                                    <option value="Indian">Indian</option>
                                    <option value="Others">Others</option>
                                </select>
                                <div id="patRaceHelp" class="form-text">Please input patient race.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="patAddress1" class="form-label">Address 1</label>
                                <input type="text" class="form-control" v-model="form.patAddress1" id="patAddress1" aria-describedby="patAddress1Help" required>
                                <div id="patAddress1Help" class="form-text">Please input patient address line 1.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="patAddress2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" v-model="form.patAddress2" id="patAddress2" aria-describedby="patAddress2Help" required>
                                <div id="patAddress2Help" class="form-text">Please input patient address line 2.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="patState" class="form-label">State</label>
                                <select class="form-select" v-model="form.patState" id="patState" aria-label="patStateHelp" aria-describedby="patStateHelp" required>                                    
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
                                <div id="patStateHelp" class="form-text">Please input patient state address.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="patPostcode" class="form-label">Postcode</label>
                                <input type="text" class="form-control" v-model="form.patPostcode" @keypress="isNumber($event)" id="patPostcode" aria-describedby="patPostcodeHelp" maxlength="6" required>
                                <div id="patPostcodeHelp" class="form-text">Please input postcode address.</div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="mb-3">
                                <label for="patCity" class="form-label">City</label>
                                <input type="text" class="form-control" v-model="form.patCity" id="patCity" aria-describedby="patCityHelp" required>
                                <div id="patCityHelp" class="form-text">Please input city address.</div>
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
            form: {
                patName: '',
                patIC: '',
                patPhone: '',
                patMaritial: '',
                patOccupation: '',
                patDOB: '',
                patGender: '',
                patReligion: '',
                patCountry: '',
                patRace: '',
                patAddress1: '',
                patAddress2: '',
                patState: '',
                patPostcode: '',
                patCity: '',
            },
        }
    },
    created() {

    },
    methods: {
        storePatient() {
            axios
            .post("/api/patient", {
                'name': this.form.patName,
                'nric': this.form.patIC,
                'phone': this.form.patPhone,
                'marital_status': this.form.patMaritial,
                'occupation': this.form.patOccupation,
                'birthdate': this.form.patDOB,
                'gender': this.form.patGender,
                'religion': this.form.patReligion,
                'country': this.form.patCountry,
                'race': this.form.patRace,
                'address_1': this.form.patAddress1,
                'address_2': this.form.patAddress2,
                'state': this.form.patState,
                'postcode': this.form.patPostcode,
                'city': this.form.patCity,
            }).then(res=> {
                Swal.fire({
                    icon: 'success',
                    title: 'Registered',
                    text: 'Patient successfully registered!'
                }).then(res => {
                    if (res.isConfirmed) {
                        this.$router.push({name: 'PmsIndex'});
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
