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
              <label for="surname">Department</label>
              <input type="text" v-model="form.department" required  class="form-control" placeholder="Department">
            </div>
            <div class="form-group">
              <label for="surname">Degree/Program</label>
              <input type="text" v-model="form.program" required  class="form-control" placeholder="Degree/Program">
            </div>
            <div class="form-group">
              <label for="surname">Field of Interest</label>
              <input type="text" v-model="form.field" required  class="form-control" placeholder="Field of Interest">
            </div>
            <div class="form-group">
              <label for="surname">Mode of Study</label>
              <input type="text" v-model="form.mode" required  class="form-control" placeholder="Mode of Study">
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
          <span v-for="(school, index) in degrees" :key="index">
              <div  class="col-sm-6" >
                <div class="form-group">
                <label for="surname">School/Institution Name</label>
                <input type="text" v-model="school.name" required  class="form-control" placeholder="School/Institution Name">
              </div>
                <div class="form-group">
                <label for="surname">Reg.Number/ Matric Number</label>
                <input type="text" v-model="school.matric" required  class="form-control" placeholder="Reg.Number/ Matric Number">
              </div>
                <div class="form-group">
                <label for="surname">Country</label>
                <input type="text" v-model="school.country" required  class="form-control" placeholder="Country">
              </div>
                <div class="form-group">
                <label for="surname">Town</label>
                <input type="text" v-model="school.town" required  class="form-control" placeholder="Town">
              </div>
                <div class="form-group">
                <label for="surname">Year Joined</label>
                <input type="text" v-model="school.year" required  class="form-control" placeholder="Year Joined">
              </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <label for="surname">Date Obtained</label>
              <input type="text" v-model="school.obtained" required  class="form-control" placeholder="Date Obtained">
            </div>
              <div class="form-group">
                <label for="surname">Major Subject</label>
                <input type="text" v-model="school.major" required  class="form-control" placeholder="Major Subject">
              </div>
              <div class="form-group">
                <label for="surname">Class of Degree</label>
                <input type="text" v-model="school.class" required  class="form-control" placeholder="Class of Degree">
              </div>
              <div class="form-group">
                <label for="surname">Certificate</label>
                <input type="text" v-model="school.certificate" required  class="form-control" placeholder="Certificate">
              </div>
              <div class="form-group">
                <label for="surname">CGPA on 5 point scale</label>
                <input type="text" v-model="school.cgpa" required  class="form-control" placeholder="CGPA on 5 point scale">
              </div>
            </div>
            <div class="col-md-4 col-md-offset-8">
              <a v-if="degrees.length >= 2" @click.prevent="removeDegree(school.id)"href="#"  style="color: red; text-decoration: none">Remove Degree</a>
            </div>
            <hr>
            <hr>
          </span>
          <div class="col-md-4 col-md-offset-4">
            <button @click="addDegree" class="btn btn-success">Add Degree</button>
          </div>
        </div>
        <div v-if="tab === 6" class="row">
          <div class="col-md-6 col-md-offset-3 ">
            <!--<h3>Direct Entry Information</h3>-->
            <form v-for="(pub, i) in publications" :key="i" class="form-inline" role="form">
              <span>{{ i + 1 }}. </span>
              <div class="form-group">
                <label class="sr-only">Title</label>
                <input type="text" v-model="pub.title" required class="form-control" placeholder="Title">
              </div>
              <div class="form-group">
              <label class="sr-only">Date Published</label>
                <input type="text" v-model="pub.date" required class="form-control" placeholder="Date Published dd/mm/yyyy">
              </div>
              <div class="form-group">
                <a style="color: red; cursor: pointer; text-decoration: none" @click="removePublication(sub.id)">Remove</a>
              </div>
            </form>
            <button v-if="publications.length < 3" @click.prevent="addPublication" class="btn btn-success btn-sm">Add Publication</button>
          </div>
        </div>
        <div v-if="tab === 7" class="row">
          <div class="col-md-6 col-md-offset-3 ">
            <!--<h3>Direct Entry Information</h3>-->
            <form v-for="(pub, i) in prizes" :key="i" class="form-inline" role="form">
              <span>{{ i + 1 }}. </span>
              <div class="form-group">
                <label class="sr-only">Title</label>
                <input type="text" v-model="pub.title" required class="form-control" placeholder="Title">
              </div>
              <div class="form-group">
                <a style="color: red; cursor: pointer; text-decoration: none" @click="removePrize(pub.id)">Remove</a>
              </div>
            </form>
            <button v-if="prizes.length < 3" @click.prevent="addPrize" class="btn btn-success btn-sm">Add Prize</button>
          </div>
        </div>
        <div v-if="tab === 8" class="row">
          <div class="col-md-12">
            <form v-for="(ref, i) in refs" :key="i" class="form-inline" role="form">
              <span>{{ i + 1 }}. </span>
              <div class="form-group">
                <label class="sr-only">Name (Surname first)</label>
                <input type="text" v-model="ref.name" required class="form-control" placeholder="Name (Surname first)">
              </div>
              <div class="form-group">
                <label class="sr-only">Post</label>
                <input type="text" v-model="ref.post" required class="form-control" placeholder="Post">
              </div>
              <div class="form-group">
                <label class="sr-only">Address</label>
                <input type="text" v-model="ref.address" required class="form-control" placeholder="Address">
              </div>
              <div class="form-group">
                <label class="sr-only">Phone</label>
                <input type="text" v-model="ref.phone" required class="form-control" placeholder="Phone">
              </div>
              <div class="form-group">
                <label class="sr-only">Email</label>
                <input type="text" v-model="ref.email" required class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <a style="color: red; cursor: pointer; text-decoration: none" @click="removeRef(ref.id)">Remove</a>
              </div>
            </form>
            <button v-if="refs.length < 3" @click.prevent="addRefs" class="btn btn-success btn-sm">Add Referee</button>
          </div>
        </div>
        <div v-if="tab === 9" class="row">
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
        tab: 1,
        authUser: false,
        max: 9,
        user: {},
        form: {},
        states: [],
        errors: [],
        refs: [
          {
            id: Date.now(),
            name: '',
            post: '',
            address: '',
            phone: '',
            email: '',
          }
        ],
        degrees: [
          {
            id: Date.now(),
            name: '',
            matric: '',
            country: '',
            town: '',
            year: '',
            obtained: '',
            major: '',
            class: '',
            certificate: '',
            cgpa: '',
          }
        ],
        publications: [
          {
            id: Date(),
            title: '',
            date: ''
          }
        ],
        subjects: [
          {
            id: Date.now(),
            name: "",
            grade: ""
          }
        ],
        prizes: [
          {
            id: Date.now(),
            prize: ''
          }
        ],
        locations: [],
        section: 'Bio Data',
        dropOptions: {
          url: "http://localhost:8000/api/image",
          maxFilesize: 2, //MB
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
        fd.append('marital', this.form.marital);
        fd.append('nation', this.form.nationality);
        fd.append('dob', this.form.dob);
        fd.append('religion', this.form.religion);

        // tab 2
        fd.append('department', this.form.department);
        fd.append('program', this.form.program);
        fd.append('field', this.form.field);
        fd.append('mode', this.form.mode);

        // tab 3
        fd.append('hmadd_country', this.form.hmadd_country);
        fd.append('hmadd_state', this.form.hmadd_state);
        fd.append('hmadd_city', this.form.hmadd_city);
        fd.append('hmadd_street', this.form.hmadd_street);

        fd.append('madd_country', this.form.madd_country);
        fd.append('madd_state', this.form.madd_state);
        fd.append('madd_city', this.form.madd_city);
        fd.append('madd_pcode', this.form.madd_pcode);

        // tab 4
        fd.append('subjects', JSON.stringify(this.subjects));


        // tab 5
        fd.append('degrees', JSON.stringify(this.degrees));

        //tab 6
        fd.append('publications', JSON.stringify(this.publications));


        //tab 7
        fd.append('prizes', JSON.stringify(this.prizes));

        //tab 8
        fd.append('refs', JSON.stringify(this.refs));

        // tab 9
        fd.append('image', this.image);

        // send axios request
        axios.post('api/save-pg-record', fd, {
          onUploadProgress: uploadEvent => {
            console.log('Uploading...');
          },
          headers: {
            'Content-Type': "multipart/form-data",
          }
        })
          .then((response) => {
            console.log(JSON.parse(response.data));
            this.$router.push({
              name: 'regPay',
              params: {
                id: response.data,
              }
            })
          })
          .catch(error => {
            alert('There are errors in your form please go through and correct them');
            this.errors = error.response.data;
          })

      },
      imageSelected (e) {
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
      addRefs() {
        if (this.refs.length === 3) {
          return;
        }
        this.refs.push({
          id: Date.now(),
          name: '',
          grade: ''
        })
      },
      addPrize() {
        if (this.prizes.length === 10) {
          return;
        }
        this.prizes.push({
          id: Date.now(),
          prize: ''
        })
      },
      addDegree() {
        if (this.degrees.length === 9) {
          return;
        }
        this.degrees.push({
          id: Date.now(),
          name: '',
          matric: '',
          country: '',
          town: '',
          year: '',
          obtained: '',
          major: '',
          class: '',
          certificate: '',
          cgpa: '',
        })
      },
      addPublication() {
        if (this.publications.length === 3) {
          return;
        }
        this.publications.push({
          id: Date(),
          title: '',
          date: ''
        })
      },
      removeSubject(id) {
        if (this.subjects.length === 1)
          return;
        this.subjects = this.subjects.filter(x => x.id !== id);
      },
      removePublication(id) {
        if (this.publications.length === 1)
          return;
        this.publications = this.publications.filter(x => x.id !== id);
      },
      removeDegree(id) {
        if (this.degrees.length === 1)
          return;
        this.degrees = this.degrees.filter(x => x.id !== id);
      },
      removePrize(id) {
        if (this.prizes.length === 1)
          return;
        this.prizes = this.prizes.filter(x => x.id !== id);
      },
      removeRef(id) {
        if (this.refs.length === 1)
          return;
        this.refs = this.refs.filter(x => x.id !== id);
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
          this.section = 'Course/Degree in view'
        }else if (newValue === 3) {
          this.section = 'Contact Information' //
        }else if (newValue === 4) {
          this.section = 'SSCE Information'
        }else if (newValue === 5) {
          this.section = 'Other Degrees'
        }else if (newValue === 6) {
          this.section = 'Publications (Maximum of 3)'
        }else if (newValue === 7) {
          this.section = 'Prize(s) Optional'
        }else if (newValue === 8) {
          this.section = 'Referess (Minimum of 3)'
        }else if (newValue === 9) {
          this.section = 'Passport Photograph'
        }
      }
    },
    mounted () {
      this.getStates();
      // check if user is logged in from LS
      var paraUser = JSON.parse(localStorage.getItem('paraUser'));

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