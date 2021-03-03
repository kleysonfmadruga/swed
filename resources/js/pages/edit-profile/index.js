import { hiddenDropdown, toggleDropdownVisibilityHandler, imageToBase64 } from '../utils/src/index.js';

const photoInput = document.querySelector('input[name="photo"]');

photoInput.addEventListener('input', async function(element) {
    const base = await imageToBase64(photoInput.files[0])
    const profilePhoto = document.getElementById('profile-photo');

    profilePhoto.src = base;
});

window.onclick = (element) => {
    hiddenDropdown(element);
}

document.getElementById('profile-dropdown-button').addEventListener('click', function(element) {
    toggleDropdownVisibilityHandler(element.target);
});
