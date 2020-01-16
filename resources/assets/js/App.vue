<template>
  <el-container>
    <el-header>
      <el-menu
        :default-active="activeIndex"
        class="el-menu-demo"
        mode="horizontal"
        @select="handleSelect"
        background-color="#39b7c3"
        text-color="#fff"
        active-text-color="#ffd04b"
      >
        <el-menu-item v-for="(route, index) in router" :key="index">
          <router-link :to="route.router_path">{{
            route.router_name
          }}</router-link>
        </el-menu-item>
      </el-menu>
    </el-header>
    <el-main>
      <router-view></router-view>
    </el-main>
    <el-footer :style="{ backgroundColor: '#39b7c3', textAlign: 'center' }">
      <el-row>
        <a href>關於閱聽</a>
        <a href>關於我們</a>
      </el-row>
      <el-row>Copyright © 2019 TOSING All Rights Reserved.</el-row>
    </el-footer>
  </el-container>
</template>
<script>
export default {
  data() {
    return {
      router: [
        { router_name: "首頁", router_path: "/index" },
        { router_name: "尋找歌手", router_path: "/Cum" },
        { router_name: "測試Vue", router_path: "/test" }
      ],
      activeIndex: "1",
      activeIndex2: "2"
    };
  },

  methods: {
    handleSelect(key, keyPath) {
      console.log(key, keyPath);
    },
    greet() {
      console.log(this.search);
    },
    updatedate(newdatearray) {
      console.log(newdatearray);
      this.search = newdatearray;
    }
  },
  mounte() {
    this.$nextTick(callback);
  },
  components: { Date }
};
</script>
