<template>
  <div>
    <div>
      <span v-bind:title="message">鼠标悬停几秒钟查看此处动态绑定的提示信息！</span>
      <p v-if="seen">现在你看到我了</p>
    </div>
    <div>
      <p>{{ message }}</p>
      <button v-on:click="reverseMessage">反转消息</button>
    </div>
    <div>
      <input type="text" v-model="letter" />
      {{letter}}
      </br>
      <span v-once>这个将不会改变: {{ letter }}</span>
    </div>
    <div>
       <span >透過計算屬性計算複雜表達式: {{ Message_computed }}</span>
      </br>
    </div>
    <div>
       <span >同是计算属性是基于它们的响应式依赖进行缓存的。只在相关响应式依赖发生改变时它们才会重新求值。这就意味着只要还没有发生改变，多次访问 shownow 计算属性会立即返回之前的计算结果，而不必再次执行函数。:{{ shownow }} </span>
       </br>
    </div>
    <div>
       <span >计算属性默认只有 getter ，不过在需要时你也可以提供一个 setter ：{{ fullname.get }} </span>
    </div>
    <div class="bg-purple"
     v-bind:class="{active:isactive,'text-danger':hasError}">
      当 isActive 或者 hasError 变化时，class 列表将相应地更新。例如，如果 hasError 的值为 true，class 列表将变为 "static active text-danger"。
    绑定的数据对象不必内联定义在模板里：定義在data中也可以取得，
    也可以在computed宣告為function
    </div>
    <br/>
    <div b-bind:style="styleobject">-bind:style 的对象语法十分直观——看着非常像 CSS，但其实是一个 JavaScript 对象。CSS 属性名可以用驼峰式 (camelCase) 或短横线分隔 (kebab-case，记得用引号括起来) 来命名：
      <br/>
      <div :style="{ display: ['-webkit-box', '-ms-flexbox', 'flex'] }">
        多重值:从 2.3.0 起你可以为 style 绑定中的属性提供一个包含多个值的数组，常用于提供多个带前缀的值，例如：
      </div>
         <br/>
      <template v-if="loginType === 'username'">
  <label>Username</label>
  <input placeholder="Enter your username" key="username-input">
</template>
<template v-else>
  <label>Email</label>
  <input placeholder="Enter your email address" key="email-input">
</template>
<button @click="changelogin" >切換登入</button>
    </div>
    <br/>
    <h1 v-show="ok">v-show的元素始终会被渲染并保留在 DOM 中。v-show 只是简单地切换元素的 CSS 属性 display</h1>
  <br/>
    <div>
      <button @click="newlist">點此新增列表</button>
       <button @click="newlistlength(10)">點此增加列表長度</button>
        <button @click="assignlength">點此增加多個屬性</button>
     <ul>
       <li :style="{backgroundColor:'orange'}" v-for="(value,name) of listsArray" v-bind:key="value.id" >
         {{name}}-{{value.content}}
         </li>
     </ul>
     <br/>
     <h1>我是一個組件</h1>
      <ul>
    <li
      is="Testvfor"
      v-for="(todo, index) in todos"
      v-bind:key="todo.id"
      v-bind:title="todo.title"
      v-on:remove="todos.splice(index, 1)"
    ></li>
  </ul>
     <br/>
     <div>
       <h1>Vue事件處理</h1>
       <capter>prevent:提交事件不再重载页面</capter>
       <form @submit.prevent='onsubmit'>
         <button type="submit">傳送</button>
       </form>
       
       <capter>按键修饰符</capter>
       <input @keyup.enter="onsubmit">
            <br/>
       <capter>系统修饰键</capter>
       <!-- Ctrl + Click -->
      <div @click.ctrl="puttext">{{showtext2}}</div>
     </div>
     <div>
       <h1>表单输入绑定</h1>
       <capter>多个复选框，绑定到同一个数组：</capter>
       <div id='example-3'>
  <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
  <label for="jack">Jack</label>
  <input type="checkbox" id="john" value="John" v-model="checkedNames">
  <label for="john">John</label>
  <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
  <label for="mike">Mike</label>
  <br>
  <span>Checked names: {{ checkedNames }}</span>
</div>
<br>
 <capter>选择框,单选时：</capter>
 <div id="example-5">
  <select  v-model="selected">
    <option disabled value="">请选择</option>
    <option>A</option>
    <option>B</option>
    <option>C</option>
  </select>
  <span>Selected: {{ selected }}</span>
  </div>
  <br>
  <h1>傳送包含所有資料的物件給組件不论何时为 post 对象添加一个新的属性，它都会自动地在< blog-post > 内可用。</h1>
 <blog-post
  v-for="post in posts"
  v-bind:key="post.id"
  v-bind:post="post"
