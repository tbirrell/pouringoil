<template>
    <div>
        <h2>{{ pageTitle }}</h2>
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
        <button class="btn-blue w-16 mt-4 float-right" @click="save">Save</button>
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
        }
    },
    mounted() {
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
                stub: this.stub.text.substring(0, 1000)
            };
            if (this.postID === null) {
                axios.post('/posts/', data);
            } else {
                axios.put('/posts/'+this.postID, data);
            }
        },
        autoTitle: function () {
            if (this.title.auto || this.title.text === '') {
                this.title.auto = true;
                this.title.text = this.content.text.match(/# ?(.*)/)[1];
            }
        },
        autoStub: function () {
            if (this.stub.auto || this.stub.text === '') {
                this.stub.auto = true;
                this.stub.text = this.content.text.substring(0, 1000);
            }
        }
    }
}
</script>
