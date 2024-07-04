<script setup>
import { RecycleScroller } from 'vue-virtual-scroller'
import {ref} from "vue";

let items = [...Array(1000000).keys()].map((index) => {
    return {
        id: index + 1,
        checked: false
    }
})

const gridItems = ref(32)
const itemSize = ref(1232 / gridItems.value)
const renderKey = ref(Date.now())

const setItemState = (id, checked) => {
    items[id - 1].checked = checked
    renderKey.value = Date.now()
}
</script>

<template>
    <div>
        <button v-on:click="setItemState(1, true)">Toggle</button>
    </div>
    <RecycleScroller
        class="flex-grow overflow-y-auto max-h-[720px]"
        :items="items"
        :item-size="itemSize"
        :grid-items="gridItems"
        :key="renderKey"
    >
        <template #default="{ item }">
            <div class="h-full flex items-center justify-center">
                <input type="checkbox" class="size-6" :checked="item.checked">
            </div>
        </template>
    </RecycleScroller>
</template>
