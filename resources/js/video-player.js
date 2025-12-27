const video = document.querySelector('video');

document.addEventListener('DOMContentLoaded', () => {
    video.play().catch(error => {
        console.error('Error attempting to play the video:', error);
    });
    togglePlayIcon(); 
    video.loop = true;
    video.addEventListener('click', togglePlay);
    document.addEventListener('keydown', function(e) {handleKeydown(e);});
});


function handleKeydown(e)
{
    const tagName = document.activeElement.tagName.toLowerCase();
    
    if(tagName==="input") return;
    console.log(e.key.toLowerCase())
    switch(e.key.toLowerCase())
    {
        case " ":
        case "k":
            if (tagName === "button") return;
            e.preventDefault();
            togglePlay();
            break;
    }
}


function togglePlay(){
    video.paused ? video.play() : video.pause();
    togglePlayIcon();
}

function togglePlayIcon(){
    const playIcon = document.getElementById('play-icon');
    video.paused ? playIcon.classList.remove('hidden') : playIcon.classList.add('hidden');
}