<template>
    <div class="container">
        <h1>Create Medicine</h1>
        <blockquote class="blockquote">
            <p>Create a new medicine for a prescription here.</p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Wan-Bissaka</cite>
        </figcaption>

        <div class="card">
            <div class="card-body">
                <form @submit.prevent="postImage">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="col">
                        <label class="form-label">Manufacturer</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="col">
                        <label class="form-label">Cost</label>
                        <input type="number" class="form-control" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Type</label>
                        <select
                            class="form-select"
                            aria-label="Default select example"
                        >
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">Dose</label>
                        <input type="text" class="form-control" />
                    </div>
                    <div class="col">
                        <label class="form-label">Stock</label>
                        <input type="number" class="form-control" />
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
                                ></textarea>
                                <label for="floatingTextarea2">Remark</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <file-pond
                            name="test"
                            ref="pond"
                            label-idle="Drop files here..."
                            v-bind:allow-multiple="true"
                            accepted-file-types="image/jpeg, image/png"
                            server="/api/medicine"
                            v-bind:files="myFiles"
                            v-on:init="handleFilePondInit"
                            v-model="myFiles"
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
            myFiles: []
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