></blog-post>
 <h1>父级组件可以像处理 native DOM 事件一样通过 v-on 监听子组件实例的任意事件</h1>
 <div id="blog-posts-events-demo">
  <div :style="{ fontSize: postFontSize + 'em' }">
    <blog-post
      v-for="post in posts"
      v-bind:key="post.id"
      v-bind:post="post"
      v-on:enlarge-text="postFontSize += $event"
    ></blog-post>
  </div>
</div>
  <div>
    {{info[0].email}}
  </div>
     </div>
   </div>
  </div>
  
   
</template>
<script>
import Testvfor from "./subcomponents/Test/Testvfor";

export default {
  methods: {
    reverseMessage: function() {
      this.message = this.message
        .split("")
        .reverse()
        .join("");
    },
    tocreated() {
      console.log(this.letter);
    },
    changelogin(){
      this.loginType=(this.loginType == '')? 'username':'';
    },
    newlist(){
      this.$set(this.listsArray,this.listsArray.length,{content:'ss'});
    },
     newlistlength(newLength){
     this.listsArray.splice(newLength);
    },
    assignlength(){
      this.listsArray=Object.assign({},this.listsArray,{
        content:'上三點是我認為選擇罐頭保單的原因當然或許有人會說可是老年保費很高怎麼辦',
        content2:'當你發生風險時，你第一個想到的應是自己是否有能力解決問題，再來才是想到自己有無保險能夠幫忙。'
      });
    },
    onsubmit(){
      console.log('submit');
    },
    puttext(){
      this.showtext2=this.showtext2.length>0?'':'hello,yellow';
    }
  },
  created: function() {
   
    this.tocreated();
    this.fullname.set('taylor swift');
  },
   mounted () {
    window.fetchdata('')
     .then(data => this.$set(this.info,this.info.length,data)) 
     .catch(error => console.error(error))
  //   .then(function(data) {
  //      console.log(data);
  //     // this.info.push(data);
  //    this.$set(this.info,data.length,data);
  //    console.log(this.info);
  // })
   
  },
  //这就是为什么 Vue 通过 watch 选项提供了一个更通用的方法，来响应数据的变化。当需要在数据变化时执行异步或开销较大的操作时，这个方式是最有用的。
  watch:{},
  computed:{
    Message_computed:function(){
     return  this.message.split("").join('-');
    },
    shownow: function () {
    return  Date.now();
    },
    fullname:{
      //get
      get:function(){
           return this.firstName + ' ' + this.lastName;
      },
      set:function(newValue){
      var names = newValue.split(' ')
      this.firstName = names[0]
      this.lastName = names[names.length - 1]
      }
    },
    classobj:function(){
      return {active:this.isactive && !this.error,
      'text-danger':this.error && this.error.type==='fatal'}
    },

  },
  data() {
    const message = "页面加载于" + new Date().toLocaleString();
    //值得注意的是只有当实例被创建时就已经存在于 data 中的属性才是响应式的这里唯一的例外是使用 Object.freeze()，这会阻止修改现有的属性，也意味着响应系统无法再追踪变化
    const letter = "艾";
    Object.freeze(letter);
    return {
      info:[],
      selected:[],
      checkedNames:[],
      showtext2:'ss',
      postFontSize:1,
       posts: [
      { id: 1, title: 'My journey with Vue' },
      { id: 2, title: 'Blogging with Vue' },
      { id: 3, title: 'Why Vue is so fun' }
    ],
       todos: [
      {
        id: 1,
        title: 'Do the dishes',
      },
      {
        id: 2,
        title: 'Take out the trash',
      },
      {
        id: 3,
        title: 'Mow the lawn'
      }
    ],
      listsArray:[
        {content:'一上肢肩、肘及腕關節均永久喪失機能者'},
        {content:'一上肢肩、肘及腕關節均永久遺存顯著運動障害者。'},
        {content:'一下肢髖、膝及足踝關節均遺存永久顯著運動障害者。'}
      ],
      listsobj:{
        content:'一上肢肩、肘及腕關節均永久喪失機能者',
        df:'一上肢肩、肘及腕關節均永久喪失機能者',
        fw:'一下肢髖、膝及足踝關節均遺存永久顯著運動障害者。'
      },
      loginType:'',
      styleobject:{
        backGround:'#fff',
        fontSize:'30px'
      },
      isactive:true,
      hasError:false,
      message,
      seen: true,
      letter,
      Name:{
        firstName:'Gre',
        lastName:"phoy"
      }
    };
  },
  components: { Testvfor }
};
</script>