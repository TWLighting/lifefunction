<script>
export default {
  methods: {
    clickicon(type) {
      let showtype = "";
      switch (type) {
        case "1":
          showtype = "好看";
          break;
        case "2":
          showtype = "好幹";
          break;
        case "3":
          showtype = "好吃";
          break;
        default:
          showtype = "預設";
          console.log(showtype);
      }
    }
  },
  data() {
    const albumdata = [
      { photo_cover: "01", alert_text: "dsfdsfsf" },
      { photo_cover: "02", alert_text: "dsfdssfsf" },
      { photo_cover: "03", alert_text: "dsfdsfsf" },
      { photo_cover: "04", alert_text: "dsfdsssfsf" },
      { photo_cover: "05", alert_text: "dsfssdsfsf" }
    ];
    const item = {
      date: "2016-05-02",
      name: "王小虎",
      address: "上海市普陀区金沙江路 1518 弄"
    };
    return {
      albumdata: albumdata
    };
  }
};
</script>
<template>
  <el-row type="flex" class="row-bg" justify="pace-between" wrap="wrap">
    <ul>
      <li class="albums" v-for="data in albumdata">
        <div class="inalbums" justify="pace-between" align="middle">
          <span class="albums_icon" :click="clickicon" :value="1"></span>
          <span class="albums_icon" :click="clickicon" :value="2"></span>
          <span class="albums_icon" :click="clickicon" :value="3"></span>
        </div>
        <!-- <el-avatar :size="60" :src="'https://picsum.photos/60?random'+item"></el-avatar> -->
        <el-image :src="'img/album_cover/album'+data.photo_cover+'.jpg'" :fit="cover" />
        <span class="text_center">{{ data.alert_text }}</span>
      </li>
    </ul>
  </el-row>
</template>
