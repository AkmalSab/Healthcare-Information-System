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
                                <input type="text" class="form-control" v-model="form.patName" id="patName" aria-describedby="patNameHelp" required>
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
                                <select class="form-select" v-model="form.patOccupation" id="occupation" aria-label="patOccupation" aria-describedby="patOccupationHelp" required>
                                    <option selected>Open this select menu</option>
                                    <optgroup label="Healthcare Practitioners and Technical Occupations:">
                                        <option value="1">-  Chiropractor</option>
                                        <option value="2">-  Dentist</option>
                                        <option value="3">-  Dietitian or Nutritionist</option>
                                        <option value="4">-  Optometrist</option>
                                        <option value="5">-  Pharmacist</option>
                                        <option value="6">-  Physician</option>
                                        <option value="7">-  Physician Assistant</option>
                                        <option value="8">-  Podiatrist</option>
                                        <option value="9">-  Registered Nurse</option>
                                        <option value="10">-  Therapist</option>
                                        <option value="11">-  Veterinarian</option>
                                        <option value="12">-  Health Technologist or Technician</option>
                                        <option value="13">-  Other Healthcare Practitioners and Technical Occupation</option>
                                    </optgroup>
                                        <optgroup label="Healthcare Support Occupations:">
                                        <option value="14">-  Nursing, Psychiatric, or Home Health Aide</option>
                                        <option value="15">-  Occupational and Physical Therapist Assistant or Aide</option>
                                        <option value="16">-  Other Healthcare Support Occupation</option>
                                    </optgroup>
                                    <optgroup label="Business, Executive, Management, and Financial Occupations:">
                                        <option value="17">-  Chief Executive</option>
                                        <option value="18">-  General and Operations Manager</option>
                                        <option value="19">-  Advertising, Marketing, Promotions, Public Relations, and Sales Manager</option>
                                        <option value="20">-  Operations Specialties Manager (e.g., IT or HR Manager)</option>
                                        <option value="21">-  Construction Manager</option>
                                        <option value="22">-  Engineering Manager</option>
                                        <option value="23">-  Accountant, Auditor</option>
                                        <option value="24">-  Business Operations or Financial Specialist</option>
                                        <option value="25">-  Business Owner</option>
                                        <option value="26">-  Other Business, Executive, Management, Financial Occupation</option>
                                    </optgroup>
                                    <optgroup label="Architecture and Engineering Occupations:">
                                        <option value="27">-  Architect, Surveyor, or Cartographer</option>
                                        <option value="28">-  Engineer</option>
                                        <option value="29">-  Other Architecture and Engineering Occupation</option>
                                    </optgroup>
                                    <optgroup label="Education, Training, and Library Occupations:">
                                        <option value="30">-  Postsecondary Teacher (e.g., col-sm-12 col-md-6 col-lg-6lege Professor)</option>
                                        <option value="31">-  Primary, Secondary, or Special Education School Teacher</option>
                                        <option value="32">-  Other Teacher or Instructor</option>
                                        <option value="33">-  Other Education, Training, and Library Occupation</option>
                                    </optgroup>
                                    <optgroup label="Other Professional Occupations:">
                                        <option value="34">-  Arts, Design, Entertainment, Sports, and Media Occupations</option>
                                        <option value="35">-  Computer Specialist, Mathematical Science</option>
                                        <option value="36">-  Counselor, Social Worker, or Other Community and Social Service Specialist</option>
                                        <option value="37">-  Lawyer, Judge</option>
                                        <option value="38">-  Life Scientist (e.g., Animal, Food, Soil, or Biological Scientist, Zoologist)</option>
                                        <option value="39">-  Physical Scientist (e.g., Astronomer, Physicist, Chemist, Hydrologist)</option>
                                        <option value="40">-  Religious Worker (e.g., Clergy, Director of Religious Activities or Education)</option>
                                        <option value="41">-  Social Scientist and Related Worker</option>
                                        <option value="42">-  Other Professional Occupation</option>
                                    </optgroup>
                                    <optgroup label="Office and Administrative Support Occupations:">
                                        <option value="43">-  Supervisor of Administrative Support Workers</option>
                                        <option value="44">-  Financial Clerk</option>
                                        <option value="45">-  Secretary or Administrative Assistant</option>
                                        <option value="46">-  Material Recording, Scheduling, and Dispatching Worker</option>
                                        <option value="47">-  Other Office and Administrative Support Occupation</option>
                                    </optgroup>
                                    <optgroup label="Services Occupations:">
                                        <option value="48">-  Protective Service (e.g., Fire Fighting, Police Officer, Correctional Officer)</option>
                                        <option value="49">-  Chef or Head Cook</option>
                                        <option value="50">-  Cook or Food Preparation Worker</option>
                                        <option value="51">-  Food and Beverage Serving Worker (e.g., Bartender, Waiter, Waitress)</option>
                                        <option value="52">-  Building and Grounds Cleaning and Maintenance</option>
                                        <option value="53">-  Personal Care and Service (e.g., Hairdresser, Flight Attendant, Concierge)</option>
                                        <option value="54">-  Sales Supervisor, Retail Sales</option>
                                        <option value="55">-  Retail Sales Worker</option>
                                        <option value="56">-  Insurance Sales Agent</option>
                                        <option value="57">-  Sales Representative</option>
                                        <option value="58">-  Real Estate Sales Agent</option>
                                        <option value="59">-  Other Services Occupation</option>
                                    </optgroup>
                                    <optgroup label="Agriculture, Maintenance, Repair, and Skilled Crafts Occupations:">
                                        <option value="60">-  Construction and Extraction (e.g., Construction Laborer, Electrician)</option>
                                        <option value="61">-  Farming, Fishing, and Forestry</option>
                                        <option value="62">-  Installation, Maintenance, and Repair</option>
                                        <option value="63">-  Production Occupations</option>
                                        <option value="64">-  Other Agriculture, Maintenance, Repair, and Skilled Crafts Occupation</option>
                                    </optgroup>
                                    <optgroup label="Transportation Occupations:">
                                        <option value="65">-  Aircraft Pilot or Flight Engineer</option>
                                        <option value="66">-  Motor Vehicle Operator (e.g., Ambulance, Bus, Taxi, or Truck Driver)</option>
                                        <option value="67">-  Other Transportation Occupation</option>
                                    </optgroup>
                                    <optgroup label="Other Occupations:">
                                        <option value="68">-  Military</option>
                                        <option value="69">-  Homemaker</option>
                                        <option value="70">-  Student</option>
                                        <option value="72">-  Not Applicable</option>
                                    </optgroup>
                                </select>
                                <div id="patMaritialHelp" class="form-text">Please input patient occupation.</div>
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
                this.$router.push({name: 'PmsIndex'});
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