<template>
  <div class="create-training">
    <div id="breadcrumb">
      <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
      <a href="#" class="current">Dashboard</a>
      <a href="#" class="current">Add Property</a>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div v-if="error.status" class="alert alert-danger">
          {{ error.message }}
          <a href="#" data-dismiss="alert" class="close">×</a>
        </div>
        <div class="widget-box">
          <div class="widget-title">
            <span class="icon"><i class="fa fa-medkit"></i></span>
            <h5>Add a New Service <em v-if="upload.state">{{ upload.progress }}</em></h5>
          </div>
          <div class="widget-content">
            <div class="row">
              <form @submit.prevent="submitCourse" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label">Service Name</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input type="text" v-model="course.title" placeholder="" class="form-control input-sm" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label">Service Details</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <textarea name="" v-model="course.details" cols="90" rows="10"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label">Service Images & Banners</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <vueDropzone
                        @vdropzone-removed-file="removeFile"
                        @vdropzone-file-added="fileAdded"
                        id='uploader1'
                        :options="dropOptions2">
                    </vueDropzone>
                  </div>
                </div>
                <div class="form-actions" v-if="btn.state">
                  <!--<h5>Uploading...</h5>-->
                  <loader></loader>
                </div>

                <div v-else class="form-actions">
                  <!--<progress-bar :options="options" :value="upload.progress"></progress-bar>-->
                  <button type="submit" class="btn btn-primary btn-sm">Save</button>
                  <a class="text-danger" href="#">Cancel</a>
                </div>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import vueDropzone from "vue2-dropzone";
  import loader from '../../../helpers/loader.vue'
  import Api from '../../../helpers/Api'
  export default {
    name: "create",
    data () {
      return {
        btn: {
          state: false,
        },
        course: {
          materials: [],
          image: ''
        },
        dropOptions2: {
          acceptedFiles: ".jpeg,.jpg,.png",
          url: "http://localhost:8000/api/image",
          maxFilesize: 2, // MB
          maxFiles: 5,
          chunking: true,
          preventDuplicates: true,
          chunkSize: 500, // Bytes
          thumbnailWidth: 150, // px
          thumbnailHeight: 150,
          addRemoveLinks: true,
          autoProcessQueue:false,
          dictDefaultMessage: `<i class='fa fa-plus' style='font-size:100px; text-align: center'></i>
        <br> Upload Images (max. 5)  <span style='color: red'>Upload</span>`
        },
        error: {
          status: false,
          message: ""
        },
        upload: {
          state: false,
          progress: 0
        }
      }
    },
    components: {
      vueDropzone,
      loader
    },
    methods: {
      fileAdded (e) {
        this.course.materials.push(e);
      },
      imageAdded (e) {
        this.course.image = e;
      },
      imageRemoved () {
        this.course.image = ''
      },
      removeFile (e) {
        this.course.materials = this.course.materials.filter((dFile) => {
          return dFile.upload.uuid != e.upload.uuid
        });
      },
      submitCourse ()
      {
        this.error.status = false;

        if (!this.course.title) {
          this.error.message = "Provide a property title";
          this.error.status = true;
          window.scrollTo(250, 0);
          return;
        }

        if (!this.course.details) {
          this.error.message = "Give details of the property";
          this.error.status = true;
          window.scrollTo(250, 0);
          return;
        }

        this.btn.state = true;

        const td = new FormData();

        td.append('title', this.course.title);
        td.append('details', this.course.details);

        for (var i=0; i<this.course.materials.length; i++) {
          let aFile = this.course.materials[i];

          td.append('images['+ i +']', aFile);
        }

        Api.post('api/create-service', td, {
          headers: {
            "Content-type": "multipart/form-data"
          },
          onUploadProgress: uploadEvent => {
            this.upload.state = true;
            this.upload.progress =  Math.round(uploadEvent.loaded / uploadEvent.total * 100);
          }
        })
        .then((response) => {
          alert("Service Created")
          this.btn.state = !this.btn.state;
          this.$router.replace({
            name: 'list-service'
          })
          console.log(response.data.message);

        })
        .catch((error) => {
          this.errors = error.response.data.errors
          console.log(error.response.data)
        });
      }
    },
    mounted() {
      // Bus.$emit('hideParentView', true);
    }
  }
</script>

<style scoped>
  .imager {
    display: grid;
    grid-template-columns: 200px 300px 200px;
    justify-content: center
  }
</style>