<script setup>
import { RecycleScroller } from 'vue-virtual-scroller'
import {ref} from "vue";
import BitSet from "bitset";
import { useElementBounding } from "@vueuse/core";

const props = defineProps({
    state: String,
    count: Number
})

const bitset = new BitSet()

for (let i = 0; i < props.state.length; i++) {
    bitset.set(i, Number(props.state.charAt(i)))
}

let items = [...Array(1000000).keys()].map((index) => {
    return {
        id: index + 1,
        checked: bitset.get(index + 1)
    }
})

const scroller = ref(null)
const gridItems = ref(32)
const itemSize = ref(1232 / gridItems.value)
const renderKey = ref(Date.now())
const count = ref(props.count)

const onResize = () => {
    const { width } = useElementBounding(scroller)
    gridItems.value = Math.floor(width.value / itemSize.value)
}

const setItemState = (id, checked) => {
    items[id - 1].checked = checked
    renderKey.value = Date.now()

    count.value += checked ? 1 : -1
}

const channel = Echo.private('checkboxes')

channel.listenForWhisper('state', (e) => {
    setItemState(e.id, e.checked)
})

const toggle = (id, checked) => {
    channel.whisper('state', {
        id, checked
    })

    setItemState(id, checked)
}
</script>

<template>
    <div class="flex items-center justify-between mb-6">
        <div>
            Count: {{ count }}
        </div>
    </div>
    <RecycleScroller
        ref="scroller"
        class="flex-grow overflow-y-auto max-h-[720px]"
        :items="items"
        :item-size="itemSize"
        :grid-items="gridItems"
        v-on:resize="onResize"
    >
        <template #default="{ item }">
            <div class="h-full flex items-center justify-center" :key="renderKey">
                <input type="checkbox" class="size-6" :checked="item.checked" v-on:change="toggle(item.id, $event.target.checked)">
            </div>
        </template>
    </RecycleScroller>
</template>
