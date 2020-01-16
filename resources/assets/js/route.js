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
      path: "/Index", //路徑
      component: require("./components/Index") //Component
    },
    {
      path: "/Test", //路徑
      component: require("./components/Test") //Component
    },
    {
      path: "/Cum", //路徑
      component: require("./components/Cum") //Component
    },
    {
      path: "/about",
      component: require("./components/About")
    },
    {
      path: "/album/:album_id",
      component: require("./components/subcomponents/Albumbut/Album"),
      children: [
        {
          path: "introduction",
          component: require("./components/subcomponents/Albumbut/Introduction"),
          props: true
        },
        {
          path: "detail",
          component: require("./components/subcomponents/Albumbut/Detail"),
          props: true
        },
        {
          path: "play",
          component: require("./components/subcomponents/Albumbut/Play"),
          props: true
        }
      ]
    }
    //之後
  ] //ES6語法，當key和value一樣時可省略key
});
