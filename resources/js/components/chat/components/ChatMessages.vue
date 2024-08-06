<template>
    <div class="flex-1 overflow-y-auto overflow-hidden p-4 bg-white" ref="chatRef">
        <div class="flex flex-col space-y-2">
            <div v-for="message in messages"
                 :key="message.id" class="flex mb-2">
                <div
                    v-if="message.sender_id === currentUser.id"
                    class="p-2 mr-3 ml-auto text-white bg-primary rounded-lg"
                >
                    {{ message.text }}
                </div>

                <div v-else class="p-2 mr-auto bg-gray-200 rounded-lg">
                    {{ message.text }}
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

import {nextTick, onMounted, onUpdated, ref, watch} from "vue";

const {messages, currentUser} = defineProps(['messages', 'currentUser'])

const chatRef = ref(null)

const scrollToBottom = () => {
    nextTick(() => {
        setTimeout(() => {
            if (chatRef.value) {
                chatRef.value.scrollTo({
                    top: chatRef.value.scrollHeight,
                    behavior: 'smooth'
                });
            }
        }, 100);
    });
};

watch(messages, scrollToBottom, { deep: true });

onMounted(scrollToBottom);
onUpdated(scrollToBottom);

</script>


<style scoped>

</style>
