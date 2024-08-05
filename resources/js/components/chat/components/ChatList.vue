<template>
    <h2 class="text-xl font-semibold mb-4 p-5 border-b">Chats</h2>
    <ul>
        <li v-for="user in users" :key="user.id"
            @click="openChat(user)"
            class="cursor-pointer hover:bg-gray-200 flex flex-wrap p-3">
            <div class="flex items-center">
                <img class="h-10 w-10 rounded-full" src="/imgs/goku-profile.png" alt="user-photo"/>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">{{ user.name }}</p>
                    <p class="text-sm text-gray-500">{{ user.email }}</p>
                </div>
            </div>
        </li>
    </ul>
</template>

<script setup>
import {useChat} from "../composables/useChat.js";

const {openChat} = useChat()
const {users} = defineProps(['users'])

</script>

<style scoped>

</style>
