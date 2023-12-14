<template>
    <div class="box-error-message">
        <small class="small">
            <div class="error">
                {{ this.errorsMeg ? this.errorsMeg : this.errorFirst }}
            </div>
        </small>
    </div>
</template>

<script>
export default {
    props: ['errors-meg', 'error-first']
}
</script>