<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
            <div class="col mb-3">
                <div class="card h-100">            
                    <div class="card-body">
                        <h5 class="card-title text-center">Type of Case</h5>
                        <p class="card-text">
                            
                        </p>                    
                    </div>
                    <div class="m-4">
                        <router-link :to="{name: 'ltTypeofCase'}" class="btn btn-primary w-100">Visit</router-link>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">Role</h5>
                        <p class="card-text">
                            
                        </p>                
                    </div>
                    <div class="m-4">   
                        <router-link :to="{name: 'ltRole'}" class="btn btn-primary w-100">Visit</router-link>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">Insurance</h5>
                        <p class="card-text">

                        </p>
                    </div>
                    <div class="m-4">
                        <router-link :to="{name: 'ltInsurance'}" class="btn btn-primary w-100">Visit</router-link>
                    </div>
                </div>
            </div>  
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">Medicine</h5>
                        <p class="card-text">

                        </p>
                    </div>
                    <div class="m-4">
                        <router-link :to="{name: 'ltMedicine'}" class="btn btn-primary w-100">Visit</router-link>
                    </div>
                </div>
            </div> 
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-center">Staff</h5>
                        <p class="card-text">

                        </p>
                    </div>
                    <div class="m-4">
                        <router-link :to="{name: 'ltStaff'}" class="btn btn-primary w-100">Visit</router-link>
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