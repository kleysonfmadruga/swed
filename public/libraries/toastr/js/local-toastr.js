function withErros(message){
    toastr.error(
        `${message}`, 'Ops!', 
        { "showMethod": "slideDown", "hideMethod": "slideUp", timeOut: 2000 });
}