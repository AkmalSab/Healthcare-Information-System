<template>
    <div class="container">
        <h1>Consultation Information System</h1>
        <blockquote class="blockquote">
            <p>This form is for patient consultation form.</p>
        </blockquote>
        <div v-if="showMessage" class="alert alert-success">
            {{ message }}
        </div>
        <div class="card">
            <form @submit.prevent="storeConsultation">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="selectPat" class="form-label"
                                >Select Patient</label
                            >
                            <select
                                class="form-select"
                                aria-label="Default select example"
                                aria-describedby="selectPatHelp"
                                @change="assignPatientData()"
                                v-model="patientID"
                            >
                                <option selected>Open this select menu</option>
                                <option v-for="(patientNameList) in patientData" :key="patientNameList.id" :value="patientNameList.id">{{ patientNameList.name }}</option>
                            </select>
                            <div id="selectPatHelp" class="form-text">
                                Please choose patient.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Diagnosis or Problem</label>
                        <div class="form-floating">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="floatingTextarea2"
                                style="height: 100px"
                                v-model="diagnose"
                            ></textarea>
                            <label for="floatingTextarea2">Remark</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Signs and Symptoms</label>
                        <div class="form-floating">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="floatingTextarea2"
                                style="height: 100px"
                                v-model="symptoms"
                            ></textarea>
                            <label for="floatingTextarea2">Remark</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Allergy Information</label>
                        <div class="form-floating">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="floatingTextarea2"
                                style="height: 100px"
                                v-model="allergy"
                            ></textarea>
                            <label for="floatingTextarea2">Remark</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="selectBlood" class="form-label"
                                >Select Blood Group</label
                            >
                            <select
                                class="form-select"
                                aria-label="Default select example"
                                aria-describedby="selectBloodHelp"
                                v-model="bloodGroup"
                            >
                                <option selected>Open this select menu</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                            <div id="selectBloodHelp" class="form-text">
                                Please choose blood group.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Medication Information</label>
                        <div class="form-floating">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="floatingTextarea2"
                                style="height: 100px"
                                v-model="medication"
                            ></textarea>
                            <label for="floatingTextarea2">Remark</label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col mb-3">
                        <label class="form-label">Social History</label>
                        <div class="form-floating">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="floatingTextarea2"
                                style="height: 100px"
                                v-model="socialHistory"
                            ></textarea>
                            <label for="floatingTextarea2">Remark</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Family History</label>
                        <div class="form-floating">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="floatingTextarea2"
                                style="height: 100px"
                                v-model="familyHistory"
                            ></textarea>
                            <label for="floatingTextarea2">Remark</label>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Disability Information</label>
                        <div class="form-floating">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="floatingTextarea2"
                                style="height: 100px"
                                v-model="disabilityHistory"
                            ></textarea>
                            <label for="floatingTextarea2">Remark</label>
                        </div>
                    </div>
                </div>
                <h4>
                    Immunisation Record (Vaccine)<span
                        ><button
                            class="btn btn-outline-danger btn-sm ms-3"
                            @click="getVaxInfo()"
                            type="button"
                        >
                            Show Data
                        </button></span
                    >
                </h4>
                <div class="row mb-3">
                    <div class="col">
                        <label>Input NRIC</label>
                        <input
                            type="text"
                            maxlength="12"
                            class="form-control"
                            v-model="nric"
                        />
                    </div>
                    <div class="col">
                        <label>Input Phone No.</label>
                        <input
                            type="text"
                            maxlength="12"
                            class="form-control"
                            v-model="phoneNo"
                        />
                    </div>
                </div>
                <div v-if="vaxInfo.length !== 0" data-aos="fade-down">
                    <div class="row">
                        <div class="col">
                            <div class="mt-3">
                                <h5>Name</h5>
                                {{ vaxInfo.appt_name }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Kad Pengenalan / Nombor Pasport</h5>
                                {{ vaxInfo.appt_id }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Nombor Telefon</h5>
                                {{ vaxInfo.appt_phone }}
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col">
                            <div class="mt-3">
                                <h5>Janji Temu Dos-1</h5>
                                DOS 1
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Fasiliti Kesihatan</h5>
                                {{ vaxInfo.appt_facility1 }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Lokasi Pusat Pemberian Vaksinasi</h5>
                                {{ vaxInfo.appt_location1 }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mt-3">
                                <h5>Status Janji Temu</h5>
                                <span
                                    class="badge bg-success"
                                    v-if="vaxInfo.appt_complete1 == 1"
                                    >Selesai</span
                                >
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Tarikh janji temu</h5>
                                {{ vaxInfo.appt_date1 }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Masa janji temu</h5>
                                {{ vaxInfo.appt_time1 }}
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col">
                            <div class="mt-3">
                                <h5>Janji Temu Dos-2</h5>
                                DOS 2
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Fasiliti Kesihatan</h5>
                                {{ vaxInfo.appt_facility2 }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Lokasi Pusat Pemberian Vaksinasi</h5>
                                {{ vaxInfo.appt_location2 }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mt-3">
                                <h5>Status Janji Temu</h5>
                                <span
                                    class="badge bg-success"
                                    v-if="vaxInfo.appt_complete2 == 1"
                                    >Selesai</span
                                >
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Tarikh janji temu</h5>
                                {{ vaxInfo.appt_date2 }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="mt-3">
                                <h5>Masa janji temu</h5>
                                {{ vaxInfo.appt_time2 }}
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="row">
                    <div class="col">
                        <button
                            class="btn btn-primary"
                            style="color: white; width: 100%"
                            type="submit"
                        >
                            Submit
                        </button>
                    </div>
                    <div class="col">
                        <router-link :to="{name: 'cisConsultationHistory'}" class="btn btn-success w-100" style="color: white">View Consultation History</router-link>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</template>

<script>
import AOS from 'aos';
import 'aos/dist/aos.css';

export default {
    data() {
        return {
            showMessage: false,
            message: '',
            vaxInfo: [],
            patientData: [],
            selectedPatientData: [],
            nric: "",
            phoneNo: "",
            patientID: "",
            diagnose: "",
            symptoms: "",
            allergy: "",
            bloodGroup: "",
            medication: "",
            socialHistory: "",
            familyHistory: "",
            disabilityHistory: ""
        };
    },
    created () {
        AOS.init({
            duration: 500,
            once: true
        })
        this.getPatientName()
    },
    methods: {
        getVaxInfo() {
            if (this.nric.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'NRIC or Phone is empty!'
                })
            } else {
                this.nric = parseInt(this.nric);
                this.phoneNo = parseInt(this.phoneNo);

                var self = this;
                $.getJSON(
                    "https://api.vaksincovid.gov.my/semakstatus/westfunction?name=" +
                        this.nric +
                        "-bsep-" +
                        this.phoneNo +
                        "",
                    function(data) {
                        self.vaxInfo = data;
                    }
                ).fail(function(jqXHR, textStatus, errorThrown) { alert('getJSON request failed! ' + textStatus); });
            }
        },
        getPatientName() {
            axios.get('/api/patient/patient-info')
                .then(res => {
                    this.patientData = res.data
                }).catch(error => {
                console.log(console.error())
            })
        },
        assignPatientData() {
            axios.get('/api/patient/patient-info/' + this.patientID)
                .then(res => {
                    this.selectedPatientData = res.data
                    this.nric = res.data[0].nric
                    this.phoneNo = res.data[0].phone
                }).catch(error => {
                console.log(console.error())
            })
        },
        storeConsultation() {
            let formData = new FormData();

            formData.append("patientID", this.patientID)
            formData.append("diagnose", this.diagnose)
            formData.append("symptoms", this.symptoms)
            formData.append("blood", this.bloodGroup)
            formData.append("allergy", this.allergy)
            formData.append("medication", this.medication)
            formData.append("socialHistory", this.socialHistory)
            formData.append("familyHistory", this.familyHistory)
            formData.append("disabilityHistory", this.disabilityHistory)

            axios.post('/api/consultation', formData).then(res => {
                this.showMessage = true
                this.message = 'Successfully inserted! 💥'
            }).catch(error => {
                this.showMessage = true
                this.message = error
            })
        }
    }
};
</script>

<style></style>
