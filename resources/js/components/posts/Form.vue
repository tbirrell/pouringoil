<template>
    <div>
        <h2>Post</h2>
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
            this.content = this.post.content;
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
            axios.post('/posts/', {
                title: this.title.text,
                content: this.content.text,
                stub: this.stub.text,
            })
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
