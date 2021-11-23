<template>
    <div class="container">
        <h1>Prescription Information System</h1>
        <blockquote class="blockquote">
            <p>This home is for PIS, there will be such functions available in this section.</p>
        </blockquote>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                Medicine
                            </div>
                            <div class="card-body">
                                <img src="/img/drugs.png" alt="drugs-icon" class="mb-3">
                                <h5 class="card-title">
                                    Create Medicine
                                </h5>
                                <p class="card-text">
                                    Insert a new medicine data into the system.
                                </p>
                                <router-link :to="{name: 'pisCreateMeds'}" class="btn btn-primary w-100" style="color: white">Go</router-link>
                            </div>
                            <div class="card-footer text-muted">
                                Prescription is based on medicine data.
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-header">
                                Prescription
                            </div>
                            <div class="card-body">
                                <img src="/img/prescription.png" alt="pres-icon" class="mb-3">
                                <h5 class="card-title">
                                    Create Prescription
                                </h5>
                                <p class="card-text">
                                    Insert a new prescription data into the system.
                                </p>
                                <router-link :to="{name: 'pisCreatePrescription'}" class="btn btn-primary w-100" style="color: white">Go</router-link>
                            </div>
                            <div class="card-footer text-muted">
                                Medicine does not rely on prescription data.
                            </div>
                        </div>
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
