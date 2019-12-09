<template>
  <el-container>
    <el-header>
      <el-menu
        :default-active="activeIndex"
        class="el-menu-demo"
        mode="horizontal"
        @select="handleSelect"
        background-color="#545c64"
        text-color="#fff"
        active-text-color="#ffd04b"
      >
        <el-menu-item index="1">
          <router-link to="/Cum">日語歌手</router-link>
        </el-menu-item>
        <el-menu-item index="2">
          <router-link to="/about">西洋歌手</router-link>
        </el-menu-item>
        <el-menu-item index="3">台灣歌手</el-menu-item>
        <el-menu-item index="4">韓語歌手</el-menu-item>
        <el-menu-item index="5">
          <router-link to="/test">測試Vue</router-link>
        </el-menu-item>
      </el-menu>
    </el-header>
    <el-main>
      <el-row>
        <Date v-on:backdate="updatedate" :search="search" />
      </el-row>
      <router-view></router-view>
    </el-main>
  </el-container>
</template>
<script>
import Date from "./components/subcomponents/Date";

export default {
  data() {
    return {
      activeIndex: "1",
      activeIndex2: "2",
      search: ["2014-11-11", "2016-11-11"]
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
