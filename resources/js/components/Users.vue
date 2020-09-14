<template>
    <div class="container">
        <div class="row justify-content-center" v-if="$gate.isAdminOrModerator()">
            <div class="card">
            <div class="card-header">
              <h3 class="card-title">Users DataTable</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="example1_length">
                            <label  style="display: flex; width: 40%;">Show 
                            <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10
                                </option>
                                <option value="25">
                                25
                                </option>
                                <option value="50">50
                                </option>
                                <option value="100">100
                                </option>
                            </select> entries
                        </label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6" style="display: flex; align-items: center; justify-content: space-between">
                        <div id="example1_filter" class="dataTables_filter">
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                        </div>
                        <div style="float: right">
                            <button class="btn btn-success" data-toggle="modal" data-target="#users" @click="addUser">Add User<i class="fas fa-user-plus"></i></button>                            
                        </div>
                    </div>
                </div>
              <div class="row">
                <div class="col-sm-12">

                <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                    <th> ID </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Bio</th>
                    <th>Modify</th>
                    <th>User Type</th>
                    <th>Registered AT</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                <tr v-for="user in users.data" :key="user.id">
                  <td class="sorting_1">{{user.id}}</td>
                  <td>{{user.name}}</td>
                  <td>{{user.email}}</td>
                  <td>{{user.bio | truncate(20)}}</td>
                  <td>Approved</td>
                  <td>{{ user.type | capitalize}}</td>
                  <td>{{user.created_at}}</td>
                  <td class="text-center" style="width: 8rem;">
                    <button type="button" @click="showUser(user)" class="btn-action btn-secondary btn-sm">
                        <i class="fas fa-eye"></i>
                      <span>View User details</span>
                    </button>
                    <button type="button" @click="editUser(user)" class="btn-action btn-edit btn-sm">
                        <i class="fas fa-edit"></i>
                      <span>Edit user details</span>
                    </button>
                    <button type="button" @click="deleteUser(user.id)" class="btn-action btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                      <span>Delete user</span>
                    </button>
                  </td>
                </tr></tbody>
              </table>

          <div class="user-pagination">
            <pagination :data="users" @pagination-change-page="getResults"></pagination>
          </div>
          </div>
      </div>
          </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="users" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">
                  <strong v-if="createMode">Add New User</strong>
                  <strong v-else-if="editMode">Edit User Detail</strong>
                  <strong v-else-if="showMode">Show User Detail</strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                
            <form @submit.prevent="editMode ? updateUser() : createUser()" @keydown="form.onKeydown($event)">
              <div v-if="editMode || createMode" class="modal-body">
                <div class="form-group">
                  <label>Name</label>
                  <input v-model="form.name" type="text" name="name" placeholder="Type your name" 
                    class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                  <has-error :form="form" field="name"></has-error>
                </div>

                <div class="form-group">
                  <label>Email Address</label>
                  <input v-model="form.email" type="email" name="email" placeholder="Type your email address" 
                    class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                  <has-error :form="form" field="email"></has-error>
                </div>
             
                <div class="form-group">
                  <label>Password</label>
                  <input v-model="form.password" type="password" name="password" placeholder="Enter your password" 
                    class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                  <has-error :form="form" field="password"></has-error>
                </div>

                <div class="form-group">
                  <label>User Type</label>
                  <select v-model="form.type" name="type" 
                    class="form-control" :class="{ 'is-invalid': form.errors.has('type') }">
                  <!--   <has-error :form="form" field="type"></has-error> -->
                      <option value="">Select User Type</option>
                      <option value="user">User</option>
                      <option value="moderator">Moderator</option>
                      <option value="admin">Admin</option>
                    </select>
                    <has-error :form="form" field="type"></has-error>
                </div>

                <div class="form-group">
                  <label>User Bio</label>
                  <textarea v-model="form.bio" name="bio" placeholder="Your user bio" 
                    class="form-control" :class="{ 'is-invalid': form.errors.has('bio') }">
                  </textarea> 
                  <has-error :form="form" field="bio"></has-error>
                </div>

                <div class="form-group">
                  <label>Select your photo</label>
                  <input v-model="form.photo" type="text" name="password" 
                    class="form-control" :class="{ 'is-invalid': form.errors.has('photo') }">
                  <has-error :form="form" field="photo"></has-error>
                </div>


              </div>
              <div v-else class="modal-body">
                <div class="form-group">
                  <label>Name</label>
                  <br/>
                  {{form.name}}
                </div>

                <div class="form-group">
                  <label>Email Address</label>
                  <br/>
                  {{ form.email }}
                </div>

                <div class="form-group">
                  <label>User Type</label>
                  <br/>
                  {{ form.type }}
                </div>

                <div class="form-group">
                  <label>User Bio</label>
                  <br/>
                  {{ form.bio }}
                </div>

                <div class="form-group">
                  <label> User photo</label>
                  <!-- {{ user.photo }} -->
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button v-if="createMode" type="submit" class="btn btn-primary">Create</button>
                <button v-else-if="editMode" type="submit" class="btn btn-primary">Update</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <div v-if="!$gate.isAdminOrModerator()">
          <not-found></not-found>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
              editMode: false,
              createMode: false,
              showMode: false,
                users : {},
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
            getResults(page = 1) {
              axios.get('api/user?page=' + page)
                  .then(response => {
                      this.users = response.data;
                  });
            },
            loadUsers(){
              this.editMode = false;
              this.createMode = false;
              this.showMode = false;
              this.form.reset();
              if(this.$gate.isAdminOrModerator()) {
                this.$Progress.start();
                axios.get("/api/user")
                .then(data => {
                    this.users = data.data;
                    this.$Progress.finish();
               })
                
              }     
            },

            addUser(){
              this.form.clear();
              this.editMode = false;
              this.createMode = true;
              this.showMode = false;
            },

            createUser(){
                this.form.post('api/user')
                .then(response => {
                  $('#users').modal('hide');
                  this.loadUsers();
                  this.$toast.success({
                      title: 'User added',
                      message: 'Your data has been added to the user'
                    });
                });
            },

            showUser(user){
              this.editMode = false;
              this.createMode = false;
              this.showMode = true;
              this.form.fill(user);
              $('#users').modal('show');
            },

            editUser(user){
              this.editMode = true;
              this.createMode = false;
              this.showMode = false;
              this.form.fill(user);
              $('#users').modal('show');
            },


            // updateUser(){
            //   this.form.put('api/user/' + this.form.id)
            //   .then(() => {
            //     console.log('hello');
            //   })
            // },

            updateUser(){
              this.form.put('api/user/'+this.form.id)
              .then(() => {
                $('#users').modal('hide');
                this.loadUsers();
                this.$toast.success({
                    title: 'User Updated!',
                    message: 'Your data has been updated successfully.'
                  });
              })
            },

            deleteUser(id){
              Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
              }).then((result) => {

                if (result.value) {
                  //send delete request to the server
                  this.form.delete('api/user/'+id)
                  .then(result => {
                    Swal.fire(
                      'Deleted!',
                      'User has been deleted.',
                      'success'
                    );
                    this.loadUsers();
                  })
                  .catch(() => {
                    Swal.fire(
                      'Failed!',
                      'Something went wrong.',
                    )
                  })
                }

                Swal.fire(
                    'Canceled!',
                    'Your delete request is canceled.',
                  )
              })
              .catch(() => {
                Swal.fire(
                    'Canceled!',
                    'Your delete request canceled.',
                  )
              })
            }
        },
        mounted() {
            this.loadUsers();
        },
        created() {
          Fire.$on('searching', ()=> {
            let query = this.$parent.search;
            axios.get('api/findUser?q=' + query)
            .then((response)=>{
              this.users = response.data;
            })
            .catch(()=>{

            })
          })
        }
    }
</script>
