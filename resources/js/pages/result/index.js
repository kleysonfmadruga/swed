import { hiddenDropdown, toggleDropdownVisibilityHandler} from '../utils/src/index.js';

window.onclick = (element) => {
    hiddenDropdown(element);
}

document.getElementById('profile-dropdown-button').addEventListener('click', function(element) {
    toggleDropdownVisibilityHandler(element.target);
});
