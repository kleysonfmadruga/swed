function hiddenDropdown(element) {
    let dropMenu = document.querySelector('#profile-dropdown-content');
    if(!element.target.matches('#profile-dropdown-button') && !dropMenu.classList.contains('hidden')) {
        dropMenu.classList.toggle('hidden');
        dropMenu.classList.toggle('flex');
    }
}

function toggleDropdownVisibilityHandler(){
    let dropMenu = document.querySelector('#profile-dropdown-content')
    dropMenu.classList.toggle('hidden');
    dropMenu.classList.toggle('flex');
}

export { hiddenDropdown, toggleDropdownVisibilityHandler };