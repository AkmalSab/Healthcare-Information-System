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
                <form @submit.prevent="postImage">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" v-model="medsName" />
                    </div>
                    <div class="col">
                        <label class="form-label">Manufacturer</label>
                        <input type="text" class="form-control" v-model="medsManufac" />
                    </div>
                    <div class="col">
                        <label class="form-label">Cost</label>
                        <input type="number" class="form-control" v-model="medsCost" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Type</label>
                        <select
                            class="form-select"
                            aria-label="Default select example"
                            v-model="medsType"
                        >
                            <option selected>Open this select menu</option>
                            <option value="Type 1">One</option>
                            <option value="Type 2">Two</option>
                            <option value="Type 3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Dose</label>
                        <input type="text" class="form-control" v-model="medsDose" />
                    </div>
                    <div class="col">
                        <label class="form-label">Stock</label>
                        <input type="number" class="form-control" v-model="medsStock" />
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
                                <label for="floatingTextarea2">Remark</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <file-pond
                            name="test"
                            ref="pond"
                            label-idle="Drop files here...please make sure it's a photo."
                            v-bind:allow-multiple="true"
                            accepted-file-types="image/jpeg, image/png"
                            server="/api/medicine"
                            v-bind:files="myFiles"
                            v-on:init="handleFilePondInit"
                        />
                    </div>
                </div>
                <button class="btn btn-primary w-100" style="color:white" type="submit">
                    Submit
                </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
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
            message: '',
            myFiles: [],
            medsName: '',
            medsManufac: '',
            medsCost: 0,
            medsType: '',
            medsDose: '',
            medsStock: 0,
            medsDesc: ''
        };
    },
    methods: {
        handleFilePondInit: function() {
            console.log("FilePond has initialized")
            this.$refs.pond.getFiles()
        },
        postImage() {
            const file = this.$refs.pond.getFiles()[0].file
            let formData = new FormData()

            formData.append("image", file)
            formData.append("medicineName", this.medsName)
            formData.append("medicineManufac", this.medsManufac)
            formData.append("medicineCost", this.medsCost)
            formData.append("medicineType", this.medsType)
            formData.append("medicineDose", this.medsDose)
            formData.append("medicineStock", this.medsStock)
            formData.append("medicineDesc", this.medsDesc)

            axios.post('/api/medicine', formData).then(res => {
                this.showMessage = true
                this.message = 'Image successfully uploaded! 💥'
            }).catch(error => {
                this.showMessage = true
                this.message = error
            })
        }
    },
    components: {
        FilePond
    }
};
</script>

<style></style>
