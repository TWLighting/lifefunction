<template>
  <div>{{ this.getdata }}</div>
</template>
<script>
export default {
  props: ["album_id"],
  methods: {
    getalbum(id) {
      console.log(id);
      let post_data = { albums_id: id };
      window
        .fetchdata("/album/getalbums", post_data, "POST")
        .then(data => {
          if (data.data) {
            this.$set(this.getdata, this.getdata.length, data.data);
            console.log(this.getdata);
          }
        })
        .catch(error => console.error(error));
    }
  },
  created() {
    this.getalbum(this.album_id);
  },
  data() {
    return {
      album_id: album_id,
      getdata: []
    };
  }
};
</script>