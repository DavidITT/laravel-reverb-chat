<template>
    <div class="h-screen max-w-7xl mx-auto">
        <!-- md and upper devices -->
        <div class="hidden md:block bg-white h-full">
            <div class="flex">
                <div class="w-[80px] h-screen flex flex-col justify-between text-center p-2 pt-4 pb-6 border-r border-gray-300 bg-complementary/30">
                    <img class="h-10 w-10 rounded-full" src="/imgs/goku-profile.png" alt="user-photo"/>
                    <i class="fa-solid fa-right-from-bracket fa-xl cursor-pointer text-gray-600" @click="confirmLogout"></i>
                </div>
                <div class="border-r w-3/6 h-full">
                    <ChatList :users="users"/>
                </div>
                <div class="hidden md:block w-full">
                    <ChatBox v-if="friend && auth" :friend="friend" :current-user="auth"></ChatBox>
                    <div class="flex justify-center items-center h-full" v-else>
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
                <ChatBox v-if="friend && auth" :friend="friend" :current-user="auth"></ChatBox>
            </div>
        </div>
    </div>

    <div v-if="showLogoutModal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg" ref="backdropRef">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Logout</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">Are you sure you want to exit?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button" @click="logout" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Yes</button>
                        <button type="button" @click="closeModal" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useChat } from "./composables/useChat.js";
import ChatList from "./components/ChatList.vue";
import ChatBox from "./components/ChatBox.vue";
import {onClickOutside} from "@vueuse/core";

const { users, auth } = defineProps(['users', 'auth']);
const { friend } = useChat();

const showLogoutModal = ref(false);
const backdropRef = ref(null);

const confirmLogout = () => {
    showLogoutModal.value = true;
};

const closeModal = () => {
    showLogoutModal.value = false;
};

const logout = async () => {
    try {
        await axios.post('/logout', {}, {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        window.location.href = '/';
    } catch (error) {
        console.error('Error during logout:', error);
    }
};

onClickOutside(backdropRef, event => showLogoutModal.value = false)


</script>

<style scoped>

</style>
