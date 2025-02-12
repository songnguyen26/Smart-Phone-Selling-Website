

const handleMinus= ()=>{
    const minus=document.getElementById("qty")
    if(parseInt(minus.value)==1){
        minus.value=1
    }
    else{
        minus.value=parseInt(minus.value)-1
        minus.innerHTML=minus.value
    }
}
const handlePlus=()=>{
    const minus=document.getElementById("qty")
    if(minus.value==10){
        minus.value=10
    }
    else{
        minus.value=parseInt(minus.value)+1
        minus.innerHTML=minus.value
    }
}
