import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
// let routes = [
//     {
//         path:'/Cum', //路徑
//         component:require('./components/Cum')//Component
//     },
//     {
//         path:'/about',
//         component:require('./components/About')
//     }//之後新增路由皆可使用{path:'', component:''}
// ];

export default new VueRouter({
  //model :history //因為Vue router 會自動產生hashtag(#)，俗果你覺得礙事可以加入這行。
  routes: [
    {
      path: "/Cum", //路徑
      component: require("./components/Cum") //Component
    },
    {
      path: "/about",
      component: require("./components/About")
    } //之後
  ] //ES6語法，當key和value一樣時可省略key
});
