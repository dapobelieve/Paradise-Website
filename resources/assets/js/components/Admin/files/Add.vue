<template>
  <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
      <div class="card">
        <form
            enctype="multipart/form-data"
            @dragover.prevent="handleDragOver"
            @dragleave.prevent="handleDragLeave"
            novalidate action=""
            style="position:relative; display: flex; align-content: center; justify-content: center; margin-bottom: 12px"
            class="d-flex align-items-center justify-content-center position-relative mb-6">
          <input @change="handleChoseFiles" type="file" style="height: 100%; width: 100%; position: absolute" multiple>
          <div>
            Drop here to upload or <span>choose files</span>.Max 5 at once
          </div>
        </form>
      </div>
    </div>
    <div class="col-lg-12" v-if="uploads.length > 0">
      <div>
        <strong>{{uploads.length}}</strong> items selected
      </div>
      <div v-for="(upload, index) in uploads" class="card" style="margin-bottom: 20px">
        <div style="display: flex; align-items: center" class="d-flex align-items-center">
          <div class="upload-img"><img :src="imagePreview(upload.file)" alt=""></div>
          <div style="margin-left: 12px" class="upload-name">
            <div style="width: 1000px; height: 30px">
              <div>File Caption: <input style="width: 50%; margin-left: 0.5rem" class="w-50 ml-2" :placeholder="`Enter caption for ${upload.file.name}`" type="text" v-model="upload.caption"></div>
              <br>
              <small v-if="errors[upload.file.name]" style="color: red">{{errors[upload.file.name]}}</small>
            </div>
          </div>
          <div @click="removeFile(upload)" style="cursor: pointer" class="ml-auto mr-4"><i class="fa fa-trash-o fa-2x"></i></div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 mb-5" style="margin-top: 50px; margin-bottom: 50px" v-if="uploads.length > 0">
      <button @click="submit" type="button" class="btn btn-block btn-success">Upload</button>
    </div>
  </div>
</template>

<script>
// import UploadMixin  from "@/mixins/UploadMixin.js";
export default {
  name: "gallery-create",
  // mixins: [UploadMixin],
  props: ['homeurl'],
  data() {
    return {
      uploads: [],
      dragging: false,
      draggingCount: 0,
      errors: {},
      btn: {
        state: false
      }
    }
  },
  methods: {
    imagePreview(file) {
      if(file.type === 'application/pdf') {
        return 'https://res.cloudinary.com/rohing/image/upload/v1606349138/paradise/assets/488px-PDF_file_icon.svg.png'
      }
      return URL.createObjectURL(file)
    },
    removeFile(file) {
      this.uploads.splice(this.uploads.indexOf(file), 1)
    },
    handleChoseFiles(e) {
      let files = e.target.files
      let arr = Array.from(files).map(file => {
        return {
          caption: file.name,
          file
        }
      })

      arr.map(file => {
        if(this.uploads.length < 5) {
          this.uploads.push(file)
        }
      })
    },
    handleDragOver(e) {
      this.dragging = true
      this.draggingCount = e.dataTransfer.items.length
    },
    handleDragLeave() {
      this.dragging = false;
      this.draggingCount = 0
    },
    validateUploads() {
      this.uploads.map(item => {
        // this.errors = true
        if (item.caption === "") {
          this.errors[item.file.name] = "Enter a caption for this image "+item.file.name
          this.$forceUpdate()
        }
      })

    },
    async submit() {
      this.errors = {}
      this.btn.state = true

      if (this.uploads.length === 0) {
        alert ("Please Upload an image")
        this.btn.state = false
      }

      this.validateUploads()

      if (Object.keys(this.errors).length > 0) {
        return
      }else {
        for (const x of this.uploads) {
          this.uploads[this.uploads.indexOf(x)].url = await this.uploadFile(x.file, 'androcare/gallery')
        }

        let res = await axios.post('/api/gallery', { data: this.uploads })
        if(res.status === 201) {
          alert("Images saved to gallery successfully")
          window.location.replace(`${this.homeurl}`)
        }
      }
    },
  }
}
</script>
<style lang="scss" scoped>
form {
  border-radius: 0.5rem;
  padding: 2.5rem;
  border: 2px dashed #bfbfbf;
  background-color: #ecf2f7;

  input {
    opacity: 0;
    top: 0;
    left: 0;
    cursor: pointer;
  }
}
.upload-img {
  height: 150px;
  width: 150px;
  img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 5px;
  }
}
</style>