<template>
    <div class="container">
        <h1>Patient Consultation Form</h1>
        <blockquote class="blockquote">
            <p>This form is for patient consultation form.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
        </figcaption>
        <div class="card">
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
                            >
                                <option selected>Open this select menu</option>
                                <option value="Malaysia">Malaysia</option>
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
                        >
                            Refresh
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
                <button
                    class="btn btn-primary"
                    style="color: white; width: 100%"
                >
                    Submit
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import AOS from 'aos';
import 'aos/dist/aos.css';

export default {
    data() {
        return {
            vaxInfo: [],
            nric: "",
            phoneNo: ""
        };
    },
    created () {
        AOS.init({
            duration: 500,
            once: true
        });
    },
    methods: {
        getVaxInfo() {
            this.nric = parseInt(this.nric);
            this.phoneNo = parseInt(this.phoneNo);

            var self = this; // create a closure to access component in the callback below
            $.getJSON(
                "https://api.vaksincovid.gov.my/semakstatus/westfunction?name=" +
                    this.nric +
                    "-bsep-" +
                    this.phoneNo +
                    "",
                function(data) {
                    self.vaxInfo = data;
                }
            );
        }
    }
};
</script>

<style></style>
