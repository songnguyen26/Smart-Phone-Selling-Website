const listImage=document.querySelector(`.list-image`)
const imgs=document.getElementsByTagName('img')
setInterval(() => {
    
}, 4000);

const handleMinus= ()=>{
    const minus=document.getElementById("quantity")
    if(parseInt(minus.value)==1){
        minus.value=1
    }
    else{
        minus.value=parseInt(minus.value)-1
        minus.innerHTML=minus.value
    }
}
const handlePlus=()=>{
    const minus=document.getElementById("quantity")
    if(minus.value==10){
        minus.value=10
    }
    else{
        minus.value=parseInt(minus.value)+1
        minus.innerHTML=minus.value
    }
}
