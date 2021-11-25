<template>
    <div class="container">
        <h1>Create Billing</h1>
        <blockquote class="blockquote">
            <p>This page is for billing purpose.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Wan-Bissaka</cite>
        </figcaption>
        <div v-if="showMessage" class="alert alert-success">
            {{ message }}
        </div>

        <!-- Modal -->
        <div class="modal fade" id="billingModal" tabindex="-1" aria-labelledby="billingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="billingModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" v-model="modalForm.medsQty">
                        <div class="form-text">
                            Please input medicine quantity.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" style="color:white">Save changes</button>
            </div>
            </div>
        </div>
        </div>
        <!-- End Modal -->

        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storeBilling">
                <div class="row">
                    <div class="col">
                        <label>Prescription ID</label>
                        <v-select
                            class="mt-2"
                            :options="Data"
                            label="pat_name"
                            v-model="form.prescID"
                        ></v-select>
                    </div>
                    <div class="col">
                        <label>Insurance ID</label>
                        <v-select
                            class="mt-2"
                            :options="Insurance"
                            label="name"
                            v-model="form.insID"
                        ></v-select>
                    </div>
                    <div class="col">
                        <label>Payment Type</label><br>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Online Banking" v-model="form.paymentType">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Online Banking
                        </label><br>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Cash" checked v-model="form.paymentType">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Cash
                        </label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-10">
                        <label>Prescription Desc</label>
                        <select
                            class="form-select"
                            v-model="form.presc"
                        >
                            <option selected>Open this select menu</option>
                            <option v-for="(patientMeds, index) in SelectedPatMeds" :key="patientMeds.index" :value="patientMeds.description">{{ patientMeds.description }}</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Medicine Qty</label>
                        <input type="number" class="form-control" v-model="form.qty">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label>Description</label>
                        <textarea class="form-control" cols="10" rows="5" v-model="form.desc"></textarea>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100" style="color: white">Create</button>
                    </div>
                </div>
                </form>

                <div class="row mt-3">
                    <div class="col">
                        <h5>Description</h5>
                        <h6>{{ SelectedPat.pres_desc }}</h6>
                    </div>
                    <div class="col">
                        <h5>Description</h5>
                        <h6>{{ SelectedPatMeds.pres_desc }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <table class="table" id="billingTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Insurance Name</th>
                            <th scope="col">Insurance Type</th>
                            <th scope="col">Payment Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(pay, index) in Payment" :key="pay.id">
                            <th scope="row">1</th>
                            <td>{{ pay.patient.name }}</td>
                            <td>{{ pay.insurance.name }}</td>
                            <td>{{ pay.insurance.type }}</td>
                            <td>{{ pay.payment }}</td>
                            <td>
                                <button class="btn btn-primary" style="color:white" data-bs-toggle="modal" data-bs-target="#billingModal" @click="modalOpen(index)">Create Billing</button>
                                <button class="btn btn-danger" style="color:white" @click="deleteBilling(pay.id)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import "vue-select/dist/vue-select.css";

export default {
    data() {
        return {
            active: '',
            showMessage: false,
            Data: [],
            Payment: [],
            Insurance: [],
            PivotM: [],
            SelectedPat: [],
            SelectedPatMeds: [],
            form: {
                prescID: 'Select',
                presc: 'Select',
                insID: 'Select',
                paymentType: 'Select',
                desc: '',
                qty: 0
            },
            modalForm: {
                medsQty: 0
            }
        };
    },
    created() {
        this.getPresData()
        this.getPaymentData()
        this.getPivotMeds()
        // this.getInsurance()
    },
    methods: {
        modalOpen: function(i) {

            return (this.active = i);
        },
        getPresData() {
            axios.get('/api/prescription/all')
                .then(res => {
                    this.Data = res.data.data
                }).catch(error => {
                console.log(console.error())
            })
        },
        getPaymentData() {
            axios.get('/api/payment')
                .then(res => {
                    this.Payment = res.data.data
                }).catch(error => {
                console.log(console.error())
            })
        },
        getPivotMeds() {
            axios.get('/api/pivotMeds/all')
                .then(res => {
                    this.PivotM = res.data
                }).catch(error => {
                console.log(console.error())
            })
        },
        getPatientMeds() {
            axios.get('/api/patientMeds/' + this.SelectedPat.id)
                .then(res => {
                    this.SelectedPatMeds = res.data
                }).catch(error => {
                console.log(console.error())
            })
        },
        deleteBilling(id) {
            axios.delete("/api/payment/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getPaymentData();
            });
        },
        storeBilling() {
            axios
            .post("/api/payment", {
                'desc': this.form.desc,
                'paymentType': this.form.paymentType,
                'insurance': JSON.stringify(this.form.insID),
                'prescription': JSON.stringify(this.form.prescID),
                'status': 'Ongoing',
                'medsQty': this.form.qty
            }).then(res=> {
                Swal.fire({
                    icon: 'success',
                    title: 'Created',
                    text: 'New billing successfully created!'
                }).then(res => {
                    if (res.isConfirmed) {
                        this.getPaymentData();
                    }
                })
            }).catch(error=> {
                console.log(console.error);
            })
        }
        // getInsurance() {
        //     axios.get('/api/insurance/all')
        //         .then(res => {
        //             this.Insurance = res.data.data
        //         }).catch(error => {
        //         console.log(console.error())
        //     })
        // }
    },
    watch: {
      'form.prescID': function(val) {
          //do something when the data changes.
          if (val) {
              console.log(val.insurance)
              this.Insurance = val.insurance
              this.SelectedPat = val
              this.getPatientMeds()
          }
      }
    }
}
</script>

<style>

</style>
