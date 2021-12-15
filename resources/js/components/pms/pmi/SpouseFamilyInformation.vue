<template>
  <div class="table-responsive container">
    <h1 class="">Spouse/Family Information</h1>

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
            <form @submit.prevent="updatePatientNextofKin">
              <div class="row">
                <div class="col-12">
                  <div class="mb-3">
                    <label for="NokName" class="form-label">Name</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.NokName"
                      oninput="this.value = this.value.toUpperCase()"
                      style="text-transform: uppercase"
                      id="NokName"
                      aria-describedby="NokNameHelp"
                      required
                    />
                    <div id="NokNameHelp" class="form-text">
                      Please input patient's emergency contact name.
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="NokPhone" class="form-label">Phone No.</label>
                    <input
                      type="phone"
                      class="form-control"
                      v-model="form.NokPhone"
                      id="NokPhone"
                      @keypress="isNumber($event)"
                      aria-describedby="NokPhoneHelp"
                      maxlength="12"
                      min="10"
                      required
                    />
                    <div id="NokPhoneHelp" class="form-text">
                      Please input patient's emergency contact number.
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="NokNric" class="form-label">NRIC</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.NokNric"
                      id="NokNric"
                      @keypress="isNumber($event)"
                      aria-describedby="NokNricHelp"
                      maxlength="12"
                      required
                    />
                    <div id="NokNricHelp" class="form-text">
                      Please input patient's emergency contact identification
                      number.
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="NokRelationsip" class="form-label"
                      >Relationship Status</label
                    >
                    <select
                      class="form-select"
                      v-model="form.NokRelationsip"
                      id="NokRelationsip"
                      aria-label="NokRelationsipHelp"
                      aria-describedby="NokRelationsipHelp"
                      required
                    >
                      <option value="Spouse">Spouse</option>
                      <option value="Parent">Parent</option>
                      <option value="Guardian">Guardian</option>
                      <option value="Sibling">Sibling</option>
                      <option value="Friend">Friend</option>
                    </select>
                    <div id="NokRelationsipHelp" class="form-text">
                      Please input patient's emergency contact relationship
                      status.
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="NokNationality" class="form-label"
                      >Country</label
                    >
                    <input
                      class="form-control"
                      type="text"
                      v-model="form.NokNationality"
                      id="NokNationality"
                      aria-label="NokNationality"
                      disabled
                    />
                    <div id="NokNationalityHelp" class="form-text">
                      Please input patient's emergency contact nationality.
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="NokAddress1" class="form-label"
                      >Address 1</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.NokAddress1"
                      id="NokAddress1"
                      aria-describedby="NokAddress1Help"
                      required
                    />
                    <div id="NokAddress1Help" class="form-text">
                      Please input patient's emergency contact address line 1.
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="mb-3">
                    <label for="NokAddress2" class="form-label"
                      >Address 2</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.NokAddress2"
                      id="NokAddress2"
                      aria-describedby="NokAddress2Help"
                      required
                    />
                    <div id="NokAddress2Help" class="form-text">
                      Please input patient's emergency contact address line 2.
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="mb-3">
                    <label for="NokState" class="form-label">State</label>
                    <select
                      class="form-select"
                      v-model="form.NokState"
                      id="NokState"
                      aria-label="NokStateHelp"
                      aria-describedby="NokStateHelp"
                      required
                    >
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
                    <div id="NokStateHelp" class="form-text">
                      Please input patient's emergency contact state.
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="mb-3">
                    <label for="NokPostcode" class="form-label">Postcode</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.NokPostcode"
                      @keypress="isNumber($event)"
                      id="NokPostcode"
                      aria-describedby="NokPostcodeHelp"
                      maxlength="6"
                      required
                    />
                    <div id="NokPostcodeHelp" class="form-text">
                      Please input patient's emergency contact postcode.
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                  <div class="mb-3">
                    <label for="NokCity" class="form-label">City</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="form.NokCity"
                      id="NokCity"
                      aria-describedby="NokCityHelp"
                      required
                    />
                    <div id="NokCityHelp" class="form-text">
                      Please input patient's emergency contact city.
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button
                    type="submit"
                    style="color: white"
                    class="w-100 btn btn-primary"
                  >
                    Update {{ this.form.NokName }}
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <div class="col">
              <button
                style="color: white"
                class="w-100 btn btn-danger"
                @click="deletePatientNextofKin(form.NokId)"
              >
                Delete {{ this.form.NokName }}
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

    <div class="card">
      <div class="card-header">List of registered patient's next of kin</div>
      <div class="card-body">
        <table class="table" id="familyInformationTable">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Name</th>
              <th scope="col">Insurance Id</th>
              <th scope="col">NRIC</th>
              <th scope="col">Phone</th>
              <th scope="col">Relationship</th>
              <th scope="col">Country</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="family in families" :key="family.id">
              <th scope="row">{{ family.id }}</th>
              <td>{{ family.name }}</td>
              <td>{{ family.insurance_id }}</td>
              <td>{{ family.nric }}</td>
              <td>{{ family.phone }}</td>
              <td>{{ family.relationship }}</td>
              <td>{{ family.country }}</td>
              <td>
                <!-- open modal -->
                <button
                  type="button"
                  class="btn btn-warning"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  @click="modalOpen(family.id)"
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
      families: [],
      familyUpdate: [],
      form: {
        PatId: "",
        NokId: "",
        NokName: "",
        NokPhone: "",
        NokNric: "",
        NokRelationsip: "",
        NokNationality: "Malaysia",
        NokAddress1: "",
        NokAddress2: "",
        NokState: "",
        NokPostcode: "",
        NokCity: "",
      },
    };
  },
  watch: {},
  created() {
    this.getPatientNextofKin();
  },
  methods: {
    getPatientNextofKin() {
      axios
        .get("/api/family")
        .then((res) => {
          this.families = res.data.data;
          $(document).ready(function () {
            $("#familyInformationTable").DataTable({
              data: this.families,
              retrieve: true,
              columnDefs: [
                {
                  targets: [7] /* column index */,
                  orderable: false /* true or false */,
                },
              ],
            });
          });
        })
        .catch((error) => {
          console.log(error);
        });
    },
    modalOpen(familyId) {
      axios
        .get("/api/family/" + familyId)
        .then((res) => {
          this.familyUpdate = res.data.data;
          this.form.PatId = this.familyUpdate.patient_id;
          this.form.NokId = this.familyUpdate.id;
          this.form.NokName = this.familyUpdate.name;
          this.form.NokPhone = this.familyUpdate.phone;
          this.form.NokNric = this.familyUpdate.nric;
          this.form.NokRelationsip = this.familyUpdate.relationship;
          this.form.NokNationality = this.familyUpdate.country;
          this.form.NokAddress1 = this.familyUpdate.address_1;
          this.form.NokAddress2 = this.familyUpdate.address_2;
          this.form.NokState = this.familyUpdate.state;
          this.form.NokPostcode = this.familyUpdate.postcode;
          this.form.NokCity = this.familyUpdate.city;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    updatePatientNextofKin() {
      axios
        .put("/api/family/" + this.form.NokId, {
          id: this.form.NokId,
          patient_id: this.form.PatId,
          name: this.form.NokName,
          nric: this.form.NokNric,
          phone: this.form.NokPhone,
          relationship: this.form.NokRelationsip,
          country: this.form.NokNationality,
          address_1: this.form.NokAddress1,
          address_2: this.form.NokAddress2,
          state: this.form.NokState,
          postcode: this.form.NokPostcode,
          city: this.form.NokCity,
        })
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Updated",
            text: "Next of Kin successfully updated!",
          }).then((res) => {
            if (res.isConfirmed) {
              $("#closeModal").click();
              this.getPatientNextofKin();
            }
          });
        })
        .catch((error) => {
          console.log(console.error);
        });
    },
    deletePatientNextofKin(NokId) {
      axios
        .delete("/api/family/" + NokId)
        .then((res) => {
          Swal.fire({
            icon: "success",
            title: "Deleted",
            text: "Next of Kin successfully deleted!",
          }).then((res) => {
            if (res.isConfirmed) {
              $("#closeModal").click();
              this.getPatientNextofKin();
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
