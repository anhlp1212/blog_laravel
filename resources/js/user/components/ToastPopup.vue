<template>
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
        <div role="alert" aria-live="assertive" aria-atomic="true" class="toast " :class="classToast ? classToast : ''" id="liveToast">
            <div class="toast-header">
                <strong class="me-auto">{{ titleToast }}</strong>
                <small>{{ minutes }}</small>
                <button type="button" class="btn-close btn-dark" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div id="messageAjax" class="toast-body">
                {{ this.messageToast ? this.messageToast : '' }}
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            titleToast: 'Complete',
            minutes: '5 mins ago',
        }
    },
    props: ['message-toast', 'class-toast']
}
</script>