document.addEventListener('DOMContentLoaded', function(){

    modeDark();
});

// MODEDARK CODE
function modeDark(){

    // Pick preferences from system
    const prefers = window.matchMedia('(prefers-color-scheme: dark)');
    
    if(prefers.matches) {
        document.body.classList.add('dark-mode')
        console.log('negro');
    } else {
        document.body.classList.remove('dark-mode')
        console.log('blanco');
    };



    // Get the Button
    const darkButton = document.querySelector('.dark-mode-boton');

    // Add or Remove the Class for Dark Mode
    darkButton.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
        darkButton.classList.toggle('change');       

    });
};
