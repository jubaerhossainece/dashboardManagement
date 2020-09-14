<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 style="text-align: center; font-weight: 600; margin: 2rem" class="">Not Found What you are looking!</h3>
                <img style="max-height: 80%; width: 100%" :src="'/images/background/notfound1.svg'" alt="">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
