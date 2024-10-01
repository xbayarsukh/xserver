// resources/js/chat.js

// Import required dependencies
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

// Create a new Echo instance
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_WEBSOCKETS_KEY, // Replace with your WebSocket key from the .env file
    cluster: import.meta.env.VITE_WEBSOCKETS_CLUSTER, // Replace with your WebSocket cluster from the .env file
    forceTLS: true
});

// Listen for new messages
window.Echo.private('chat')
    .listen('ChatMessageSent', (e) => {
        const message = e.message;
        const user = e.user;

        // Append the new message to the chat container
        const chatMessages = document.getElementById('chat-messages');
        const messageElement = document.createElement('div');
        messageElement.classList.add('bg-gray-100', 'p-2', 'rounded-md', 'mb-2');
        messageElement.innerHTML = `<strong>${user.name}</strong>: ${message}`;
        chatMessages.appendChild(messageElement);
    });

// Handle form submission
const chatForm = document.getElementById('chat-form');
const chatInput = document.getElementById('chat-input');

chatForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const message = chatInput.value.trim();
    if (message) {
        // Send the message to the server
        axios.post('/send-message', { message })
            .then(() => {
                chatInput.value = '';
            })
            .catch((error) => {
                console.error('Error sending message:', error);
            });
    }
});
