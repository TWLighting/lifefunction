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
  </div>
</template>
<script>
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
    }
  },
  created: function() {
    this.tocreated();
  },
  data() {
    const message = "页面加载于" + new Date().toLocaleString();
    //值得注意的是只有当实例被创建时就已经存在于 data 中的属性才是响应式的这里唯一的例外是使用 Object.freeze()，这会阻止修改现有的属性，也意味着响应系统无法再追踪变化
    const letter = "艾";
    Object.freeze(letter);
    return {
      message,
      seen: true,
      letter
    };
  }
};
</script>