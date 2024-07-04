import './bootstrap';
import { createApp} from "vue"
import Scroller from "./Components/Scroller.vue";
import 'vue-virtual-scroller/dist/vue-virtual-scroller.css'

const app = createApp({})

app.component('scroller', Scroller)

app.mount('#app')
