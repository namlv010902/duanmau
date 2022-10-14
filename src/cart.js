var tang = document.querySelector(".tang")
var giam = document.querySelector(".giam")
var so_luong = document.querySelector(".so_luong")

tang.addEventListener("click",()=>{
    so_luong.value= parseInt(so_luong.value)+1;

})
giam.addEventListener("click",()=>{
    if( so_luong.value>1){
        so_luong.value= parseInt(so_luong.value)-1;
    }
    
})
