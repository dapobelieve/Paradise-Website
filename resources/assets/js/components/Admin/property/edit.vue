<template>
  <div class="create-training">
    <div id="breadcrumb">
      <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
      <a href="#" class="current">Dashboard</a>
      <a href="#" class="current">Edit </a>
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
            <h5>Edit Property <em v-if="upload.state">{{ upload.progress }}</em></h5>
          </div>
          <div class="widget-content">
            <div class="row">
              <form @submit.prevent="submitCourse" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label">Property</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input type="text" v-model="course.title" placeholder="A 2 bedroom apartment, a land in ikoyi, 6plots in banana island" class="form-control input-sm" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label">Property Price</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <input
                        type="number"
                        min="1000"
                        v-model.numnber="course.cost"
                        placeholder="Price"
                        class="form-control input-sm" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label">Property Details</label>
                  <div class="col-sm-9 col-md-9 col-lg-10">
                    <textarea name="" v-model="course.details" cols="90" rows="10"></textarea>
                  </div>
                </div>

                <div v-if="propertyImages.length > 0" class="image-container">
                  <span v-for="item in propertyImages" class="image-item">
                    <img height="100px" width="100px" :src="item.link" alt="">
                    <small><a @click.prevent="removeImage(item.id)" href="#">Remove</a></small>
                  </span>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-md-3 col-lg-2 control-label">Property Images</label>
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
  name: "edit",
  data () {
    return {
      btn: {
        state: false,
      },
      oldImages: [],
      course: {
        materials: [],
        image: '',
        details: '',
        cost: 0,
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
  computed: {
    propertyImages () {
      let propertyImages = this.oldImages.map((item) => {
        let obj = {}
        obj.link = JSON.parse(item.url).secure_url
        obj.id = item.id
        return Object.create(obj);
      })
      return propertyImages
    }
  },
  methods: {
    async removeImage(id) {
      try {
        let { status } = await Api.delete(`api/image/${id}/delete`)
        if(status === 204) {
          this.oldImages = this.oldImages.filter((e) => {
            return e.id !== id;
          })
          alert("Image removed")
        }
      }catch(e) {
        console.log(e)
      }
    },
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
    submitCourse (){
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
      td.append('price', this.course.cost);
      td.append('details', this.course.details);

      for (var i=0; i<this.course.materials.length; i++) {
        let aFile = this.course.materials[i];

        td.append('images['+ i +']', aFile);
      }
      let api = axios.create({
        baseURL: '/'
      });

      api.post('api/property/edit/'+this.$route.params.id, td, {
        headers: {
          "Content-type": "multipart/form-data"
        },
        onUploadProgress: uploadEvent => {
          this.upload.state = true;
          this.upload.progress =  Math.round(uploadEvent.loaded / uploadEvent.total * 100);
        }
      })
      .then((response) => {
        this.btn.state = !this.btn.state;
        if(response.status == 204) {
          alert("Property Updated!")
          this.$router.replace({
            name: 'all-property'
          })
        }
        console.log(response.data.message);

      })
      .catch((error) => {
        this.errors = error.response.data.errors
        console.log(error.response.data)
      });
    },
    async getProperty(id, url) {
      try {
        let { data } = await Api.get(`${url}/${id}/edit`)
        this.course.title = data.title
        this.course.details = data.details
        this.course.cost = data.price
        this.oldImages = data.images;
      }catch (e) {
        console.log(e)
      }
    }
  },
  mounted() {
    this.getProperty(parseInt(this.$route.params.id), 'api/property')
    // Bus.$emit('hideParentView', true);
  }
}
</script>

<style scoped>
.image-container {
  display: grid;
  grid-template-columns: 200px 200px 200px;
  grid-row-gap: 20px;
  justify-content: center

}
.image-item {
  display: inline-flex;
  flex-direction: column;
}
</style>