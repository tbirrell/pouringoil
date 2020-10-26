<template>
    <button
        class="btn-blue float-right"
        @click="downloadItem()">Download</button>
</template>

<script>
export default {
    props: {
        slug: String
    },
    methods: {
        downloadItem() {
            console.log(this.slug);
            axios.get('/download/'+this.slug, {responseType: 'blob'})
                .then(response => {
                    const blob = new Blob([response.data], {type: 'text/markdown'});
                    const link = document.createElement('a');
                    link.href = URL.createObjectURL(blob);
                    link.download = 'pouringoil_'+this.slug+'.md';
                    link.click();
                    URL.revokeObjectURL(link.href);
                }).catch(console.error);
        }
    }
}
</script>

<style scoped>

</style>
