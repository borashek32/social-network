<template>
  <div class="container">
    <div class="container__box">
      Vue
      <my-button>Registration</my-button>
      <my-input></my-input>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Container',
}
</script>

<style scoped lang='sass'>
  .container 
    display: flex
    align-items: center
    justify-content: center
  
    .container__box 
      max-width: 120rem
      width: 120rem
      background-color: var(--color-gray-light-1)
      box-shadow: var(--shadow-dark)
      min-height: 50rem

      @media only screen and (max-width: 75rem) 
        margin: 0
        max-width: 100%
        max-width: 100%
</style>