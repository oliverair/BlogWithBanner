import {createApp} from "vue";
import Dashboard from  './src/Admin/Dashboard.vue';

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'

const vuetify = createVuetify({
    components,
})

createApp(Dashboard)
    .use(vuetify)
    .mount( '#app');
