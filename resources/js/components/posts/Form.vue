<template>
    <div>
        <h1>{{ pageTitle }}</h1>
        <div v-if="files && files.length > 0" class="inline-block mt-8 relative w-64">
            <select class="float-right" @change="fetchFile" v-model="selectedFile">
                <option disabled value="">Unposted Files</option>
                <option v-for="filepath in files">{{ filepath }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
        </div>
        <div class="flex flex-row mt-8">
            <div class="w-1/6 font-lg font-bold">
                Title:
            </div>
            <input type="text" class="w-5/6" v-model="title.text" @click="title.auto = false">
        </div>
        <div class="flex flex-row mt-8">
            <div class="w-1/6 font-lg font-bold">
                Summary:
            </div>
            <textarea class="w-5/6 h-32" v-model="stub.text" @click="stub.auto = false"></textarea>
        </div>
        <div class="flex flex-row mt-8">
            <div class="w-1/6 font-lg font-bold">
                Post:
            </div>
            <textarea class="w-5/6 h-64" v-model="content.text"></textarea>
        </div>
        <button class="w-16 mt-4 float-right" :class="{
            'btn-blue': readyToSave,
            'btn-blue-disabled': !readyToSave,
        }" @click="save" :disabled="!readyToSave">Save
        </button>
    </div>
</template>

<script>
export default {
    props: {
        post: Object,
        files: Array,
    },
    data() {
        return {
            pageTitle: 'Create Post',
            postID: null,
            title: {
                text: '',
                auto: true
            },
            content: {
                text: '',
                auto: false
            },
            stub: {
                text: '',
                auto: true
            },
            selectedFile: '',
        }
    },
    mounted() {
        console.log(!!this.files);
        console.log(this.files.length > 0);
        if (typeof this.post !== 'undefined') {
            this.pageTitle = 'Edit Post';
            this.postID = this.post.id;

            this.content.text = this.post.content;
            this.content.auto = false;
            this.title.text = this.post.title;
            this.title.auto = false;
            this.stub.text = this.post.stub;
            this.stub.auto = false;
        }
    },
    watch: {
        'content.text': function (newValue, oldValue) {
            this.autoTitle();
            this.autoStub();
        }
    },
    methods: {
        save: function () {
            let data = {
                title: this.title.text,
                content: this.content.text,
                filepath: this.selectedFile,
                stub: this.stub.text.substring(0, 1000)
            };
            if (this.postID === null) {
                axios.post('/posts/', data).then(res => {
                    window.location.href = '/posts/'+res.data;
                });
            } else {
                axios.put('/posts/' + this.postID, data);
            }
        },
        autoTitle: function () {
            if (this.title.auto || this.title.text === '') {
                this.title.auto = true;
                let title_matches = this.content.text.match(/# ?(.*)/);

                this.title.text = title_matches ? title_matches[1] : this.title.text;
            }
        },
        autoStub: function () {
            if (this.stub.auto || this.stub.text === '') {
                this.stub.auto = true;
                this.stub.text = this.content.text.substring(0, 1000);
            }
        },
        fetchFile() {
            axios.get('/api/fetch-file', {
                params: {
                    filepath: this.selectedFile
                }
            }).then(res => {
                this.content.text = res.data;
            });
        }
    },
    computed: {
        readyToSave: function () {
            return this.content.text !== '' && this.title.text !== '';
        }
    }
}
</script>
