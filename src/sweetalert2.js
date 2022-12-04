
document.querySelector('.cart').addEventListener('click',()=>{
    // event.stopImmediatePropagation();
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Mua hàng thành công',
        showConfirmButton: false,
        timer: 1500
    })
}
)