const realFile2 = document.getElementById("real-input1");
    const customBtn2 = document.getElementById("custom-button1");
    const customtxt2 = document.getElementById("custom-text1");
    customBtn2.addEventListener("click",function(){
        realFile2.click();
    });
    realFile2.addEventListener("change",function(){
        if(realFile2.value){
            customtxt2.innerHTML = realFile2.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        }
        else{
            customtxt2.innerHTML = "No file chosen";   
        }
    });