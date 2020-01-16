<template>
  <el-row type="flex" class="row-bg" justify="pace-between" wrap="wrap">
    <ul>
      <li class="albums" v-for="data in albumdata">
        <div class="inalbums" justify="pace-between" align="middle">
          <el-tooltip content="介紹" placement="bottom">
            <span class="albums_icon" :click="clickicon" :value="1"></span>
          </el-tooltip>
          <el-tooltip content="播放" placement="bottom">
            <span class="albums_icon" :click="clickicon" :value="2"></span>
          </el-tooltip>
          <el-tooltip content="詳細" placement="bottom">
            <span class="albums_icon" :click="clickicon" :value="3"></span>
          </el-tooltip>
        </div>
        <!-- <el-avatar :size="60" :src="'https://picsum.photos/60?random'+item"></el-avatar> -->
        <el-image :src="'img/album_cover/album'+data.photo_cover+'.jpg'" :fit="cover" />
        <span class="text_center">{{ data.alert_text }}</span>
      </li>
    </ul>
  </el-row>
</template>
<script>
export default {
  props: ["albumdata"]
};
</script>