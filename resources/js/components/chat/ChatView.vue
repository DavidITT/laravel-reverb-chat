<template>
    <div class="h-screen max-w-7xl mx-auto">
        <!-- md and upper devices -->
        <div class="hidden md:block bg-white h-full">
            <div class="grid grid-cols-1 md:grid-cols-2 h-full">
                <div class="border-r border-gray-300 flex-1 overflow-y-auto overflow-hidden">
                    <ChatList :users="users"/>
                </div>
                <div class="hidden md:block">
                    <chat-box
                        v-if="friend && auth"
                        :friend="friend"
                        :current-user="auth"
                    ></chat-box>

                    <div class="flex w-full justify-center items-center h-full" v-else>
                        Seleccione un chat
                    </div>
                </div>
            </div>
        </div>


        <!-- small devices -->
        <div class="h-full block md:hidden bg-white">
            <div class="border-r border-gray-300" v-if="friend === null">
                <ChatList :users="users"/>
            </div>
            <div v-else>
                <chat-box
                    v-if="friend && auth"
                    :friend="friend"
                    :current-user="auth"
                ></chat-box>
            </div>
        </div>
    </div>
</template>

<script setup>

import {useChat} from "./composables/useChat.js";
import ChatList from "./components/ChatList.vue";
import ChatBox from "./components/ChatBox.vue";

const {users, auth} = defineProps(['users', 'auth'])

const {friend} = useChat()


</script>

<style scoped>

</style>
