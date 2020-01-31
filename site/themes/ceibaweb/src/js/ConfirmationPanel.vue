<template>
  <div class="flex flex-col justify-center items-center w-full h-full relative text-white">
    <transition name="fade-up" appear>
      <img src="/assets/confirmed.png" alt="">
    </transition>
    <transition name="fade-down" appear>
      <span>
        <h1>we'll chat soon</h1>
        <h1>some links of potential interest:</h1>
        <a href="/" class="bg-blue-green text-white antialiased shadow-md px-3 py-1 uppercase">home</a>
      </span>
    </transition>
  </div>
</template>


<script>
export default {
  
}
</script>
