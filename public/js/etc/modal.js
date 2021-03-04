window.onload = function () {

    document.querySelectorAll('[close-modal]').forEach(element => {
        if(element) {
            element.addEventListener('click', function () {
                const modal = document.getElementsByClassName(element.getAttribute('close-modal'))[0];
                const modal_fade = modal.getElementsByClassName('modal')[0];
                modal.classList.add('hidden');
                modal_fade.classList.remove('fade-in');
            });
        }
    });
    Array.prototype.slice.call(document.getElementsByClassName('modal-box')).forEach(element => {
        if(element) {
            element.addEventListener('click', function (elem) {
                if(elem.target.classList.contains('modal-box')) {
                    const modal = document.getElementsByClassName(element.getAttribute('modal-area'))[0];
                    const modal_fade = modal.getElementsByClassName('modal')[0];
                    modal.classList.add('hidden');
                    modal_fade.classList.remove('fade-in');
                }
            });
        }
    });
}