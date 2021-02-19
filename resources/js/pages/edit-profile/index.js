import { imageToBase64 } from "./src/index.js";

const photoInput = document.querySelector('input[name="photo"]');

photoInput.addEventListener('input', async function(element) {
    console.log(element)
    const base = await imageToBase64(photoInput.files[0])
    const profilePhoto = document.getElementById('profile-photo');

    console.log(base)

    profilePhoto.src = base;
});

