<template>
  <div>
    <el-row>
      <el-col :span="9">
        <Date v-on:backdate="updatedate" :search="search" />
      </el-col>
      <el-col :span="1">
        <el-button round @click="dosearch">搜尋</el-button>
      </el-col>
    </el-row>
    <br />
    <el-row v-for="(areadata, index) in singerarea" :key="index">
      <el-row>
        <el-col :span="6">
          <h2 class="row-bg SansTC">{{ areadata.area }}</h2>
        </el-col>
        <el-col :span="4" :offset="14">
          <el-button-group>
            <el-button type="primary" disabled="{`true`}">
              <i class="el-icon-arrow-right el-icon--lift"></i>
            </el-button>
            <el-button type="primary">
              <i class="el-icon-arrow-right el-icon--right"></i>
            </el-button>
          </el-button-group>
        </el-col>
      </el-row>
      <el-row
        type="flex"
        class="row-bg SansTC"
        justify="pace-between"
        wrap="wrap"
      >
        <ul>
          <template>
            <div></div>
          </template>
          <li
            class="albums"
            v-for="(data, key) in getalbumdata[0][areadata.code]"
          >
            <div class="inalbums" justify="pace-between" align="middle">
              <el-tooltip content="介紹" placement="bottom">
                <span
                  class="albums_icon"
                  @click="clickicon(data.aldums_id, 1)"
                ></span>
              </el-tooltip>

              <el-tooltip content="視聽" placement="bottom">
                <span
                  class="albums_icon"
                  @click="clickicon(data.aldums_id, 2)"
                ></span>
              </el-tooltip>
              <el-tooltip content="詳細" placement="bottom">
                <span
                  class="albums_icon"
                  @click="clickicon(data.aldums_id, 3)"
                ></span>
              </el-tooltip>
            </div>
            <!-- <el-avatar :size="60" :src="'https://picsum.photos/60?random'+item"></el-avatar> -->
            <el-image :src="data.img_url" :fit="data.release_time" />
          </li>
        </ul>
      </el-row>
    </el-row>
  </div>
</template>
<script>
import Date from "./subcomponents/Date";

export default {
  methods: {
    clickicon(album_id, type) {
      let path = "/album/" + album_id;
      switch (type) {
        case 1:
          path += "/introduction";
          break;
        case 2:
          path += "/play";
          break;
        case 3:
          path += "/detail";
          break;
      }
      this.$router.push(path);
    },
    getallalbum() {
      window
        .fetchdata("/album/getHot")
        .then(data => {
          if (data.data) {
            this.$set(this.getalbumdata, this.getalbumdata.length, data.data);
            console.log(this.getalbumdata);
          }
        })
        .catch(error => console.error(error));
    }
  },
  created() {
    this.getallalbum();
  },
  data() {
    const item = {
      date: "2016-05-02",
      name: "王小虎",
      address: "上海市普陀区金沙江路 1518 弄"
    };
    return {
      search: ["2014-11-11", "2016-11-11"],
      getalbumdata: [],
      singerarea: [
        { area: "華語熱門", code: "CH" },
        { area: "日語熱門", code: "JP" },
        { area: "韓語熱門", code: "KOREA" },
        { area: "西洋熱門", code: "WEST" }
      ]
    };
  },
  components: { Date }
};
</script>
