<x-app-layout>
    <chat-view :users="{{ json_encode($users) }}"
               :auth="{{ json_encode(auth()->user()) }}">
    </chat-view>
</x-app-layout>
