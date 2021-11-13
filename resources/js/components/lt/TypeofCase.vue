<template>
    <div class="table-responsive container">
        <h1>Case</h1>
        <blockquote class="blockquote">
            <p>
                View and Register Case 🚨
            </p>
        </blockquote>
        <figcaption class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
        </figcaption>
        <div v-if="showMessage" class="alert alert-success">
            {{ message }}
        </div>

        <div class="card">
            <div class="card-body">
                <form @submit.prevent="storeCase">
                    <div class="row">
                        <div class="col">
                            <label>Case Name</label>
                            <input type="text" class="form-control" v-model="caseName" />
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <button class="btn btn-primary w-100" style="color:white" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table class="table text-center mt-2">
            <thead>
                <tr class="table-dark">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="casex in cases" :key="casex.id">
                    <th scope="row">{{ casex.id }}</th>
                    <td>{{ casex.name }}</td>
                    <td>
                        <router-link
                            :to="{
                                name: 'pmsPatientRegisterNextofKin',
                                params: { id: casex.id }
                            }"
                            class="btn btn-secondary text-white"
                            >Edit</router-link
                        >
                        <router-link
                            :to="{
                                name: 'PmsPatientMasterIndex',
                                params: { id: casex.id }
                            }"
                            class="btn btn-danger text-white"
                            >Delete</router-link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    components: {},
    data() {
        return {
            active: 0,
            showMessage: false,
            message: "",
            cases: [],
            caseName: ''
        };
    },
    created() {
        this.getTypeofCase();
    },
    methods: {
        getTypeofCase() {
            axios
                .get("/api/case")
                .then(res => {
                    this.cases = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        storeCase() {
            axios
                .post("/api/case", {
                    caseName: this.caseName
                })
                .then(res => {
                    Swal.fire({
                        icon: "success",
                        title: "Registered",
                        text: "Case successfully registered!"
                    }).then(res => {
                        if (res.isConfirmed) {
                            this.getTypeofCase()
                        }
                    });
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
    }
};
</script>

<style></style>
