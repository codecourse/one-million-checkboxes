<script setup>
import {ref} from "vue";

const count = ref(0)

const increment = () => {
    count.value++
}
</script>

<template>
    {{ count }}
    <button v-on:click="increment">Increment</button>
</template>
