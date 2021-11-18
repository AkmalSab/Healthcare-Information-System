<template>
    <div class="table-responsive container">
        <h1 class="">Role Lookup</h1>

        <blockquote class="blockquote">
            <p>List of role.</p>
        </blockquote>

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
                            Update Role Information
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="updateRole">
                            <div class="row">
                                <div class="col">
                                    <label>Role ID</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        disabled
                                        v-model="updateRoleName.id"
                                    />
                                </div>
                                <div class="col">
                                    <label>Role Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        disabled
                                        v-model="updateRoleName.name"
                                    />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <label>Role Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="updateRoleName.new"
                                    />
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <button
                                        class="btn btn-primary w-100"
                                        style="color:white"
                                        type="submit"
                                    >
                                        Update {{ this.updateRoleName.name }}
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
                                @click="deleteRole(updateRoleName.id)"
                            >
                                Delete {{ this.updateRoleName.name }}
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

        <div class="card mb-2">
            <div class="card-body">
                <form @submit.prevent="storeRole">
                    <div class="row">
                        <div class="col">
                            <label>Role Name</label>
                            <input
                                type="text"
                                class="form-control"
                                v-model="roleName"
                            />
                        </div>
                    </div>
                    <div class="row mt-2">
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
                <table class="table text-center" id="roleInformationTable">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="role in roles" :key="role.id">
                            <th scope="row">{{ role.id }}</th>
                            <td>{{ role.name }}</td>
                            <td>
                                <!-- open modal -->
                                <button
                                    type="button"
                                    class="btn btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    @click="modalOpen(role.id)"
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
            roles: [],
            updateRoles: [],
            roleName: "",
            updateRoleName: {
                id: "",
                name: "",
                new: ""
            }
        };
    },
    watch: {},
    created() {
        this.getRoles();
    },
    methods: {
        getRoles() {
            axios
                .get("/api/role")
                .then(res => {
                    this.roles = res.data.data;
                    $(document).ready(function() {
                        $("#roleInformationTable").DataTable({
                            bRetrieve: true,
                            columnDefs: [{ orderable: false, targets: 2 }]
                        });
                    });
                })
                .catch(error => {
                    console.log(error);
                });
        },
        modalOpen(roleId) {
            axios
                .get("/api/role/" + roleId)
                .then(res => {
                    this.updateRoles = res.data.data;

                    this.updateRoleName.id = this.updateRoles.id;
                    this.updateRoleName.name = this.updateRoles.name;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        storeRole() {
            axios
                .post("/api/role", {
                    name: this.roleName
                })
                .then(res => {
                    Swal.fire({
                        icon: "success",
                        title: "Registered",
                        text: "Role successfully registered!"
                    }).then(res => {
                        if (res.isConfirmed) {
                            this.getRoles();
                        }
                    });
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        updateRole() {
            axios
                .put("/api/role/" + this.updateRoleName.id, {
                    name: this.updateRoleName.new
                })
                .then(res => {
                    Swal.fire({
                        icon: "success",
                        title: "Updated",
                        text: "Role successfully updated!"
                    }).then(res => {
                        if (res.isConfirmed) {
                            $("#closeModal").click();
                            this.updateRoleName.new = "";
                            this.getRoles();
                        }
                    });
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        deleteRole(roleId) {
            axios
                .delete("/api/role/" + roleId)
                .then(res => {
                    Swal.fire({
                        icon: "success",
                        title: "Deleted",
                        text: "Role successfully deleted!"
                    }).then(res => {
                        if (res.isConfirmed) {
                            $("#closeModal").click();
                            this.updateRoleName.new = "";
                            this.getRoles();
                        }
                    });
                })
                .catch(error => {
                    console.log(console.error);
                });
        }
    }
};
</script>

<style></style>
