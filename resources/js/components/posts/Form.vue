<template>
    <div>
        <textarea></textarea>
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
