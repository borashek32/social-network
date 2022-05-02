<template>
  <div>
    <button class="btn">
      <slot></slot>
    </button>
  </div>
</template>

<script>
export default {
  name: 'my-button'
}
</script>

<style scoped lang="sass">
  .btn
    background-color: var(--color-primary-light)
    color: white
    border-radius: 0
    font-family: 'Josefin Sans', sans-serif
    font-size: 1.5rem
    text-transform: uppercase
    padding: 1.8rem
    transition: all .2s
    cursor: pointer

    &:hover
      background-color: var(--color-primary-dark)
</style>