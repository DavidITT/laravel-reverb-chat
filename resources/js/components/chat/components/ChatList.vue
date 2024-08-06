<template>
    <div class="border-r border-gray-300 flex flex-col w-full h-screen overflow-y-auto">
        <div class="flex flex-col border-b px-2 border-gray-300 space-y-2 p-4">
            <div class="flex justify-between w-full items-center">
                <h2 class="text-2xl font-semibold sticky top-0 bg-white z-10 text-accent3" v-if="!statusSearchInput">Chats</h2>
                <div class="flex space-x-4 text-gray-500 items-center">
                    <i class="fas fa-search cursor-pointer" v-if="!statusSearchInput"  @click="displaySearchInput"></i>
                    <div class="block md:hidden" v-if="!statusSearchInput" >
                        <i class="fa-solid fa-ellipsis-vertical fa-lg cursor-pointer pr-2"></i>
                    </div>
                </div>
            </div>

            <div class="search-input" v-if="statusSearchInput" ref="searchRef">
                <input type="text" placeholder="Search..."
                       v-model="search"
                       :class="{ 'pl-10': search.length === 0, 'pl-4': search.length > 0 }"
                       class="border rounded-full px-4 py-2 w-full text-gray-700 focus:border-none focus:outline-none focus:ring-1 focus:ring-accent2">
                <i class="search-icon"
                   :class="{
                    'fas fa-search': !statusSearchInput,
                    'fas fa-arrow-left': statusSearchInput
                   }"
                   @click="handleArrowIcon"
                   v-if="search.length === 0"></i>
                <i class="fa-solid fa-xmark quit-icon" @click="cleanSearch" v-if="search.length > 0"></i>
            </div>
        </div>

        <ul class="custom-scroll">
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
    </div>
    <div class=" md:hidden fixed bottom-2 right-2 shadow-xl h-[60px] w-[60px] rounded-full">
        <NewMessageIcon/>
    </div>
</template>

<script setup>
import {useChat} from "../composables/useChat.js";
import NewMessageIcon from "../components/NewMessageIcon.vue";
import { onClickOutside } from '@vueuse/core'
import {ref} from "vue";

const {openChat} = useChat()

const {users} = defineProps(['users'])

const searchRef = ref(null)
const search = ref('')
const statusSearchInput = ref(false)

const cleanSearch = () => search.value = ''
const displaySearchInput = () => statusSearchInput.value = !statusSearchInput.value

const handleArrowIcon = () => {
    if (statusSearchInput.value) {
        statusSearchInput.value = false;
    }
};

onClickOutside(searchRef, event => statusSearchInput.value = false)

</script>

<style scoped lang="scss">

.custom-scroll {
    scrollbar-color: #BB78D9 white;
    scrollbar-width: thin;
    overflow-y: scroll;
}

.search-input{
    position: relative;
}

.search-icon{
    position: absolute;
    top: 50%;
    left: 0.75rem;
    transform: translateY(-50%);
    color: #6b7280;
}

.quit-icon{
    position: absolute;
    top: 50%;
    right: 0.75rem;
    transform: translateY(-50%);
    color: #6b7280;
    cursor: pointer;
}

</style>
