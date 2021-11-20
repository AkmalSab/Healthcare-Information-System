<template>
    <div class="container">
        <h1>Create Billing</h1>
        <blockquote class="blockquote">
            <p>This page is for billing purpose.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Wan-Bissaka</cite>
        </figcaption>

        <div class="card">
            <div class="card-body">
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
                        <label>Payment Type</label>
                        <select class="form-select" aria-label="Default select example" v-model="form.paymentType">
                            <option selected>Select</option>
                            <option value="Cash">Cash</option>
                            <option value="Online Banking">Online Banking</option>
                            <option value="Credit Card">Credit Card</option>
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
                        <button class="btn btn-primary" style="color: white">Pay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "vue-select/dist/vue-select.css";

export default {
    data() {
        return {
            Data: [],
            Insurance: [],
            form: {
                prescID: 'Select',
                insID: 'Select',
                paymentType: 'Select',
                desc: ''
            }
        };
    },
    created() {
        this.getPresData()
        // this.getInsurance()
    },
    methods: {
        getPresData() {
            axios.get('/api/prescription/all')
                .then(res => {
                    this.Data = res.data.data
                }).catch(error => {
                console.log(console.error())
            })
        },
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
          }
      }
    }
}
</script>

<style>

</style>
