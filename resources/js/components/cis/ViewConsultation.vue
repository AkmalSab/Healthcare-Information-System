<template>
    <div class="container">
        <h1>Patient Consultation History</h1>
        <blockquote class="blockquote">
            <p>This form is for patient consultation form.</p>
        </blockquote>

        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Patient Consultation History
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label>Patient Name</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patName">
                            </div>
                            <div class="col">
                                <label>Patient NRIC</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patNRIC">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <label>Blood</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patBlood">
                            </div>
                            <div class="col">
                                <label>Medication</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patMedication">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <label>Diagnosis</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patDiagnosis">
                            </div>
                            <div class="col">
                                <label>Symptoms</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patSymptoms">
                            </div>
                            <div class="col">
                                <label>Allergy</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patAllergy">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <label>Social History</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patSocial">
                            </div>
                            <div class="col">
                                <label>Family History</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patFamily">
                            </div>
                            <div class="col">
                                <label>Disability History</label>
                                <input type="text" readonly class="form-control-plaintext fs-3" v-model="modal.patDisability">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Close
                        </button>
                        <button type="button" class="btn btn-primary" style="color: white">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <div class="card">
            <div class="card-body">
                <table class="table text-center">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Patient IC</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(consultation, index) in consultationData"
                            :key="consultation.id"
                        >
                            <th scope="row">{{ consultation.id }}</th>
                            <td>{{ consultation.patient_name }}</td>
                            <td>{{ consultation.patient_nric }}</td>
                            <td>
                                {{
                                    consultation.patient_created_date
                                        | formatDate
                                }}
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    style="color: white"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    @click="modalOpen(index, consultation.id)"
                                >
                                    View
                                </button>
                                <router-link :to="{name: 'pisCreatePrescription'}" class="btn btn-success" style="color: white">Order Prescription</router-link>
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    style="color: white"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            active: 0,
            consultationData: [],
            modal: {
                patName: '',
                patNRIC: '',
                patDiagnosis: '',
                patSymptoms: '',
                patBlood: '',
                patAllergy: '',
                patMedication: '',
                patSocial: '',
                patFamily: '',
                patDisability: ''
            }
        };
    },
    created() {
        this.getConsultationData();
    },
    methods: {
        modalOpen: function(i, id) {
            this.modal.patName = this.consultationData[i].patient_name
            this.modal.patNRIC = this.consultationData[i].patient_nric
            this.modal.patDiagnosis = this.consultationData[i].patient_diagnosis
            this.modal.patSymptoms = this.consultationData[i].patient_symptoms
            this.modal.patBlood = this.consultationData[i].patient_blood
            this.modal.patAllergy = this.consultationData[i].patient_allergy
            this.modal.patMedication = this.consultationData[i].patient_medication
            this.modal.patSocial = this.consultationData[i].patient_social_hist
            this.modal.patFamily = this.consultationData[i].patient_family_hist
            this.modal.patDisability = this.consultationData[i].patient_disability_hist

            return this.active = i;
        },
        getConsultationData() {
            axios
                .get("/api/consultation")
                .then(res => {
                    this.consultationData = res.data.data;
                })
                .catch(error => {
                    console.log(console.error());
                });
        }
    }
};
</script>

<style></style>
