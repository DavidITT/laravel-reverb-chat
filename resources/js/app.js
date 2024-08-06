import './bootstrap';

//Fontawesome
import "@fortawesome/fontawesome-free/scss/fontawesome.scss";
import "@fortawesome/fontawesome-free/scss/solid.scss";
import "@fortawesome/fontawesome-free/scss/brands.scss";
import "@fortawesome/fontawesome-free/scss/regular.scss";


import {createApp} from 'vue'

const app = createApp({})

import ChatView from './components/chat/ChatView.vue'

app.component('chat-view', ChatView)

app.mount("#app")
