<template>
    <div class="containers" v-if="isLogin">
        <div class="large-12 medium-12 small-12 filezone">
            <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
            <p>
                Drop your files here <br>or click to search
            </p>
        </div>

        <div v-for="(file, key) in files" class="file-listing">
            <img class="preview" v-bind:ref="'preview'+parseInt(key)"/>
            {{ file.name }}
            <div class="success-container" v-if="file.id > 0">
                Success
            </div>
            <div class="remove-container" v-else>
                <a class="remove" v-on:click="removeFile(key)">Remove</a>
            </div>
        </div>

        <a class="submit-button" v-on:click="submitFiles()" v-show="files.length > 0">Submit</a>
        <button @click="logout">Logout</button>
    </div>
</template>

<script>
export default {
    name: "PhotoUploadComponent.vue",
    data() {
        return {
            post_url: '/api/photo/upload',
            files: []
        }
    },
    methods: {
        postPhoto() {
            console.log('hello, you are trying to post a photo.');
        },
        handleFiles() {
            let uploadFiles = this.$refs.files.files;

            for (var i = 0; i < uploadFiles.length; i++) {
                this.files.push(uploadFiles[i]);
            }
            this.getImagePreviews();
        },
        getImagePreviews() {
            for (let i = 0; i < this.files.length; i++) {
                if (/\.(jpe?g|png|gif)$/i.test(this.files[i].name)) {
                    let reader = new FileReader();
                    reader.addEventListener("load", function () {
                        this.$refs['preview' + parseInt(i)][0].src = reader.result;
                    }.bind(this), false);
                    reader.readAsDataURL(this.files[i]);
                } else {
                    this.$nextTick(function () {
                        this.$refs['preview' + parseInt(i)][0].src = '/img/generic.png';
                    });
                }
            }
        },
        removeFile(key) {
            this.files.splice(key, 1);
            this.getImagePreviews();
        },
        submitFiles() {
            for (let i = 0; i < this.files.length; i++) {
                if (this.files[i].id) {
                    continue;
                }
                let formData = new FormData();
                formData.append('file', this.files[i]);

                axios.post(this.post_url,
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function (data) {
                    this.files[i].id = data['data']['id'];
                    this.files.splice(i, 1, this.files[i]);
                    console.log('success');
                }.bind(this)).catch(function (data) {
                    console.log('error');
                });
            }
        },
        async logout() {
            await this.$store.dispatch('auth/logout');
            await this.$router.push('/login')
        }
    },
    computed: {
        isLogin() {
            return this.$store.getters['auth/check'];
        }
    }
}
</script>

<style scoped>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', 'sans-serif';
    color: #fff;
}

.containers {
    flex-basis: 50%;
    position: relative;
    min-height: 85vh;
    padding: 40px 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

</style>
