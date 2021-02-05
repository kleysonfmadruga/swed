
function reseteModal(element) {
    console.log('entrou');
}

function activeNewCOntainer(element) {
    const target = document.getElementById(element.getAttribute('new-content'));
    const input = target.getElementsByTagName('INPUT')[0]
    if (element.value == 'new') {
        target.classList.remove('hidden');
        input.disabled = false;
    } else {
        target.classList.add('hidden');
        input.disabled = true;
    }
}

export { reseteModal, activeNewCOntainer };