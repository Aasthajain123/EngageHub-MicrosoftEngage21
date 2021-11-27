<script type="text/javascript">    
    const realFile = document.getElementById("real-input");
    const customBtn = document.getElementById("custom-button");
    const customtxt = document.getElementById("custom-text");
    customBtn.addEventListener("click",function(){
        realFile.click();
    });
    realFile.addEventListener("change",function(){
        if(realFile.value){
            customtxt.innerHTML = realFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
        }
        else{
            customtxt.innerHTML = "No file chosen";   
        }
    });
</script>
