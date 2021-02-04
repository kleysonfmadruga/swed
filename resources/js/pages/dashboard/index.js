import { hiddenDropdown, toggleDropdownVisibilityHandler } from '../utils/src/index.js';
import { activeSelectContainer } from './src/index.js';

window.onclick = (element) => {
    hiddenDropdown(element);
}

document.getElementById('profile-dropdown-button').addEventListener('click', function(element) {
    toggleDropdownVisibilityHandler(element.target);
});

document.getElementById('search-other-cities').addEventListener('click', function(element) {
    activeSelectContainer(element.target)
})