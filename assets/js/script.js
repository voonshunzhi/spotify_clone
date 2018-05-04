var audioElement;
var currentPlaylist = [];


//Creating Audio class that contain all the variable and function to Play A Song SIMILAR TO class IN PHP, so wheneer you want to use those variable or function, just create an object out of it.
//So what do you need to play a song? An audio tag - as a property : you can pass into it or create 1 inside it 
function Audio()
{
    //Setting the property of the Audio object
    this.currentlyPlaying;
    this.audio = document.createElement('audio');//this return <audio> tag
    
    //Setting the function of the Audio object
    this.setTrack = function(src)
    {
        this.audio.src = src;
    }
    
    this.play = function()
    {
        this.audio.play();
    }
    
    this.pause = function()
    {
        this.audio.pause();
    }
}
