<template>
  <div class="container">
    <h1>Create Prescription</h1>
    <blockquote class="blockquote">
      <p>Create a new prescription for a patient here.</p>
    </blockquote>
    <figcaption class="blockquote-footer">
      Someone famous in <cite title="Source Title">Wan-Bissaka</cite>
    </figcaption>
    <div v-if="showMessage" class="alert alert-success">
      {{ message }}
    </div>

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
              <v-select
                class="mt-2"
                :options="patientData"
                label="name"
                v-model="selectedPatient"
              ></v-select>
            </div>
            <div class="col">
              <label class="form-label">Select Medicine</label>

              <div v-for="(meds, index) in selectedMedicine" :key="meds.id">
                <v-select
                  class="mt-2"
                  :options="medicineData"
                  label="name"
                  v-model="selectedMedicine[index]"
                ></v-select>
              </div>
            </div>
          </div>
          <div class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" v-model="form.switch" ref="switchFunction" @click="switchFunction">
            <label class="form-check-label" for="flexSwitchCheckDefault">By Consultation</label>
          </div>
          <div class="row mb-3" v-if="form.switch === false">
            <div class="col">
              <label class="form-label">Appointment ID</label>
                <v-select
                  :options="appointmentData"
                  label="description"
                  v-model="appt"
                ></v-select>
            </div>
          </div>
          <div class="row mb-3" v-if="form.switch === true">
            <div class="col">
              <label class="form-label">Consultation ID</label>
                <v-select
                  :options="consultationData"
                  label="diagnosis"
                  v-model="consult"
                ></v-select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Start Date Consume Drug</label>
              <div
                class="input-group mb-2"
                v-for="(date, index) in startDateMedicine"
                :key="date.id"
              >
                <span class="input-group-text">📅</span>
                <input
                  type="date"
                  class="form-control"
                  v-model="startDateMedicine[index]"
                />
              </div>
            </div>
            <div class="col">
              <label class="form-label">Drug Frequency</label>
              <div
                class="input-group mb-2"
                v-for="(frequency, index) in medicineFrequency"
                :key="frequency.id"
              >
                <input
                  type="number"
                  class="form-control"
                  v-model="medicineFrequency[index]"
                />
              </div>
            </div>
            <div class="col">
              <label class="form-label">Drug Quantity</label>
              <div
                class="input-group mb-2"
                v-for="(quantity, index) in medicineQuantity"
                :key="quantity.id"
              >
                <input
                  type="number"
                  class="form-control"
                  v-model="medicineQuantity[index]"
                />
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
                    v-model="form.description"
                  ></textarea>
                  <label>Description for this prescription</label>
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
                    v-model="form.instruction"
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
                style="color: white"
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
      showMessage: false,
      patientData: [],
      medicineData: [],
      selectedPatient: 0,
      selectedMedicine: [],
      startDateMedicine: [],
      medicineFrequency: [],
      medicineQuantity: [],
      prescriptionJSON: [],
      appointmentData: [],
      consultationData: [],
      appt: "",
      consult: "",
      form: {
        description: "",
        instruction: "",
        startDate: "",
        drugFrequency: "",
        drugQuantity: "",
        switch: false,
      },
    };
  },
  created() {
    this.getPatientData();
    this.getMedicineData();
    this.addRow();
    this.fetchJSON();
  },
  methods: {
      switchFunction() {
        if(this.$refs.switchFunction.checked == false) {
            this.form.switch = false
        } else {
            this.form.switch = true
        }
    },
    getPatientData() {
      axios
        .get("/api/prescription")
        .then((res) => {
          this.patientData = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getMedicineData() {
      axios
        .get("/api/medicine")
        .then((res) => {
          this.medicineData = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getAppointment() {
      axios
        .get("/api/patient/appointment/" + this.selectedPatient.id)
        .then((res) => {
          this.appointmentData = res.data;
        })
        .catch((error) => {
          console.log(console.error());
        });
    },
    getConsultation() {
      axios
        .get("/api/patient/consultation/" + this.selectedPatient.id)
        .then((res) => {
          this.consultationData = res.data;
        })
        .catch((error) => {
          console.log(console.error());
        });
    },
    postData() {
      axios
        .post("/api/prescription/save", {
          desc: this.form.description,
          instruction: this.form.instruction,
          patient: JSON.stringify(this.selectedPatient),
          appointment: JSON.stringify(this.appt),
          consultation: JSON.stringify(this.consult)
        })
        .then((res) => {
          axios
            .get("/api/prescription/json")
            .then((res) => {
              this.prescriptionJSON = res.data;
              for (let z = 0; z < this.selectedMedicine.length; z++) {
                axios
                  .post("/api/prescription", {
                    desc: this.form.description,
                    instruction: this.form.instruction,
                    start: JSON.stringify(this.startDateMedicine[z]),
                    frequency: JSON.stringify(this.medicineFrequency[z]),
                    quantity: JSON.stringify(this.medicineQuantity[z]),
                    patient: JSON.stringify(this.selectedPatient),
                    medicine: JSON.stringify(this.selectedMedicine[z]),
                    prescription: JSON.stringify(this.prescriptionJSON)
                  })
                  .then((res) => {
                    this.showMessage = true;
                    this.message = "Successfully inserted! 💥";
                  })
                  .catch((error) => {
                    console.log(console.error);
                  });
              }
            })
            .catch((error) => {
              console.log(error);
            });
        });
    },
    fetchJSON() {
      axios
        .get("/api/prescription/json")
        .then((res) => {
          this.prescriptionJSON = res.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    addRow() {
      this.selectedMedicine.push("");
      this.startDateMedicine.push("");
      this.medicineFrequency.push("");
      this.medicineQuantity.push("");
    },
  },
  watch: {
    'selectedPatient': function (val) {
      //do something when the data changes.
      if (val) {
        this.getAppointment();
        this.getConsultation();
      }
    },
  },
};
</script>

<style></style>
