<template>
    <div class="bg-complementary/30 p-4 rounded-b-lg">
        <form @submit.prevent="sendMessage">
            <div class="flex">
                <input class="border rounded-full px-4 py-2 w-full text-gray-700 focus:border-none focus:outline-none focus:ring-1 focus:ring-accent2"
                       type="text"
                       v-model="newMessage"
                       @keydown="sendTypingEvent"
                       placeholder="Type a message...">
                <button
                    type="submit"
                    class="px-4 py-1 ml-2 text-white bg-primary rounded-lg">
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
