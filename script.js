function saveContrastPreference() {
    const isContrastEnabled = document.body.classList.contains('contrast');
    localStorage.setItem('contrastEnabled', isContrastEnabled.toString());
} //Zapisuje w localStorage informację o tym, czy kontrast jest włączony czy wyłączony.



function loadContrastPreference() {
    const isContrastEnabled = localStorage.getItem('contrastEnabled') === 'true';
    if (isContrastEnabled) {
        document.body.classList.add('contrast');
    }
} //Wczytuje z localStorage informację o tym, czy kontrast jest włączony czy wyłączony i ustawia odpowiednią klasę na elemencie body.


function createStyleSwitcher() {

    const imgSrc = localStorage.getItem('contrastEnabled') === 'true' ? 'style2.jpg' : 'style.jpg';


    const img = document.createElement('img');
    img.src = imgSrc;
    img.alt = 'Przełącz styl';
    img.title = 'Przełącz między stylem standardowym a stylem dla niedowidzących';
    img.id = 'style-switcher';


    img.addEventListener('click', function() {
        toggleContrast();
    });


    const styleSwitcher = document.querySelector('.style-switcher');
    styleSwitcher.appendChild(img);
} //Tworzy przycisk do przełączania między stylem standardowym a stylem dla niedowidzących.


function toggleContrast() {
    document.body.classList.toggle('contrast');
    saveContrastPreference();
    updateStyleSwitcher();
} //Przełącza między stylem standardowym a stylem dla niedowidzących.


function updateStyleSwitcher() {

    const styleSwitcher = document.querySelector('.style-switcher');
    styleSwitcher.innerHTML = '';


    createStyleSwitcher();
} //Aktualizuje przycisk do przełączania między stylem standardowym a stylem dla niedowidzących.


document.addEventListener('DOMContentLoaded', function() { // Nasłuchuje na zdarzenie DOMContentLoaded, które jest wywoływane, gdy cały dokument HTML został załadowany i przetworzony.
    createStyleSwitcher();
    loadContrastPreference();
});