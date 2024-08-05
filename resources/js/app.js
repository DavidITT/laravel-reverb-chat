import './bootstrap';

import {createApp} from 'vue'

const app = createApp({})

import ChatView from './components/chat/ChatView.vue'

app.component('chat-view', ChatView)

app.mount("#app")
