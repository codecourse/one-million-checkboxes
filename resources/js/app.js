import './bootstrap';
import { createApp} from "vue"
import Scroller from "./Components/Scroller.vue";

const app = createApp({})

app.component('scroller', Scroller)

app.mount('#app')
