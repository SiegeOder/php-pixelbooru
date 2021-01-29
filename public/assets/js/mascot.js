const music = new Audio;
music.src = "assets/audio/bathory.mp3";
function playMusic(){
    if(music.paused) music.play();
    else music.pause();
}
