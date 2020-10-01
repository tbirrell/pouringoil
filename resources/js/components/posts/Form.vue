<template>
    <div class="flex justify-center">
        <textarea class="w-full h-64"></textarea>
    </div>
</template>

<script>
export default {
    props: {
        post: {
            type: Object,
            required: false
        }
    },
    data() {
        return {
            content: ''
        }
    },
    mounted() {
        if (typeof this.post !== 'undefined') {
            this.content = this.post.content;
        }
    },
    methods: {
        save: function () {

        }
    }
}
</script>
