
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//Importing Gater class
import Gate from './Gate';
Vue.prototype.$gate = new Gate(window.user);

//Vform setup goes below 
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
 
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//after installation of vue router we need to add these lines of codes
import VueRouter from 'vue-router';
Vue.use(VueRouter);

//after starting vue router we can define and link some routes in the same code
const routes = [
  { path: '/dashboard', component: require('./components/Dashboard.vue').default },
  { path: '/profile', component: require('./components/Profile.vue').default },
  { path: '/users', component: require('./components/Users.vue').default },
  { path: '/developer', component: require('./components/Developer.vue').default }
]


//Laravel passport components below here
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);



// 3. Initiate the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
	mode: 'history',
  routes // short for `routes: routes`
})

//Vue filter setting
//1.Capitalize
Vue.filter('capitalize', function(text){
	return text.charAt(0).toUpperCase() + text.slice(1);
});
//2.Text Truncate
Vue.filter('truncate', function(text, length) {
  if(text && text.length > length) {
      length = length - 3;
      return text.substring(0, length) + '...';
  }else {
    return text;
  }
});

//Vue-progressbar setting
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
	color: '#08DF69',
	failedColor: 'red',
	thickness: '6px'
})


//Sweetalert setup codes
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
}); 

window.Toast = Toast;


//cxlt toastr configuration
import cxltToastr from 'cxlt-vue2-toastr';
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css';

const toastrConfigs = {
  position: 'top right',
  showDuration: 900,
  progressBar: true,
  showMethod: 'fadeInRight',
  hideMethod: 'fadeOutRight',
  timeOut: 5000,
  closeButton: true
}

Vue.use(cxltToastr, toastrConfigs);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
     router
});
