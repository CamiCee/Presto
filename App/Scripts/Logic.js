//Initalizationan and Declaration
var Min = document.getElementById("MinBtn");
var Max = document.getElementById("MaxBtn");
var Close = document.getElementById("CloseBtn");
const remote = require('electron').remote;

//Minimize Window
Min.addEventListener("click",function(){
    const window = remote.getCurrentWindow();
    window.minimize();
});


//Maximize Window
Max.addEventListener("click",function(){
    const window = remote.getCurrentWindow();
    if(!window.isMaximized()) {
        window.maximize();
        Control.className = "ControlsMax";
    }
    else {
        window.unmaximize();
        Control.className = "Controls";
    }
});

//Close Window
Close.addEventListener("click",function(){
    
    const window = remote.getCurrentWindow();
    window.close();
});