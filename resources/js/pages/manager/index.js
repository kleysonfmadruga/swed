import { reseteModal, activeNewCOntainer } from './src/index.js';
import { hiddenDropdown, toggleDropdownVisibilityHandler } from '../utils/src/index.js';

let functions = {
    reseteModal
};

document.querySelectorAll('[show-modal]').forEach(element => {
    element.addEventListener('click', function() {
        const modal = document.getElementsByClassName(element.getAttribute('show-modal'))[0];
        const modal_fade = modal.getElementsByClassName('modal')[0];
        modal.classList.remove('hidden');
        modal_fade.classList.add('fade-in');

        if(element.getAttribute('function')) {
            functions[element.getAttribute('function')]();
        }
    });
});

document.querySelectorAll('[new-content]').forEach(element => {
    if(element) {
        $(element).on('change', function() {
            activeNewCOntainer(element)
        });
    }
});

window.onclick = (element) => {
    hiddenDropdown(element);
}

document.getElementById('profile-dropdown-button').addEventListener('click', function(element) {
    toggleDropdownVisibilityHandler(element.target);
});