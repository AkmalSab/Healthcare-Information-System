<template>
    <div class="container">
        <h1>Create Prescription</h1>
        <blockquote class="blockquote">
            <p>Create a new prescription for a patient here.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Wan-Bissaka</cite>
        </figcaption>

        <div class="card">
            <div class="card-body">
                <form @submit.prevent="postData">
                    <div class="row mb-3">
                        <div class="col">
                            <button
                                type="button"
                                class="btn btn-success"
                                @click="addRow()"
                                style="width: 100%; color: white"
                            >
                                Add Multiple Medicine ➕
                            </button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Select Patient</label>
                            <!-- <select
                                class="form-select"
                                v-model="selectedPatient"
                            >
                                <option
                                    v-for="patientNameList in patientData"
                                    :key="patientNameList.id"
                                    :value="patientNameList.id"
                                    >{{ patientNameList.name }}</option
                                >
                            </select> -->

                            <v-select
                                class="mt-2"
                                :options="patientData"
                                label="name"
                                v-model="selectedPatient"
                            ></v-select>
                        </div>
                        <div class="col">
                            <label class="form-label">Select Medicine</label>

                            <div
                                v-for="(meds, index) in selectedMedicine"
                                :key="meds.id"
                            >
                                <!-- <select
                                    class="form-select mb-2"
                                    v-model="selectedMedicine[index]"
                                >
                                    <option
                                        v-for="medsList in medicineData"
                                        :key="medsList.id"
                                        :value="medsList.id"
                                        >{{ medsList.name }}</option
                                    >
                                </select> -->

                                <v-select
                                    class="mt-2"
                                    :options="medicineData"
                                    label="name"
                                    v-model="selectedMedicine[index]"
                                ></v-select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Appointment ID</label>
                            <select class="form-select">
                                <option value="n/a" selected
                                    >Not Available</option
                                >
                                <option value="Type 2">Two</option>
                                <option value="Type 3">Three</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label"
                                >Start Date Taking Drugs</label
                            >
                            <div class="input-group">
                                <span class="input-group-text">Date</span>
                                <input type="date" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">Drug Frequency</label>
                            <div class="input-group">
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="col mb-3">
                                <label class="form-label">Description</label>
                                <div class="form-floating">
                                    <textarea
                                        class="form-control"
                                        placeholder="Leave a comment here"
                                        style="height: 100px"
                                    ></textarea>
                                    <label
                                        >Description for this
                                        prescription</label
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col mb-3">
                                <label class="form-label">Instruction</label>
                                <div class="form-floating">
                                    <textarea
                                        class="form-control"
                                        placeholder="Leave a comment here"
                                        style="height: 100px"
                                    ></textarea>
                                    <label>Instructions for patient</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <router-link
                                :to="{ name: 'pisIndex' }"
                                class="btn btn-danger w-100"
                                style="color: white"
                                >Return to PIS</router-link
                            >
                        </div>
                        <div class="col">
                            <button
                                class="btn btn-primary w-100"
                                style="color:white"
                                type="submit"
                            >
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import "vue-select/dist/vue-select.css";

export default {
    data() {
        return {
            patientData: [],
            medicineData: [],
            selectedPatient: 0,
            selectedMedicine: []
        };
    },
    created() {
        this.getPatientData();
        this.getMedicineData();
        this.addRow();
    },
    methods: {
        getPatientData() {
            axios
                .get("/api/prescription")
                .then(res => {
                    this.patientData = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getMedicineData() {
            axios
                .get("/api/medicine")
                .then(res => {
                    this.medicineData = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        addRow() {
            this.selectedMedicine.push("");
        }
    }
};
</script>

<style></style>
