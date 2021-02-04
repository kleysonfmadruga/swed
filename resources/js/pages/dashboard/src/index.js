function activeSelectContainer(element) {
    const target = document.getElementById('other-cities-container');
    const cities = document.getElementById('cities');
    target.classList.toggle('hidden');
    target.classList.toggle('fade-in');
    if(element.checked) {
        cities.disabled = false;
    } else {
        cities.disabled = true;
    }

}

export {activeSelectContainer}