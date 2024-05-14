<template>
    <div
        v-if="show"
        class="fixed bottom-4 right-4 bg-white p-4 shadow-lg rounded-lg z-50"
        @click="hideToast"
    >
        <p class="text-sm text-gray-800">{{ message }}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            show: false,
            message: "",
        };
    },
    methods: {
        showToast(message) {
            this.message = message;
            this.show = true;
            setTimeout(() => {
                this.hideToast();
            }, 3000);
        },
        hideToast() {
            this.show = false;
            this.message = "";
        },
    },
};
</script>
