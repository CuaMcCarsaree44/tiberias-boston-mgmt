
const getLoader = (): HTMLElement | null => document.getElementById('loader');

const loaderOn = () => {

    const element = getLoader();

    if(element !== null){
        element.classList.remove("d-none");
    }

}
    
const loaderOff = () => {

    const element = getLoader();

    if(element !== null){
        element.classList.add("d-none");
    }

}