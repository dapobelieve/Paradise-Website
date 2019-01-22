<template>
  <div class="parttime text-xs-center">
    <span v-if="authUser">
      <div class="heading">
        <h1>Post Graduate Registration</h1>
        <h4 style="color: green">{{ section }}</h4>
      </div>
      <div class="container">
        <div v-if="tab === 1" class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="surname">Surname</label>
              <input type="text" v-model="form.surname" required  class="form-control" placeholder="Surname">
            </div>
            
            <div class="form-group">
              <label for="Firstname">Firstname</label>
              <input type="text" v-model="form.firstname" required  class="form-control" placeholder="Firstname">
            </div>
            <div class="form-group">
              <label for="Middlename">Middlename</label>
              <input type="text" v-model="form.middlename"  class="form-control" placeholder="Middlename">
            </div>
            <div class="form-group">
              <label for="surname">Email</label>
              <input type="email" v-model="form.email" placeholder="Enter a Valid Email Address" class="form-control">
            </div>
            <div class="form-group">
              <label for="surname">Phone</label>
              <input type="text" v-model="form.phone" placeholder="Enter a Valid Phone Number" class="form-control">
            </div>
            <div class="form-group">
              <label for="Sex">Sex</label>
              <select class="form-control" v-model="form.sex" name="sex" id="sex">
                <option selected></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Sex">Type of Sponsor</label>
              <input type="text" placeholder="Type of Sponsor" v-model="form.sponsor" class="form-control">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="marital">Marital Status</label>
              <select v-model="form.marital" class="form-control" name="marital" >
                <option selected></option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
              </select>
            </div>
            <div class="form-group">
              <label for="surname">Birth Place</label>
              <input type="text" v-model="form.birthplace" placeholder="Place of Birth" class="form-control">
            </div>
            <div class="form-group">
              <label for="dob">Date of Birth</label>
              <datetime v-model="form.dob" class="form-control" format="yyyy-MM-dd" placeholder="Date of birth"></datetime>
            </div>
            <div class="form-group">
              <label for="surname">Religion</label>
              <select v-model="form.religion" class="form-control" name="lga" >
                <option selected>Select your Religion</option>
                <option value="Christianity">Christianity</option>
                <option value="Islam">Islam</option>
              </select>
            </div>
            <div class="form-group">
              <label for="surname">Nationality</label>
              <select v-model="form.nationality" class="form-control" name="lga" >
                <option selected value="Nigerian">Nigerian</option>
              </select>
            </div>
            <div class="form-group">
              <label for="surname">State of Origin</label>
              <select v-model="form.state" @change="loadLga" class="form-control" name="state" >
                <option selected></option>
                <option v-for="state in states" :value="state.id">{{ state.state }}</option>
              </select>
            </div>
            <div v-if="locations.length" class="form-group">
              <label for="surname">Local Govt</label>
              <select v-model="form.lga" class="form-control" name="lga" >
                <option selected>Select your LGA</option>
                <option v-for="lga in locations" :value="lga.id">{{ lga.lga }}</option>
              </select>
            </div>
          </div>
        </div>
        <div v-if="tab === 2" class="row">
          <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
            <div class="form-group">
              <label for="surname">First Choice Degree</label>
              <input type="text" v-model="form.first_choice" required  class="form-control" placeholder="First Choice Degree">
            </div>
            <div class="form-group">
              <label for="surname">Second Choice Degree</label>
              <input type="text" v-model="form.second_choice" required  class="form-control" placeholder="Second Choice Degree">
            </div>
          </div>
        </div>
        <div v-if="tab === 3" class="row">
          <div class="col-md-6">
            <h3>Mailing Address</h3>
            <div class="form-group">
              <label for="surname">POBox/PMB/Postal Code:</label>
              <input type="text" v-model="form.madd_pcode" required  class="form-control" placeholder="POBox/MB/Postal Code:">
            </div>
            <div class="form-group">
              <label for="surname">Country</label>
              <input type="text" v-model="form.madd_country" required  class="form-control" placeholder="Country">
            </div>
            <div class="form-group">
              <label for="surname">State</label>
              <input type="text" v-model="form.madd_state" required  class="form-control" placeholder="State">
            </div>
            <div class="form-group">
              <label for="surname">City</label>
              <input type="text" v-model="form.madd_city" required  class="form-control" placeholder="City">
            </div>
          </div>
          <div class="col-md-6">
            <h3>Home Address</h3>
            <div class="form-group">
              <label for="surname">Country</label>
              <input type="text" v-model="form.hmadd_country" required  class="form-control" placeholder="Country">
            </div>
            <div class="form-group">
              <label for="surname">State</label>
              <input type="text" v-model="form.hmadd_state" required  class="form-control" placeholder="State">
            </div>
            <div class="form-group">
              <label for="surname">Town</label>
              <input type="text" v-model="form.hmadd_city" required  class="form-control" placeholder="Town">
            </div>
            <div class="form-group">
              <label for="surname">Street</label>
              <input type="text" v-model="form.hmadd_street" required  class="form-control" placeholder="Street">
            </div>
          </div>
        </div>
        <div v-if="tab === 4" class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-offset-2">
            <form v-for="(sub, i) in subjects" :key="i" class="form-inline" role="form">
              <span>{{ i + 1 }}. </span>
              <div class="form-group">
                <label class="sr-only">Subject</label>
                <input type="text" v-model="sub.name" required class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
              <label class="sr-only">Grade</label>
                <input type="text" v-model="sub.grade" required class="form-control" placeholder="grade">
              </div>
              <div class="form-group">
                <a style="color: red; cursor: pointer; text-decoration: none" @click="removeSubject(sub.id)">Remove</a>
              </div>
            </form>
            <button v-if="subjects.length < 9" @click.prevent="addSubject" class="btn btn-success btn-sm">Add Subject</button>
          </div>
        </div>
        <div v-if="tab === 5" class="row">
          <div class="col-md-6">
            <h3>Next of Kin Details</h3>
            <div class="form-group">
              <label for="surname">Full Name (surname first)</label>
              <input type="text" v-model="form.kin_name" required  class="form-control" placeholder="Next of kin name">
            </div>
            <div class="form-group">
              <label for="surname">Address</label>
              <input type="text" v-model="form.kin_address" required  class="form-control" placeholder="Address">
            </div>
            <div class="form-group">
              <label for="surname">Email</label>
              <input type="text" v-model="form.kin_Email" required  class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="surname">Phone Number</label>
              <input type="text" v-model="form.kin_Phone" required  class="form-control" placeholder="Phone Number">
            </div>
          </div>
          <div class="col-md-6">
            <h3>Sponsor Details</h3>
            <div class="form-group">
              <label for="surname">Full Name (surname first)</label>
              <input type="text" v-model="form.sponsor_name" required  class="form-control" placeholder="Sponsor's name">
            </div>
            <div class="form-group">
              <label for="surname">Address</label>
              <input type="text" v-model="form.sponsor_address" required  class="form-control" placeholder="Address">
            </div>
            <div class="form-group">
              <label for="surname">Email</label>
              <input type="text" v-model="form.sponsor_Email" required  class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="surname">Phone Number</label>
              <input type="text" v-model="form.sponsor_Phone" required  class="form-control" placeholder="Phone Number">
            </div>
          </div>
        </div>
        <div v-if="tab === 6" class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-offset-2">
            <h3>Direct Entry Information</h3>
            <h3></h3>
            <div class="form-group">
              <label for="surname">Institution Name</label>
              <input type="text" v-model="form.de_name"  class="form-control" placeholder="Institution Name">
            </div>
            <div class="form-group">
              <label for="surname">Institution Address</label>
              <input type="text" v-model="form.de_add"  class="form-control" placeholder="Institution Address">
            </div>
            <div class="form-group">
              <label for="surname">Course Studied</label>
              <input type="text" v-model="form.de_course"  class="form-control" placeholder="Course Studied">
            </div>
            <div class="form-group">
              <label for="surname">Certificate Type</label>
              <input type="text" v-model="form.de_cert" required  class="form-control" placeholder="Certificate Type">
            </div>
            <div class="form-group">
              <label for="surname">Entry Year</label>
              <input type="number" v-model="form.de_entry" required  class="form-control" placeholder="Entry Year">
            </div>
            <div class="form-group">
              <label for="surname">Year Graduated</label>
              <input type="number" v-model="form.de_grad" required  class="form-control" placeholder="Year Graduated">
            </div>
            <div class="form-group">
              <label for="surname">Certificate Class</label>
              <input type="text" v-model="form.de_class" required  class="form-control" placeholder="Certificate Class">
            </div>
          </div>
        </div>
        <div v-if="tab === 7" class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-offset-2">
            <h3>Profile</h3>
            <div class="form-group">
              <label for="surname">Upload passport</label>
              <vueDropzone @vdropzone-removed-file="removeImage" @vdropzone-file-added="imageSelected" id='uploader1' :options="dropOptions"></vueDropzone>
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-lg" @click="save">Submit</button>
            </div>
          </div>
        </div>
        
        <div class="actions">

          <div class="prev">
            <button v-if="tab > 1 " @click.prevent="tab--" type="submit" class="btn btn-default btn-sm">Previous</button>
          </div>
          <div class="next">
            <button v-if="tab < max" @click.prevent="tab++" type="submit" class="btn btn-default btn-sm">Next</button>
          </div>
        </div>
      </div>
    </span>
    <span v-else>
      <div class="">
        <h3>You  cannot proceed with this application because you are not logged in.</h3>
      </div>
    </span>
  </div>
