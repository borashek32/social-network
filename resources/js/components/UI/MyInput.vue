<template>
  <div>
    <input type="text" class="input" :value="modelValue" @input="updateInput">
  </div>
</template>

<script>
export default {
  name: 'my-input',
  props: {
    modelValue: [String, Number]
  },
  methods: {
    updateInput(event) {
      this.$emit('update:modelValue', event.target.value)
    }
  }
}
</script>

<style scoped lang="sass">
  .input
    width: 100%
    border: 1 solid teal
    padding: 10px 15px
    margin-top: 15px
</style>