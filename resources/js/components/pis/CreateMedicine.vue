<template>
    <div class="container">
        <h1>Create Medicine</h1>
        <blockquote class="blockquote">
            <p>Create a new medicine for a prescription here.</p>
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
                            <label class="form-label">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="medsName"
                            />
                        </div>
                        <div class="col">
                            <label class="form-label">Manufacturer</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="medsManufac"
                            />
                        </div>
                        <div class="col">
                            <label class="form-label">Cost</label>
                            <div class="input-group">
                                <span class="input-group-text">RM</span>
                                <input
                                    type="number"
                                    class="form-control"
                                    v-model="medsCost"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Type</label>
                            <select class="form-select" v-model="medsType">
                                <option value="Type 1">One</option>
                                <option value="Type 2">Two</option>
                                <option value="Type 3">Three</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Dose</label>
                            <div class="input-group">
                                <span class="input-group-text">mg</span>
                                <input
                                    type="number"
                                    class="form-control"
                                    v-model="medsDose"
                                />
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label">Stock</label>
                            <div class="input-group">
                                <span class="input-group-text">pcs</span>
                                <input
                                    type="number"
                                    class="form-control"
                                    v-model="medsStock"
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
                                        id="floatingTextarea2"
                                        style="height: 100px"
                                        v-model="medsDesc"
                                    ></textarea>
                                    <label for="floatingTextarea2"
                                        >Remark</label
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <file-pond
                                name="test"
                                ref="pond"
                                label-idle="Drop files here...please make sure it's a photo 😊"
                                v-bind:allow-multiple="false"
                                accepted-file-types="image/jpeg, image/png"
                                server="/api/medicine"
                                v-bind:files="myFiles"
                                v-on:init="handleFilePondInit"
                            />
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

        <div class="card mt-2">
            <div class="card-body">
                <table class="table text-center" id="medicineTable">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Manufacturer</th>
                            <th scope="col">Dose(mg)</th>
                            <th scope="col">Cost(RM)</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="meds in medsData" :key="meds.id">
                            <th scope="row" v-if="meds.picture">
                                <img                                    
                                    :src="
                                        'https://e-techify-storage.s3.ap-southeast-1.amazonaws.com/medicine_picture/' +
                                            meds.picture
                                    "
                                    width="100"
                                    height="100"
                                />
                            </th>
                            <th scope="row" v-else>
                                No image
                            </th>
                            <td>{{ meds.name }}</td>
                            <td>{{ meds.manufacturer }}</td>
                            <td>{{ meds.dose }}</td>
                            <td>{{ meds.cost }}</td>
                            <td>{{ meds.description }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-primary"
                                    style="color:white"
                                >
                                    Edit
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    style="color:white"
                                    @click="deleteMeds(meds.id)"
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
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import $ from "jquery";
// Import Vue FilePond
import vueFilePond from "vue-filepond";
// Import FilePond styles
import "filepond/dist/filepond.min.css";
// Import image preview plugin styles
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
// Create component
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview
);
export default {
    data: function() {
        return {
            showMessage: false,
            message: "",
            myFiles: [],
            medsName: "",
            medsManufac: "",
            medsCost: 0,
            medsType: "",
            medsDose: "",
            medsStock: 0,
            medsDesc: "",
            medsData: []
        };
    },
    created() {
        this.getMedicineData();
    },
    methods: {
        handleFilePondInit: function() {
            console.log("FilePond has initialized");
            this.$refs.pond.getFiles();
        },
        postData() {
            // const file = this.$refs.pond.getFiles()[0].file;
            if(this.$refs.pond.getFiles()[0] != null)
                var file = this.$refs.pond.getFiles()[0].file;
            else
                var file = '';
            let formData = new FormData();
            formData.append("image", file);
            formData.append("medicineName", this.medsName);
            formData.append("medicineManufac", this.medsManufac);
            formData.append("medicineCost", this.medsCost);
            formData.append("medicineType", this.medsType);
            formData.append("medicineDose", this.medsDose);
            formData.append("medicineStock", this.medsStock);
            formData.append("medicineDesc", this.medsDesc);
            axios
                .post("/api/medicine", formData)
                .then(res => {
                    this.showMessage = true;
                    this.message = "Medicine successfully added! 💥";
                    this.getMedicineData();
                    // $("#medicineTable")
                    //     .DataTable()
                    //     .destroy();
                })
                .catch(error => {
                    this.showMessage = true;
                    this.message = error;
                });
        },
        deleteMeds(id) {
            axios.delete("/api/medicine/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                $("#medicineTable")
                    .DataTable()
                    .destroy();
                this.getMedicineData();
            });
        },
        getMedicineData() {
            axios
                .get("/api/medicine")   
                .then(res => {
                    this.medsData = res.data;
                    this.$nextTick(() => {
                        $("#medicineTable").DataTable({
                            retrieve: true,
                            columnDefs: [{ orderable: false, targets: [0, 6] }]
                        });
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },
    components: {
        FilePond
    }
};
</script>

<style></style>