</template>
<script>
import vueDropzone from "vue2-dropzone";
import moment from 'moment';
export default {
  data () {
    return {
      tab: 7,
      authUser: false,
      max: 7,
      user: {},
      form: {},
      states: [],
      subjects: [
        {
          id: Date.now(),
          name: "",
          grade: ""
        }
      ],
      locations: [],
      section: 'Bio Data',
      dropOptions: {
          url: "http://localhost:8000/api/image",
          maxFilesize: 2, // MB
          maxFiles: 1,
          chunking: true,
          preventDuplicates: true,
          chunkSize: 500, // Bytes
          thumbnailWidth: 150, // px
          thumbnailHeight: 150,
          addRemoveLinks: true,
          autoProcessQueue:false,
          dictDefaultMessage: `<i class='fa fa-upload' style='font-size:100px; text-align: center'></i> 
            <br> Upload a Recent Passport Photograph <span style='color: red'>Browse Device</span>`
      },
      image: null
    }
  },
  components: {
    vueDropzone 
  },
  methods: {
    save () {
      // set user
      this.form.userId = this.user.id;

      // format date
      this.form.dob = moment(this.form.dob).format('YYYY-MM-DD')

      // persisit to LS
      // use form data to send form for procesing
      const fd = new FormData();
      fd.append('userId', this.form.userId);
      fd.append('surname', this.form.surname);
      fd.append('email', this.form.email);
      fd.append('firstname', this.form.firstname);
      fd.append('middlename', this.form.middlename);
      fd.append('phone', this.form.phone);
      fd.append('sex', this.form.sex);
      fd.append('state', this.form.state);
      fd.append('lga', this.form.lga);
      fd.append('sponsor', this.form.sponsor);
      fd.append('marital', this.form.marital);
      fd.append('nation', this.form.nationality);
      fd.append('dob', this.form.dob);
      fd.append('religion', this.form.religion);
      fd.append('birthplace', this.form.birthplace);
      // tab 2
      fd.append('first_choice', this.form.first_choice)
      fd.append('second_choice', this.form.second_choice)

      // tab 3
      fd.append('hmadd_country', this.form.hmadd_country)
      fd.append('hmadd_state', this.form.hmadd_state)
      fd.append('hmadd_city', this.form.hmadd_city)
      fd.append('hmadd_street', this.form.hmadd_street)

      fd.append('madd_country', this.form.madd_country);
      fd.append('madd_state', this.form.madd_state);
      fd.append('madd_city', this.form.madd_city);
      fd.append('madd_pcode', this.form.madd_pcode);

      // tab 4
      fd.append('subjects', JSON.stringify(this.subjects))

      // tab 5
      fd.append('kin_name', this.form.kin_name);
      fd.append('kin_Email', this.form.kin_Email);
      fd.append('kin_address', this.form.kin_address);
      fd.append('kin_Phone', this.form.kin_Phone);

      // sponsor
      fd.append('sponsor_name', this.form.sponsor_name)
      fd.append('sponsor_Email', this.form.sponsor_Email)
      fd.append('sponsor_Phone', this.form.sponsor_Phone)
      fd.append('sponsor_address', this.form.sponsor_address)

      // tab 6
      fd.append('de_name', this.form.de_name);
      fd.append('de_grad', this.form.de_grad);
      fd.append('de_entry', this.form.de_entry);
      fd.append('de_course', this.form.de_course);
      fd.append('de_class', this.form.de_class);
      fd.append('de_cert', this.form.de_cert);
      fd.append('de_add', this.form.de_add);
      
      // tab 7
      fd.append('image', this.image);
      
      // send axios request
      axios.post('api/save_pt_record', fd)
      .then((response) => {
        console.log(JSON.parse(response.data.address));
      })
      .catch(error => {
        this.errors = error.response.data
        console.log(error.response.data)
      })
      
    },
    imageSelected (e) {
      console.log(e)
      this.image = e; 
    },
    removeImage () {
      this.image = '';
    },
    addSubject() {
      if (this.subjects.length === 9) {
        return;
      }
      this.subjects.push({
        id: Date.now(),
        name: '',
        grade: ''
      }) 
    },
    removeSubject(id) {
      if (this.subjects.length === 1)
        return;
      this.subjects = this.subjects.filter(x => x.id !== id);
    },
    getStates() {
      axios.get('api/get-states')
      .then(response => {
        this.states = response.data;
      }) 
    },
    loadLga (e) {
      let stateId = e.target.value;
      let loc = this.states.filter((x) => {
        return x.id == stateId;
      })

      this.locations = loc[0].locations;
    }
  },
  watch: {
    tab (newValue, oldValue) {
      if (newValue === 1) {
        this.section = 'Bio Data'
      }else if (newValue === 2) {
        this.section = 'Preferred Courses'
      }else if (newValue === 3) {
        this.section = 'Contact Information' //
      }else if (newValue === 4) {
        this.section = 'SSCE Information'
      }else if (newValue === 5) {
        this.section = 'Next of Kin Details'
      }else if (newValue === 6) {
        this.section = 'Direct Entry if Applicable'
      }else if (newValue === 7) {
        this.section = 'Passport & Password'
      }
    }
  },
  mounted () {
    this.getStates()
    // check if user is logged in from LS
    var paraUser = JSON.parse(localStorage.getItem('paraUser'));
    console.log(paraUser);
    // this.tab = 7;
    if (paraUser != undefined) {
      this.user = paraUser;
      this.authUser = true;
    }

    this.form = JSON.parse(localStorage.getItem('partTimeUser'));
    this.subjects = this.form.subjects
    // console.log(paraUser);
  }
}
</script>
<style scoped>
.actions {
  display: flex;
  justify-content: space-around;
}
.heading {
  display: flex;
  flex-direction: column;
  align-items: center;
}
</style>