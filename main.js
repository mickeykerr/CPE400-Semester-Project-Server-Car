//Kyle Knotek
//2022

window.addEventListener('load', () => {
    //load video feed

    let upbutton = document.querySelector('#up-button');
    let leftbutton = document.querySelector('#left-button');
    let rightbutton = document.querySelector('#right-button');
    let lightOn = document.querySelector('#on-button');
    let lightOff = document.querySelector('#off-button');
    
    upbutton.addEventListener('click', ()=>{
        alert("Up Pressed");
    })
    leftbutton.addEventListener('click', ()=>{
        alert("Left Pressed");
    })
    rightbutton.addEventListener('click', ()=>{
        alert("Right Pressed");
    })
    lightOn.addEventListener('click', ()=>{
        alert("Light On");
    })
    lightOff.addEventListener('click', ()=>{
        alert("Light Off");
    })
})
