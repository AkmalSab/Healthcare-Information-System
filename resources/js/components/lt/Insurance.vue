<template>
  <div class="table-responsive container">
    <h1 class="">Insurance Lookup</h1>
    <blockquote class="blockquote">
      <p>View and Register Insurance 🚨</p>
    </blockquote>

    <div class="card mb-2">
      <div class="card-body">
        <form @submit.prevent="storePatientInsurance">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="mb-3">
                <label for="PatId" class="form-label">Patient name</label>
                <!-- <input type="hidden" class="form-control" v-model="form.PatId" oninput="this.value = this.value.toUpperCase()" style="text-transform:uppercase" id="PatId" aria-describedby="PatIdHelp" disabled> -->
                <!-- <input type="text" class="form-control" v-model="form.PatName" id="PatName" aria-describedby="PatNameHelp" disabled> -->
                <select
                  class="form-select"
                  v-model="form.PatId"
                  id="PatId"
                  aria-label="PatIdHelp"
                  aria-describedby="PatIdHelp"
                  required
                >
                  <option
                    v-for="patient in patients"
                    v-bind:key="patient.id"
                    v-bind:value="patient.id"
                  >
                    {{ patient.name }}
                  </option>
                </select>
                <div id="PatIdHelp" class="form-text">
                  This is patient's name.
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="mb-3">
                <label for="InsName" class="form-label">Insurance Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="form.InsName"
                  oninput="this.value = this.value.toUpperCase()"
                  style="text-transform: uppercase"
                  id="InsName"
                  aria-describedby="InsNameHelp"
                  required
                />
                <div id="InsNameeHelp" class="form-text">
                  Please input insurance's name.
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="mb-3">
                <label for="InsMedicalCardNumber" class="form-label"
                  >Medical Card Number</label
                >
                <input
                  type="text"
                  class="form-control"
                  v-model="form.InsMedicalCardNumber"
                  id="InsMedicalCardNumber"
                  @keypress="isNumber($event)"
                  aria-describedby="InsMedicalCardNumberHelp"
                  maxlength="10"
                  required
                />
                <div id="InsMedicalCardNumberHelp" class="form-text">
                  Please input insurance's contact number.
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div class="mb-3">
                <label for="InsType" class="form-label">Type</label>
                <input
                  class="form-control"
                  type="text"
                  v-model="form.InsType"
                  id="InsType"
                  aria-label="InsTypeHelp"
                />
                <div id="InsTypeHelp" class="form-text">
                  Please input insurance's nationality.
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="mb-3">
                <label for="InsExpiryDate" class="form-label"
                  >Expiry Date</label
                >
                <input
                  type="date"
                  class="form-control"
                  v-model="form.InsExpiryDate"
                  id="InsExpiryDate"
                  aria-describedby="InsExpiryDateHelp"
                  required
                />
                <div id="InsExpiryDateHelp" class="form-text">
                  Please input insurance's address line 1.
                </div>
              </div>
            </div>
          </div>
          <button
            type="submit"
            style="width: 100%; color: white"
            class="btn btn-primary"
          >
            Submit
          </button>
        </form>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      data-bs-backdrop="static"
      data-bs-keyboard="false"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Update Spouse/Family Information
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form @submit.prevent="updatePatientInsurance">
              <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="PatId" class="form-label">Patient name</label>
                    <input
                      type="hidden"
                      class="form-control"
                      v-model="updateform.PatId"
                      oninput="this.value = this.value.toUpperCase()"
                      style="text-transform: uppercase"
                      id="PatId"
                      aria-describedby="PatIdHelp"
                      disabled
                    />
                    <input
                      type="text"
                      class="form-control"
                      v-model="updateform.PatName"
                      id="PatName"
                      aria-describedby="PatNameHelp"
                      disabled
                    />
                    <div id="PatIdHelp" class="form-text">
                      This is patient's name.
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="InsName" class="form-label"
                      >Insurance Name</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      v-model="updateform.InsName"
                      oninput="this.value = this.value.toUpperCase()"
                      style="text-transform: uppercase"
                      id="InsName"
                      aria-describedby="InsNameHelp"
                      required
                    />
                    <div id="InsNameeHelp" class="form-text">
                      Please input insurance's name.
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="InsMedicalCardNumber" class="form-label"
                      >Medical Card Number</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      v-model="updateform.InsMedicalCardNumber"
                      id="InsMedicalCardNumber"
                      @keypress="isNumber($event)"
                      aria-describedby="InsMedicalCardNumberHelp"
                      maxlength="10"
                      required
                    />
                    <div id="InsMedicalCardNumberHelp" class="form-text">
                      Please input insurance's contact number.
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="InsType" class="form-label">Type</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="updateform.InsType"
                      id="InsType"
                      aria-label="InsTypeHelp"
                    />
                    <div id="InsTypeHelp" class="form-text">
                      Please input insurance's nationality.
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="InsExpiryDate" class="form-label"
                      >Expiry Date</label
                    >
                    <input
                      type="date"
                      class="form-control"
                      v-model="updateform.InsExpiryDate"
                      id="InsExpiryDate"
                      aria-describedby="InsExpiryDateHelp"
                      required
                    />
                    <div id="InsExpiryDateHelp" class="form-text">
                      Please input insurance's address line 1.
                    </div>
                  </div>
                </div>
              </div>
              <button
                type="submit"
                style="width: 100%; color: white"
                class="btn btn-primary"
              >
                Update {{ this.updateform.InsName }}
              </button>
            </form>
          </div>
          <div class="modal-footer">
            <div class="col">
              <button
                style="color: white"
                class="w-100 btn btn-danger"
                @click="deletePatientInsurance(updateform.id)"
              >
                Delete {{ this.updateform.InsName }}
              </button>
            </div>
            <div class="col">
              <button
                type="button"
                id="closeModal"
                class="float-end btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <div class="card mt-3">
      <div class="card-body">
        <table class="table text-center" id="insuranceInformationTable">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Patiend Name</th>
              <th scope="col">Name</th>
              <th scope="col">Medical Card Number</th>
              <th scope="col">Type</th>
              <th scope="col">Expiry Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="insurance in insurances" :key="insurance.id">
              <th scope="row">{{ insurance.id }}</th>
              <td>{{ insurance.patient.name }}</td>
              <td>{{ insurance.name }}</td>
              <td>{{ insurance.medical_card_no }}</td>
              <td>{{ insurance.type }}</td>
              <td>{{ insurance.expiry_date }}</td>
              <td>
                <!-- open modal -->
                <button
                  type="button"
                  class="btn btn-warning"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  @click="modalOpen(insurance.id)"
                >
                  Edit
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
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";

