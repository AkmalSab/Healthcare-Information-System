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
                    <div class="col" v-if="form.paymentType === 'Insurance'">
                        <label>Insurance ID</label>
                        <v-select
                            class="mt-2"
                            :options="Insurance"
                            label="name"
                            v-model="form.insID"
                        ></v-select>
                    </div>
                    <div class="col">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Online Banking" v-model="form.paymentType">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Online Banking
                        </label><br>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Cash" checked v-model="form.paymentType">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Cash
                        </label><br>
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="Insurance" checked v-model="form.paymentType">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Insurance
                        </label>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label>Prescription Desc</label>
                        <select
                            class="form-select"
                            v-model="form.presc"
                        >
                            <option v-for="(patientMeds, index) in SelectedPatMeds" :key="patientMeds.index" :value="patientMeds.description">{{ patientMeds.description }}</option>
                        </select>
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
                            <th scope="row">{{ pay.patient.id }}</th>
                            <td>{{ pay.patient.name }}</td>
                            <td>{{ pay.patient.id }}</td>
                            <td>{{ pay.patient.id }}</td>
                            <td>{{ pay.payment }}</td>
                            <td>
                                <button class="btn btn-success" @click="generateReceipt(index)" style="color:white">Print</button>
                                <button class="btn btn-primary" style="color:white" data-bs-toggle="modal" data-bs-target="#billingModal" @click="modalOpen(index)">Edit</button>
                                <button class="btn btn-danger" style="color:white" @click="deleteBilling(pay.id)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <vue-html2pdf
            :show-layout="false"
            :float-layout="true"
            :enable-download="false"
            :preview-modal="true"
            :paginate-elements-by-height="2000"
            filename="Klinik Billing - 2021"
            :pdf-quality="2"
            :manual-pagination="false"
            pdf-format="a4"
            pdf-orientation="portrait"
            pdf-content-width="100%"
            ref="PDFReceipt"
        >
            <section slot="pdf-content">
                <section class="pdf-item">
                    <div class="row g-0">
                        <div class="col-3">
                            <img src="/img/hospital.png" alt="" class="mt-3 mx-3">
                        </div>
                        <div class="col-6">
                            <h4 class="mt-3">KLINIK BONOS-SOWE</h4>
                            <p>
                                NO. 79 JALAN TAMAN MELATI 1,<br>
                                TAMAN MELATI 1,<br>
                                TAMAN MELATI, SETAPAK<br>
                                53100 KUALA LUMPUR
                            </p>
                        </div>
                        <div class="col-3">
                            <h1 class="mt-3">INVOICE</h1>
                        </div>
                    </div>

                    <div style="background-color: #000000; height: 1px;" class="mt-3"></div>

                    <div class="container-fluid">
                        <div class="row mt-3">
                            <div class="col">
                                <p>
                                    <strong>Wan Ismat</strong><br>
                                    Xmiryna Technology<br>
                                    Housten TX, United States<br>
                                    017-2178319
                                </p>
                            </div>
                            <div class="col">
                                <table class="table table-borderless table-sm">
                                    <tbody class="float-end">
                                        <tr>
                                            <th>Invoice: </th>
                                            <td>#0123</td>
                                        </tr>
                                        <tr>
                                            <th>Date: </th>
                                            <td>30-11-2021</td>
                                        </tr>
                                        <tr>
                                            <th>Customer Name: </th>
                                            <td>WAN MUHAMMAD ISMAT</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <table class="table table-sm mt-2">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                    <td>@mdo</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-8">
                                <table class="table table-borderless table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Terms & Condition</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1. If you provide us with a mobile telephone number, we may send you a SMS text message to confirm the time and date of your booking.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2. If you give us less than 48 hours notice when cancelling a booking or do not attend an appointment, you agree to pay the cancellation charge of £25 or the full cost of your treatment (whichever amount is smaller). These charges may be waived in exceptional circumstances.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3. If you provide us with an email address, we may send you an email message to confirm the time and date of your booking.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-4">
                                <table class="table table-borderless table-sm">
                                    <tbody class="float-end">
                                        <tr>
                                            <th>Subtotal: </th>
                                            <td>RM 1,000.00</td>
                                        </tr>
                                        <tr>
                                            <th>Total: </th>
                                            <td>RM 1,000.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </vue-html2pdf>
    </div>
</template>

<script>
import "vue-select/dist/vue-select.css";
import VueHtml2pdf from 'vue-html2pdf'


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
    components: {
        VueHtml2pdf
    },
    methods: {
        modalOpen: function(i) {

            return (this.active = i);
        },
        generateReceipt (i) {
            this.$refs.PDFReceipt.generatePdf();
            return this.active = i;
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
            axios.get('/api/patientMeds/' + this.SelectedPat.pat.id)
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
