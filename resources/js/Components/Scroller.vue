<script setup>
import { RecycleScroller } from 'vue-virtual-scroller'

let items = [...Array(1000000).keys()].map((index) => {
    return {
        id: index + 1,
        checked: false
    }
})
</script>

<template>
    <RecycleScroller
        class="bg-blue-500 flex-grow overflow-y-auto"
        :items="items"
        :item-size="30"
    >
        <template #default="{ item }">
            <div>
                {{ item }}
            </div>
        </template>
    </RecycleScroller>
</template>
