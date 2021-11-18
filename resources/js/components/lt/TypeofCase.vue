<template>
    <div class="table-responsive container">
        <h1>Case</h1>
        <blockquote class="blockquote">
            <p>
                View and Register Case 🚨
            </p>
        </blockquote>

        <div v-if="showMessage" class="alert alert-success">
            {{ message }}
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Role Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateCase">
                            <div class="row">
                                <div class="col">
                                    <label>Case Id</label>
                                    <input type="text" class="form-control" disabled v-model="updateCaseName.oldCaseId" />
                                </div>
                                <div class="col">
                                    <label>Old Case Name</label>
                                    <input type="text" class="form-control" disabled v-model="updateCaseName.oldCaseName" />
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col">
                                    <label>New Case Name</label>
                                    <input type="text" class="form-control" v-model="updateCaseName.newCaseName" />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button class="btn btn-primary w-100" style="color:white" type="submit">Update {{ updateCaseName.oldCaseName }}</button>
                                </div>
                            </div>
                        </form>                
                    </div>
                    <div class="modal-footer">
                        <div class="col">
                            <button style="color: white" class="w-100 btn btn-danger" @click="deleteCase(updateCaseName.oldCaseId)">Delete {{ updateCaseName.oldCaseName }}</button>
                        </div>
                        <div class="col">
                            <button type="button" id="closeModal" class="float-end btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
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

        <table class="table mt-2" id="typeOfCaseInformationTable">
            <thead>
                <tr>
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
                        <!-- open modal -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" @click="modalOpen(casex.id)">
                            Edit
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
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
            active: 0,
            showMessage: false,
            message: "",
            cases: [],
            selectedCase: [],
            caseName: '',
            updateCaseName: {
                oldCaseId: '',
                oldCaseName: '',
                newCaseName: '',
            }
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
                    $(document).ready( function () {
                        $('#typeOfCaseInformationTable').DataTable({
                            data: this.cases,        
                            retrieve: true,          
                        });
                    });
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
        modalOpen(caseId){
            axios.get("/api/case/" + caseId)
            .then(res => {
                this.selectedCase = res.data.data;    

                this.updateCaseName.oldCaseId = this.selectedCase.id;
                this.updateCaseName.oldCaseName = this.selectedCase.name;
            })
            .catch(error => {
                console.log(error);
            })
        },
        updateCase() {
            axios
            .put("/api/case/" + this.updateCaseName.oldCaseId, {
                'name' : this.updateCaseName.newCaseName
            })
            .then(res => {
                Swal.fire({
                    icon: "success",
                    title: "Updated",
                    text: "Case successfully updated!"
                }).then(res => {
                    if (res.isConfirmed) {
                        $('#closeModal').click();
                        this.getTypeofCase()
                        this.updateCaseName.newCaseName = '';
                    }
                });
            })
            .catch(error => {
                console.log(console.error);
            });
        },
        deleteCase(caseId) {
            axios
            .delete("/api/case/" + caseId)
            .then(res=> {
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted',
                    text: 'Case successfully deleted!'
                }).then(res => {
                    if (res.isConfirmed) {
                        $('#closeModal').click();                        
                        this.getTypeofCase();
                        this.updateCaseName.newCaseName = '';
                    }
                })
            }).catch(error=> {
                console.log(console.error);
            })
        },
    }
};
</script>

<style></style>
