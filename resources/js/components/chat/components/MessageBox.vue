<template>
    <div class="bg-gray-200 p-4 rounded-b-lg">
        <form @submit.prevent="sendMessage">
            <div class="flex">
                <input class="w-full border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
                       type="text"
                       v-model="newMessage"
                       @keydown="sendTypingEvent"
                       placeholder="Type a message...">
                <button
                    type="submit"
                    class="px-4 py-1 ml-2 text-white bg-blue-500 rounded-lg">
                    Send
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>

import {ref} from "vue";

const emits = defineEmits(['onMessage'])

const {friendId, currentUser} = defineProps(['friendId', 'currentUser'])

const newMessage = ref('')

const sendTypingEvent = () => {
    Echo.private(`chat.${friendId}`).whisper("typing", {
        userID: currentUser.id,
    });
};

const sendMessage = async () => {
    if (!newMessage.value.trim()) return
    await axios.post(`/messages/${friendId}`, {
        message: newMessage.value
    }).then((response) => {
        emits('onMessage', response.data)
        newMessage.value = ''
    })
}


</script>


<style scoped>

</style>
