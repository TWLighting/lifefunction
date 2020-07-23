/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require("./bootstrap");
import Vue from "vue";
import fetchdata from "./components/fetch/fetchdata";
import ElementUI from "element-ui";
import "element-ui/lib/theme-chalk/index.css";
import router from "./route";
Vue.use(ElementUI);
import App from "./App.vue";

window.fetchdata = fetchdata;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("blog-post", {
  props: ["post"],
  template: `<div class="blog-post">
      <h3>{{ post.title }}</h3>
      <button v-on:click="$emit('enlarge-text',0.2)">
        Enlarge text
      </button>
      <div v-html="post.content"></div>
    </div>`
});
// 声明式渲染
new Vue({
  el: "#app",
  router,
  components: {},
  render: h => h(App)
});
