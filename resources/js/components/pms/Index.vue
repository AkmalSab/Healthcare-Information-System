<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
            <div class="col mb-3">
                <div class="card h-100">            
                    <div class="card-body">
                        <h5 class="card-title">Patient Registration</h5>
                        <p class="card-text">
                            i. Counter registration (register by clinic staff)
                        </p>                    
                    </div>
                    <div class="m-4">
                        <router-link :to="{name: 'pmsPatientRegister'}" class="btn btn-primary w-100">Visit</router-link>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Patient Master Index</h5>
                        <p class="card-text">
                            i. Patient biodata <br>
                            ii. Spouse/family information <br>
                            iii. Insurance/panel information    
                        </p>                
                    </div>
                    <div class="m-4">   
                        <router-link :to="{name: 'PmsPatientMasterIndex'}" class="btn btn-primary w-100">Visit</router-link>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Patient Billing</h5>
                        <p class="card-text">
                            i. Patient Billing <br>
                        </p>
                    </div>
                    <div class="m-4">
                        <button type="button" class="btn btn-primary w-100">Visit</button>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>