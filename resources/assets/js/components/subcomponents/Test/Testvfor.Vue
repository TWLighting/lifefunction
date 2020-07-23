<template>
  <li>
    {{ title }}
    <button v-on:click="$emit('remove')">Remove</button>
  </li>
</template>
<script>
export default {
  props: ["title"]
};
</script>