<template>
  <!-- Cette partie va contenir notre HTML -->
  <div>
    <h1>{{ title }}</h1>
    <p>{{ tagline }}</p>
    <!-- on va creer la structure de notre appli -->
    <section>
      <!-- zone ou on va afficher le titre en cour de lecture -->
      <h2>Now playing : {{ current.title }}</h2>
      <p>By : {{ current.artist }}</p>
      <!-- zone ou on va afficher les controle du player -->
      <button @click="prev" :disabled="index <= 0">Prev</button>
      <button v-if="!isPlaying" @click="play">Play</button>
      <button v-else @click="pause">Pause</button>
      <button @click="next" :disabled="index >= songs.length -1">Next</button>
    </section>
    <section>
      <!-- zone ou on va afficher notre playlist -->
      <h2>Ma playlist</h2>
      <div v-for="song in songs" :key="song.src">
        <h3>Track : {{ song.title}}</h3>
        <p>Artiste : {{ song.artist}}</p>
        <button @click="play(song)">play</button>
      </div>
    </section>
  </div>
</template>

<script>
/* Cette partie va contenir notre code JS
on va devoir exporter le component pour qu'il puisse etre 
accessible et utilisable par notre application*/
export default {
  name: "Player",
  props: {
    title: String,
    tagline: String
  },
  data() {
    return {
      current: {},
      index: 0,
      isPlaying: false,
      songs: [
        {
          title: "Do not forget me",
          artist: "unknow",
          src: require("../assets/music/Do_not_forget_me_ID_1028.mp3")
        },
        {
          title: "Karunarathna",
          artist: "Divulgane",
          src: require("../assets/music/Karunarathna_Divulgane_-_18_-_Ara_Moduwela.mp3")
        },
        {
          title: "Heart",
          artist: "Six time user",
          src: require("../assets/music/Six_Time_Users_-_01_-_Heart.mp3")
        },
        {
          title: "you get the blues",
          artist: "unknow",
          src: require("../assets/music/You_get_the_Blues_ID_1201.mp3")
        }
      ],
      // next on va initialiser notre player
      player: new Audio()
    };
  },
  mounted() {
    // cette methode fait partie du cycle de vie d'un composant vuejs
    // les instructions qui se trouvent a l'interieur ne seront executees
    //qu'une fois lorsque le composant est affiché
    this.current = this.songs[this.index];
    this.player.src = this.current.src;
  },
  methods: {
    play(song) {
      // on va declencher le player lorsqu'on appuie sur le bouton play
      if (typeof song.src !== "undefined") {
        this.current = song;
        this.player.src = this.current.src;
      }
      this.isPlaying = true;
      this.player.play();
    },
    pause() {
      this.isPlaying = false;
      this.player.pause();
    },
    prev() {
      if (this.index <= 0) {
        this.index = 0;
      } else {
        this.index--;
      }
      // on remplace la valeur de this.current par
      // la chanson selectionee
      this.current = this.songs[this.index];

      //on passe la nouvelle source au player
      this.player.src = this.current.src;
      this.isPlaying = true;
      this.player.play();
    },
    next() {
      //on verifie que l'index n'est pas superieur a la longueur
      //du tableau
      if (this.index >= this.songs.length - 1) {
        this.index = this.songs.length - 1;
      } else {
        this.index++;
      }

      // on remplace la valeur de this.current par
      // la chanson selectionee
      this.current = this.songs[this.index];

      //on passe la nouvelle source au player
      this.player.src = this.current.src;
      this.isPlaying = true;
      this.player.play();
    }
  }
};
</script>

<style>
/*ici on va ecrire notre code CSS */
</style>