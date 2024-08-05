<template>
    <div class="bg-gray-100 h-screen flex flex-col max-w-screen-xl mx-auto">
        <ChatHeader :friend="friend.name"/>
        <ChatMessages :messages="messages" :currentUser="currentUser"/>
        <small v-if="isFriendTyping" class="text-gray-700 font-bold text-md bg-white px-3">
            {{ friend.name }} is typing...
        </small>
        <MessageBox @on-message="onMessage" :friend-id="friend.id" :currentUser="currentUser"/>
    </div>
</template>

<script setup>

import ChatHeader from "./ChatHeader.vue";
import ChatMessages from "./ChatMessages.vue";
import MessageBox from "./MessageBox.vue";
import {useChat} from "../composables/useChat.js";
import {onMounted} from "vue";

const {friend, currentUser} = defineProps({
    friend: {
        type: Object,
        required: true
    },
    currentUser: {
        type: Object,
        required: true
    }
})


const {messages, isFriendTyping, isFriendTypingTimer, updateMessages} = useChat()

const onMessage = (data) => {
    updateMessages(data)
}

onMounted(() => {
    Echo.private(`chat.${currentUser.id}`)
        .listen('MessageSent', (response) => {
            updateMessages(response.message)
        })
        .listenForWhisper("typing", (response) => {
            isFriendTyping.value = response.userID === friend.id;

            if (isFriendTypingTimer.value) {
                clearTimeout(isFriendTypingTimer.value)
            }

            isFriendTypingTimer.value = setTimeout(() => {
                isFriendTyping.value = false
            }, 1000)
        });
})

</script>

<style scoped>

</style>
