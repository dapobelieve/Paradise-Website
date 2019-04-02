<template>
  <div class="parttime text-xs-center">
    <span v-if="authUser">
      <div class="heading">
        <h1>Part time Registration</h1>
        <h4 style="color: green">{{ section }}</h4>
      </div>
      <div class="container">
        <div v-if="tab === 1" class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="surname">Surname</label>
              <input type="text" v-model="form.surname" required  class="form-control" placeholder="Surname">
              <span v-if="errors.surname" class="has-error">
                {{ errors.surname[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="Firstname">Firstname</label>
              <input type="text" v-model="form.firstname" required  class="form-control" placeholder="Firstname">
              <span v-if="errors.firstname" class="has-error">
                {{ errors.firstname[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="Middlename">Middlename</label>
              <input type="text" v-model="form.middlename"  class="form-control" placeholder="Middlename">
              <span v-if="errors.middlename" class="has-error">
                {{ errors.middlename[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Email</label>
              <input type="email" v-model="form.email" placeholder="Enter a Valid Email Address" class="form-control">
              <span v-if="errors.email" class="has-error">
                {{ errors.email[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Phone</label>
              <input type="text" v-model="form.phone" placeholder="Enter a Valid Phone Number" class="form-control">
              <span v-if="errors.phone" class="has-error">
                {{ errors.phone[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="Sex">Sex</label>
              <select class="form-control" v-model="form.sex" name="sex" id="sex">
                <option selected></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              <span v-if="errors.sex" class="has-error">
                {{ errors.sex[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="Sex">Type of Sponsor</label>
              <input type="text" placeholder="Type of Sponsor" v-model="form.sponsor" class="form-control">
              <span v-if="errors.sponsor" class="has-error">
                {{ errors.sponsor[0] }}
              </span>
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
              <span v-if="errors.marital" class="has-error">
                {{ errors.marital[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Birth Place</label>
              <input type="text" v-model="form.birthplace" placeholder="Place of Birth" class="form-control">
              <span v-if="errors.birthplace" class="has-error">
                {{ errors.birthplace[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="dob">Date of Birth</label>
              <datetime v-model="form.dob" class="form-control" format="yyyy-MM-dd" placeholder="Date of birth"></datetime>
              <span v-if="errors.dob" class="has-error">
                {{ errors.dob[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Religion</label>
              <select v-model="form.religion" class="form-control" name="lga" >
                <option selected>Select your Religion</option>
                <option value="Christianity">Christianity</option>
                <option value="Islam">Islam</option>
              </select>
              <span v-if="errors.religion" class="has-error">
                {{ errors.religion[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Nationality</label>
              <select v-model="form.nationality" class="form-control" name="lga" >
                <option selected value="Nigerian">Nigerian</option>
              </select>
              <span v-if="errors.nation" class="has-error">
                {{ errors.nation[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">State of Origin</label>
              <select v-model="form.state" @change="loadLga" class="form-control" name="state" >
                <option selected></option>
                <option v-for="state in states" :value="state.id">{{ state.state }}</option>
              </select>
              <span v-if="errors.state" class="has-error">
                {{ errors.state[0] }}
              </span>
            </div>
            <div v-if="locations.length" class="form-group">
              <label for="surname">Local Govt</label>
              <select v-model="form.lga" class="form-control" name="lga" >
                <option selected>Select your LGA</option>
                <option v-for="lga in locations" :value="lga.id">{{ lga.lga }}</option>
              </select>
              <span v-if="errors.lga" class="has-error">
                {{ errors.lga[0] }}
              </span>
            </div>
          </div>
        </div>
        <div v-if="tab === 2" class="row">
          <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
            <div class="form-group">
              <label for="surname">First Choice Degree</label>
              <input type="text" v-model="form.first_choice" required  class="form-control" placeholder="First Choice Degree">
              <span v-if="errors.first_choice" class="has-error">
                {{ errors.first_choice[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Second Choice Degree</label>
              <input type="text" v-model="form.second_choice" required  class="form-control" placeholder="Second Choice Degree">
              <span v-if="errors.second_choice" class="has-error">
                {{ errors.second_choice[0] }}
              </span>
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
              <span v-if="errors.madd_country" class="has-error">
                {{ errors.madd_country[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">State</label>
              <input type="text" v-model="form.madd_state" required  class="form-control" placeholder="State">
              <span v-if="errors.madd_state" class="has-error">
                {{ errors.madd_state[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">City</label>
              <input type="text" v-model="form.madd_city" required  class="form-control" placeholder="City">
              <span v-if="errors.madd_city" class="has-error">
                {{ errors.madd_city[0] }}
              </span>
            </div>
          </div>
          <div class="col-md-6">
            <h3>Home Address</h3>
            <div class="form-group">
              <label for="surname">Country</label>
              <input type="text" v-model="form.hmadd_country" required  class="form-control" placeholder="Country">
              <span v-if="errors.hmadd_country" class="has-error">
                {{ errors.hmadd_country[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">State</label>
              <input type="text" v-model="form.hmadd_state" required  class="form-control" placeholder="State">
              <span v-if="errors.hmadd_state" class="has-error">
                {{ errors.hmadd_state[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Town</label>
              <input type="text" v-model="form.hmadd_city" required  class="form-control" placeholder="Town">
              <span v-if="errors.hmadd_city" class="has-error">
                {{ errors.hmadd_city[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Street</label>
              <input type="text" v-model="form.hmadd_street" required  class="form-control" placeholder="Street">
              <span v-if="errors.hmadd_street" class="has-error">
                {{ errors.hmadd_street[0] }}
              </span>
            </div>
          </div>
        </div>
        <div v-if="tab === 4" class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-offset-2">
            <div class="alert alert-danger alert-dismissable" v-if="errors.ssce">
              {{ errors.ssce }}
            </div>
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
              <span v-if="errors.kin_name" class="has-error">
                {{ errors.kin_name[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Address</label>
              <input type="text" v-model="form.kin_address" required  class="form-control" placeholder="Address">
              <span v-if="errors.kin_address" class="has-error">
                {{ errors.kin_address[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Email</label>
              <input type="text" v-model="form.kin_Email" required  class="form-control" placeholder="Email">
              <span v-if="errors.kin_Email" class="has-error">
                {{ errors.kin_Email[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Phone Number</label>
              <input type="text" v-model="form.kin_Phone" required  class="form-control" placeholder="Phone Number">
              <span v-if="errors.kin_Phone" class="has-error">
                {{ errors.kin_Phone[0] }}
              </span>
            </div>
          </div>
          <div class="col-md-6">
            <h3>Sponsor Details</h3>
            <div class="form-group">
              <label for="surname">Full Name (surname first)</label>
              <input type="text" v-model="form.sponsor_name" required  class="form-control" placeholder="Sponsor's name">
              <span v-if="errors.sponsor_name" class="has-error">
                {{ errors.sponsor_name[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Address</label>
              <input type="text" v-model="form.sponsor_address" required  class="form-control" placeholder="Address">
              <span v-if="errors.sponsor_address" class="has-error">
                {{ errors.sponsor_address[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Email</label>
              <input type="text" v-model="form.sponsor_Email" required  class="form-control" placeholder="Email">
              <span v-if="errors.sponsor_Email" class="has-error">
                {{ errors.sponsor_Email[0] }}
              </span>
            </div>
            <div class="form-group">
              <label for="surname">Phone Number</label>
              <input type="text" v-model="form.sponsor_Phone" required  class="form-control" placeholder="Phone Number">
              <span v-if="errors.sponsor_Phone" class="has-error">
                {{ errors.sponsor_Phone[0] }}
              </span>
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
              <input type="number" v-model="form.de_entry" required  class="form-control" placeholder="Entry year">
            </div>
            <div class="form-group">
              <label for="surname">Year Graduated</label>
              <input type="number" v-model="form.de_grad" required  class="form-control" placeholder="Year Graduated e.g 2010">
            </div>
            <div class="form-group">
              <label for="surname">Certificate Class</label>
              <input type="text" v-model="form.de_class" required  class="form-control" placeholder="Certificate Class (First Class)">
            </div>
          </div>
        </div>
        <div v-if="tab === 7" class="row">
          <div class="col-md-6 col-md-offset-3 col-sm-offset-2">
            <h3>Profile</h3>
            <div class="form-group">
              <label for="surname">Upload a recent and clear passport photograph</label>
              <vueDropzone @vdropzone-removed-file="removeImage" @vdropzone-file-added="imageSelected" id='uploader1' :options="dropOptions"></vueDropzone>
              <span v-if="errors.image" class="has-error">
                {{ errors.image[0] }}
              </span>
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
      errors: [],
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
      this.form.dob = moment(this.form.dob).format('YYYY-MM-DD');

      //persist to ls
      localStorage.setItem('partTimeUser', JSON.stringify(this.form));

      /**
       * use fd to send form data with image
       * if field is empty send empty value
       * @type {FormData}
       */
      const fd = new FormData();
      fd.append('userId', this.form.userId);
      fd.append('surname', this.form.surname ? this.form.surname : '');
      fd.append('email', this.form.email ? this.form.email : '');
      fd.append('firstname', this.form.firstname ? this.form.firstname : '');
      fd.append('middlename', this.form.middlename ? this.form.middlename : '');
      fd.append('phone', this.form.phone ? this.form.phone : '');
      fd.append('sex', this.form.sex ? this.form.sex : '');
      fd.append('state', this.form.state ? this.form.state : '');
      fd.append('lga', this.form.lga ? this.form.lga : '');
      fd.append('sponsor', this.form.sponsor ? this.form.sponsor : '');
      fd.append('marital', this.form.marital ? this.form.marital : '');
      fd.append('nation', this.form.nationality ? this.form.nationality : '');
      fd.append('dob', this.form.dob ? this.form.dob : '');
      fd.append('religion', this.form.religion ? this.form.religion : '');
      fd.append('birthplace', this.form.birthplace ? this.form.birthplace : '');
      // tab 2
      fd.append('first_choice', this.form.first_choice ? this.form.first_choice : '');
      fd.append('second_choice', this.form.second_choice ? this.form.second_choice : '')

      // tab 3
      fd.append('hmadd_country', this.form.hmadd_country ? this.form.hmadd_country : '')
      fd.append('hmadd_state', this.form.hmadd_state ? this.form.hmadd_state : '')
      fd.append('hmadd_city', this.form.hmadd_city ? this.form.hmadd_city : '')
      fd.append('hmadd_street', this.form.hmadd_street ? this.form.hmadd_street : '')

      fd.append('madd_country', this.form.madd_country ? this.form.madd_country : '');
      fd.append('madd_state', this.form.madd_state ? this.form.madd_state : '');
      fd.append('madd_city', this.form.madd_city ? this.form.madd_city : '');
      fd.append('madd_pcode', this.form.madd_pcode ? this.form.madd_pcode : '');

      // tab 4
      fd.append('subjects', JSON.stringify(this.subjects));

      // tab 5
      fd.append('kin_name', this.form.kin_name ? this.form.kin_name : '');
      fd.append('kin_Email', this.form.kin_Email ? this.form.kin_Email : '');
      fd.append('kin_address', this.form.kin_address  ? this.form.kin_address : '');
      fd.append('kin_Phone', this.form.kin_Phone ? this.form.kin_Phone : '');

      // sponsor
      fd.append('sponsor_name', this.form.sponsor_name ? this.form.sponsor_name : '')
      fd.append('sponsor_Email', this.form.sponsor_Email ? this.form.sponsor_Email : '')
      fd.append('sponsor_Phone', this.form.sponsor_Phone ? this.form.sponsor_Phone : '')
      fd.append('sponsor_address', this.form.sponsor_address ? this.form.sponsor_address : '')

      // tab 6
      fd.append('de_name', this.form.de_name ? this.form.de_name : '');
      fd.append('de_grad', this.form.de_grad ? this.form.de_grad : '');
      fd.append('de_entry', this.form.de_entry ? this.form.de_entry : '');
      fd.append('de_course', this.form.de_course ? this.form.de_course : '');
      fd.append('de_class', this.form.de_class ? this.form.de_class : '');
      fd.append('de_cert', this.form.de_cert ? this.form.de_cert : '');
      fd.append('de_add', this.form.de_add ? this.form.de_add : '');
      
      // tab 7
      fd.append('image', this.image);
      
      // send axios request
      axios.post('api/save_pt_record', fd)
      .then((response) => {
        this.$swal({
          title: 'Registration Successful',
          type: 'success',
          // showConfirmButton: false,
          timer: 2000
        });
        // go to payment component
        this.$router.push({
          name: 'regPay',
          params: {
            id: response.data,
          }
        })
      })
      .catch(error => {
        // console.log(error.response)
        this.errors = error.response.data.errors
        this.tab = error.response.data.tab
      })
      
    },
    imageSelected (e) {
      // store image 
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
  }, //192.168.8.102
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
        this.section = 'Passport'
      }
    }
  },
  mounted () {
    this.getStates();
    // check if user is logged in from LS
    var paraUser = JSON.parse(localStorage.getItem('paraUser'));
    // console.log(paraUser);
    // this.tab = 7;
    if (paraUser != undefined) {
      this.user = paraUser;
      this.authUser = true;
    }

    // this.form = JSON.parse(localStorage.getItem('partTimeUser'));
    // this.subjects = this.form.subjects
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