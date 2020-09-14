<style>

    .widget-user-header{
        height: 300px !important;
        background-position: center center !important;
        background-size: cover !important;
    }

    .widget-user-image{
        top: 195px !important;
        margin-left: -80px !important;
    }

    .widget-user-image {
        width: 160px !important;
        height: 160px !important;
        overflow: hidden;
        border-radius: 50%;
    }

    .widget-user-image > img{
        width: 100% !important;
        height: auto !important;
    }

    .widget-user-image .img-circle {
        border-radius: 0 !important;
    }

    .card-footer {
        padding-top: 60px !important;
    }
</style>

<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="background-image: url('./images/background/background1.jpg')">
                <h3 class="widget-user-username text-right">Elizabeth Pierce</h3>
                <h5 class="widget-user-desc text-right">Web Designer</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" :src="profilePicture()" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            </div>


            <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Posted 5 photos - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <div class="row">
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="" alt="Photo">
                              <img class="img-fluid" src="" alt="Photo">
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="" alt="Photo">
                              <img class="img-fluid" src="" alt="Photo">
                            </div>
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-9">
                          <input type="text" v-model = "form.name" name="name" class="form-control" id="inputName" placeholder="Name" :class="{ 'is-invalid' : form.errors.has('name') }">
                          <has-error :form="form" field="name"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" name="email" class="col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-9">
                          <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email Address" :class="{ 'is-invalid' : form.errors.has('email') }">
                          <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-lg-3 col-form-label">Bio</label>
                        <div class="col-lg-9">
                          <textarea v-model="form.bio" class="form-control" id="inputExperience" name="bio" placeholder="Write your bio" :class="{ 'is-invalid' : form.errors.has('bio') }"></textarea>
                          <has-error :form="form" field="bio"></has-error>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputFile" class="col-lg-3 col-form-label">Profile Photo</label>
                        <div class="col-lg-9 input-group">
                          <div class="custom-file">
                            <input type="file" @change="changePhoto" name="profilePicture" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                      </div>

                     <!--  <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Profile Photo</label>
                        <div class="col-sm-10">
                          <input type="file" @change="changePhoto" 
                          name="profilePicture" class="form-input">
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <label for="inputSkills" class="col-lg-3 col-form-label">Skills</label>
                        <div class="col-lg-9">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" name="password" class="col-lg-3 col-form-label">Password <span style="font-weight: 300">(Leave empty if not changing)</span></label>
                        <div class="col-lg-9">
                          <input type="password" v-model="form.password" class="form-control" id="password" placeholder="password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-lg-3 col-lg-9">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-lg-3 col-lg-9">
                          <button type="submit" @click.prevent="updateInfo" class="bttn btn-edit">Update Profile</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>


        </div>
    </div>
</template>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script>
    export default {
        data(){
            return {
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    password: '',
                    type: '',
                    bio: '',
                    photo: ''
                })
            }
        },

        methods: {
            updateInfo() {
                if(this.form.password == ""){
                this.form.password = undefined;
                }
                this.$Progress.start();
                this.form.put('api/profile/')
                .then(() => {
                this.$Progress.finish();
                this.$toast.success({
                      title: 'Profile Updated!',
                      message: 'Your profile has been updated successfully!'
                    });

                })
                .catch(()=> {
                this.$Progress.fail();
                    
                })
            },
            
            profilePicture(){
                let prefix = (this.form.photo.match(/\//) ? '' : '/images/profile/');
                return prefix + this.form.photo;
            },

            changePhoto(e){
                let file = e.target.files[0];
                let reader = new FileReader();
                // console.log(file);  
                const ext = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']; 
                if(ext.includes(file['type'])){
                    if(file['size'] < 2111775){
                        reader.onloadend = (file) => {
                            console.log('RESULT', reader.result);
                            this.form.photo = reader.result;
                        }
                        reader.readAsDataURL(file);
                    } else{ 
                    Swal.fire({
                        type: 'error',
                        title: 'Long image file!',
                        text: 'Please select an image file less than 2MB.'
                    })
                    }
                } else{
                    Swal.fire({
                        type: 'error',
                        title: 'Wrong file type!',
                        text: 'Please select an image file.'
                    })
                }
            }
        },

        mounted() {
            console.log('Component mounted.')
        },
        created() {
            axios.get("api/profile").then(({ data }) => (this.form.fill(data)));
        }
    }
</script>