export default {
  components: {},
  data() {
    return {
      insurances: [],
      insuranceUpdate: [],
      patients: [],
      updateform: {
        PatId: "",
        InsName: "",
        InsMedicalCardNumber: "",
        InsType: "",
        InsExpiryDate: "",
        id: "",
      },
      form: {
        PatName: "",
        PatId: "",
        InsName: "",
        InsMedicalCardNumber: "",
        InsType: "",
        InsExpiryDate: "",
      },
    };
  },
  watch: {},
  created() {
    this.getPatientInsurances();
    this.getPatient();
  },
  methods: {
    getPatientInsurances() {
      axios
        .get("/api/insurance")
        .then((res) => {
          this.insurances = res.data.data;
          $(document).ready(function () {
            $("#insuranceInformationTable").DataTable({
                bRetrieve: true,
                columnDefs: [{ orderable: false, targets: 6 }]
            });
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
    modalOpen(insuranceId) {
      axios
        .get("/api/insurance/" + insuranceId)
        .then((res) => {
          this.insuranceUpdate = res.data.data;

          this.updateform.id = this.insuranceUpdate.id;
          this.updateform.PatId = this.insuranceUpdate.patient_id;
          this.updateform.PatName = this.insuranceUpdate.patient.name;
          this.updateform.InsName = this.insuranceUpdate.name;
          this.updateform.InsMedicalCardNumber =
            this.insuranceUpdate.medical_card_no;
          this.updateform.InsType = this.insuranceUpdate.type;
          this.updateform.InsExpiryDate = this.insuranceUpdate.expiry_date;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getPatient() {
      axios
        .get("/api/patient/")
        .then((res) => {
          this.patients = res.data.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    updatePatientInsurance() {
      axios
        .put("/api/insurance/" + this.updateform.id, {
          id: this.updateform.id,
          patient_id: this.updateform.PatId,
          name: this.updateform.InsName,
          medical_card_no: this.updateform.InsMedicalCardNumber,
          type: this.updateform.InsType,
          expiry_date: this.updateform.InsExpiryDate,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Update",
            text: "Insurance successfully updated!",
          }).then((res) => {
            if (res.isConfirmed) {
              $("#closeModal").click();
              this.getPatientInsurances();
            }
          });
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    deletePatientInsurance(insuranceId) {
      axios
        .delete("/api/insurance/" + insuranceId)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Deleted",
            text: "Insurance successfully deleted!",
          }).then((res) => {
            if (res.isConfirmed) {
              $("#closeModal").click();
              this.getPatientInsurances();
            }
          });
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    storePatientInsurance() {
      axios
        .post("/api/insurance", {
          patient_id: this.form.PatId,
          name: this.form.InsName,
          medical_card_no: this.form.InsMedicalCardNumber,
          type: this.form.InsType,
          expiry_date: this.form.InsExpiryDate,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Inserted",
            text: "Insurance successfully registered!",
          }).then((res) => {
            if (res.isConfirmed) {
                $("#insuranceInformationTable").DataTable().destroy()
                this.getPatientInsurances();
            }
          });
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    isNumber(evt) {
      evt = evt ? evt : window.event;
      var charCode = evt.which ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        evt.preventDefault();
      }
      return true;
    },
  },
};
</script>
