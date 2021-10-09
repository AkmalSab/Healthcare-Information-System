<template>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 g-4">
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Manage Patient Master Index</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>                
                    </div>
                    <div class="m-4">   
                        <router-link :to="{name: 'PmsCreate'}" class="btn btn-primary w-100">Visit</router-link>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Register patient via</h5>
                        <p class="card-text">This is a short card.</p>                    
                    </div>
                    <div class="m-4">
                        <button type="button" class="btn btn-primary w-100">Visit</button>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Cash management</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
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