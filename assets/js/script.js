var audioElement;
var currentPlaylist = [];
var mousedown = false;
var currentIndex = 0;
var repeat = false;


//Format time function
function formatTime(seconds)
{
    var time = Math.round(seconds);
    var minutes = Math.floor(time/60); //Round the number
    var second =  time - minutes * 60;
    
    var extraZero
    if(second < 10)
        {
            extraZero = '0';
        }
    else
        {
            extraZero = '';
        }
    return minutes + ":" + extraZero + second;
}

//Update the progress of time function
function updateTimeProgressBar(audio)
{
    $('.progressTime.current').text(formatTime(audio.currentTime));
    $('.progressTime.remaining').text(formatTime(audio.duration - audio.currentTime));
    
    var progress = audio.currentTime/audio.duration * 100;
    
    $('.progress').css("width",progress + '%');
}

//Update the progress of volume function
function updateVolumeProgressBar(audio)
{
    var volume = audio.volume * 100;
    
    $('.progressBar .progressVolume').css("width", volume+'%');
}

//Creating Audio class that contain all the variable and function to Play A Song SIMILAR TO class IN PHP, so wheneer you want to use those variable or function, just create an object out of it.
//So what do you need to play a song? An audio tag - as a property : you can pass into it or create 1 inside it 


function Audio()
{
    //Setting the property of the Audio object
    this.currentlyPlaying;
    
    this.audio = document.createElement('audio');//this return <audio> tag
    
    this.audio.addEventListener('ended',function()
    {
        nextSong();
    })
    
    this.audio.addEventListener('canplay',function()
    {
        var duration = formatTime(this.duration)
        $('.progressTime.remaining').text(duration);
    });
    
    this.audio.addEventListener('timeupdate',function()
    {
        if(this.duration)
            {
                updateTimeProgressBar(this);
            }
    });
    
    this.audio.addEventListener('volumechange',function()
    {
        updateVolumeProgressBar(this);
    });
    
    this.setTrack = function(track)
    {
        this.currentlyPlaying = track;
        this.audio.src = "../" + track.path;
    }
    
    this.setTime = function(time)
    {
        this.audio.currentTime = time;
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
