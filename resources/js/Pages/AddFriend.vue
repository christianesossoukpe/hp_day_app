<template>
    <div>
        <Head title="Dashboard" />
      <h2>Envoyer une demande d'amitié</h2>
      <button @click="sendFriendRequest">Envoyer la demande d'amitié</button>
  
      <div v-if="message" class="alert" :class="messageType">
        {{ message }}
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import Dashboard from './Dashboard.vue';
  const userId = 1;  // ID de l'utilisateur connecté, peut être récupéré dynamiquement
  const friendId = 2;  // ID de l'ami, peut être récupéré dynamiquement
  const message = ref(null);
  const messageType = ref('');
  
  const sendFriendRequest = async () => {
    try {
      const response = await fetch(`/users/${userId}/friends/${friendId}`, {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json',
        },
      });
  
      const data = await response.json();
  
      if (response.ok) {
        message.value = data.message;
        messageType.value = 'alert-success';
      } else {
        message.value = data.message;
        messageType.value = 'alert-danger';
      }
    } catch (error) {
      message.value = 'Erreur lors de l\'envoi de la demande';
      messageType.value = 'alert-danger';
    }
  };
  </script>
  
  <style scoped>
  .alert {
    padding: 1rem;
    margin-top: 1rem;
    border-radius: 5px;
  }
  .alert-success {
    background-color: green;
    color: white;
  }
  .alert-danger {
    background-color: red;
    color: white;
  }
  </style>
  