<template>
    <div class="container">
        <h1 class="text-center">Patient Master Index</h1>

        <div
            class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4 mt-4"
        >
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Patient Appointment ✅</h5>
                        <p class="card-text">
                            Create patient appointment.
                        </p>
                    </div>
                    <div class="m-4 d-flex flex-row">
                        <router-link
                            :to="{ name: 'pmsPatientAppointmentInformation' }"
                            class="btn btn-primary w-100"
                            style="color:white"
                            >Visit</router-link
                        >
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Patient biodata ✅</h5>
                        <p class="card-text">
                            Display list of registered patient.
                        </p>
                    </div>
                    <div class="m-4 d-flex flex-row">
                        <router-link
                            :to="{ name: 'PmsPatientBiodata' }"
                            class="btn btn-primary w-100"
                            style="color:white"
                            >Visit</router-link
                        >
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Spouse/family information ✅</h5>
                        <p class="card-text">
                            Display list of patient's next of kin.
                        </p>
                    </div>
                    <div class="m-4">
                        <router-link
                            :to="{ name: 'PmsSpouseFamilyInformation' }"
                            class="btn btn-primary w-100"
                            style="color:white"
                            >Visit</router-link
                        >
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Insurance/panel information ✅</h5>
                        <p class="card-text">
                            Display list of patient's insurance.
                        </p>
                    </div>
                    <div class="m-4">
                        <router-link
                            :to="{ name: 'PmsInsurancePanelInformation' }"
                            class="btn btn-primary w-100"
                            style="color:white"
                            >Visit</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style></style>
