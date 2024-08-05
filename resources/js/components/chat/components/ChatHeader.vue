<template>
    <div class="flex items-center justify-between p-4 bg-card text-card-foreground bg-gray-200">
        <div class="inline-flex gap-3 items-center">
            <a href="/dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                </svg>
            </a>
            <img class="w-10 h-10 rounded-full border border-blue-300" src="/imgs/goku-profile.png" alt="Profile img">
            <h1 class="text-lg font-semibold">{{ friend }}</h1>
        </div>
    </div>
</template>

<script setup>

defineProps(['friend'])

</script>

<style scoped>

</style>
