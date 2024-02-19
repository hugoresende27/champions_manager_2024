<template>
  <div class="container">
    <a href="https://github.com/hugoresende27?tab=repositories" target="_blank" style="text-decoration: none;">
      <h1 class="title">Champions Manager 2024</h1>
    </a>
    <div class="buttons">
      <button class="button" @click="startGame">Start Game</button>
      <button class="button" @click="openSettings">Settings</button>
      <button class="button" @click="quitGame">Quit Game</button>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const counter = ref(0)

// Functions to handle button clicks
const startGame = () => {
  // Add your logic to start the game
}

const openSettings = () => {
  // Add your logic to open settings
}

const quitGame = () => {
  // Add your logic to quit the game
}


</script>

<style>



/* Setting background color */
body {
  background-color: darkgreen; /* Red background color */
}

/* Centering the container horizontally and vertically */
.container {
  background-image: url('stadium1.jpeg'); /* Specify the path to your background image */
  background-size: cover; /* Cover the entire container */
  background-position: center; /* Center the background image */
  height: 100vh; /* Set the height of the container to 100% of the viewport height */
  display: flex; /* Use flexbox for centering */
  flex-direction: column; /* Stack child elements vertically */
  justify-content: center; /* Center vertically */
  align-items: center; /* Center horizontally */
}

/* Styling the title */
.title {
  font-size: 36px; /* Adjust to desired font size */
  font-family: 'Arial', sans-serif; /* Adjust to desired font family */
  color: white; /* Text color */
  background-color: darkgreen;
  padding: 10px;
  border-radius: 20px;
}

/* Styling the buttons */
.buttons {
  margin-top: 20px; /* Adjust spacing */
}

.button {
  padding: 10px 20px;
  margin: 5px;
  font-size: 16px; /* Adjust to desired font size */
  background-color: darkgreen; /* Button background color */
  color: white; /* Button text color */
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.button:hover {
  background-color: #0056b3; /* Button background color on hover */
}
</style>
