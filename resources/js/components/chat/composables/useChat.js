import {ref} from "vue";

const messages = ref([]);
const friend = ref(null);
const isFriendTyping = ref(false);
const isFriendTypingTimer = ref(null);

export const useChat = () => {

    const getMessages = async (friendID) => {
        await axios.get(`/messages/${friendID}`).then((response) => {
            messages.value = response.data
        })
    }

    const updateMessages = (data) => {

        const exists = messages.value.find(message => message.id === data.id);

        if (!exists) {
            messages.value.push(data);
        }
    };

    const openChat = async (user) => {
        messages.value = []
        friend.value = user
        await getMessages(friend.value.id)
    }

    return {
        //properties
        messages,
        friend,
        isFriendTyping,
        isFriendTypingTimer,
        //methods
        updateMessages,
        openChat,
        getMessages
    }
}
