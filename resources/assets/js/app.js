/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./bootstrap");
import Vue from "vue";
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import router from "./route";
Vue.use(ElementUI);
import App from "./App.vue";

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("Cum", require("./components/Cum"));
Vue.component("About", require("./components/About"));
Vue.component("Test", require("./components/Test"));

// 声明式渲染
new Vue({
  el: "#app",
  router,
  components: {},
  render: h => h(App)
});
